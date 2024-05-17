<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.pumpkin{
    background:#8BC34A;
    padding: 4px 4px 4px;
    color:white;
    font-weight:bold;
    font-size:12px;
}
.silver{
    background:#bdc3c7;
    padding: 3px 4px 3px;
    border-bottom: black 1px solid;
    border-left:black 1px solid;
}
.clouds{
    background:#ecf0f1;
    padding: 3px 4px 3px;
    border-bottom: black 1px solid;
    border-left:black 1px solid;
}
.border-top{
    border-top: solid 1px #bdc3c7;
    
}
.border-left{
    border-left: solid 1px #bdc3c7;
}
.border-right{
    border-right: solid 1px #bdc3c7;
}
.border-bottom{
    border-bottom: solid 1px #bdc3c7;
}

.tr{
    style="color: black; background-color: #d2d6de;"
}
.contenido{
    width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;
}

table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}

.contenido {    
    font-size: 12px;    margin: 0px;     width: 480px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
-->
</style>



<?php
$configuracion = ConfiguracionData::getAllConfiguracion(); 
    if(@count($configuracion)>0){ 
                          $nombre=$configuracion->nombre;
                          $direccion=$configuracion->direccion;
                          $estado=$configuracion->estado;
                          $telefono=$configuracion->telefono;
                          $fax=$configuracion->fax;
                          $rnc=$configuracion->rnc;
                          $registro_empresarial=$configuracion->registro_empresarial;
                          $ciudad=$configuracion->ciudad;

                          $id=$configuracion->id;
                         

    }else{
                          $nombre='';
                          $direccion='';
                          $estado='';
                          $telefono='';
                          $fax='';
                          $rnc='';
                          $registro_empresarial='';
                          $ciudad='';
                          $id=0; 
    };
?>

<?php 
date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d"); 

      $fechaaa = date("d/m/Y"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");

$nuevafecha = strtotime ( '+1 day' , strtotime ( $hoy ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );



?>

<page backtop="4mm" backbottom="8mm" backleft="5mm" backright="5mm" style="font-size: 12pt; font-family: arial" >
  
<style type="text/css">
  table.dataTable thead .sorting:after {
    opacity: 0.0;
    content: "\e150";
}

table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
    opacity: 0.0;
}
</style>
 
<style type="text/css">
  
  .hh:hover{
    background-color: white;
  }
  .small-box-footer {
    position: relative;
    text-align: center;
    padding: 0px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
.nav-tabs-custom>.nav-tabs>li>a {
    color: #3c8dbc;
    font-weight: bold;
    border-radius: 0 !important;
}
.nav-tabs-custom>.nav-tabs>li.active {
    border-top-color: #00a65a;
}
.h5, h5 {
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>

 

<br> 



 
<style type="text/css">
.nuevo {
    margin-top: 20px !important;
    margin-bottom: 20px !important;
}
.b-r {
    border-right: 3px solid rgba(0, 0, 0, 0.11) !important;
}
.table-bordered{
    font-size: 12px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px !important;
}
</style>

<?php 

$cajas = CajaData::getById($_GET['id']); 
    if(@count($cajas)>0){ $id_caja=$cajas->id;
    
$fecha = date($cajas->fecha_creada); //5 agosto de 2004 por ejemplo 

$fechats = strtotime($fecha); //a timestamp

//el parametro w en la funcion date indica que queremos el dia de la semana
//lo devuelve en numero 0 domingo, 1 lunes,....
switch (date('w', $fechats)){
    case 0: $dia = "Domingo"; break;
    case 1: $dia =  "Lunes"; break;
    case 2: $dia =  "Martes"; break;
    case 3: $dia =  "Miércoles"; break;
    case 4: $dia =  "Jueves"; break;
    case 5: $dia =  "Viernes"; break;
    case 6: $dia =  "Sábado"; break;
}; 

?>


<?php $otros = GastoData::getIngresosCajaaNew($id_caja);  ?>
<?php $ihotel=0; $iresto=0; $iparking=0; $ialmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ihotel=$ihotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ialmacen=$ialmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $iresto=$iresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $iparking=$iparking+$otro->precio; } ?>
<?php endforeach; ?>

<?php $otros = GastoData::getEgresosCajaaNew($id_caja);  ?>
<?php $ehotel=0; $eresto=0; $eparking=0; $ealmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ehotel=$ehotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ealmacen=$ealmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $eresto=$eresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $eparking=$eparking+$otro->precio; } ?>
<?php endforeach; ?>


<?php $hotel_efectivo=0; $hotel_transf=0; $hotel_tarjeta=0;  $hotel_dolar=0; $hotel_expidia=0;  $hotel_total=0; ?>
<?php $tmps = PagoProcesoData::getAllCajaMostrar($id_caja); 
    foreach($tmps as $p):  ?>
        <?php $hotel_total=$hotel_total+$p->monto; ?>
        <?php if($p->id_tipopago=='1'){  $hotel_efectivo=$hotel_efectivo+$p->monto; } ?>
        <?php if($p->id_tipopago=='3'){  $hotel_transf=$hotel_transf+$p->monto; } ?>
        <?php if($p->id_tipopago=='2'){  $hotel_tarjeta=$hotel_tarjeta+$p->monto; } ?>
        <?php if($p->id_tipopago=='6'){  $hotel_dolar=$hotel_dolar+$p->monto; } ?>
        <?php if($p->id_tipopago=='7'){  $hotel_expidia=$hotel_expidia+$p->monto; } ?>
<?php endforeach; ?>
<table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; font-size: 10pt;padding:1mm; padding-top: 0mm !important;">
<tr>
    <td style="width: 25%;"><b>Usuario:</b> <?php echo UserData::getById($_SESSION["user_id"])->name; ?></td>
    <td style="width: 35%;"><b>Fecha Apertura:</b> <?php echo date('Y-m-d H:i:s', strtotime($cajas->fecha_creada . ' -8 hours')); ?></td>
    <td style="width: 33%;"><b>Fecha Cierre:</b> <?php $fechaCierre = ($cajas->fecha_cierre == null) ? date('Y-m-d H:i:s') : $cajas->fecha_cierre; echo $fechaCierre; ?></td>
    <td style="width: 7%;"><b style="font-size: 25px;">#<?php echo $cajas->id; ?></b></td>
</tr>

    <tr>
        <td style="width: 20%;"><b>Turno:</b> <?php echo $cajas->turno; ?></td>
        <td style="width: 30%;"><b>Día:</b> <?php echo $dia; ?></td>
    </tr>
</table>





                                <?php $otros = GastoData::getIngresosEgresosCajaa($id_caja);  ?>
                                <?php $ningreso=0; $negreso=0; ?>
                                    <?php foreach($otros as $otro):?> 
                                    
                                         
                                      
                                        <?php $hotel_total=$hotel_total+$p->monto; ?>
                                        <?php if($otro->estado=='3'){ $ningreso=$ningreso+$otro->precio; } ?>
                                        <?php if($otro->estado=='1'){$negreso=$negreso+$otro->precio; } ?>

                                     
                                    <?php endforeach; ?>
                               





<h4 style="text-decoration: underline;">Ingresos por Tipo de Pago</h4>
<table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; font-size: 10pt;padding:1mm; padding-top: 10mm !important;">

<?php $otros = GastoData::getIngresosEgresosCajaa($id_caja);  ?>
<?php $negreso1=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->estado=='1'){  $negreso1=$negreso1+$otro->precio; } ?>
<?php endforeach; ?>

  
  <tr>
  <td style="width: 25%;"><b>Efectivo:</b> $<?php echo $hotel_efectivo+($cajas->almacen+$ialmacen-$ealmacen)+($cajas->resto+$iresto-$eresto)+($cajas->parking+$iparking-$eparking); ?></td>
  <td style="width: 25%;"><b>Tarjeta:</b> $<?php echo $hotel_tarjeta; ?></td>
  <td style="width: 20%;"><b>Expedia:</b> $<?php echo $hotel_expidia; ?></td>
  <td style="width: 20%;"><b>Transf / Dep:</b> $<?php echo $hotel_transf; ?></td>
</tr>

<tr>
  <td style="width: 30%;"><b>Dólares: $<?php echo $hotel_dolar; ?></b></td>
 <td style="width: 30%;"><b>TOTAL: $<?php echo $hotel_efectivo+$hotel_expidia+$hotel_tarjeta+$hotel_transf+$ningreso-$negreso; ?></b></td>
</tr>
</table> 
<!--
<table>
                                
  <tr>
  <td rowspan="0"><b>FONDO DE CAJA:</b> $<?php echo $cajas->monto_apertura; ?></td>
    <td rowspan="0"><b>DÓLARES RECIBIDOS:</b> $<?php echo $hotel_dolar; ?></td>
    <td rowspan="0"><b>TOTAL MXN:</b> $<?php echo $hotel_efectivo+$hotel_expidia+$hotel_tarjeta+$hotel_transf+$ningreso-$negreso; ?></td>
  </tr>
</table>-->
<h4 style="text-decoration: underline;">Ingresos y egresos</h4>
<table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; font-size: 10pt;padding:1mm; padding-top: 10mm !important;">
                                <thead>
                                <tr>
                                    <th style="width: 15%;">Tipo</th>
                                    <th style="width: 20%;">Módulo</th>
                                    <th style="width: 25%;">Categoría</th>
                                    <th style="width: 30%;">Descripción</th>
                                    <th style="width: 10%;">Monto</th>
                                    
                                </tr>
                                </thead>
                                <tbody> 
                                <?php $otros = GastoData::getIngresosEgresosCajaa($id_caja);  ?>
                                <?php $ningreso=0; $negreso=0; ?>
                                    <?php foreach($otros as $otro):?> 
                                      <tr>
                                        <td> <b> <?php if($otro->estado=='1'){ echo "Egreso";}else{ echo "Ingreso";} ?> </b></td>
                                        <td><?php echo $otro->modulo; ?></td>
                                        <td><?php echo $otro->categoria; ?></td>
                                        <td><?php echo $otro->descripcion; ?></td>
                                        <td>$<?php echo $otro->precio; ?></td>
                                        <?php $hotel_total=$hotel_total+$p->monto; ?>
                                        <?php if($otro->estado=='3'){ $ningreso=$ningreso+$otro->precio; } ?>
                                        <?php if($otro->estado=='1'){$negreso=$negreso+$otro->precio; } ?>

                                      </tr> 
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
 <h4 style="text-decoration: underline;">Cobros Hotel</h4>
<table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; font-size: 10pt;padding:1mm; padding-top: 10mm !important;">
                                <thead>
                                <tr>
                                <th style="width: 10%;">Folio</th>
                                    <th style="width: 15%;">Razón</th>
                                    <th style="width: 30%;">Nombre</th>
                                    <th style="width: 10%;">Tipo de Pago</th>
                                    <th style="width: 10%;">Cantidad</th>
                                    <th style="width: 25%;">Nota</th>
                                </tr>
                                </thead>
                                <tbody> 
                                <?php $hotel_efectivo=0; $hotel_transf=0;$hotel_tarjeta=0; $hotel_total=0; ?>
                                <?php $tmps = PagoProcesoData::getAllCajaMostrar($id_caja); 
                                    foreach($tmps as $p):  ?>
                                     
                                      <tr>
                                        <td><?php echo $p->getProceso()->nro_folio; ?></td>
                                        <td><b><?php echo "#" . $p->getProceso()->getHabitacion()->nombre; ?></b></td>
                                        <td><?php echo $p->getProceso()->getCliente()->nombre; ?></td>
                                        <td>
                                            <?php switch($p->id_tipopago){
                                                case 1: echo "Efectivo"; break;
                                                case 2: echo "Tarjeta"; break;
                                                case 3: echo "Transf/Dep"; break;
                                                case 6: echo "Dólares"; break;
                                                case 7: echo "Expedia"; break;
                                                default: echo "Desconocido"; break;
                                            } ?>
                                        
                                        
                                        </td>
                                        <td><?php echo "$" . $p->monto;?></td>
                                        <td><?php 
                                        if($p->getProceso()->nro_operacion=="" or $p->getProceso()->nro_operacion==null){
                                            echo $p->getById($p->id)->terminacion;
                                        }else{
                                            echo $p->getProceso()->nro_operacion;
                                        }; ?></td>
                                        
                                      </tr> 

                                        <?php $hotel_total=$hotel_total+$p->monto; ?>
                                        <?php if($p->id_tipopago=='1'){  $hotel_efectivo=$hotel_efectivo+$p->monto; } ?>
                                        <?php if($p->id_tipopago=='3'){  $hotel_transf=$hotel_transf+$p->monto; } ?>
                                        <?php if($p->id_tipopago=='2'){  $hotel_tarjeta=$hotel_tarjeta+$p->monto; } ?>
                                    <?php endforeach; ?>
                                 
                                </tbody> 
                            </table>
                            <h4 style="text-decoration: underline;">NOTA :</h4>

<?php }; ?>









</page>

