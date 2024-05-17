<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">

<?php

$cajas = CajaData::getAllAbierto(); 
if(@count($cajas)>0){ $id_caja=$cajas->id;
}else{$id_caja=0;} 

if($id_caja!=0){


date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");
   $fecha_completa= date("Y-m-d H:i:s");
?>

<style>
    @media only screen and (max-width: 768px)
.appWrapper.header-fixed.aside-fixed #content {
    top: 45px !important;
}

.tile-body {
    max-width: 1900px; /* Establece el ancho máximo según tus necesidades */
  
    /* Otras propiedades CSS según sea necesario */
}

</style>
<style type="text/css">
 

div.hijo1 {
    width: 40px;
    height: 40px;
    float: right;
    border-bottom-left-radius: 130px;
    background-color: #fac923;
  }


</style>
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
 
<section class="content-header">
<strong>
<ol class="breadcrumb">
      <li><a style"font-size:="" 17px;"="" href="index.php?view=reserva"><i class="fa fa-home" aria-hidden="true"></i> Inicio</a></li>
      <li class="active"><a style"font-size:="" 17px;"="" href="index.php?view=recepcion">Recepción</a></li>
      <li class="remove">
            <a style="font-size: 17px; color: #16a085;" href="index.php?view=recepcion&amp;id=1"><i class="fa-solid fa-shop" style="color: #16a085; " aria-hidden="true"></i> Disponible</a> 
          </li>
          <li class="remove">
            <a style="font-size: 17px; color: #2a35fa;" href="index.php?view=recepcion&amp;id=2"><i class="fa-solid fa-shop-lock" style="color: #2a35fa;" aria-hidden="true"></i> Ocupado </a>
          </li>
          <li class="remove">
            <a style="font-size: 17px; color: #767676;" href="index.php?view=recepcion&amp;id=3"><i class="fa-solid fa-broom" style="color: #767676;" aria-hidden="true"></i> Limpieza</a> 
          </li>
          <li class="remove">
            <a style="font-size: 17px; color: #C50C0C;" href="index.php?view=recepcion&amp;id=4"><i class="fa-solid fa-screwdriver-wrench" style="color: #C50C0C;" aria-hidden="true"></i> Mantenimiento</a> 
          </li>
    </ol>
    <strong>
</strong></strong></section>
</div> 



 <!-- row --> 
