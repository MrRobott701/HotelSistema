<?php 
header('Content-Type: application/json');
$base = new Database();
$pdo = $base->connect1();

$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {

   
	default:

	//$sentenciaSQL=$pdo->prepare("SELECT proceso.id as id,proceso.id_habitacion as resourceId, proceso.fecha_entrada as start, proceso.fecha_salida as end, proceso.precio as precio, proceso.pasajero as pasajero, proceso.nro_folio as nro_folio, proceso.cant_noche as cant_noche,persona.nombre as title,persona.documento as documento,persona.motivo as motivo, persona.direccion as direccion, persona.estado_civil as estado_civil, persona.tipo_documento as tipo_documento, proceso.estado as estado,proceso.observacion as observacion,proceso.dinero_dejado as dinero_dejado, proceso.deuda as monto, user.name as nombreus, proceso.total_v as total_v, proceso.finalizado_por as nombreusfin from proceso inner join persona on persona.id=proceso.id_cliente inner join user on user.id=proceso.id_usuario WHERE  proceso.estado!=5");

		//selecciona los eventos del calendario
$sentenciaSQL=$pdo->prepare("SELECT proceso.id as id,proceso.id_habitacion as resourceId, proceso.fecha_entrada as start, proceso.fecha_salida as end, proceso.precio as precio, proceso.pasajero as pasajero, proceso.nro_folio as nro_folio, proceso.cant_noche as cant_noche,persona.nombre as title,persona.documento as documento,persona.motivo as motivo, persona.direccion as direccion, persona.estado_civil as estado_civil,persona.num_reserva as num_reserva, persona.tipo_documento as tipo_documento, proceso.estado as estado,proceso.observacion as observacion,proceso.dinero_dejado as dinero_dejado, proceso.deuda as monto, user.name as nombreus, proceso.total_v as total_v, proceso.finalizado_por as nombreusfin, proceso_pago.aval as descripcion, proceso_pago.id_tipopago as tipopago from proceso inner join persona on persona.id=proceso.id_cliente inner join proceso_pago on proceso.id=proceso_pago.id_proceso inner join user on user.id=proceso.id_usuario WHERE  proceso.estado!=5 and proceso_pago.pagado=1 GROUP BY proceso_pago.id_proceso ");
		$sentenciaSQL->execute();

		$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

		echo json_encode($resultado);
		break; 
} 

?>