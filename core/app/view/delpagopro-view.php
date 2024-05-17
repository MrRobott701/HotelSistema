<?php

$eliminar = PagoProcesoData::getById($_POST['id']);


$id=$_POST['id_p'];


$error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = "Se anuló un pago por $". $_POST["preciopago"]." / Hab ". $_POST["habitpago"]." / ".$_POST["foliopago"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();


if($eliminar->nro_operacion=="1"){
	$eliminar->monto="0";
	$eliminar->updateDelPago();
}else{
	$eliminar->del();
}
   

require 'core/app/view/sumatoria-view.php';
$proceso = ProcesoData::getById($id); 
$proceso->total_v = $pagadooo; 
$proceso->deuda = $total_total; 
$proceso->updateTotalDeuda();
	
print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";

?>