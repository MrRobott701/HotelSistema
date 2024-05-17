<?php

if(@count($_POST)>0){
 
	$proceso = LibroLimpiezaData::getById($_POST["id"]);
	$proceso->estado = 1;
	$proceso->update_estado();

	
	
	$id=$_POST["id_user"];

print "<script>window.location='index.php?view=tarea&id=$id';</script>";


}


?>