 <?php
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
if(@count($_POST)>0){
	$caja = CajaData::getById($_POST["id_caja"]); 
	$caja->fecha_cierre = $hoy.' '.$hora;
	$caja->monto_cierre = $_POST["monto_cierre"];
	$caja->estado = 0;
	$caja->cerrarcaja();
 

print "<script>window.location='index.php?view=recepcion';</script>";
}
?> 