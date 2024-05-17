 <?php

ini_set('date.timezone','America/Lima'); 

	$cajas = CajaData::getAllAbierto(); 
 	if(@count($cajas)>0){ $id_caja=$cajas->id;
 	}else{$id_caja='NULL';}


  $pago = new PagoProcesoData();
  $pago->monto = $_POST["monto"]; 
  $pago->terminacion = $_POST["terminacion"]; 
  $pago->aval = $_POST["aval"];
  $pago->nro_operacion = "0"; 

   $id_tipopago=1;
  if(isset($_POST["id_tipo_pago"]) and $_POST["id_tipo_pago"]!=''){ $id_tipopago=$_POST["id_tipo_pago"];}
  $pago->id_tipopago = $id_tipopago; 

  $banco="1";
  if($_POST["banco"]!=""){ $banco=$_POST["banco"];}
  $pago->banco = $banco;
  
  $pago->id_proceso = $_POST["id_proceso"];
  $pago->id_caja=$id_caja;
  $pago->cantidad = 1;
  $pago->id_user = $_SESSION["user_id"];
  $l=$pago->addAdicional(); 

  $operacion1 = PagoProcesoData::getById($l[1]);
  $operacion1->operacion = $l[1];
  $operacion1->mbanco = $_POST["monto"];
  $operacion1->updateOperacion();

  $id=$_POST["id_proceso"];

require 'core/app/view/sumatoria-view.php';
$proceso = ProcesoData::getById($id); 
$proceso->total_v = $pagadooo; 
$proceso->deuda = $total_total; 
$proceso->updateTotalDeuda();

  print "<script>window.location='index.php?view=addprocesoprueba&id=$id';</script>";

  ?>