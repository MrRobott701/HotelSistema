<?php
require('ClassTicket.php');
include "../core/autoload.php";
include "../core/app/model/ProcesoData.php";
include "../core/app/model/PersonaData.php";
include "../core/app/model/UserData.php";
include "../core/app/model/ProcesoVentaData.php";
include "../core/app/model/HabitacionData.php";
include "../core/app/model/ProductoData.php";
include "../core/app/model/ConfiguracionData.php";
include "../core/app/model/PagoProcesoData.php";
include "../core/app/model/GastoData.php";
function convertirNumeroALetras($numero) {
    $unidades = array(
        'Cero', 'Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve',
        'Diez', 'Once', 'Doce', 'Trece', 'Catorce', 'Quince', 'Dieciséis', 'Diecisiete', 'Dieciocho', 'Diecinueve'
    );
    
    $decenas = array(
        'Veinte', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa'
    );

    $centenas = array(
        'Cien', 'Doscientos', 'Trescientos', 'Cuatrocientos', 'Quinientos', 'Seiscientos', 'Setecientos', 'Ochocientos', 'Novecientos'
    );

    $miles = array(
        '', 'Mil', 'Dos Mil', 'Tres Mil', 'Cuatro Mil', 'Cinco Mil', 'Seis Mil', 'Siete Mil', 'Ocho Mil', 'Nueve Mil'
    );

    $decimales = array(
        'Diez', 'Veinte', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa'
    );

    // Array para los nombres de los millones
    $millones = array(
        '', 'Un Millón', 'Dos Millones', 'Tres Millones', 'Cuatro Millones', 'Cinco Millones',
        'Seis Millones', 'Siete Millones', 'Ocho Millones', 'Nueve Millones'
    );

    $numero = (float) $numero;

    $parte_entera = floor($numero);
    $parte_decimal = round(($numero - $parte_entera) * 100);

    $numLetras = '';

    if ($parte_entera == 0) {
        $numLetras = $unidades[0];
    } elseif ($parte_entera < 20) {
        $numLetras = $unidades[$parte_entera];
    } elseif ($parte_entera < 100) {
        $numLetras = $decenas[floor($parte_entera / 10) - 2];
        if ($parte_entera % 10 > 0) {
            $numLetras .= ' y ' . $unidades[$parte_entera % 10];
        }
    } elseif ($parte_entera < 1000) {
        $numLetras = $centenas[floor($parte_entera / 100) - 1];
        if ($parte_entera % 100 > 0) {
            $numLetras .= ' ' . convertirNumeroALetras($parte_entera % 100);
        }
    } elseif ($parte_entera < 10000) {
        $numLetras = $miles[floor($parte_entera / 1000)];
        if ($parte_entera % 1000 > 0) {
            $numLetras .= ' ' . convertirNumeroALetras($parte_entera % 1000);
        }
    } elseif ($parte_entera < 1000000) {
        $numLetras = convertirNumeroALetras(floor($parte_entera / 1000)) . ' Mil';
        if ($parte_entera % 1000 > 0) {
            $numLetras .= ' ' . convertirNumeroALetras($parte_entera % 1000);
        }
    } elseif ($parte_entera < 10000000) {
        $numLetras = $millones[floor($parte_entera / 1000000)] . ' Millón';
        if ($parte_entera % 1000000 > 0) {
            $numLetras .= ' ' . convertirNumeroALetras($parte_entera % 1000000);
        }
    } else {
        $numLetras = 'NUMERO NO SOPORTADO';
    }

    if ($parte_decimal > 0) {
        $numLetras .= ' con ' . convertirNumeroALetras($parte_decimal) . ' centavos';
    }

    return $numLetras;
}


