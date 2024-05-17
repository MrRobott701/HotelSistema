
<body id="minovate" class="appWrapper sidebar-sm-forced">





<div class="row" >
    <br>
    <div class="col-md-12">
    <!-- tile -->
        <section class="tile">

           

            <!-- tile body -->
            <div class="tile-body p-0">
                <div class="row">
                    <div class="col-md-12">
                      <form role="form" autocomplete="off" class="form-validate-jquery" id="enviarget" method="get">

                        <input type="hidden" name="view" value="grafica_ocupacion">

                        <h4 style="text-decoration: ;"><strong>      REPORTE DE HABITACIONES OCUPADAS POR DÍA</strong></h4>
                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Desde:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" required name="desde" style="line-height: 14px;" value="<?php 
              if(isset($_GET['desde']) and $_GET['desde']!=''){ echo date($_GET['desde']); } ?>">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                           
                              <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Hasta:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="date" required name="hasta" style="line-height: 14px;" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $_GET['hasta'];} ?>">
                                </div>
                            </div>
                            
                        </div>

                       

                       

                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l "> <b></b> 
                                  
                                    <button   id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
                                      <i class="fa fa-search"></i> Consultar</button>
                                </div>
                                
                            </div>
                        </div>


                    </div>
                    </form>
                </div>

            </div>
            <!-- /tile body -->

        </section>
        
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
 
    $total_t=0;

    $reportediarios = ProcesoData::getIngresoRangoFechasGrafica($i);

   
                          if(@count($reportediarios)>0){
                            foreach($reportediarios as $ingreso):
                                $total_t=$total_t+1;
                                
                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$total_t;
    array_push($dataPoints1,$row_array);                
}



 

 
?>
 
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "GRÁFICA DE HABITACIONES"
    },
    theme: "light2",
    animationEnabled: true,
    toolTip:{
        shared: true,
        reversed: true
    },
    axisY: {
        title: "Cantidad de Habitaciones",
        suffix: " "
    },
    legend: {
        cursor: "pointer",
        itemclick: toggleDataSeries
    },
    data: [
        {
            type: "stackedColumn",
            name: "Total",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
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

 <div class="tile-body" >
           

                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 20px;">

                  <thead >
                        <th>FECHA</th> 
                        <th>DIA</th>
                        <th>TOTAL</th>
                       
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
                        $total_t=0; 
                    
                           
                            $reportediarios = ProcesoData::getIngresoRangoFechasGrafica($i);
                        
                          if(@count($reportediarios)>0){
                            foreach($reportediarios as $ingreso):
                                $total_t=$total_t+1;
                            endforeach; 
                          };
                        ?>

                        <td>Habitciones Ocupadas: <?php echo $total_t; ?></td>
                        
                        
                      </tr> 
                     <?php 
                    };
                    ?>

                      
                  </table>
                </div>





           </div>
</section>


<?php }; ?>

</div>
</div>
<script src="assets/js/chart1.js"></script>

<script type="text/javascript">
  $(function() {
  $('#hotel').on('change', function() {
    $('#enviarget').submit();
  });
});
</script>
