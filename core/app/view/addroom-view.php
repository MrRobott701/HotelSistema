<?php

if(@count($_POST)>0){

	$habitacion = new HabitacionData();
	$habitacion->nombre = $_POST["nombre"];
	$habitacion->descripcion = $_POST["descripcion"];
	$habitacion->id_categoria = $_POST["id_categoria"];
	$habitacion->precio = $_POST["precio"];
	$habitacion->estado = "1";
	$habitacion->id_nivel = $_POST["id_nivel"];
	$habitacion->tipo_hab = $_POST["tipo_hab"];
	$habitacion->add();
 
print "<script>window.location='index.php?view=habitacion';</script>";


}
 
?>