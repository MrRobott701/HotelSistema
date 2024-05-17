
<body id="minovate" class="appWrapper sidebar-sm-forced">


<?php 
$total_total=0;
if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
$fecha1 = $_GET['desde'];
$fecha2 = $_GET['hasta'];

  for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
    $totalcaja=0;
    if(isset($_GET['tipo']) and $_GET['tipo']=='3' ){
      $cajas = GastoData::getFiltroFechasIngreso($i,$i);
    }else{
      $cajas = GastoData::getFiltroFechas($i,$i);
    };
    if(@count($cajas)>0){
      foreach($cajas as $caja):
        $totalcaja=$totalcaja+$caja->precio;
      endforeach; 
    };

    $total_total=$totalcaja+$total_total;
    
   }
};
?>


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
                        <h4 style="text-decoration: ;">Dashboard  ingresos y egresos</h4>
                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Desde:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" required name="desde" style="line-height: 14px;" value="<?php 
              if(isset($_GET['desde']) and $_GET['desde']!=''){ echo date($_GET['desde']); } ?>">
                                </div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Hasta:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="date" required name="hasta" style="line-height: 14px;" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $_GET['hasta'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                           
                              <input type="hidden" name="view" value="grafica_ie_nivel">
                            <div class="nuevo">
                                

                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b> </b>
                                    <div class="btn-group">
                                      <select class="form-control" onchange="CargarModulo(this.value);" required name="tipo">
                                              <option value="3" <?php if(isset($_GET['tipo']) and $_GET['tipo']=='3'){echo "selected";} ?> >Ingreso</option>
                                              <option value="1" <?php if(isset($_GET['tipo']) and $_GET['tipo']=='1'){echo "selected";} ?> >Egresos</option>
                                        </select>
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-2" >
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                    <div class="btn-group">
                                      <label>Todos los Módulos:</label>
                                      <div class="form-check">
                                          <input type="checkbox" class="form-check-input" id="hotel" name="hotel" value="Hotel" <?php if(isset($_GET['hotel']) and $_GET['hotel']=='Hotel'){ echo "checked"; } ?> ><label class="form-check-label" for="hotel">Hotel</label> 
                                      </div>
                                      <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="almacen" name="almacen" value="Almacen"  <?php if(isset($_GET['almacen']) and $_GET['almacen']=='Almacen'){ echo "checked"; } ?>  ><label class="form-check-label" for="almacen">Almacen</label>
                                      </div>

                                
                                </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-2" >
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x "> <b></b> 
                                    <div class="btn-group">
                                      <label>&nbsp;&nbsp;&nbsp;</label>
                        

                                      <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="resto" name="resto" value="Restaurant"  <?php if(isset($_GET['resto']) and $_GET['resto']=='Restaurant'){ echo "checked"; } ?>  ><label class="form-check-label" for="resto">Restaurant</label>
                                      </div>

                                      <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="parking" name="parking" value="Parking"  <?php if(isset($_GET['parking']) and $_GET['parking']=='Parking'){ echo "checked"; } ?>  ><label class="form-check-label" for="parking">Parking</label>
                                      </div>
                                </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                  <div class="input-group">
                                    <span class="input-group-addon">Total</span>
                                     <input type="text" class="form-control" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $total_total;} ?>">
                                   </div>
                                    <button style="margin-top: 10px;"  id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
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

<?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){  ?>             
<?php

$fecha1 = $_GET['desde'];
$fecha2 = $_GET['hasta'];


if(isset($_GET['tipo']) and $_GET['tipo']=='3'){
//CUSTODIA
$dataPoints1 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $tcustodia=0; $tsobrante=0; $totros=0;

    if(isset($_GET['tipo']) and $_GET['tipo']=='3' ){
      $ingresos = GastoData::getFiltroFechasIngreso($i,$i);
    }else{
      $ingresos = GastoData::getFiltroFechas($i,$i);
    };

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                $total_t=$total_t+$ingreso->precio;
                                if($ingreso->categoria=="Custodia"){$tcustodia=$tcustodia+$ingreso->precio;} 
                                if($ingreso->categoria=="Sobrante"){$tsobrante=$tsobrante+$ingreso->precio;} 
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;}  

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$tcustodia;
    array_push($dataPoints1,$row_array);                
}


