<?php

if(@count($_POST)>0){

	$extra = new ExtraData();
	$extra->id_usuario = $_POST["id_usuario"];
	$extra->area = $_POST["area"];
	$extra->especifico = $_POST["especifico"];
	$extra->glosa = $_POST["glosa"];
	$extra->fecha = $_POST["fecha"];
	$extra->addMantenimiento();

print "<script>window.location='index.php?view=mantenimiento';</script>";

}
 
?>