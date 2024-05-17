<?php

if(@count($_POST)>0){

	$tarifa = new TarifaData();
	$tarifa->nombre = $_POST["nombre"];
	$tarifa->precio = $_POST["precio"];
	$tarifa->id_categoria = $_POST["id_categoria"];
	$tarifa->add();

print "<script>window.location='index.php?view=tarifa';</script>";

}

?>