//SOBRANTE

$dataPoints2 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $tcustodia=0; $tsobrante=0; $totros=0;

    if(isset($_GET['tipo']) and $_GET['tipo']=='3' ){
      $ingresos = GastoData::getFiltroFechasIngreso($i,$i);
    }else{
      $ingresos = GastoData::getFiltroFechas($i,$i);
    };

   
                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                $total_t=$total_t+$ingreso->precio;
                                if($ingreso->categoria=="Custodia"){$tcustodia=$tcustodia+$ingreso->precio;} 
                                if($ingreso->categoria=="Sobrante"){$tsobrante=$tsobrante+$ingreso->precio;} 
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;}  

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$tsobrante;
    array_push($dataPoints2,$row_array);                
}

 
// OTROS


$dataPoints3 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $tcustodia=0; $tsobrante=0; $totros=0;

    if(isset($_GET['tipo']) and $_GET['tipo']=='3' ){
      $ingresos = GastoData::getFiltroFechasIngreso($i,$i);
    }else{
      $ingresos = GastoData::getFiltroFechas($i,$i);
    };

   
                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                $total_t=$total_t+$ingreso->precio;
                                if($ingreso->categoria=="Custodia"){$tcustodia=$tcustodia+$ingreso->precio;} 
                                if($ingreso->categoria=="Sobrante"){$tsobrante=$tsobrante+$ingreso->precio;} 
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;}  

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  

    $row_array['label'] = $fecha;
    $row_array['y']=$totros;
    array_push($dataPoints3,$row_array);                
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
            name: "Custodia",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Sobrante",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Otros",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
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

<!-- FIN INGRESOS -->

<!-- EGRESOS -->
<?php }else if(isset($_GET['tipo']) and $_GET['tipo']=='1'){ 



$dataPoints1 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$gcocina;
    array_push($dataPoints1,$row_array);                
}


//CALEFON

$dataPoints2 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$gcalefon;
    array_push($dataPoints2,$row_array);                
}

 
// Mantenimiento


$dataPoints3 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$gmante;
    array_push($dataPoints3,$row_array);                
}
// FIESTAS Y ANIVERSARIOS


$dataPoints4 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$fiesta;
    array_push($dataPoints4,$row_array);                
}

// PROVEEDORES


$dataPoints5 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$proveedor;
    array_push($dataPoints5,$row_array);                
}


// ADELANTOS


$dataPoints6 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$adelanto;
    array_push($dataPoints6,$row_array);                
}

// OTROS


$dataPoints7 = array();
for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){ 
 
    $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
    $ingresos = GastoData::getFiltroFechas($i,$i);

                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 

                            endforeach; 
                          };
    
    if(date("m", strtotime($i))=='01'){$mes="Ene";}else if(date("m", strtotime($i))=='02'){$mes="Feb";}else if(date("m", strtotime($i))=='03'){$mes="Mar"; }else if(date("m", strtotime($i))=='04'){$mes="Abr"; }else if(date("m", strtotime($i))=='05'){$mes="May"; }else if(date("m", strtotime($i))=='06'){$mes="Jun"; }else if(date("m", strtotime($i))=='07'){$mes="Jul"; }else if(date("m", strtotime($i))=='08'){$mes="Ago"; }else if(date("m", strtotime($i))=='09'){$mes="Sep"; }else if(date("m", strtotime($i))=='10'){$mes="Oct"; }else if(date("m", strtotime($i))=='11'){$mes="Nov"; }else if(date("m", strtotime($i))=='12'){$mes="Dic"; };
                  $fecha=date("d", strtotime($i)).' '.$mes;
                  
    $row_array['label'] = $fecha;
    $row_array['y']=$totros;
    array_push($dataPoints7,$row_array);                
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
            name: "Gastos de cocina",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Recibos",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Gastos de mantenimiento",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Proveedores",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Proveedores de almacen",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Adelantos",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
        },{
            type: "stackedColumn",
            name: "Otros",
            showInLegend: true,
            yValueFormatString: "#,##0 ",
            dataPoints: <?php echo json_encode($dataPoints7, JSON_NUMERIC_CHECK); ?>
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



<?php }; ?>

