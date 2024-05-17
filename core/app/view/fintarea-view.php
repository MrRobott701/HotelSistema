<?php

if(@count($_POST)>0){
 
	$proceso = LibroLimpiezaData::getById($_POST["id"]);
	$proceso->estado = 2;
	$proceso->fintarea();

	$habitacion = HabitacionData::getById($_POST["id_habitacion"]);
	if($habitacion->estado=='3'){
	$habitacion->estado = 1;
	$habitacion->updateEstado();

	$habitacion->limpieza = 1;
    $habitacion->update_aseo();
	}else{
	$habitacion->limpieza = 1;
    $habitacion->update_aseo();
	};
	
	$id=$_POST["id_user"];

print "<script>window.location='index.php?view=tarea&id=$id';</script>";


}


?>