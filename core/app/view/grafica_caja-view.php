
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
        $totalcaja=$totalcaja+$caja->monto_cierre-$caja->monto_apertura;
      endforeach; 
    };

    $total_total=$totalcaja+$total_total;
    
   }
};
 ?>


<div id="reload-full-div">

	 <div class="row">
		 <div class="col-sm-12 col-md-12">
		 	<form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label>&nbsp;&nbsp;&nbsp;</label>
              <div class="input-group">
                <button class="btn btn-sm btn-default btn-flat" ><b>GRÁFICA DE CAJAS</b></button>
              </div>
            </div>

            <div class="col-sm-2">
              <label>DESDE</label>

              <input type="hidden" name="view" value="grafica_caja">
 
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
            <div class="col-sm-3">
              <button style="margin-top: 27px;" id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
              <i class="fa fa-search"></i> Consultar</button>
            </div>

            <div class="col-sm-3">
              <strong><a style="font-size: 20px; font-weight: bold;">VENTA TOTAL</a></strong>

              <div class="input-group">
                <span class="input-group-addon" style="font-size: 20px; font-weight: bold;">Total</span>
                <input type="text" class="form-control" value="$<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $total_total;} ?>" style="font-size: 20px; font-weight: bold;">

               </div>
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

             
          <div class="card" style="font-size: 30px;">
                        <div class="card-header" style="font-size: 30px; font-weight: bold;">GRÁFICA</div>
                        <div class="card-body" >
                            <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div> <canvas id="chart-line" width="600" height="400" class="chartjs-render-monitor" style="display: block; width: 600px; height: 400px;"></canvas>
                        </div>
          </div>


           <div class="tile-body">
           

              <?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
               
                  ?>
                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 20px;">
                  <thead >
                        <th style="width: 30%;">FECHA</th> 
                        <th style="width: 30%;">DIA</th>
                        <th style="width: 40%;">VENTA TOTAL</th>
                  </thead>
                  

                    <?php
                    $fecha1 = $_GET['desde'];
                    $fecha2 = $_GET['hasta'];

                    for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ ?>
                        
                     <tr>
                        <td><?php echo date("d/m/Y", strtotime($i)); ?></td>
                        <td><?php $fecha = $i; //5 agosto de 2004 por ejemplo 

                              $fechats = strtotime($fecha); 
                              switch (date('w', $fechats)){
                                  case 0: $dia = "Domingo"; break;
                                  case 1: $dia =  "Lunes"; break;
                                  case 2: $dia =  "Martes"; break;
                                  case 3: $dia =  "Miércoles"; break;
                                  case 4: $dia =  "Jueves"; break;
                                  case 5: $dia =  "Viernes"; break;
                                  case 6: $dia =  "Sábado"; break;
                              } 

                        echo $dia; ?>
                          
                        </td>
                        <?php 
                        $totalcaja=0; $totalhotel=0; $talmacen=0; $tresto=0; $tparking=0;
                        $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre - $caja->monto_apertura;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
                        ?>

                        <td>$<?php echo $totalcaja; ?></td>
                       
                      </tr> 
                     <?php 
                    }
                    ?>

                      
                  </table>
                </div>

               <?php  };
                ?>

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
                labels: [ <?php for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){  
                  if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  echo "'$fecha'".','; } ?>],
                datasets: [{
                    data: [<?php for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){  $totalcaja=0;
                        $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre-$caja->monto_apertura;
                            endforeach; 
                          };  echo $totalcaja.','; } ?>],
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

