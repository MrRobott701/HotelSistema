<?php

if(@count($_POST)>0){ 
 
   

	$habitacion = HabitacionData::getById($_POST["id_habitacion"]);
	$habitacion->estado = 1;
	$habitacion->updateEstado(); 



  $error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = $_POST["accion"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();

 $id=$_POST["id_habitacion"];

  print "<script>window.location='index.php?view=proceso&id_habitacion=$id';</script>";



}

?>