
<style type="text/css">
.nuevo {
    margin-top: 20px !important;
    margin-bottom: 20px !important;
}
.b-r {
    border-right: 2px solid rgba(0, 0, 0, 0.11) !important;
}
.table-bordered{
    font-size: 11px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 2px !important;
}
</style>



<?php 
$id=$_GET['id'];
require 'core/app/view/sumatoria-view.php';
$proceso = ProcesoData::getById($id); 
$proceso->total_v = $pagadooo; 
$proceso->deuda = $total_total; 
$proceso->updateTotalDeuda();


$clientes = PersonaData::getAll();
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");

if(isset($_GET['id'])){
$habitacion = ProcesoData::getById($_GET['id']);
if(@count($habitacion)>0){ ?>
<div class="row" >
    <br>
    <div class="col-md-12">
    <!-- tile -->
        <section class="tile">

            <!-- tile header -->
            <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>Habitación # <?php echo $habitacion->getHabitacion()->nombre; ?> / <?php echo $habitacion->nro_folio; ?></strong></h1>
                <ul class="controls">
                    <li><a role="button" tabindex="0" style="color:#f0ad4e;">
                        <i class="glyphicon glyphicon-arrow-down"></i> <b><?php echo $habitacion->fecha_entrada; ?></b></a></li>
                    <li><a role="button" tabindex="0" style="color:#f0ad4e;">
                        <i class="glyphicon glyphicon-arrow-up"></i> <b><?php echo $habitacion->fecha_salida; ?></b></a></li>
                    <li><a href="reporte/ticket.php?id=<?php echo $habitacion->id; ?>" target="_blanck" role="button" tabindex="0" style="color:#16a085;"><i class="fa fa-print"></i></a></li>
                    <li class="remove"><a role="button" tabindex="0" class="tile-close" style="color: #e05d6f;"><i class="fa fa-times"></i></a></li>
                </ul>
            </div>
            <!-- /tile header -->

            <!-- tile body -->
            <div class="tile-body p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-7 b-r">
                            
                            <!-- SERVICIO DE HABITACIÓN -->
                            <div class="nuevo">
                                <!--
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea">
                                    Código: <b>00<?php echo $_GET['id']; ?></b>
                                    <a class="pull-right text-muted"><i class="fa fa-check"></i></a>
                                </div>
                                -->
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea">
                                    Cliente: <b><a href="#"  data-toggle="modal" data-target="#mostrar_cliente" style="color: blue;"><?php echo $habitacion->getCliente()->nombre; ?></a></b>
                                    <a href="#"  data-toggle="modal" data-target="#editpersona" class="pull-right text-muted" style="color: #167cd3; opacity: 1;font-size: 15px;"><i class="fa fa-edit"></i></a>
                                    
                                </div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea">
                                    Pasajeros: <b><?php echo $habitacion->pasajero; ?></b>
                                    <a class="pull-right text-muted"><i class="fa fa-check"></i></a>
                                </div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea">
                                    Observación: <b><?php echo $habitacion->getCliente()->motivo; ?></b>
                                    <a href="#"  data-toggle="modal" data-target="#editobservacion" class="pull-right text-muted" style="color: #167cd3; opacity: 1;font-size: 15px;"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>

                            <h5 style="text-decoration: underline;">Detalle de estancia</h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Acción</th>
                                    <th>Fecha Ocup.</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Cant. Noches</th>
                                    <th>Nro Habi.</th>
                                    <th><b class="pull-right">Precio</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php $sumatoria_s=0; $pagado_suma=0; ?>
                                  <?php $tmps = PagoProcesoData::getAllProcesoExtender($habitacion->id); 
                                  foreach($tmps as $p):  ?>
                                        <tr style="background-color: #f5f5f5;">
                                    
                                          <?php if($p->noche=='1'){ $des='Noches';}else{ $des='Horas';}; ?>

                                          <td> <?php if($p->fecha_salida!=NULL){ ?>
                                            <a href="#"  data-toggle="modal" data-target="#confirmare<?php echo $p->id; ?>" data-options="splash-2 splash-ef-11" class="tex-danger btn-xs b-0" style="color:#e05d6f;"><i class="glyphicon glyphicon-trash"></i></a>
                                            <?php }else{}; ?>
                                          </td>
                                          <td><?php echo $p->fecha_creada; ?></td>
                                          <td><?php echo $habitacion->getTarifa()->nombre; ?></td>
                                          <td><?php echo $p->getUser()->name; ?></td>
                                          <td><?php echo $p->cantidad.' '.$des; ?></td>
                                          <td><?php echo $habitacion->getHabitacion()->nombre; ?></td>
                                          <td><b class="pull-right">$   <?php echo number_format($p->total*$p->cantidad,2,'.',','); ?></b></td>
                                        </tr> 
                                        <!-- Modal -->
                                        <div class="modal fade bs-example-modal-lg" id="confirmare<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog " role="document">
                                              <div class="modal-content">
                                                <div class="modal-header"> 
                                                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> ALERTA!!</h4>
                                                </div>
                                                <form action="index.php?view=delestadiap" method="post">
                                                <div class="modal-body"> 

                                                ¿Estás seguro de eliminar?
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
                                                    <input type="hidden" name="accion" value="Anuló un pago por $<?php echo $p->monto; ?> de la habitación <?php echo $p->getProceso()->getHabitacion()->nombre; ?>">
                                                    <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                                                    <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                                                    <input type="hidden" name="id_p" value="<?php echo $_GET['id']; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $p->id; ?>">

                                                    <input type="hidden" name="preciopros" value="<?php echo $p->total*$p->cantidad; ?>">
                                                    <input type="hidden" name="habitpros" value="<?php echo $habitacion->getHabitacion()->nombre; ?>">
                                                    <input type="hidden" name="foliopros" value="<?php echo $habitacion->nro_folio; ?>">


                                                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Eliminar </button>

                                                   
                                                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                                                 </div>
                                                </form>
                                              </div>
                                          </div>
                                        </div>
                                        <!-- /.Modal -->
                                        <?php $sumatoria_s+=($p->total*$p->cantidad); ?>
                                        <?php $pagado_suma+=$p->monto; ?>
                                  <?php endforeach; ?>
                                </tbody> 
                            </table>
                            <h5><a href="#"  data-toggle="modal" data-target="#extender_estadia<?php echo $habitacion->id; ?>"  class="btn btn-greensea btn-xs b-0"><i class="glyphicon glyphicon-plus"></i></a>  
                            Extender estadía?

                            <p class="pull-right">Sub-total
                                <?php $total_s=$sumatoria_s; ?>
                                <button class="btn btn-primary btn-rounded btn-xs">$   <?php echo number_format($total_s,2,'.',','); ?></button>
                            </p>
                            </h5>
                            <!-- / FIN SERVICIO DE HABITACIÓN -->
                            <br>
                            <!-- VENTA DE PRODUCTOS-->
                            <h5 style="text-decoration: underline;">Consumo de productos</h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                    <th>Cant.</th>
                                    <th>Producto</th>
                                    <th>Estado</th>
                                    <th><b class="pull-right">Precio</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $total=0;
                                    $producto_pagado=0;
                                    $productos = ProcesoVentaData::getByAll($_GET['id']);
                                    if(count($productos)>0){ 
                                        foreach($productos as $producto):?>
                                        <tr style="background-color: #f5f5f5;">
                                            <td> </td>
                                            <td><?php echo $producto->fecha_creada; ?></td>
                                            <td><?php echo $producto->cantidad; ?></td>
                                            <td><?php echo $producto->getProducto()->nombre; ?></td>
                                            <?php if($producto->fecha_creada!=NULL and $producto->fecha_creada!="0000-00-00 00:00:00"){ ?>
                                            <td><p class="text-green">Pagado</p></td>
                                              <?php }else{ ?>
                                            <td><p class="text-red">Falta Pagar</p></td>
                                              <?php }; ?>
                                            <td><b class="pull-right">$  <?php echo number_format($producto->precio,2,'.',','); ?></b></td>
                                        </tr>
                                        <?php 
                                        if($producto->fecha_creada!=NULL and $producto->fecha_creada!='0000-00-00 00:00:00'){ 
                                             $producto_pagado+=$producto->precio*$producto->cantidad;
                                        }else{ $producto_pagado+=0; }
                                        ?>
                                       
                                        <?php $total=($producto->cantidad*$producto->precio)+$total; 
                                        endforeach; 
                                     }; 
                                ?>    
                                
                                </tbody> 
                            </table>
                            <h5>
                            <p class="pull-right">Sub-total
                                <button class="btn btn-primary btn-rounded btn-xs">
                                    $    <?php echo number_format($total,2,'.',',');?>
                                </button>
                            </p>
                            </h5>
                            <!-- / FIN VENTA PRODUCTOS -->
                            <br>
                            <!-- OTROS SERVICIOS-->
                            <h5 style="text-decoration: underline;">Otros <a href="#"  data-toggle="modal" data-target="#otropago"  > [AGREGAR] </a> </h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Acción</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th><b class="pull-right">Precio</b></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php 
                                $total_extra=0;
                                $gastos = GastoData::getAllIngresoProceso($_GET['id']);  
                                if(@count($gastos)>0){
                                foreach($gastos as $gasto):?> 
                                <tr style="background-color: #f5f5f5;"> 
                                    <td><a href="#"  data-toggle="modal" data-target="#confirmarg<?php echo $gasto->id; ?>" data-options="splash-2 splash-ef-11" class="tex-danger btn-xs b-0" style="color:#e05d6f;"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    <td><?php echo date("Y-m-d", strtotime($gasto->fecha_creacion)); ?></td>
                                    <td><?php echo $gasto->descripcion; ?></td>
                                    <td><b class="pull-right">$    <?php echo number_format($gasto->precio,0,'.',',');?></b></td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade bs-example-modal-lg" id="confirmarg<?php echo $gasto->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog " role="document">
                                      <div class="modal-content">
                                        <div class="modal-header"> 
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> ¿Estás seguro de eliminar?</h4>
                                        </div> 
                                        <form action="index.php?view=delingresop" method="post">
                                         <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12" style="padding-top: 20px;">
                                                      <div class="form-group">
                                                        <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                                                        <div class="col-md-8">
                                                          <input type="text" name="nombre" id="idnombre" required class="form-control"  id="address1" placeholder="Ingrese nombre">
                                                        </div>
                                                      </div>
 
                                                      <div class="form-group"  style="padding-top: 40px;">
                                                        <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                                                        <div class="col-md-8">  
                                                           <input type="text" name="razon" id="idrazon" required class="form-control validanumericos"  placeholder="Ingrese la razón" > 

                                                           <input type="hidden" name="id"  value="<?php echo $gasto->id; ?>" class="form-control"   >
                                                           <input type="hidden" name="id_p"  value="<?php echo $_GET['id']; ?>" class="form-control"   >   

                                                           <input type="hidden" name="accion" value="Anuló pago extra por $<?php echo number_format($gasto->precio,0,'.',',');?> ">
                                                            <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                                                            <input type="hidden" name="hora" value="<?php echo $hora; ?>">

                                                    <input type="hidden" name="preciopago" value="<?php echo $gasto->precio; ?>">
                                                    <input type="hidden" name="detallepago" value="<?php echo $gasto->descripcion; ?>">


                                                        </div>
                                                      </div>

                                                </div>
                                            </div>
                                         </div>
                                         <div class="modal-footer">
                                            <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Eliminar </button>
                                            <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                                         </div>
                                        </form>
                                      </div>
                                  </div>
                                </div>
                                <!-- /.Modal -->

                                <?php 
                                $total_extra+=$gasto->precio;
                                endforeach; }
                                ?>

                                
                                </tbody> 
                            </table>
                            <h5>
                            <p class="pull-right">Sub-total
                                <button class="btn btn-primary btn-rounded btn-xs">$    <?php echo number_format($total_extra,2,'.',',');?></button>
                            </p>
                            </h5>
                            
                            <!-- / OTROS SERVICIOS -->
                            
                        </div>
                        <div class="col-md-5">
                            <h5 style="text-decoration: underline;">Finalizar check-ou?</h5>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><center>MONEDA</center></th>
                                    <th><center>PAGADO</center></th>
                                    <th><center>DEUDA</center></th>
                                    
                                </tr>
                                </thead>
                                <tbody> 
                                 <?php 
                                 $sumatoria_pagado=0; 
                                 $tmps_p = PagoProcesoData::getAllProceso($habitacion->id); 
                                    foreach($tmps_p as $p_p):  
                                     $sumatoria_pagado+=$p_p->monto; 
                                    endforeach; 
                                ?>

                                <tr>
                                    <td><center><b style="font-size: 20px;"><?php echo $habitacion->moneda; ?></b></center></td>
                                    <?php $total_total=$total_extra+$total+$total_s; ?>

                                    <?php $deuda=$total_total-($sumatoria_pagado+$producto_pagado); ?>

                                    <?php $pagadooo=$total_total-$deuda; ?>
                                    <td><center><b style="font-size: 20px;color:#16a085;">$    
                                        <?php echo number_format($pagadooo,0,'.',',');?></b></center></td>
                                    <td><center><b style="font-size: 20px;color: #e05d6f;">$    
                                        <?php echo number_format($total_total,0,'.',',');?></b></center></td>
                                     
                                </tr>
                                </tbody> 
                            </table>

                            <br> 
                            <form name="addsalida" action="index.php?view=addsalida" method="post">
                            <input type="hidden" name="total_total" id="total_total" value="<?php echo $total_total; ?>">
                            <input type="hidden" name="acuenta" id="acuenta" value="<?php echo $sumatoria_pagado+$producto_pagado; ?>">
                            <input type="hidden" name="descuento" value="0" id="descuento" onkeyup="sumar();" onchange="sumar();">
                            
                            

                           


                            <br>
                            <h5 style="text-decoration: underline;">Medios de pago</h5>
                            
                            <h5>
                            <select class="form-control" onchange="CargarMediopago(this.value);" required name="id_tipo_pago">
                              <?php $medipagos = TipoPagoData::getAll();
                              if(@count($medipagos)>0){ ?>
                              <?php foreach($medipagos as $mediopago):?>
                                <option <?php if($mediopago->id==$habitacion->id_tipo_pago){echo "selected";} ?> value="<?php echo $mediopago->id; ?>" ><?php echo $mediopago->nombre; ?></option>
                              <?php endforeach; ?>
                          

                              <?php }else{ };?>
                            </select>
                            </h5> 
                            <h5>
                            
                                <div class="modal fade bs-example-modal-xm" id="myModalVoucher" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><span class="fa fa-spinner"></span> REGISTRAR CORRELATIVO</h4>
                                          </div>
                                         
                                          <div class="modal-body" style="background-color:#fff !important;">
                                            <div class="row"> 
                                            <div class="col-md-offset-1 col-md-10">
                                              
                                              <div class="form-group"> 
                                                <div class="input-group">
                                                  <span class="input-group-addon"> Tipo comprobante </span>
                                                  <select class="form-control select2" required  name="comprobante">  
                                                    <?php $tipocomprobantes = TipoComprobanteData::getAll();?>
                                                    <?php foreach($tipocomprobantes as $tipocomprobante):?>
                                                      <option value="<?php echo $tipocomprobante->id;?>"><?php echo $tipocomprobante->nombre;?></option>
                                                    <?php endforeach;?>
                                                  </select> 
                                                </div>
                                              </div>
                                            </div>
                                            </div>
 
                                          </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal -->
                                  </div>
                                <input type="hidden" name="total_resumen" value="<?php echo $total_total; ?>"> 
                                <input type="hidden" name="nro_operacion" value="-"> 
                                <input type="hidden" name="id_operacion" value="<?php echo $_GET['id']; ?>">
                                <input type="hidden" name="fecha_salida" value="<?php echo $hoy.' '.$hora; ?>">

                                <?php if($habitacion->estado=="1"){ ?>

                                    <a href="?view=reserva" class="btn btn-success pull-right btn-rounded"><i class='fa fa-print'></i> Guardar cambios</a>

                                <?php }else{ ?>
                                    <button type="submit" name="general" class="btn btn-success pull-right btn-rounded"><i class='fa fa-print'></i> Finalizar Check-Out</button>
                                <?php }; ?>
                            
                            </h5>
                            </form>
                            <br><br><br><br>
                            <h5>
                            <a href="#"  data-toggle="modal" data-target="#addpago<?php echo $habitacion->id; ?>" style="color:#16a085;" > <b>[AGREGAR PAGO]</b> </a>  
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="#"  data-toggle="modal" data-target="#verpagos<?php echo $habitacion->id; ?>"  > [VER PAGOS REALIZADOS] </a>  
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /tile body -->

        </section>
        <!-- /tile -->
        <hr><hr><hr><hr><hr>
    </div>



    <!-- LISTA DE MODAL SIN ID-->
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="mostrar_cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            <h4 class="modal-title" id="myModalLabel">Lista de huéspedes</h4>
            </div>
             <div class="modal-body">
              
              <table class="footable table table-custom" style="font-size: 11px;">
                <thead style="color: white; background-color: #827e7e;">
                    <tr>
                      <th>Tipo huesped</th>
                      <th>Tipo documento</th>
                      <th data-hide='phone, tablet'>Documento</th> 
                      <th data-hide='phone, tablet'>Nombres completos</th>  
                      <th data-hide='phone, tablet'>Teléfono</th> 
                      <th data-hide='phone, tablet'>E-mail</th> 
                      <th data-hide='phone, tablet'>Procedencia</th> 
                       
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $tmps = ClienteProcesoData::getAllProceso($habitacion->id); 
                    foreach($tmps as $p):  ?>
                          <tr> 
                            <td><?php echo $p->getCliente()->medio_transporte; ?></td>
                            <td><b><?php echo $p->getCliente()->getTipoDocumento()->nombre; ?></b></td>
                          
                            <td><?php echo $p->getCliente()->documento; ?></td>
                            <td><?php echo $p->getCliente()->nombre; ?></td>
                            <td><?php if($p->getCliente()->estado_civil!="NULL"){ echo $p->getCliente()->estado_civil; }else{ echo "--------";} ?></td>
                            <td><?php if($p->getCliente()->direccion!="NULL"){ echo $p->getCliente()->direccion; }else{ echo "--------";} ?></td>
                            <td><?php if($p->getCliente()->giro!="NULL"){ echo $p->getCliente()->giro; }else{ echo "--------";} ?></td>
                          </tr> 
                    <?php endforeach; ?>
                </tbody>
                        
                </table> 
                  
              </div>
          </div>
      </div>
    </div>
    <!-- /.Modal -->




<!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="addpago<?php echo $habitacion->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">REALIZAR PAGO</h4>
      </div>
      <form action="index.php?view=addpago_adicional" method="post">
      <div class="modal-body">
        
          
            <div class="row"> 
                <div class="col-md-12" style="padding-top: 20px;">
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">FECHA*</label>
                        <div class="col-md-8">
                          <input type="date" name="fecha" disabled required class="form-control"  id="address1" placeholder="Ingrese vigencia de circulacion" value="<?php echo $hoy; ?>"  >
                        </div>
                      </div>


                      <div class="form-group"  style="padding-top: 40px;">
                        <label for="inputEmail1" class="col-lg-3 control-label">DESCRIPCIÓN*</label>
                        <div class="col-md-8">  
                           <input type="text" name="aval" required class="form-control"  placeholder="Ingrese descripción" >   
                        </div>
                      </div>


                      <div class="form-group"  style="padding-top: 40px;">
                        <label for="inputEmail1" class="col-lg-3 control-label">MONTO*</label>
                        <div class="col-md-8">  
                           <input type="text" name="monto" required class="form-control validanumericos"  placeholder="Ingrese precio total" >   
                        </div>
                      </div>

                      <div class="form-group"  style="padding-top: 40px;">
                        <label for="inputEmail1" class="col-lg-3 control-label">TIPO PAGO*</label>
                        <div class="col-md-8">  
                           <select class="form-control"  required name="id_tipo_pago" onchange="CargarMediopago(this.value);" >
                              <?php $medipagos = TipoPagoData::getAll();
                              if(@count($medipagos)>0){ ?>
                              <?php foreach($medipagos as $mediopago):?>
                                <option  value="<?php echo $mediopago->id; ?>" ><?php echo $mediopago->nombre; ?></option>
                              <?php endforeach; ?>
                          

                              <?php }else{ };?> 
                            </select>
                        </div>
                      </div>

                      <div class="form-group" style="padding-top: 40px;" id="mostrar_mediopago">
                
                      </div>
 
                      


                </div>
            </div>
        
        </div> 

            <div class="modal-footer">
                    <input type="hidden" name="id_proceso" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Guardar ingreso</button> 
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
            </div>
        </form>

    </div>
    </div>
  </div>
  <!-- /.Modal -->










  <!-- Modal -->
  <div class="modal fade bs-example-modal-lg" id="verpagos<?php echo $habitacion->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Lista de pagos realizados</h4>
      </div>
      <div class="modal-body">
        
        
        <div class="row"> 
        <div class="col-md-12" style="padding-top: 20px;padding-bottom: 60px;">
            <table class="table table-bordered">
                <thead>
                <th></th>
                <th>Código</th>
                <th data-hide="phone">Monto</th>
                <th data-hide='phone, tablet'>Tipo pago</th>
                <th data-hide='phone, tablet'>Descripción</th> 
                <th data-hide='phone, tablet'>Fecha del pago</th> 
                <th data-hide='phone, tablet'>Usuario</th> 
                </thead>
                <tbody> 
       
              <?php $sumatoria=0; ?>
              <?php $subtotal= ($habitacion->precio*$habitacion->cant_noche)+$habitacion->total+$habitacion->extra; ?>
              <?php $tmps = PagoProcesoData::getAllProcesoDesc($habitacion->id); 
              foreach($tmps as $p):  ?>
                    <?php if($p->monto!='0'){ ?>
                    <tr>
                        
                      <td>
                        <a href="#"  data-toggle="modal" data-target="#confirmarePago<?php echo $p->id; ?>" data-options="splash-2 splash-ef-11" class="tex-danger btn-xs b-0" style="color:#e05d6f;"><i class="glyphicon glyphicon-trash"></i></a>                    
                      </td>
                      <td><b><?php echo $p->id; ?></b></td>
                      <td><?php echo $p->monto; ?></td>
                      <td><?php echo $p->getTipoPago()->nombre; ?></td>
                      <td><?php echo $p->aval; ?></td>
                      <td><?php echo $p->fecha_creada; ?></td>
                      <td><?php echo $p->getUser()->name; ?></td>
                    </tr> 
                    <?php }; ?>


                    <div class="modal fade bs-example-modal-lg" id="confirmarePago<?php echo $p->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog " role="document">
                                              <div class="modal-content">
                                               
                                                <form action="index.php?view=delpagopro" method="post">
                                                <div class="modal-body"> 
 
                                                ¿Estás seguro de eliminar? 
                                                <div class="row"> 
                                                    <div class="col-md-12" style="padding-top: 20px;">
                                                          <div class="form-group">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                                                            <div class="col-md-8">
                                                              <input type="text" name="nombre" required class="form-control"  id="address1" placeholder="Ingrese nombre">
                                                            </div>
                                                          </div>

                                                          <div class="form-group"  style="padding-top: 20px;">
                                                            <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                                                            <div class="col-md-8">  
                                                               <input type="text" name="razon" required class="form-control"  placeholder="Ingrese la razón" >   
                                                            </div>
                                                          </div>

                                                    </div>
                                                </div>

                                                 </div>
                                                 <div class="modal-footer"> 
                                                    <input type="hidden" name="accion" value="Anuló un pago por $<?php echo $p->monto; ?> ">
                                                    <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                                                    <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                                                    <input type="hidden" name="id_p" value="<?php echo $_GET['id']; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                                                    <input type="hidden" name="preciopago" value="<?php echo $p->monto; ?>">
                                                    <input type="hidden" name="habitpago" value="<?php echo $habitacion->getHabitacion()->nombre; ?>">
                                                    <input type="hidden" name="foliopago" value="<?php echo $habitacion->nro_folio; ?>">
                                                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Eliminar </button>

                                                   
                                                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                                                 </div>
                                                </form>
                                              </div>
                                          </div>
                                        </div>
                
                    <?php $sumatoria=$sumatoria+$p->monto; ?>
              <?php endforeach; ?>
               </tbody>  
            </table>
        </div>
        </div>
        
    </div>
    </div>
    </div>
  </div>
  <!-- /.Modal -->





    <!-- Modal -->
    <div class="modal fade" id="otropago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Registrar ingreso extra</h3>
                </div>
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addingresop" role="form">
                <div class="modal-body">
                    <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                    <input type="hidden" name="hora" value="<?php echo $hora; ?>">

                     <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">FECHA*</label>
                        <div class="col-md-8">
                          <input type="date" name="vigencia_circulacion" disabled required class="form-control"  id="address1" placeholder="Ingrese vigencia de circulacion" value="<?php echo $hoy; ?>"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">DESCRIPCIÓN*</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="descripcion" required="" placeholder="Ingrese una descripcion"></textarea>
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">MONTO*</label>
                        <div class="col-md-8">  
                           <input type="text" name="precio" required class="form-control validanumericos"  placeholder="Ingrese precio total" >   
                        </div>
                      </div>
                      
                      <input type="hidden" name="id_tipopago" value="1">

                </div> 
                <div class="modal-footer">
                    <input type="hidden" name="id_proceso" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Guardar ingreso</button> 
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / Modal-->

    <!-- Modal -->
    <div class="modal fade" id="extender_estadia<?php echo $habitacion->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font"><b>EXTENDER ESTADÍA</b></h3>
                </div>
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addestadia" role="form">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-4 control-label">-- SELECCIONE --</label>
                        <div class="col-md-7">
                            <select class="form-control" name="fecha_hora" id="fecha_hora" onchange="MostrarHoraFecha(this.value);">
                                <option value="1">+ Noches</option>
                                <option value="2">+ Horas</option>
                            </select>
                        </div> 
                      </div>
                    

                   
                    <div id="hora_fecha">
                     <div class="form-group"> 
                        <label for="inputEmail1" class="col-lg-4 control-label">CANT NOCHES*</label>
                        <div class="col-md-7">  
                           <input type="number" name="cant_noche" id="cant_noche" required class="form-control validanumericos" placeholder="Ejem. 1 Noche"  min="1" max="20" value="1" onkeyup="sumarTOTAL();" onchange="sumarTOTAL();">   
                        </div>
                      </div>


                      <div class="form-group">
                            <label for="pr-subject" class="col-lg-4 control-label">PRECIO X NOCHE* </label>
                            <div class="col-md-7 input-group">

                             <input type="hidden" class="form-control monto validanumericos" name="precio_a" placeholder="Ingrese precio x noche" value="<?php echo $habitacion->precio; ?>" onkeyup="sumarTOTAL();" onchange="sumarTOTAL();"  >

                             <input type="hidden" class="form-control" name="habitacionn" value="<?php echo $habitacion->getHabitacion()->nombre; ?>"  >

                             <input type="hidden" class="form-control" name="foliooo" value="<?php echo $habitacion->nro_folio; ?>"  >

                              <input type="number" class="form-control monto validanumericos" name="precio" placeholder="Ingrese precio x noche" value="<?php echo $habitacion->precio; ?>" onkeyup="sumarTOTAL();" onchange="sumarTOTAL();" id="precio" readonly>
                              <span class="input-group-btn" id="resultados">
                                  <a href="#"  data-toggle="modal" data-target="#confirmarcambio" data-options="splash-2 splash-ef-11" class="tex-danger btn-xs b-0" style="color:#e05d6f;"><i class="glyphicon glyphicon-lock"></i></a>
                              </span>
                            </div>
                     </div>

                     <div class="form-group"> 
                        <label for="inputEmail1" class="col-lg-4 control-label">TOTAL A PAGAR*</label>
                        <div class="col-md-7">  
                            <span id="spTotal" style="font-size: 18px;font-weight: bold;color: #51445f;"><?php echo $habitacion->precio*1; ?></span></h2> 
                        </div>
                      </div>

                      


                    </div>
                      

                </div> 
                <div class="modal-footer">
                    <input type="hidden" name="id_proceso" value="<?php echo $_GET['id']; ?>">
                    <input type="hidden" name="fecha_salida" value="<?php echo $habitacion->fecha_salida; ?>">
                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Extender ahora </button>
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- / FIN MODAL SIN ID --> 
</div>


<!-- MODAL CANDADO -->
<div class="modal fade bs-example-modal-lg" id="confirmarcambio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> ALERTA!!!</h4>
            </div>
            
            <div class="modal-body"> 

            ¿Estás seguro de eliminar?
            <div class="row"> 
                <div class="col-md-12" style="padding-top: 20px;">
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                        <div class="col-md-8">
                          <input type="text" name="nombre" id="idnombrec" required class="form-control"  id="address1" placeholder="Ingrese nombre">
                        </div>
                      </div>

                      <div class="form-group"  style="padding-top: 40px;">
                        <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                        <div class="col-md-8">  
                           <input type="text" name="razon" id="idrazonc" required class="form-control validanumericos"  placeholder="Ingrese la razón" >   
                        </div>
                      </div>

                </div>
            </div>

             </div>
             <div class="modal-footer"> 
                

               <a href="#" onclick="agregar_errorc()" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-right"></i> Eliminar</a>

                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
             </div>
            
          </div>
      </div>
    </div>



<!-- FIN MODAL CANDADO -->

<!-- MODAL EDIT OBSERVACION -->
<div class="modal fade" id="editobservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Editar observación</h3>
                </div>
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatemotivo" role="form">
                <div class="modal-body">

                     <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">OBSERVACIÓN*</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="motivo" required="" placeholder="Ingrese una observación"><?php echo $habitacion->getCliente()->motivo; ?></textarea>
                        </div>
                      </div>

                </div> 
                <div class="modal-footer">
                    <input type="hidden" name="id_persona" value="<?php echo $habitacion->id_cliente; ?>">
                    <input type="hidden" name="id_proceso" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Guardar cambio</button> 
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>



<!-- FIN EDIT OBSERVACIÓN -->


<!-- MODAL EDIT OBSERVACION -->
<div class="modal fade" id="editpersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title custom-font">Editar cliente</h3>
                </div>
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatenombre" role="form">
                <div class="modal-body">

                     <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">NOMBRES DEL CLIENTE*</label>
                        <div class="col-md-8">
                          <textarea class="form-control" name="nombre" required="" placeholder="Cambiar cliente"><?php echo $habitacion->getCliente()->nombre; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">USUARIO*</label>
                        <div class="col-md-8">
                         <input type="text" required name="nombre_nombre" placeholder="Ingrese nombre" class="form-control">
                         <input type="hidden" name="nombre_antes" value="<?php echo $habitacion->getCliente()->nombre; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                        <div class="col-md-8">
                            <input type="text" required name="razon" placeholder="Ingrese una razon" class="form-control">
                        </div>
                      </div>

                </div> 
                <div class="modal-footer">
                    <input type="hidden" name="id_persona" value="<?php echo $habitacion->id_cliente; ?>">

                    <input type="hidden" name="habitnombre" value="<?php echo $habitacion->getHabitacion()->nombre; ?>">
                    <input type="hidden" name="folionombre" value="<?php echo $habitacion->nro_folio; ?>">

                    <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                    <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                    <input type="hidden" name="id_proceso" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Guardar cambio</button> 
                    <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>



<!-- FIN EDIT OBSERVACIÓN -->
<?php }else{
  echo "<h4 class='alert alert-success'>NECESITA SELECCIONAR UNA HABITACIÓN CON HUESPED</h4>";
}; ?>

<?php }; ?>





