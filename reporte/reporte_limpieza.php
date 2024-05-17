<?php
include "../core/autoload.php";
include "../core/app/model/ProcesoData.php";
include "../core/app/model/PersonaData.php";
include "../core/app/model/UserData.php";
include "../core/app/model/ProcesoVentaData.php";
include "../core/app/model/HabitacionData.php";
include "../core/app/model/ProductoData.php";
include "../core/app/model/ConfiguracionData.php";
include "../core/app/model/ReservapData.php";
include "../core/app/model/CategoriaData.php";
include "fpdf/fpdf.php";

date_default_timezone_set('America/Tijuana');

$hoy = date("Y-m-d");
$hora = date("");
$doce = date("12:00:00");
$descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';



$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "RECEPCION");
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "FECHA: " . $hoy);

$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "REPORTE AMA DE LLAVES");
$pdf->SetFont('Arial', 'B', 9);

$pdf->setY(32);
$pdf->setX(135);
$pdf->Ln();

// Array de Cabecera
$header = array("HAB.", "TIPO HAB.", "F. ENTRADA", "F. SALIDA", "ESTADO", "OL", "VL", "CAMARISTA", "COMENTARIOS");

// Array de Productos (como se muestra en tu código original)
$products = array(
    array("0010", "Producto 1", 2, 120, 0),
    array("0024", "Producto 2", 5, 80, 0),
    array("0001", "Producto 3", 1, 40, 0),
    array("0001", "Producto 3", 5, 80, 0),
    array("0001", "Producto 3", 4, 30, 0),
    array("0001", "Producto 3", 7, 80, 0),
    array("0001", "Producto 3", 7, 80, 0),
);

// Column widths
$w = array(10, 18, 23, 23, 20, 10, 10, 20, 0);

// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 9, $header[$i], 1, 0, 'C');
$pdf->Ln();

// Data
$total = 0;

$habitaciones = HabitacionData::getListaLimpieza();

// Definir la posición Y límite antes de crear una nueva página
$yLimit = 250; // Puedes ajustar este valor según sea necesario

foreach ($habitaciones as $habitacion) :
    $proceso = ProcesoData::getByRecepcion($habitacion->id);

    // Determina el estado de la habitación
    $estado = "";

    if (empty($proceso->fecha_entrada) || $proceso->fecha_entrada == '0000-00-00') {
        $estado = "FINALIZADA";
    } elseif (empty($proceso->fecha_salida) || $proceso->fecha_salida == '0000-00-00') {
        $estado = "FINALIZADA";
    } else {
        // Convertir fechas a objetos DateTime para una comparación más precisa
        $fecha_salida = new DateTime($proceso->fecha_salida);   
        if ($fecha_salida->format('Y-m-d') == $hoy) {
            $estado = "POR SALIR";
        } else {
            $estado = "OCUPADO";
        }
    }

      // Verificar si hay suficiente espacio para imprimir más datos en la página actual
      if ($pdf->GetY() > $yLimit) {
        // Agregar una nueva página
        $pdf->AddPage();

        // Encabezado en la nueva página
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(5, $textypos, "RECEPCION");
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Ln();
        $pdf->Cell(5, $textypos, "FECHA: " . $hoy);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "REPORTE AMA DE LLAVES");
        $pdf->Ln();

        

        $pdf->SetFont('Arial', 'B', 9);
        // Header
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 9, $header[$i], 1, 0, 'C');
        $pdf->Ln();

        // También puedes redefinir el encabezado de la tabla aquí si es necesario
    }
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell($w[0], 6, $habitacion->nombre, 1);
    $pdf->Cell($w[1], 6, $habitacion->getCategoria()->nombre, 1);
    $pdf->Cell($w[2], 6, $estado == "FINALIZADA" ? "FINALIZADA" : date("d/m/Y", strtotime($proceso->fecha_entrada)), 1, 0, 'R'); // Fecha de entrada
    $pdf->Cell($w[3], 6, $estado == "FINALIZADA" ? "FINALIZADA" : date("d/m/Y", strtotime($proceso->fecha_salida)), 1, 0, 'R');   // Fecha de salida
    $pdf->Cell($w[4], 6, $estado, 1, 0, 'C');  // Estado de la habitación
    $pdf->Cell($w[5], 6, "", 1, 0, 'R');
    $pdf->Cell($w[6], 6, "", 1, 0, 'R');
    
    if ($proceso != null && $proceso->getLimpieza() != null) {
        $pdf->Cell($w[7], 6, $proceso->getLimpieza()->name, 1, 0, 'R');
    } else {
        $pdf->Cell($w[7], 6, "", 1, 0, 'R');
    }

    $pdf->Cell($w[8], 6, "", 1, 0, 'L');  // Ejemplo de comentario predeterminado
    $pdf->Ln();

endforeach;

/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$yposdinamic = 60 + (count($products) * 10);

$procesoLimpios = ProcesoData::getByRecepcionReservaTodas($hoy);
$llegadas = "";
foreach ($procesoLimpios as $procesoLimpio) :
    $llegadas .= $procesoLimpio->getHabitacion()->nombre . ' - ';
endforeach;



// Calcula la posición y para el pie de página
$yposfooter = $pdf->GetY() + 10;

// Mueve la sección de llegadas y su descripción al final del documento
// antes de la salida del PDF.
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetY($yposfooter);
$pdf->SetX(10);
$pdf->Cell(5, $textypos, "LLEGADAS: ");
$pdf->SetFont('Arial', '', 10);

// Dividir la descripción en segmentos basados en la coma
$descripciones = explode(",", $descripcion);
// Construir una cadena que contenga todas las descripciones separadas por un guión
$descripciones_concatenadas = implode(" - ", $descripciones);
// Imprimir todas las descripciones en varias líneas
$pdf->SetY($yposfooter + 5);
$pdf->SetX(10);
$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(0, $textypos, $descripciones_concatenadas);

$pdf->Output();

