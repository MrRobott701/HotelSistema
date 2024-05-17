<?php

if(@count($_POST)>0){

	$persona = PersonaData::getById($_POST["id_persona"]);
	
	$persona->nombre = $_POST['nombre'];
	$persona->updateNombre();
 
	$id=$_POST["id_proceso"];

$error = new ErrorData();
  $error->nombre = $_POST["nombre_nombre"];
  $error->accion = "Se cambio el nombre de ".$_POST["nombre_antes"]." a ".$_POST["nombre"]." Hab ".$_POST["habitnombre"]." / ".$_POST["folionombre"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha"];
  $error->hora= $_POST["hora"];
  $error->add();


print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";


}

?>