<?php
$eliminar = PagoProcesoData::getById($_POST['id']);

$id=$_POST['id_p'];


$error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = "Se anulo una noche de $".$_POST["preciopros"]." / Hab ".$_POST["habitpros"]." / ".$_POST["foliopros"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();
 

$proceso = ProcesoData::getById($_POST["id_p"]); 

  $fecha_salida = date("Y-m-d",strtotime($proceso->fecha_salida."- ".$eliminar->cantidad." days")); 

  $proceso->cant_noche = $proceso->cant_noche-$eliminar->cantidad; 
  $proceso->fecha_salida = $fecha_salida.' 12:00:00'; 
  $proceso->updateEstadiaa();

  $eliminar->del();


require 'core/app/view/sumatoria-view.php';
$proceso = ProcesoData::getById($id); 
$proceso->total_v = $pagadooo; 
$proceso->deuda = $total_total; 
$proceso->updateTotalDeuda();
 

print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";

?>