<div class="row"> 
  <!-- col -->
  <div class="col-md-12">
      
      
       <input id="nombre" type="hidden" class="form-control" value="POS">
        <input id="mensaje" type="hidden" class="form-control" value="30">
                   
                    <!--
                    <div class="form-group">
                        <button class="btn btn-success" id="btnImprimir">Imprimir Prueba
                            </button>
                    </div>
               
                    <pre id="estado"></pre>
              -->
        <script src="prueba/Impresora.js"></script>
        <script src="prueba/script.js"></script>


              <?php $reportediarios = ProcesoData::getReporteDiario($hoy);
                if(@@count($reportediarios)>0){ ?>
                  
                   <?php $numero=0;?>
                   <?php $total=0;?>
                   <?php foreach($reportediarios as $reportediario):?>
                   <?php $numero=$numero+1;?>
                     
                        
                        <?php $subtotal= ($reportediario->precio*$reportediario->cant_noche)+$reportediario->total+$reportediario->extra; ?>
                        
                            <?php $total=$subtotal+$total; ?>
                    <?php endforeach; ?>

                     

               <?php }else{ $total=0;};?>


    <section class="tile">
      <div class="tile-header dvd dvd-btm">
          
          
          
       


        <h1 class="custom-font"><strong> VISTA GENERAL RECEPCIÓN</strong></h1>
        <ul class="controls">
        <!-- Agregamos estilos inline para posicionar "FILTRAR POR NIVEL" a la derecha -->
        <li class="remove" style="margin-left: auto; display: flex; align-items: center;">
            <!-- Añadimos un icono de flecha -->
            
            <a style="color: #000000;"><strong>FILTRAR POR NIVEL</strong></a>
            <i class="fa fa-share" style="color: #000000; margin-right: 5px;"></i> 
        </li>
        <li class="remove">
                 
                 <a  style="color: #009688;"  href="index.php?view=recepcion"><i class="fa fa-arrow-circle-left"  style="color: #009688;"  ></i> Todas</a>

               </li>


           <?php $niveles = NivelData::getAll();?>

              <?php foreach($niveles as $nivel):?>

                <li class="remove">
                  <a <?php if(isset($_GET['nivel']) and $nivel->id==$_GET['nivel']){ ?> style="color: red;" <?php }else{ ?> style="color: #f0ad4e;" <?php  }; ?> href="index.php?view=recepcion&nivel=<?php echo $nivel->id; ?>"><i class="fa fa-arrow-circle-left" <?php if(isset($_GET['nivel']) and $nivel->id==$_GET['nivel']){ ?> style="color: red;" <?php }else{ ?> style="color: #f0ad4e;" <?php  }; ?> ></i> <?php echo $nivel->nombre; ?></a>


                </li>

                
              <?php endforeach;?> 
          <!--
          <li class="remove">
            <a style="color: blue;"><i class="fa fa-arrow-circle-right" style="color: blue;"></i> $  <?php echo number_format($total,2,'.',','); ?> </a>
          </li>
        -->
          
        </ul>
      </div>
      <div class="tile-body">
          <div class="row">
            <?php if(isset($_GET['buscar']) and $_GET['buscar']!=""){ ?>
                  <?php $cliente=PersonaData::getLike($_GET['buscar']); ?>

                  <?php $procesos = ProcesoData::getProcesoCliente($cliente->id);
                  if(@@count($procesos)>0){ ?> 
                   <?php foreach($procesos as $proceso):?>
                  <div class="col-lg-2 col-xs-6">
                    <section class="tile bg-danger widget-appointments" style="border-bottom: 5px solid #d9534f;">
                       <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 12px;">Ocupado</h1>
                                    <ul class="controls"> 
                                      <li ><a  href="index.php?view=proceso_salida&id=<?php echo $proceso->id; ?>">
                                            <i class="fa fa-arrow-circle-right"></i>  </a>
                                      </li>
                                    </ul>
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center; "><?php echo $proceso->getHabitacion()->nombre; ?></h4>
                                </div>
                                <!-- /tile body -->
                     </section>
                    </div>
                     <?php endforeach; ?> 
            

               <?php }else{ echo"<h4 class='alert alert-success'>No se encontró Huesped en ninguna habitación</h4>";};
                ?>

            <?php }else{ ?> 

            <?php 
            if(isset($_GET['id']) and $_GET['id']=='1'){ $habitaciones = HabitacionData::getLibres(); }
            else if(isset($_GET['id']) and $_GET['id']=='2'){ $habitaciones = HabitacionData::getOcupados(); }
            else if(isset($_GET['id']) and $_GET['id']=='3'){ $habitaciones = HabitacionData::getLimpieza(); }
            else if(isset($_GET['id']) and $_GET['id']=='4'){ $habitaciones = HabitacionData::getMantenimiento(); }
            else if(isset($_GET['nivel']) and $_GET['nivel']!=''){ $habitaciones = HabitacionData::getAllNivel($_GET['nivel']);}
            else{ $habitaciones = HabitacionData::getAll(); }                   
                          if(@@count($habitaciones)>0){ 
                            // si hay usuarios 
                            ?>
                   <?php foreach($habitaciones as $habitacion):?>
                
                    <div class="col-lg-2 col-xs-6">
                      <!-- small box -->
                      <?php if($habitacion->estado==1){?> 
                      <?php $procesoLimpio = ProcesoData::getByRecepcionReserva($habitacion->id,$hoy);?>

                      <?php if(@@count($procesoLimpio)>0){ ?> <section class="tile bg-drank widget-appointments" > <?php }else{ ?> <section class="tile bg-greensea widget-appointments" > <?php ;} ?> 
                      
                          
                          <?php $tarifas_hab = TarifaHabitacionData::getAllHabitacion($habitacion->id);?>

                             <a <?php if(@@count($procesoLimpio)>0){ }else{ ?> href="index.php?view=reserva" <?php ;} ?> >
                                            
              
                    <!--    <a <?php if(@@count($procesoLimpio)>0){ }else{ ?> href="index.php?view=proceso&id_habitacion=<?php echo $habitacion->id; ?>" <?php ;} ?> > -->
                                            

                                        
                       
                      <?php } else if($habitacion->estado==2){?>
                      <?php $proceso = ProcesoData::getByRecepcion($habitacion->id);?>
                      <?php $pagoss=PagoProcesoData::getAllProceso($proceso->id);
                            $totall=0; 
                            foreach($pagoss as $pagos):
                              $totall=$pagos->monto+$totall; 
                             endforeach; ?>
                      <section class="tile bg-danger widget-appointments" style="background-color: #2a35fa !important;"  >

                        <?php if ($proceso->getCliente()->motivo != "NULL" and $proceso->getCliente()->motivo != "") { ?>
                          <div class="hijo1"> </div>
                          <?php }; ?>
                        

                          <?php if($proceso->mensual=='1')
                          { ?>
                            <a  href="index.php?view=tablero_mensual">
                          <?php }
                          else
                          { ?>
                            <a  data-toggle="modal" data-target="#myModalCheckOut<?php echo $habitacion->id; ?>">
                          <?php } ?>
                          
                      
                      <?php } else if($habitacion->estado==3){?>
                      <section class="tile bg-default widget-appointments" >
                          <a   data-toggle="modal" data-target="#myModal<?php echo $habitacion->id; ?>" style="color: white;">
                     
                      <?php  } else if($habitacion->estado==4){?>
                      <section class="tile bg-danger widget-appointments" >
                          
                          <a   data-toggle="modal" data-target="#mantenimienthabilitar<?php echo $habitacion->id; ?>">
                      
                      <?php  }; ?>
 
                             

                            <?php if($habitacion->estado==1){?>
                               <!-- tile header -->
                               <a href="index.php?view=proceso&id_habitacion=<?php echo $habitacion->id; ?>">
                              
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 20px; text-shadow: 2px 2px 2px #000;"><strong><?php if(@@count($procesoLimpio)>0){ echo "<b style='color:#eeff0b;'>RESERVADA</b>";}else{echo "Disponible";} ?><br></strong></h1>
                                    <ul class="controls"> 
                                    <!--
                                      <li><a  data-toggle="modal" data-target="#myModalEstado<?php echo $habitacion->id; ?>">
                                            <i class="fa fa-home"></i>  </a>
                                      </li>
                                    -->
                                     
                                    </ul> 
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                  <ul class="list-inline tbox m-0">
                                  <li class="b-r tcol">
    <?php if($habitacion->tipo_hab == '2'): ?>
        <img src="img/letra-e.png" alt="Letra E" style="width: 30px; height: auto; display: block; margin: 0 auto;">
    <?php endif; ?>
</li>

                                                                                <li class="tcol">
                                          <h4 style="text-align: center; font-size: 20px;  text-shadow: 2px 2px 2px #000;"><strong><i class="fa fa-bed"></i> <?php echo $habitacion->nombre; ?></strong></h4>
                                        </li>
                                        <li class="tcol">

    
                                          <?php
                                          $categoria = substr($habitacion->getcategoria()->nombre, 0, 8);
                                          $color = '';
                                          
                                              // Añadir condición para cambiar 'CUADRUPL' a 'CUADRUPLE'
    
                                          if ($categoria == 'SENCILLA') {
                                            $color = '#FF232E';
                                          } else if ($categoria == 'DOBLE') {
                                            $color = '#1E90FF';
                                          } else if ($categoria == 'TRIPLE') {
                                            $color = '#F823FF';
                                          } else if ($categoria == 'CUADRUPL') {
                                            $color = '#3FAB0C';
                                          } else if ($categoria == 'SUITE') {
                                            $color = '#FFFC23';
                                          }
                                              if ($categoria == 'CUADRUPL') {
        $categoria = 'CUADRUP';
    }
                                          ?>
                                          <h4 style="text-align: center; font-size: 16px; color: <?php echo $color; ?>;  text-shadow: 1px 1px 1px #000; letter-spacing: -1px; margin-left: -10px;"><strong><?php echo $categoria; ?></strong></h4>
                                        </li>
                                        </ul>

                                        <!--<h4 style="text-align: center; font-size: 20px;"><i class="fa fa-bed"></i> <?php echo $habitacion->nombre; ?></h4>-->
                                        </div> 
                                <!-- /tile body -->
                            <?php } else if($habitacion->estado==2){?>
                            
                            
                            <?php $proceso = ProcesoData::getByRecepcion($habitacion->id);?>

                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 20px;"><?php if($proceso->mensual=='1'){echo "<b style='color:yellow;'>Residente</b>";}else{echo "Habitación";} ?>: <?php echo $habitacion->nombre; ?><br></h1>
                                    
                                </div>  
                                <!-- /tile header --> 

                                <!-- tile body -->
                                <div class="tile-body"  <?php if ($proceso->total_v >= $proceso->deuda ) {  echo "style='background-color: #2a35fa; padding:1px;'";}else { echo "style='background-color: #0CCFFF; padding:1px;'";}; ?> >
                                   <h4 style="text-align: center; font-size:  15px; padding:2.75px;"><strong><?php echo substr($proceso->getCliente()->nombre, 0,28); ?><strong></h4>
                                </div>
                                <!-- /tile body -->



                                
                                
                                

      
      
                                <div class="modal fade bs-example-modal-xm" id="myModalCheckOut<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-info">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                                
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                
                                                
<h4 class="modal-title" style="color: black;">
    <span class="fa fa-hotel"></span> Habitación <?php echo $habitacion->nombre; ?>
</h4>
                                              </div>
                                               
<!------COMIENZA ANULAR REGISTRO-------------------------------------------------------------------------------------------------------->


<?php
$monto_pagado = 0;
$totl = 0;
$pendiente = 0;
$tmps_p = ProcesoData::getById($proceso->id); 
$monto_pagado = $tmps_p->total_v; 
$totl += $tmps_p->deuda; 
$pendiente = $totl - $monto_pagado;
?>

<div class="modal-container">
  <div class="total"><strong>Total:</strong> $<?php echo number_format($totl, 2, '.', ','); ?></div>
  <div class="pagado"><strong>Pagado:</strong> $<?php echo number_format($monto_pagado, 2, '.', ','); ?></div>
  <div class="pendiente"><strong>Pendiente:</strong> $<?php echo number_format($pendiente, 2, '.', ','); ?></div>
</div>

<div class="modal-footer"> 
    <center>
        <div class="form-group">
            <div class="input-group">
                <?php if ($pendiente > 0): ?>
                    <a data-toggle="modal" data-target="#myModalAnularNO<?php echo $habitacion->id; ?>" class="btn btn-outline btn-danger pull-left">ANULAR REGISTRO</a>
                <?php else: ?>
                    <a data-toggle="modal" data-target="#myModalAnular<?php echo $habitacion->id; ?>" class="btn btn-outline btn-danger pull-left">ANULAR REGISTRO</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <a href="index.php?view=addprocesoprueba&id=<?php echo $proceso->id; ?>" class="btn btn-outline btn-primary pull-left">IR A PRE-CUENTA</a>
            </div>
        </div>
    </center>
</div>

<!--
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                          <a href="index.php?view=updateaseo&id=<?php echo $habitacion->id; ?>" class="btn btn-outline btn-warning pull-left"> HABILITAR PARA ASEO</a>
                                                        </div>
                                                    </div>
                                              -->
                                            </div>
                                            <!-- /.modal-content -->
                                          </div>
                                          <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                      </div>


<div class="modal fade bs-example-modal-xm" id="myModalAnularNO<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-dialog">
            <div class="modal-content"> 
                
              <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div> 
              
              <div class="modal-body" style="background-color:#5ea4a8 !important;">
                
                <center><h3 style="color:red;"><b>AÚN HAY PAGOS PENDIENTES EN ESTA HABITACIÓN</b><br><b>NO ES POSIBLE ANULAR POR EL MOMENTO</b></h3></center>

                <div class="row"> 
                                                  
                </div>


              </div> 
      
              <div class="modal-footer"> 
              <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c pull-left" data-dismiss="modal"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cerrar</button>
              </div>
               
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>


<div class="modal fade bs-example-modal-xm" id="myModalAnular<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-dialog">
            <div class="modal-content"> 
                
              <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div> 
              <form action="index.php?view=delproceso" method="post">
              <div class="modal-body" style="background-color:#5ea4a8 !important;">
                
                <center><h3 style="color:red;"><b>¿ESTÁS SEGURO QUE DESEAS ANULAR EL REGISTRO DE LA HABITACIÓN?</b></h3></center>

                <div class="row"> 
                                                    <div class="col-md-12" style="padding-top: 20px;">
                                                          <div class="form-group">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                                                            <div class="col-md-8">
                                                              <input type="text" name="nombre" required class="form-control"  id="address1" placeholder="Ingrese nombre">
                                                            </div>
                                                          </div> 

                                                          <div class="form-group"  style="padding-top: 40px;">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                                                            <div class="col-md-8">  
                                                               <input type="text" name="razon" required class="form-control validanumericos"  placeholder="Ingrese la razón" >   
                                                            </div>
                                                          </div>

                                                    </div>
                                                </div>


              </div> 
      
              <div class="modal-footer"> 

               <input type="hidden" name="accion" value="Eliminó la asignación de la habitación  <?php echo $habitacion->nombre; ?> de Admin">
              <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
              <input type="hidden" name="hora" value="<?php echo $hora; ?>">
              <input type="hidden" name="id" value="<?php echo $proceso->id; ?>">
              <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">

              <input type="hidden" name="nomhabit" value="<?php echo $habitacion->nombre; ?>">
              <input type="hidden" name="folioo" value="<?php echo $proceso->nro_folio; ?>">

              <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c pull-right"><i class="fa fa-arrow-right" aria-hidden="true"></i> Aceptar</button>
              <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c pull-left" data-dismiss="modal"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancelar</button>
              
               </form>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>


                            <?php } else if($habitacion->estado==3){?>
                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 20px;color: white; text-shadow: 2px 2px 2px #000;" ><strong>Limpieza</strong><br></h1>
                                    <ul class="controls"> 

                                    </ul> 
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                   <h4 style="text-align: center; font-size: 20px;  text-shadow: 2px 2px 2px #000;" ><strong><i class="fa-solid fa-broom" style="color: #fff;" aria-hidden="true"></i><?php echo $habitacion->nombre; ?></strong></h4>
                                </div>
                                <!-- /tile body -->




                            <?php  } else if($habitacion->estado==4){?>
                               <!-- tile header -->
                                <div class="tile-header dvd dvd-btm">
                                    <h1 class="custom-font" style="font-size: 20px; text-shadow: 2px 2px 2px #000;"><strong>Mantenimiento<br></strong></h1>
                                    
                                </div>
                                <!-- /tile header -->

                                <!-- tile body -->
                                <div class="tile-body" style="padding: 1px;">
                                     <h4 style="text-align: center; font-size: 20px;  text-shadow: 2px 2px 2px #000;"><i class="fa-solid fa-screwdriver-wrench" aria-hidden="true"></i><strong>   <?php echo $habitacion->nombre; ?></strong></h4>
                                </div>
                                <!-- /tile body -->

                                <div class="modal fade bs-example-modal-xm" id="mantenimienthabilitar<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog modal-info">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                          
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>

                                          <h4 class="modal-title" style="color: black;"><span class="fa fa-sitemap"></span> HABILITAR HABITACIÓN</h4>
                                        </div>
                                                                                <div class="modal-body" style="background-color:#fff !important;">
                                          <center><h3 style="color:red;"><b>¿HABILITAR HABITACIÓN?</b></h3></center>

                                          <div class="row"> 
                                                    <div class="col-md-12">
                                                          <div class="form-group">
                                                          <center><h3 style="color:Black;"><b>Habitación # <?php echo $habitacion->nombre; ?></b></h3></center>
                                                          </div> 
                                                    </div>
                                                </div>
                                        </div> 
                                                                                <div class="modal-footer">
                                        <button type="button" class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c pull-left"><i class="fa fa-arrow-left" aria-hidden="true"></i> Cancelar</button>
                                          <a href="index.php?view=mhhabitacionn&id=<?php echo $habitacion->id; ?>"   class="btn btn-warning btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right" aria-hidden="true"></i> Habilitar habitación</a>
                                          <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
                                        </div>
                                     
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
                                </div>
                            <?php  }; ?>
                     </a>
                      </section>

                    </div>
<div class="modal fade bs-example-modal-xm" id="myModalEstado<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-spinner"></span> CAMBIAR ESTADO DE HABITACIÓN</h4>
              </div>
              <form action="index.php?view=updateestado001" method="post">
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> ESTADO </span>
                      <select class="form-control" name="estado" required="">
                        <option value="">--- Selecciona ---</option>
                        <option value="1">Inmediata</option>
                        <option value="3">Disponible</option>
                        <option value="4">Mantenimiento</option>
                      </select>
                    </div>
                  </div>

                  
                </div>
                </div>

              </div>
              <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">
              <div class="modal-footer"> 
                <button type="submit" class="btn btn-outline btn-primary pull-left">Cambiar estado de habitación</button>

               
              </div>
              </form>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

                

<div class="modal fade bs-example-modal-xm" id="myModalTarifa<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-spinner"></span> NECESITA CONFIGURAR TARIFAS PARA ESTA HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> HABITACIÓN </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                 

                </div>
                </div>

              </div>
              <div class="modal-footer"> 
                <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-outline btn-primary pull-left"> Agregar tarifa a la habitación</a>

               
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>




  <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-spinner"></span> ESTÁ A PUNTO DE TERMINAR LA LIMPIEZA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> HABITACIÓN </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> TIPO </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->getCategoria()->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> DETALLES </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->descripcion; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left btn-success" data-dismiss="modal">Cancelar</button>
                <a href="index.php?view=limpieza&id=<?php echo $habitacion->id; ?>" class="btn btn-outline btn-primary">Finalizar limpieza</a>
                <!--
                <a data-toggle="modal" data-target="#piezasucia<?php echo $habitacion->id; ?>"  class="btn btn-outline btn-danger">Dar como pieza sucia</a>
              -->
              </div>


           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>




        <div class="modal fade bs-example-modal-xm" id="piezasucia<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                
              </div> 
              <form action="index.php?view=darpiezasucia" method="post">
              <div class="modal-body" style="background-color:#5ea4a8 !important;">
                
                <center><h3 style="color:red;"><b>¿ESTAS SEGURO?</b></h3></center>

                <div class="row"> 
                                                    <div class="col-md-12" style="padding-top: 20px;">
                                                          <div class="form-group">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                                                            <div class="col-md-8">
                                                              <input type="text" name="nombre" required class="form-control"  id="address1" placeholder="Ingrese nombre">
                                                            </div>
                                                          </div>

                                                          <div class="form-group"  style="padding-top: 40px;">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                                                            <div class="col-md-8">  
                                                               <input type="text" name="razon" required class="form-control validanumericos"  placeholder="Ingrese la razón" >   
                                                            </div>
                                                          </div>

                                                    </div>
                                                </div>


                        </div> 
                
                        <div class="modal-footer"> 

                         <input type="hidden" name="accion" value="Dar pieza sucia">
                        <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                        <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                        <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">
                        <button type="submit" class="btn btn-outline btn-success pull-right"><i class="fa fa-arrow-right"></i> SI </button>

                        <a  data-dismiss="modal"  class="close btn btn-outline btn-danger pull-left">NO</a>

                         
                        </div>
                         </form>
                     
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>








                    <?php endforeach; ?>
            

               <?php }else{ 
            echo"<h4 class='alert alert-success'>Necesita agregar habitaciones en CONFIGURACIÓN</h4>";

                };
                ?>

                <?php }; ?>
          </div>

        </div>
      </div>
    