$operacion = ProcesoData::getById($_GET['id']);
if (@count($operacion) > 0) {
    $pdf = new TICKET('P', 'mm', 'letter');
    $pdf->AddPage();
    $configuracion = ConfiguracionData::getAllConfiguracion(); 
    if(@count($configuracion)>0){ 
        $nombre=$configuracion->nombre;
        $direccion=$configuracion->direccion;
        $estado=$configuracion->estado;
        $telefono=$configuracion->telefono;
        $fax=$configuracion->fax;
        $rnc=$configuracion->rnc;
        $registro_empresarial=$configuracion->registro_empresarial;
        $ciudad=$configuracion->ciudad;
        $iva=$configuracion->iva;
        $iva_sp=$iva/100;
        $id=$configuracion->id;                         
    } else {
        $nombre='';
        $direccion='';
        $estado='';
        $telefono='';
        $fax='';
        $rnc='';
        $registro_empresarial='';
        $ciudad='';
        $iva=18;
        $iva_sp=$iva/100;
        $id=0; 
    }
    if('1' == '1') {
        $pdf->SetFont('Helvetica', 'B', 25);
        $pdf->SetAutoPageBreak(true,1);
        $pdf->setXY(15,15);
        $pdf->MultiCell(200, 4.2, $nombre, 0,'C',0 ,1);
        $pdf->setXY(40,23);

        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(150, 4.2, $direccion. ' - '. $telefono, 0,'C',0 ,1);

        $pdf->setXY(65,30);
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(100, 4.2, '', 0,'C',0 ,1);
        $get_YH = $pdf->GetY();
        $pdf->SetFont('Arial', '', 15); 
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Text(10, $get_YH  + 5, 'TICKET NO. '.$operacion->nro_folio);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(10, $get_YH  + 10, 'CHECK-IN: '.$operacion->fecha_entrada);
        $pdf->Text(10, $get_YH  + 15, 'CHECK-OUT: '.$operacion->fecha_salida);
        $pdf->Text(10, $get_YH + 20, 'CAJERO : '.$operacion->getUsuario()->name);
        $pdf->SetXY(9,$get_YH + 22);
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(190, 4.2, 'HUESPED: '.$operacion->getCliente()->nombre, 0,'L',0 ,1);
        $pdf->SetXY(10,$get_YH + 22);
        $pdf->SetXY(3.8,$get_YH + 25);
        $get_YH2 = $pdf->GetY();
        $pdf->SetXY(10,$get_YH2 + 8);
        $pdf->SetFillColor(255,255,255);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(25,4,'# Dias',0,0,'L',1);
        $pdf->Cell(95,4,'Descripcion',0,0,'L',1);
        $pdf->Cell(30,4,'Precio',0,0,'L',1);
        $pdf->Cell(30,4,'Total',0,0,'L',1);
        $pdf->SetFont('Arial','',15);
        $pdf->Ln(6);
        $item = 1;
        $pdf->setX(1.1); 
        $tmps = PagoProcesoData::getAllProceso($operacion->id); 
        $tmp = ProcesoData::getByid($operacion->id); 
        $sumatoria_s=0;
        foreach($tmps as $p): 
            if($p->monto!=0 && $p->total!=0){
            $pdf->setX(10);
            $pdf->Cell(26,4,'    '.$tmp->cant_noche,0,0,'L');
            $pdf->Cell(95,4,'Habitacion #'.$operacion->getHabitacion()->nombre,0,0,'L',1);
            $pdf->Cell(30,4,'$'.$p->total,0,0,'L',1);
            $pdf->Cell(30,4,'$'.$p->total*$tmp->cant_noche,0,0,'L',1);
            $pdf->Ln(4.5);
            }
            $sumatoria_s+=$p->total*$tmp->cant_noche; 
        endforeach; 
        $get_Y = $pdf->GetY();
        $productos = ProcesoVentaData::getByAll($operacion->id);
        $total=0;
        if(@count($productos)>0){
        foreach($productos as $producto): 
         $item = $item + 1;
            $pdf->setX(1.1);
            $pdf->Cell(13,4,$producto->cantidad,0,0,'L');
            $pdf->Cell(28,4,$producto->getProducto()->nombre,0,0,'L',1);
            $pdf->Cell(16,4,$producto->precio,0,0,'L',1);
            $sub_total=$producto->precio*$producto->cantidad;
            $pdf->Cell(8,4,$sub_total,0,0,'L',1);
            $pdf->Ln(4.5);
            $total=$sub_total+$total;    
            $get_Y = $pdf->GetY();
        endforeach;
        }
       $otros = GastoData::getAllIngresoProceso($operacion->id); 
$total_extra = 0;
foreach($otros as $otro): 
    // Verificar si el precio es mayor a 0
    if ($otro->precio != 0) {
        $pdf->setX(10);
        $pdf->Cell(26,4,'CARGO ',0,0,'L');
        $pdf->Cell(95,4,$otro->descripcion,0,0,'L',1);
        $pdf->Cell(30,4,'$'.$otro->precio,0,0,'L',1);
        $pdf->Cell(30,4,'$'.$otro->precio,0,0,'L',1);
        $pdf->Ln(4.5);
        $total_extra += $otro->precio;
        $get_Y = $pdf->GetY(); 
    }
endforeach;

        $final = $total + $sumatoria_s + $total_extra;
        $desc = ($final * $operacion->descuento) / 100;

        $totalEnLetras = convertirNumeroALetras($final);

        $anchoTicket = 70;
        $posicionX = max(2, ($anchoTicket - (strlen($totalEnLetras) * 1)) / 2);
        $tamanoLetra = 8;
        $pdf->SetFontSize($tamanoLetra);

        $textoDividido = wordwrap($totalEnLetras, 90, "\n", true);
        $lineas = explode("\n", $textoDividido);
        $posicionY = $get_Y + 15;

        /* IMPRIMIR LINEAS */
        $pdf->SetFont('Arial','BI',12);
        $tamanoLetraTotal = 12;
        $pdf->SetFontSize($tamanoLetraTotal);

        foreach ($lineas as $linea) {
            $pdf->SetXY($posicionX+60, $posicionY);
            $pdf->MultiCell($anchoTicket, 5, $linea);
            $posicionY += 5;
        }

        $pdf->SetFont('Arial','',15);

        $pdf->Text(10, $get_Y+4, '----------------------------------------------------------------------------------------------------');
        $pdf->SetFont('Arial','B',14);
        $pdf->Text(83,$get_Y + 10,' TOTAL: ');
        $pdf->Text(105,$get_Y + 10,' $'.number_format($final, 2, '.', ','));        

        /* TOTAL EN LETRAS */

        $pdf->SetFont('Arial','BI',10);
        $pdf->Text(83, $get_Y+30, '  *PRECIO EN PESOS MXN*');
        $pdf->SetFont('Arial','B',25);
        $pdf->Text(50, $get_Y+60, 'GRACIAS POR VISITARNOS');
        $pdf->SetFillColor(0,0,0);
        $pdf->Code39(80,$get_Y+65,''.$operacion->nro_folio,1,7.5);
        $pdf->SetFont('Arial','B',12);
        $pdf->Text(96, $get_Y+78, '*'.$operacion->nro_folio.'*');
    } else {
        $pdf->SetFont('Arial','', 10);
        $pdf->Text(10, 55, '*COMPROBANTE DE VENTA*');
    }
    $pdf->Output('','Ticket_'.'$numero_comprobant.pdf',true);
} else {
}
?>
