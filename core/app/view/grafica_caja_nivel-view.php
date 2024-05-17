
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


<div id="reload-full-div">

	 <div class="row">
		 <div class="col-sm-12 col-md-12">
		 	<form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label>&nbsp;&nbsp;&nbsp;</label>
              <div class="input-group">
                <button class="btn btn-sm btn-default btn-flat" ><b>Dashboard de cajas</b></button>
              </div>
            </div>

            <div class="col-sm-2">
              <label>DESDE</label>

              <input type="hidden" name="view" value="grafica_caja_nivel">
 
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
              <label>Total</label>

              <div class="input-group">
                <span class="input-group-addon">Total</span>
                 <input type="text" class="form-control" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $total_total;} ?>">
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

<?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
               
                  ?>             
<?php 
$fecha1 = $_GET['desde'];
$fecha2 = $_GET['hasta'];

$dataPoints1 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $totalcaja=0; $totalhotel=0; $talmacen=0; $tresto=0; $tparking=0;
    $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$totalhotel;
    array_push($dataPoints1,$row_array);                
}

$dataPoints2 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $totalcaja=0; $totalhotel=0; $talmacen=0; $tresto=0; $tparking=0;
    $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
                        
   if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$talmacen;
    array_push($dataPoints2,$row_array);                
}


$dataPoints3 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $totalcaja=0; $totalhotel=0; $talmacen=0; $tresto=0; $tparking=0;
    $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
                        
   if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$tresto;
    array_push($dataPoints3,$row_array);                
}


$dataPoints4 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $totalcaja=0; $totalhotel=0; $talmacen=0; $tresto=0; $tparking=0;
    $cajas = CajaData::getFiltroFechas($i,$i);
                          if(@count($cajas)>0){
                            foreach($cajas as $caja):
                                $totalcaja=$totalcaja+$caja->monto_cierre;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
                        
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$tparking;
    array_push($dataPoints4,$row_array);                
}



 

 
?>
 
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "GRÁFICA"
    },
    theme: "light2",
    animationEnabled: true,
    toolTip:{
        shared: true,
        reversed: true
    },
    axisY: {
        title: "Gráfica a detalle",
        suffix: " "
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [
        {
            type: "stackedColumn",
            name: "Hotel",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Almacen",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Restaurant",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Parking",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        }
    ]
});
 
chart.render();
 
function toggleDataSeries(e) {
    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    } else {
        e.dataSeries.visible = true;
    }
    e.chart.render();
}
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>






           <div class="tile-body">
           

              <?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
               
                  ?>
                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead >
                        <th>FECHA</th> 
                        <th>DIA</th>
                        <th>CAJA</th>
                        <th>HOTEL</th>
                        <th>ALMACEN</th>
                        <th>RESTAURANT</th>
                        <th>PARKING</th>
                        
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
                                $totalcaja=$totalcaja+$caja->monto_cierre;
                                $totalhotel=$totalhotel+(($caja->monto_cierre)-($caja->parking+$caja->resto+$caja->almacen));
                                $talmacen=$talmacen+$caja->almacen;
                                $tresto=$tresto+$caja->resto;
                                $tparking=$tparking+$caja->parking;

                            endforeach; 
                          };
                        ?>

                        <td><?php echo $totalcaja; ?></td>
                        <td><?php echo $totalhotel; ?></td>
                        <td><?php echo $talmacen; ?></td>
                        <td><?php echo $tresto; ?></td>
                        <td><?php echo $tparking; ?></td>
                        
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


<?php }; ?>

</div>
</div>
<script src="assets/js/chart.js"></script>