</section>
</div>
</div>
<?php
}else{

date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");

    $u=null;
    $u = UserData::getById(Session::getUID());
    $usuario = $u->is_admin;
    $id_usuario = $u->id;

   $hora = date("H:i:s");
  $fecha_completo = date("Y-m-d H:i:s"); 

?>
<section class="tile tile-simple col-md-12 ">
      
      <div class="tile-widget dvd dvd-btm" style="text-align: center;">
              <h1 style="    font-size: 60px; font-weight: bold;">¡ Bienvenido <?php echo $u->name; ?> !</h1>
              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header --> 
           <form method="post"  action="index.php?view=agregar_caja" id="addcaja">
              <div class="tile-body p-0" style="text-align: left; margin:50px;">

                <table style="margin-left: auto; margin-right: auto;">
                  
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">FECHA APERTURA: </h5></td>
                      <td><h5><input class="form-control" type="date" name="fecha" value="<?php echo $hoy; ?>" ></h5></td>
                      <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                  </tr>
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">FONDO DE CAJA: </h5></td>
                      <td><h5><input class="form-control" type="text" name="monto_apertura" value="0" ></h5></td>
                      
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">DOLAR HOY: </h5></td>
                      <td><h5><input class="form-control" type="text" name="dolarhoy" value="17.00" ></h5></td>
                      
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">TURNO: </h5></td>
                      <td><h5>
                          <select name="turno" class="form-control">
                                <option>Mañana</option>
                                <option>Tarde</option>
                                <option>Noche</option>
                          </select>
                          </h5>
                      </td>
                      
                  </tr>
                

                
                </table>
 
              </div>

            
 
              <!-- tile footer -->
              <div class="tile-footer dvd dvd-top">
             
                <input type="hidden" name="fecha_apertura" value="<?php echo $fecha_completo; ?>">
                <input type="hidden" name="hora" value="<?php echo date('Y-m-d H:i:s', strtotime($hora . ' -8 hours')); ?>">

                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                  <div class="input-group" style="margin-left: auto;margin-right: auto;;"> 
                      <button type="submit" class="btn btn-sm btn-success btn-flat" style="font-size: 32px;color: #fff;
    background-color: #16a085;
    border-color: #16a085;" ><b>APERTURAR CAJA</b></button>
                  </div>
              </div>
              <!-- /tile footer -->

          </form>

</section>
<?php
 
};
 
?>



<style>
.modal-container {
  display: flex;
  flex-direction: flex-start;
}

.modal-container > div {
  margin-bottom: 10px;
  font-size: 18px; /* Tamaño de fuente más grande */
  }

.modal-container > div:last-child {
  margin-bottom: 0; /* Eliminar el margen inferior del último elemento */
}

.total {
  color: blue; /* Color azul para el total */
  text-shadow: 0 0 1px black; /* Agregar una sombra negra para simular el grosor */

}

.pagado {
  color: #1DAF12; /* Color amarillo para lo pagado */
  text-shadow: 0 0 1px black; /* Agregar una sombra negra para simular el grosor */

}

.pendiente {
  color: red; /* Color rojo para lo pendiente */
  text-shadow: 0 0 1px black; /* Agregar una sombra negra para simular el grosor */

}

.modal-container strong {
  margin-right: 3px; /* Añadir espacio entre el texto y el valor */
  margin-left: 15px; /* Añadir espacio entre el texto y el valor */
}

</style>


