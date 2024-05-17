<?php 
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");

if(@count($_POST)>0){
 
	$proceso = ExtraData::getById($_POST["id"]);
	$proceso->estado = 1;
	$proceso->fecha_inicio = $hoy.' '.$hora;
	$proceso->update_estado();

print "<script>window.location='index.php?view=mantenimiento';</script>";


}


?>