<!-- FIN EGRESOS -->


<div id="chartContainer" style="height: 370px; width: 100%;"></div>

 <div class="tile-body" >
           

<?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!="" and isset($_GET['tipo'])  and $_GET['tipo']=='3'){
               
                  ?>
                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead >
                        <th>FECHA</th> 
                        <th>DIA</th>
                        <th>TOTAL</th>
                        <th>CUSTODIA</th>
                        <th>SOBRANTE</th>
                        <th>OTROS</th>
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
                        $total_t=0; $tcustodia=0; $tsobrante=0; $totros=0;
                    
                            $ingresos = GastoData::getFiltroFechasIngreso($i,$i);
                        
                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                $total_t=$total_t+$ingreso->precio;
                                if($ingreso->categoria=="Custodia"){$tcustodia=$tcustodia+$ingreso->precio;} 
                                if($ingreso->categoria=="Sobrante"){$tsobrante=$tsobrante+$ingreso->precio;} 
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;}  

                            endforeach; 
                          };
                        ?>

                        <td><?php echo $total_t; ?></td>
                        <td><?php echo $tcustodia; ?></td>
                        <td><?php echo $tsobrante; ?></td>
                        <td><?php echo $totros; ?></td>
                        
                      </tr> 
                     <?php 
                    };
                    ?>

                      
                  </table>
                </div>

<?php  }else if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!="" and isset($_GET['tipo'])  and $_GET['tipo']=='1'){ ?>


  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead >
                        <th>Fecha</th> 
                        <th>Día</th>
                        <th>Total</th>
                        <th>Gastos cocina</th> 
                        <th>Gastos para calefon</th>
                        <th>Gastos de<br> mantenimiento</th>
                        <th>Fiestas y <br>aniversarios</th>
                        <th>Proveedor <br>de almacen</th>
                        <th>Adelantos</th>
                        <th>Otros</th>
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
                        $total_t=0; $gcocina=0; $gcalefon=0;  $gmante=0;  $fiesta=0;  $proveedor=0;  $adelanto=0; $totros=0;
                        $ingresos = GastoData::getFiltroFechas($i,$i);
                        
                          if(@count($ingresos)>0){
                            foreach($ingresos as $ingreso):
                                $total_t=$total_t+$ingreso->precio;
                                if($ingreso->categoria=="Gastos de cocina"){$gcocina=$gcocina+$ingreso->precio;} 
                                if($ingreso->categoria=="Recibos"){$gcalefon=$gcalefon+$ingreso->precio;} 
                                if($ingreso->categoria=="Gastos de mantenimiento"){$gmante=$gmante+$ingreso->precio;} 

                                if($ingreso->categoria=="Proveedores"){$fiesta=$fiesta+$ingreso->precio;}
                                if($ingreso->categoria=="Proveedores de almacen"){$proveedor=$proveedor+$ingreso->precio;}
                                if($ingreso->categoria=="Adelantos"){$adelanto=$adelanto+$ingreso->precio;}
                                if($ingreso->categoria=="Otros"){$totros=$totros+$ingreso->precio;} 


                            endforeach; 
                          };
                        ?>

                        <td><?php echo $total_t; ?></td>
                        <td><?php echo $gcocina; ?></td>
                        <td><?php echo $gcalefon; ?></td>
                        <td><?php echo $gmante; ?></td>

                        <td><?php echo $fiesta; ?></td>
                        <td><?php echo $proveedor; ?></td>
                        <td><?php echo $adelanto; ?></td>
                        <td><?php echo $totros; ?></td>
                        
                      </tr> 
                     <?php 
                    };
                    ?>

                      
                  </table>
                </div>
<?php  }; ?>


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
