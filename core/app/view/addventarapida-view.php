<?php 
 date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
$session_id= session_id(); 

$tmpss1=0;
	$efectivoo1=0;
	$tarjetaa1=0;



$tmps = TmpData::getAllTemporal($session_id);
if(@count($tmps)>0 and ($tmpss1==($efectivoo1+$tarjetaa1))){
 
$contador=0;
foreach($tmps as $te):

$entrada_producto=0; 
$entradas = ProcesoVentaData::getAllEntradas($te->id_producto);
if(@count($entradas)>0){ 
	foreach($entradas as $entrada): $entrada_producto=$entrada->cantidad+$entrada_producto; 
	endforeach; 
}else{ $entrada_producto=0; }; 
 

$salida_producto=0; 
$salidas = ProcesoVentaData::getAllSalidas($te->id_producto);
if(@count($salidas)>0){
	foreach($salidas as $salida): $salida_producto=$salida->cantidad+$salida_producto; 
		endforeach;
}else{ $salida_producto=0; };   


$producto = ProductoData::getById($te->id_producto);

$saldo=($producto->stock + $entrada_producto) - $salida_producto; 
 
if($te->cantidad_tmp>$saldo):
	$contador=$contador+1;
	print "<script>alert('Stock agotado para algunos productos.... ALERTA!!! $contador No se pudo realizar la venta');</script>";
	print "<script>window.location='index.php?view=cancelar_venta';</script>";
endif;


endforeach;                     

  


if($contador=='0'){
  
	$cajas = CajaData::getAllAbierto(); 
 	if(@count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}
 	
 	$total=0; 
 	$tmpes = TmpData::getAllTemporal($session_id); 
	foreach($tmpes as $p): 
		$total=($p->precio_tmp*$p->cantidad_tmp)+$total;
	endforeach;



		$venta = new VentaData();  
		$venta->id_tipo_comprobante= 1;
		$venta->id_tipo_pago=1;
		$venta->total= $total; 
		$venta->id_proveedor='NULL';
		$venta->id_usuario = $_SESSION["user_id"];
		$venta->id_caja = $id_caja;
		$venta->nombre_cliente= '-';
		$venta->nro_casillero= '0';
		$venta->tipo= 2;
		$efectivoo=0;
		
		$venta->efectivo= $efectivoo;
		$tarjetaa=0;
		
		$venta->tarjeta= $tarjetaa;
		$venta->credito=0;
		$venta->fecha_creada= $hoy.' '.$hora;
		$v=$venta->addVentaNatural(); 
 
  

	$tmps = TmpData::getAllTemporal($session_id);
	foreach($tmps as $p): 
		 
		$procesoventa = new ProcesoVentaData();
		$procesoventa->id_producto=$p->id_producto; 
		$procesoventa->id_operacion='NULL';
		$procesoventa->id_venta=$v[1];
		$procesoventa->cantidad=$p->cantidad_tmp;
		$procesoventa->precio=$p->precio_tmp; 
		$procesoventa->id_usuario = $_SESSION["user_id"];
		$procesoventa->id_caja = $id_caja;
		
		$procesoventa->fecha_creada= $hoy.' '.$hora;
		 
		$procesoventa->id_tipopago=1; 
		$procesoventa->add();
	endforeach;

	
	
	$dels = TmpData::getAllTemporal($session_id);
	foreach($dels as $del):
		$eliminar = TmpData::getById($del->id_tmp);
		$eliminar->del();
	endforeach;
$id=$v[1];
?>
<!--
<script type="text/javascript">
	alert("La venta de productos se ha procesado satisfactoriamente");
</script>
-->
<?php 
print "<script>window.location='index.php?view=venta';</script>";

}


}else{ 
	$dels = TmpData::getAllTemporal($session_id);
	foreach($dels as $del):
		$eliminar = TmpData::getById($del->id_tmp);
		$eliminar->del();
	endforeach; ?>
	<script type="text/javascript">
	alert("Alerta!! No se agregó ningún producto ó se ingresó de manera incorrecta el monto de Efectivo y/o tarjeta");
</script>
<?php 
print "<script>window.location='index.php?view=venta';</script>";

}
?>