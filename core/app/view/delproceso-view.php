<?php

if(@count($_POST)>0){ 

 
	$proceso = ProcesoData::getById($_POST["id"]);
  $proceso->estado = 5;
	$proceso->updateEstadao();   
 
	$habitacion = HabitacionData::getById($_POST["id_habitacion"]);
	$habitacion->estado = 3;
	$habitacion->updateEstado(); 

  $habitacion->limpieza = 0;
  $habitacion->update_aseo();
  
    //ANULAR PAGO
  PagoProcesoData::anularPago($_POST['id']);
  
 
 
 
    $productos = ProcesoVentaData::getByAll($_POST['id']);
    foreach($productos as $del):
		$eliminar = ProcesoVentaData::getById($del->id);
		$eliminar->del();
	endforeach;
 
 
  $error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = "Se anulo un registro de Hab ".$_POST["nomhabit"].' / '.$_POST["folioo"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();


 
  print "<script>window.location='index.php?view=recepcion';</script>";



}

?>