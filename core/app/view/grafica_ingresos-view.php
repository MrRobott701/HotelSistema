
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Lista de cajas</a></li>
    </ol>
</section> 

</div> 

<?php 
$total_total=0;
if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
$fecha1 = $_GET['desde'];
$fecha2 = $_GET['hasta'];

  for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
    $totalcaja=0;
    $cajas = CajaData::getFiltroFechas($i,$i);
    if(@count($cajas)>0){
      foreach($cajas as $caja):
        $totalcaja=$totalcaja+$caja->monto_cierre;
      endforeach; 
    };

    $total_total=$totalcaja+$total_total;
    
   }
};
 ?>



<?php $otros = GastoData::getIngresosCajaaNewFechas($_GET['desde'],$_GET['hasta']);  ?>
<?php $ihotel=0; $iresto=0; $iparking=0; $ialmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ihotel=$ihotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ialmacen=$ialmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $iresto=$iresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $iparking=$iparking+$otro->precio; } ?>
<?php endforeach; ?>

<?php  $total_ingreso=$ihotel+$ialmacen+$iresto+$iparking; ?>

<?php $otros = GastoData::getEgresosCajaaNewFechas($_GET['desde'],$_GET['hasta']);  ?>
<?php $ehotel=0; $eresto=0; $eparking=0; $ealmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ehotel=$ehotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ealmacen=$ealmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $eresto=$eresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $eparking=$eparking+$otro->precio; } ?>
<?php endforeach; ?>

<?php  $total_egreso=$ehotel+$ealmacen+$eresto+$eparking; ?>


<?php $hotel_efectivo=0; $hotel_transf=0; $hotel_tarjeta=0; $hotel_dolar=0; $hotel_expidia=0; $hotel_total=0; ?>
<?php $tmps = PagoProcesoData::getAllCajaMostrarFechas($_GET['desde'],$_GET['hasta']); 
    foreach($tmps as $p):  ?>
        <?php $hotel_total=$hotel_total+$p->monto; ?>
        <?php if($p->id_tipopago=='1'){  $hotel_efectivo=$hotel_efectivo+$p->monto; } ?>
        <?php if($p->id_tipopago=='3'){  $hotel_transf=$hotel_transf+$p->monto; } ?>
        <?php if($p->id_tipopago=='2'){  $hotel_tarjeta=$hotel_tarjeta+$p->monto; } ?>
        <?php if($p->id_tipopago=='6'){  $hotel_dolar=$hotel_dolar+$p->monto; } ?>
        <?php if($p->id_tipopago=='7'){  $hotel_expidia=$hotel_expidia+$p->monto; } ?>
<?php endforeach; ?>


<div id="reload-full-div">

	 <div class="row">
		 <div class="col-sm-12 col-md-12">
		 	<form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <label>&nbsp;&nbsp;&nbsp;</label>
              <div class="input-group">
                <button class="btn btn-sm btn-default btn-flat" ><b>GRÁFICA DE BARRAS DE RESUMEN</b></button>
              </div>
            </div>

            <div class="col-sm-2">
              <label>DESDE</label>

              <input type="hidden" name="view" value="grafica_ingresos">
 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                
                 <input type="date" name="desde" class="form-control" value="<?php 
              if(isset($_GET['desde']) and $_GET['desde']!=''){ echo date($_GET['desde']); } ?>">
               </div>
            </div>



            <div class="col-sm-2">
              <label>HASTA</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!--
                <input type="text" id="txtMes" name="txtMes" placeholder=""
                 class="form-control input-sm" style=""> -->
                 <input type="date" name="hasta" class="form-control" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $_GET['hasta'];} ?>">
               </div>
            </div>
            <div class="col-sm-2">
              <button style="margin-top: 27px;" id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
              <i class="fa fa-search"></i> Consultar</button>
            </div>

            <div class="col-sm-3">
              
            </div>

          </div>
        </div>
        </form>
	   	  </div>
	  </div>


 






<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12"> 
    <section class="tile">

             
          <div class="card">
                        <div class="card-header">Gráfico</div>
                        <div class="card-body" >
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:500000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:150%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line" width="299" height="150" class="chartjs-render-monitor" style="display: block; width: 299px; height: 150;"></canvas>
                        </div>
          </div>


           
</section>




</div>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        var ctx = $("#chart-line");

        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [ "Efectivo","Tarjeta","Dolares","Expidia","Transf / Dep","Ingresos","Egresos"],
                datasets: [{
                    data: [<?php  echo $hotel_efectivo.','. $hotel_tarjeta.','. $hotel_dolar.','. $hotel_expidia.','. $hotel_transf.','. $total_ingreso.','. $total_egreso; ?>],
                    label: "$ ",
                    borderColor: "#458af7",
                    backgroundColor: '#458af7',
                    fill: false
                }] 
            },
            options: {
                title: {
                    display: true,
                    text: ''
                }
            }
        });
    });
</script>

<style type="text/css">
     body {
     background-color: #f9f9fa
 }

 .flex {
     -webkit-box-flex: 1;
     -ms-flex: 1 1 auto;
     flex: 1 1 auto
 }

 @media (max-width:991.98px) {
     .padding {
         padding: 1.5rem
     }
 }

 @media (max-width:767.98px) {
     .padding {
         padding: 1rem
     }
 }

 .padding {
     padding: 5rem
 }

 .card {
     background: #fff;
     border-width: 0;
     border-radius: .25rem;
     box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
     margin-bottom: 1.5rem
 }

 .card {
     position: relative;
     display: flex;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(19, 24, 44, .125);
     border-radius: .25rem
 }

 .card-header {
     padding: .75rem 1.25rem;
     margin-bottom: 0;
     background-color: rgba(19, 24, 44, .03);
     border-bottom: 1px solid rgba(19, 24, 44, .125)
 }

 .card-header:first-child {
     border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
 }

 card-footer,
 .card-header {
     background-color: transparent;
     border-color: rgba(160, 175, 185, .15);
     background-clip: padding-box
 }
</style>

