<?php

if(@count($_POST)>0){

	$cajas = CajaData::getAllAbierto(); 
 	if(@count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}

	$gasto = new GastoData();
	$gasto->descripcion = $_POST["glosa"];
	$gasto->precio = $_POST["monto"];
	$gasto->id_usuario = $_SESSION["user_id"];
	$gasto->fecha = $_POST["fecha"];
	$gasto->hora = $_POST["hora"];
	$gasto->id_caja = $id_caja;
	$gasto->id_tipopago = 1;
	$gasto->modulo = $_POST["modulo"];
	$gasto->categoria = $_POST["categoria"];
 	$s=$gasto->addEgresoNew(); 

 	$id=$s[1];
	
 
print "<script>alert('Egreso registrado');</script>"; 
print "<script>window.location='index.php?view=newegreso';</script>";


};

?>