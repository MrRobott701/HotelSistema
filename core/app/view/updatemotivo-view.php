<?php

if(@count($_POST)>0){

	$persona = PersonaData::getById($_POST["id_persona"]);
	
	$persona->motivo = $_POST['motivo'];
	$persona->updateMotivo();

	$id=$_POST["id_proceso"];

print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";


}

?>