<script type="text/javascript">

window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
        document.forms["addsalida"].submit();
    }

function sumarTOTAL() {

  m1 = document.getElementById("precio").value;
  m2 = document.getElementById("cant_noche").value;
  r = (m1*m2);
  if(m2>20){
    alert('La cantidad de noches no puede ser mayor a 20 ');
    document.getElementById("cant_noche").value='';
  }
  
  document.getElementById('spTotal').innerHTML = r;

}


function sumar() {

  m1 = document.getElementById("descuento").value;
  m2 = document.getElementById("total_total").value;
  m3 = document.getElementById("acuenta").value;

  if (isNaN(m1)) 
  {
      alert('Esto no es un numero');
      document.getElementById('descuento').focus();
      return false;
  }
  if (m1=='') 
  {
      alert('Esto no es un numero');
      document.getElementById('descuento').focus();
      return false;
  }
  if (m1>100) 
  {
      alert('No puede superar a 100%');
      document.getElementById('descuento').focus();
      return false;
  }

  
  descuento = (parseFloat(m1)*parseFloat(m2))/100;
  r = (parseFloat(m2)-parseFloat(descuento))-m3;
  

  document.getElementById('TotalSinDesc').innerHTML = r;

 

}
 

  $(function(){

    $('.validanumericos').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode))) 
       return false;
    })
    .on("cut copy paste",function(e){
    e.preventDefault();
    });

  });

  function MostrarHoraFecha(val)
    {
        $('#hora_fecha').html("Por favor espera un momento");    
        $.ajax({
            type: "POST",
            url: 'index.php?action=hora_fecha',
            data: 'id='+val,
            success: function(resp){
                $('#hora_fecha').html(resp);
            }
        });
    };


    function agregar_error()
    {
      var nombre=$('#idnombre').val();
      var razon=$('#idrazon').val();
      //Inicia validacion
      if (nombre=="") 
      {
      alert('Ingrese nombre');
      document.getElementById('idnombre').focus();
      return false;
      }
      if (razon=="") 
      {
      alert('Ingrese razon');
      document.getElementById('idrazon').focus();
      return false;
      }
      
      //Fin validacion
    var parametros={"nombre":nombre,"razon":razon}; 
    $.ajax({
        type: "POST",
        url: "./?action=agregar_error", 
        data: parametros,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
          var emailInput = document.getElementById('precio');
          emailInput.readOnly = false;
          
        $("#resultados").html(datos);

    }
      });
    }


    function agregar_errorc()
    {
      var nombre=$('#idnombrec').val();
      var razon=$('#idrazonc').val();
      //Inicia validacion
      if (nombre=="") 
      {
      alert('Ingrese nombre');
      document.getElementById('idnombre').focus();
      return false;
      }
      if (razon=="") 
      {
      alert('Ingrese razon');
      document.getElementById('idrazon').focus();
      return false;
      }
      
      //Fin validacion
    var parametros={"nombre":nombre,"razon":razon}; 
    $.ajax({
        type: "POST",
        url: "./?action=agregar_errorc", 
        data: parametros,
     beforeSend: function(objeto){
      $("#resultados").html("Mensaje: Cargando...");
      },
        success: function(datos){
          var emailInput = document.getElementById('precio');
          emailInput.readOnly = false;
          
        $("#resultados").html(datos);

    }
      });
    }


    function CargarMediopago(val)
{
    
    $('#mostrar_mediopago').html("Por favor espera un momento");    
    $.ajax({
        type: "POST",
        url: 'index.php?action=banco',
        data: 'id='+val,
        success: function(resp){ 
            $('#mostrar_mediopago').html(resp);
        }
    });
};
</script>






