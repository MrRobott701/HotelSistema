<?php 
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");

if(@count($_POST)>0){
 
	$caja = CajaData::getById($_POST["id_caja"]);
	$caja->parking = $_POST["parking"];
	$caja->update_parking();

print "<script>window.location='index.php?view=vista_caja';</script>";


}


?>