<?php

if(@count($_POST)>0){
	
	$tarifa = TarifaData::getById($_POST["id_tarifa"]);
	$tarifa->nombre = $_POST["nombre"];
	$tarifa->precio = $_POST["precio"];
	$tarifa->id_categoria = $_POST["id_categoria"];
	$tarifa->update();

	 
print "<script>window.location='index.php?view=tarifa';</script>";


}


?>