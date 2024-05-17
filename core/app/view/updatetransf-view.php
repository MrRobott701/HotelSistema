<?php
if(isset($_POST['submit'])){//Validacion de envio de formulario
	if(!empty($_POST['id'])){
	
		// CONTANTO BANCOS
		$total=0; 
		if(count($_POST['id'])>0){
			$total= count($_POST['id']);
			foreach($_POST['id'] as $selected){
				$primero=$_POST['banco'.$selected];
			}
		}


		$j=0;
		foreach($_POST['id'] as $selected){
			if($_POST['banco'.$selected] == $primero){
				$j=$j+1;
			}
		}

		// CONTANTO FECHAS
		$fechas=0; 
		if(count($_POST['id'])>0){
			$fechas= count($_POST['id']);
			foreach($_POST['id'] as $selected){
				$primero_fecha=$_POST['fecha'.$selected];
			}
		}


		$f=0;
		foreach($_POST['id'] as $selected){
			if($_POST['fecha'.$selected] == $primero_fecha){
				$f=$f+1;
			}
		}

		// FIN CONTANTO FECHAS

		if($total==$j and $fechas==$f){ 
			$i=0;
			foreach($_POST['id'] as $selected){
				if($_POST['monto'.$selected]==($_POST['hotel'.$selected]+$_POST['alimentacion'.$selected])){

					$pago = PagoProcesoData::getById($selected);
					$pago->mbanco = $_POST['hotel'.$selected];
					$pago->malimentacion = $_POST['alimentacion'.$selected];
					if($_POST['operacion']!=""){
					$pago->operacion = $_POST['operacion'];
					$pago->updateTranferencia();
					}else{ 
					$pago->updateTranferenciaSO();	
					}
					
					?>
					<script type="text/javascript">
						alert("SE INSERTARON TODOS LOS DATOS DE MANERA SATISFACTORIA");
					</script>
					<script>window.location='index.php?view=registro_transf';</script>
					<?php
				}else{
					?>
					<script type="text/javascript">
						alert("ERROR AL INSERTAR ALGUNOS DATOS: VERIFICA QUE LA SUMA DE HOTEL Y ALIMENTACIÓN COINCIDA CON EL VALOR TOTAL");
					</script>
					<script>window.location='index.php?view=registro_transf';</script>
					<?php
				}
				
				$i=$i+1;
			}

		}else{

			?>
					<script type="text/javascript">
						alert("DEBERÁS SELECIONAR REGISTROS DEL MISMO BANCO Y DE LA MISMA FECHA" );
					</script>
					<script>window.location='index.php?view=registro_transf';</script>
			<?php
		}

			
	}
}


?>