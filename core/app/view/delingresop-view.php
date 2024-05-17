<?php


$eliminar = GastoData::getById($_POST['id']);

$id=$_POST['id_p'];


$error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = "Se anulo un cobro por $".$_POST["preciopago"]. " de ".$_POST["detallepago"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();

$eliminar->del();
$id=$_POST['id_p'];


require 'core/app/view/sumatoria-view.php';
$proceso = ProcesoData::getById($id); 
$proceso->total_v = $pagadooo; 
$proceso->deuda = $total_total; 
$proceso->updateTotalDeuda(); 
	
print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";

?>