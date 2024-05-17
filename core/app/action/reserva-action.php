<?php 
header('Content-Type: application/json');

$base = new Database();
$pdo = $base->connect1();


$accion=(isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) { 

	case 'agregar':
		//add instruction
		$cajas = CajaData::getAllAbierto(); 
		if(@count($cajas)>0){ $id_caja=$cajas->id;
		}else{$id_caja='NULL';}

		$clientes = PersonaData::getLikeDni($_POST["documento"]);
		if(count($clientes)>0){
		  $id_cliente=$clientes->id;	
		}else{ 
		  $cliente = new PersonaData();    
		  $cliente->tipo_documento = $_POST["tipo_documento"]; 
		  $cliente->documento = $_POST["documento"];
		  $cliente->nombre = $_POST["nombre"];
		  $cliente->estado_civil = $_POST["estado_civil"];
		 
		  $cliente->num_reserva = $_POST["num_reserva"];
 
		  $direccion="NULL";
	  	  if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
		  $cliente->direccion = $direccion; 
		  $s = $cliente->add001();  
		  $id_cliente=$s[1];
		}; 
 
		
   
		    $sentenciaSQL=$pdo->prepare("INSERT INTO
			proceso(id_habitacion,id_cliente,dinero_dejado,id_tipo_pago,fecha_entrada,fecha_salida,total,id_usuario,cant_personas,id_caja,estado,fecha_creada,observacion,reserva)
			values(:id_habitacion,$id_cliente,:dinero_dejado,1,:start,:end,0,:id_usuario,1,NULL,:estado,NOW(),:observacion,1)");
			
			$respuesta=$sentenciaSQL->execute(array(
				"id_habitacion" =>$_POST['id_habitacion'],
				"start" =>$_POST['start'].' 12:00:00',
				"end" =>$_POST['end'].' 12:00:00',
				"dinero_dejado" =>$_POST['dinero_dejado'], 
				"estado" =>$_POST['estado'], 
				"observacion" =>'-', 
				"id_usuario" =>$_SESSION["user_id"]
			));

			 $pago = new PagoProcesoData();
			  $pago->monto = $_POST['dinero_dejado']; 

			  $aval=$_POST['descripcion'];
			  $pago->aval = $aval;
			  $pago->total = $_POST['dinero_dejado']; 
			  $nro_operacion="1";
			  $pago->nro_operacion = $nro_operacion;

			  $banco="1";
			  $pago->banco = $banco;
			 

			  $pago->cantidad = 1;

			
			  $pago->id_tipopago = $_POST['tipopago'];

			   
			  $pago->id_proceso = $pdo->lastInsertId(); 
			  $pago->id_caja=$id_caja;
			  $pago->id_user=$_SESSION["user_id"];
			  $pago->add(); 

			echo json_encode($respuesta);
		break;
   
	case 'agregarDefault':
		//add instruction
		$sentenciaSQL=$pdo->prepare("INSERT INTO
			events(title,color,textColor,start,end)
			values(:title,:description,:textColor,:start,:end)");

			$respuesta=$sentenciaSQL->execute(array(
				"title" =>$_POST['title'],
				"description" =>$_POST['description'],
				"textColor" =>$_POST['textColor'],
				"start" =>$_POST['start'].' 06:00:00',
				"end" =>$_POST['end'].' 23:30:00'
			));

			echo json_encode($respuesta);
		break;

	case 'addstatic':
		//add instruction
		$sentenciaSQL=$pdo->prepare("INSERT INTO
			static(s_title,s_color,s_textcolor)
			values(:s_title,:s_color,:s_textcolor)");

			$respuesta=$sentenciaSQL->execute(array(
				"s_title" =>$_POST['s_title'],
				"s_color" =>$_POST['s_color'],
				"s_textcolor" =>$_POST['s_textcolor']
			));

			echo json_encode($respuesta);
		break;

	case 'eliminar':
		//delete instruction
		$sentenciaSQL=$pdo->prepare("UPDATE  proceso SET estado=:estado WHERE id=:id ");
		$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id'],
				"estado" =>'5'
		));
		echo json_encode($respuesta);  

		 
		break;
	case 'actualizar_nuevo':
		//update instruction
		$cajas = CajaData::getAllAbierto(); 
		if(@count($cajas)>0){ $id_caja=$cajas->id;
		}else{$id_caja='NULL';} 

		
		$clientes = PersonaData::getLikeDni($_POST["documento"]);
		if(count($clientes)>0){
		 
		  $clientes->tipo_documento = $_POST["tipo_documento"]; 
		  $clientes->documento = $_POST["documento"];
		  $clientes->nombre = $_POST["nombre"];
		  $clientes->estado_civil = $_POST["estado_civil"];
		  
		  $clientes->num_reserva = $_POST["num_reserva"];
 
		  $direccion="NULL";
	  	  if($_POST["direccion"]!=""){ $direccion=$_POST["direccion"];}
		  $clientes->direccion = $direccion;	
          $clientes->updateclientemex();

		}

		$pago = PagoProcesoData::getByIdProceso($_POST["id"]);
		
			  $pago->monto = $_POST['dinero_dejado']; 
			  $pago->total = $_POST['dinero_dejado']; 
			  $nro_operacion="1";
			  $pago->nro_operacion = $nro_operacion;


			  $pago->aval = $_POST['descripcion'];

			  $banco="1";
			  $pago->banco = $banco;
			  $pago->id_tipopago = $_POST['tipopago']; 

			   
			  $pago->id_proceso = $_POST["id"]; 
			  $pago->id_caja=$id_caja;
			  $pago->id_user=$_SESSION["user_id"];
			  $pago->updatePagoproceso(); 


		$sentenciaSQL=$pdo->prepare("UPDATE  proceso SET id_habitacion=:id_habitacion,fecha_entrada=:start,fecha_salida=:end,dinero_dejado=:dinero_dejado,estado=:estado,observacion=:observacion WHERE id=:id ");
		$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id'],
				"id_habitacion" =>$_POST['id_habitacion'],
				"start" =>$_POST['start'],
				"dinero_dejado" =>$_POST['dinero_dejado'], 
				"estado" =>$_POST['estado'],
				"observacion" =>'-',
				"end" =>$_POST['end']
		));
		echo json_encode($respuesta);  
		break;

	case 'actualizar':
		//update instruction
		 
		$cajas = CajaData::getAllAbierto(); 
		if(@count($cajas)>0){ $id_caja=$cajas->id;
		}else{$id_caja='NULL';}

		$fecha_entrada= date("Y-m-d", strtotime($_POST['start']));
		$fecha_salida= date("Y-m-d", strtotime($_POST['end']));

		$fecha1= new DateTime($fecha_entrada);
		$fecha2= new DateTime($fecha_salida);
		$diff = $fecha1->diff($fecha2);
		

		// El resultados sera 3 dias
		$cant_noche = $diff->days;

		 $proceso = ProcesoData::getById($_POST['id']);

		 

		  if(($cant_noche-$proceso->cant_noche)>=0){

		  	if(($cant_noche-$proceso->cant_noche)=="0"){ $cant="1";}else{ $cant=($cant_noche-$proceso->cant_noche);}
		  	
		  $pago = new PagoProcesoData();
		  $pago->monto = 0;
		  $pago->total = $proceso->precio;
		  $pago->nro_operacion = "1"; 
		  $pago->id_proceso = $proceso->id;
		  $pago->cantidad = $cant;
		  $pago->noche = "1";

		  $fecha_actual = $proceso->fecha_salida;
		  //sumo 1 día
		  $fecha_salida = date("Y-m-d",strtotime($fecha_actual."+ ".$cant." days")); 

		  $pago->fecha_entrada = $fecha_actual;
		  $pago->fecha_salida = $fecha_salida.' 12:00:00';
		  $pago->id_caja = $id_caja;
		  $pago->id_user = $_SESSION["user_id"]; 
		  $pago->addEstadia(); 

		$sentenciaSQL=$pdo->prepare("UPDATE  proceso SET id_habitacion=:id_habitacion,fecha_entrada=:start,fecha_salida=:end,dinero_dejado=:dinero_dejado,cant_noche=:cant_noche,estado=:estado,observacion=:observacion WHERE id=:id ");

		$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id'],
				"id_habitacion" =>$_POST['id_habitacion'],
				"start" =>$_POST['start'],
				"dinero_dejado" =>$_POST['dinero_dejado'],
				"cant_noche" =>$cant_noche,  
				"estado" =>$_POST['estado'],
				"observacion" =>'-',
				"end" =>$_POST['end']
		));

		$id=$_POST['id'];
		require 'core/app/view/sumatoria-view.php';
		$proceso = ProcesoData::getById($id); 
		$proceso->total_v = $pagadooo; 
		$proceso->deuda = $total_total; 
		$proceso->updateTotalDeuda();


		echo json_encode($respuesta); 

		}else{
		  	$cant=1;
		  	echo '<script language="javascript">alert("Error, necita eliminar manualmente.");</script>';
		} 
		break;
	case 'checkin':
		//update instruction
		
		$sentenciaSQL=$pdo->prepare("UPDATE  proceso SET estado=:estado WHERE id=:id ");
		$respuesta=$sentenciaSQL->execute(array(
				"id" =>$_POST['id'],
				"estado" =>'1'
		));
		echo json_encode($respuesta);  
		break;
	default:
		$sentenciaSQL=$pdo->prepare("SELECT habitacion.nombre as title, categoria.nombre as nom , habitacion.id as id FROM `habitacion` inner join categoria on categoria.id=habitacion.id_categoria order by habitacion.id");
		$sentenciaSQL->execute();

		$resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
 
		echo json_encode($resultado);
		break;
}

?>