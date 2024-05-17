
<?php
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d");
$hora = date("H:i:s");
$fecha_completo = date("Y-m-d H:i:s");

if(@count($_POST) > 0) {
    $id_ope = $_POST['id_proceso'];
    $cajas = CajaData::getAllAbierto(); 
    if(@count($cajas) > 0) { 
        $id_caja = $cajas->id;
    } else {
        $id_caja = 'NULL';
    }

    $pago = new PagoProcesoData();
    $pago->monto = 0;
    $pago->total = $_POST["precio"];
    $pago->nro_operacion = "1"; 
    $pago->id_proceso = $_POST["id_proceso"];
    $pago->cantidad = $_POST["cant_noche"];
    $pago->noche = $_POST["fecha_hora"];
    $fecha_actual = $_POST["fecha_salida"];
    
    // Sumo 1 día
    $fecha_salida = date("Y-m-d",strtotime($fecha_actual."+ ".$_POST['cant_noche']." days")); 
    $pago->fecha_entrada = $fecha_actual;
    $pago->fecha_salida = $fecha_salida.' 12:00:00';
    $pago->id_caja = $id_caja;
    $pago->id_user = $_SESSION["user_id"];
    $pago->addEstadia();  
    
    $proceso = ProcesoData::getById($_POST["id_proceso"]); 
    $fecha_salida = date("Y-m-d",strtotime($proceso->fecha_entrada."+ ".($proceso->cant_noche+$_POST["cant_noche"])." days")); 
    $proceso->cant_noche = $proceso->cant_noche+$_POST["cant_noche"]; 
    $proceso->fecha_salida = $fecha_salida.' 12:00:00'; 
    $proceso->updateEstadiaa(); 
    
    $id = $_POST['id_proceso'];
    require 'core/app/view/sumatoria-view.php';
    $proceso = ProcesoData::getById($id); 
    $proceso->total_v = $pagadooo; 
    $proceso->deuda = $total_total; 
    $proceso->updateTotalDeuda(); 
    
    // Redirección al final
    print "<script>window.location='index.php?view=addprocesoprueba&id=$id_ope';</script>";          
}
?>
