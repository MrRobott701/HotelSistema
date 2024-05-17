<?php
$session_id= session_id(); 
ini_set('date.timezone','America/Lima'); 

	if(@count($_POST)>0){ 

 if(isset($_POST['id_proceso']) and $_POST['id_proceso']!=''){

   $proceso00 = ProcesoData::getById($_POST["id_proceso"]);
   $proceso00->del(); 

   $proceso0023 = PagoProcesoData::getByIdProceso($_POST["id_proceso"]);
   $proceso0023->del();  

        

 } 
	
  $tipocomprobante = TipoComprobanteData::getById($_POST['comprobante']);

  $cadena=substr($tipocomprobante->nombre,0,1);
 
  $procesocod = ProcesoData::getUltimoProcess($_POST['comprobante']);
  $codigo=0;
  if(count($procesocod)>0){
    if(count($procesocod)<10){
      $codigo=$cadena.'000000'.(count($procesocod)+1);
    }else if($procesocod->id<100){
      $codigo=$cadena.'00000'.(count($procesocod)+1);
    }else if($procesocod->id<1000){
      $codigo=$cadena.'0000'.(count($procesocod)+1);
    }else if($procesocod->id<10000){
      $codigo=$cadena.'000'.(count($procesocod)+1);
    }else if($procesocod->id<100000){
      $codigo=$cadena.'00'.(count($procesocod)+1);
    }else if($procesocod->id<1000000){
      $codigo=$cadena.'0'.(count($procesocod)+1);
    }else if($procesocod->id<10000000){
      $codigo=$cadena.''.(count($procesocod)+1);
    }else{
      $codigo=$cadena.''.(count($procesocod)+1);
    }

  }else{$codigo=$cadena.'0000001';}


	$cajas = CajaData::getAllAbierto(); 
 	if(@count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}
 

 
    $cliente = new PersonaData();
      $cliente->tipo_documento = $_POST["tipo_documento"];
      $cliente->documento = $_POST["documento"];
      $cliente->nombre = $_POST["nombre"]; 
      $cliente->giro = $_POST["giro"]; 

      $direccion="NULL";
        if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
      $cliente->direccion = $direccion;

      $nacionalidad="NULL";
        if($_POST["nacionalidad"]!=""){ $nacionalidad=$_POST["nacionalidad"];}
      $cliente->nacionalidad = $nacionalidad;

      $estado_civil="NULL";
        if($_POST["estado_civil"]!=""){ $estado_civil=$_POST["estado_civil"];}
      $cliente->estado_civil = $estado_civil;

      $ocupacion="NULL";
        if($_POST["ocupacion"]!=""){ $ocupacion=$_POST["ocupacion"];}
      $cliente->ocupacion = $ocupacion;

      $medio_transporte="NULL";
        if($_POST["medio_transporte"]!=""){ $medio_transporte=$_POST["medio_transporte"];}
      $cliente->medio_transporte = $medio_transporte;

      $destino="NULL";
        if($_POST["destino"]!=""){ $destino=$_POST["destino"];}
      $cliente->destino = $destino;

      $motivo="NULL";
        if($_POST["motivo"]!=""){ $motivo=$_POST["motivo"];}
      $cliente->motivo = $motivo;

      $s = $cliente->add(); 
      $id_clientee=$s[1];

   
  


 	
 	

       

	$habitacion = HabitacionData::getById($_POST["id_habitacion"]);
	$habitacion->estado = 2;
	$habitacion->updateEstado(); 
  
  $valor="";
  if ( !empty($_POST["pasajero"]) && is_array($_POST["pasajero"]) ) { 
    $x=1;
    foreach ( $_POST["pasajero"] as $pasajero ) { 

          $valor.=$pasajero.", ";//para almacenarla

     };

     $valor=substr($valor,0,-2);//para eliminar la ultima coma (de tu post anterior)

  }

	$proceso = new ProcesoData();
	$proceso->tipo_servicio = $_POST["tipo_servicio"];
	$proceso->id_habitacion = $_POST["id_habitacion"];
	$proceso->id_tarifa = $_POST["id_tarifa"];
	$proceso->id_cliente = $id_clientee;
 
	$proceso->precio = $_POST["precio"]; 
	
	   $proceso->nro_operacion = $_POST["nro_operacion"];
	$proceso->cant_noche = $_POST["cant_noche"];
	$proceso->dinero_dejado = 0;
	$proceso->fecha_entrada = $_POST["fecha_entrada"].' '.$_POST['hora_entrada'];

  $fecha_actual = $_POST["fecha_entrada"];

  $fecha_salid = date("Y-m-d",strtotime($fecha_actual."+ ". $_POST["cant_noche"] ."days")); 

	$proceso->fecha_salida = $fecha_salid.' '.$_POST['hora_salida'];
	$proceso->id_usuario = $_SESSION["user_id"];
	$proceso->cant_personas = 1;
	$proceso->id_caja = $id_caja;
	$proceso->cantidad = $_POST["cantidad"];
	$proceso->pagado = $_POST["pagado"];
  $proceso->extra = $_POST["extra"];
  $proceso->tarjeta_e = $_POST["tarjeta_e"];
  $proceso->observacion = $_POST["observacion"];
    $proceso->nro_operacion = $_POST["nro_operacion"];
  $proceso->nro_folio = $_POST["nro_folio"];
  $proceso->comprobante = $_POST["comprobante"];
  $id_tipo_pago=1;
  if(isset($_POST["id_tipo_pago"]) and $_POST["id_tipo_pago"]!=''){ $id_tipo_pago=$_POST["id_tipo_pago"];}
  $proceso->id_tipo_pago = $id_tipo_pago; 
  $proceso->id_comisionista = $_POST["id_comisionista"]; 

  $proceso->pasajero = $valor; 

	$f=$proceso->addIngreso();

  $pago = new PagoProcesoData();
  $pago->monto = $_POST["monto"] + $_POST["monto_abonado"];

  $aval="-";
  $terminacion="";
  if($_POST["aval"]!=""){ $aval=$_POST["aval"];}
  if($_POST["terminacion"]!=""){ $terminacion=$_POST["terminacion"];}
  $pago->aval = $aval;
  $pago->terminacion = $terminacion;
  $pago->total = $_POST["precio"];

  $nro_operacion="1";
  $pago->nro_operacion = $nro_operacion;
  
  $banco="1";
  if($_POST["banco"]!=""){ $banco=$_POST["banco"];}
  $pago->banco = $banco;
 

  $pago->cantidad = $_POST["cant_noche"];

 if(isset($_POST["monto"]) and $_POST["id_tipo_pago"]!=''){ $id_tipopago=$_POST["id_tipo_pago"];}

   $id_tipopago=1;
  if(isset($_POST["id_tipo_pago"]) and $_POST["id_tipo_pago"]!=''){ $id_tipopago=$_POST["id_tipo_pago"];}
  $pago->id_tipopago = $id_tipopago; 

   
  $pago->id_proceso = $f[1]; 
  $pago->id_caja=$id_caja;
  $pago->id_user=$_SESSION["user_id"];
  $l=$pago->add(); 


 
  $operacion1 = PagoProcesoData::getById($l[1]);
  $operacion1->operacion = $l[1];
  $operacion1->mbanco = $_POST["monto"] + $_POST["monto_abonado"];
  $operacion1->updateOperacion();



$voucher = ProcesoData::getById($f[1]);
  $voucher->comprobante = $_POST['comprobante'];
  $voucher->nro_folio = $codigo;
  $voucher->updateVoucher();



	$cliente_proceso = new ClienteProcesoData();
      $cliente_proceso->id_cliente=$id_clientee;
      $cliente_proceso->sesion=$session_id;
      $cliente_proceso->id_proceso=$f[1]; 
      $cliente_proceso->add(); 

if($_POST["precio_a"]<>$_POST["precio"]){
  $error = ErrorData::getByUltimo(); 
  $error->accion = "Se modifico la tarifa de ".$_POST["precio_a"]." a ".$_POST["precio"]." /Hab ".$habitacion->nombre." / ".$codigo;
  $error->updateError(); 
}	



$id=$f[1];
require 'core/app/view/sumatoria-view.php';
    $proceso = ProcesoData::getById($id); 
    $proceso->total_v = $pagadooo; 
    $proceso->deuda = $total_total; 
    $proceso->updateTotalDeuda();
 


print "<script>window.location='index.php?view=recepcion';</script>";


}else{
	 	
	 	echo "<script>alert('NO SE AGREGÓ NINGÚN CLIENTE. FAVOR DE INGRESAR');</script>";
	 	print "<script>window.location='index.php?view=recepcion';</script>";

	 
}

?>