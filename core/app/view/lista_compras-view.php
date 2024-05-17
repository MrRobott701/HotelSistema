
<?php 
     date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");
     $hora = date("H:i:s");
                    
?>



<div class="row">

 <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li><a href="#">Punto de venta</a></li>
        <li class="active">Lista de ingresos de mercadería</li>
      </ol>
</section>
</div>




<section>

<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">

             <div class="tile-header dvd dvd-btm">  
                <h1 class="custom-font"><strong>Lista de ingresos de mercadería </strong>  </h1>
                
              </div>


           <div class="tile-body">

              
                <?php 
                  $compras = VentaData::getAllCompras(); 
               ?> 
                <?php  
                if(@count($compras)>0){  ?>
                  <div class="table-responsive">
                 <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
         
                      
                        <th >Fecha</th>
                        <th>Proveedor</th>
                       
                    
                        <th></th>
                  </thead> 
                   <?php foreach($compras as $compra):?> 
                      <tr> 
           
                        
                        <td><?php echo $compra->fecha_creada; ?></td>
                        <td><?php if($compra->id_proveedor!=NULL){ echo $compra->getProveedor()->razon_social;}else{ echo "--------";} ?></td>

                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $compra->id; ?>"  class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver detalles</a>

      <div class="modal fade bs-example-modal-lg" id="myModal<?php echo $compra->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
          
            <div class="modal-content">
               
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">DETALLES COMPRA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                      <table id="tbldetalle" class="table table-xxs">
                        <thead>
                          <tr class="bg-blue" style="background-color: #e1e1e1 !important;">
                            <th colspan="6"><b style="color: #464646;">INGRESO DE NUEVO MERCADERÍA</b></th>
                            
                            
                          </tr>
                        </thead> 

                        <?php $detalles = ProcesoVentaData::getByAllCompra($compra->id); 
                        $sumador_total=0; 
                          foreach($detalles as $detalle): 
                             $sumar_t=$detalle->cantidad*$detalle->precio;
                             $sumador_total+=$sumar_t;
                          endforeach; 
                                      
                        ?>
                        <tbody > 
                          <tr class="bg-blue" style="background-color: #e1e1e1 !important;">
                            <th><b style="color: #464646;">TOTAL:</b></th>
                            <th style="background-color: #5e5e5e;"><?PHP echo '$   '.number_format($sumador_total,2,'.',',');  ?></th>
                            <th><b style="color: #464646;">PROVEEDOR:</b></th>
                            <th class="text-center" style="background-color: #5e5e5e;"><?php if($compra->id_proveedor!=NULL){ echo $compra->getProveedor()->razon_social;}else{ echo "--------";} ?></th>
                            <th class="text-center"><b style="color: #464646;">FOTO BOLETA:</b></th>
                            <th class="text-center" style="background-color: #5e5e5e;">

                              <?php if($compra->imagen!=""):?>
                                <a href=""  data-toggle="modal" data-target="#imagen<?php echo $compra->id; ?>"  class="btn btn-success btn-xs">
                                <img src="img/boleta/<?php echo $compra->imagen;?>" style="width:94px;">
                                </a>
                              <?php endif;?>
                          </th>
                            
                          </tr>
                        </tbody>
                        
                      </table>
                      <table id="tbldetalle" class="table table-xxs" style="margin-top: 30px !important;">
                                <thead>
                                  <tr class="bg-blue">
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Detalles</th>
                                    <th>Cant.</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Importe</th> 
                                   
                                    
                                  </tr>
                                </thead> 
                                <tbody >
                                <?php $detalles = ProcesoVentaData::getByAllCompra($compra->id); ?>
                                    <?php $sumador_total=0; ?>
                                  <?php foreach($detalles as $detalle): ?>
                                  <tr> 
                                          <td></td>
                                          <td><?php if($detalle->id_producto!=null){echo $detalle->getProducto()->nombre;}else{ echo "<center>----</center>"; }  ?></td>
                                           <td><?php if($detalle->id_producto!=null){echo $detalle->getProducto()->marca;}else{ echo "<center>----</center>"; }  ?></td>
                                            <td><?php if($detalle->id_producto!=null){echo $detalle->getProducto()->descripcion;}else{ echo "<center>----</center>"; }  ?></td>
                                          <td><?php echo $detalle->cantidad; ?></td>
                                          <td>$   <?php echo number_format($detalle->precio,2,'.',','); ?></td>
                                          <?php $sumar_t=$detalle->cantidad*$detalle->precio; ?>
                                          <td>$   <?php echo number_format($sumar_t,2,'.',','); ?></td>
                                  
                                   
                                    
                                     </tr>
                                      
                                    
                                  
                                          
                                  <?php
                                  $sumador_total+=$sumar_t;
                                endforeach ?>
                                      <tr style="background-color: #f3f3f3;">
                                          <td colspan=6><span class="pull-right">SUBTOTAL </span></td>
                                          <td><span class="pull-left"><?php echo '$  '.number_format(($sumador_total/1.18),2,'.',',');?></span></td>
                                      
                                      </tr>
                                      <tr style="background-color: #f3f3f3;">
                                          <td colspan=6><span class="pull-right">IVA </span></td>
                                          <td><span class="pull-left"><?php echo '$   '.number_format($sumador_total-($sumador_total/1.18),2,'.',',');?></span></td>
                                         
                                      </tr>
                                      <tr style="background-color: #e4e4e4;">
                                          <td colspan=6><span class="pull-right">TOTAL </span></td>
                                          <td><span class="pull-left"><?php echo '$   '.number_format($sumador_total,2,'.',',');?></span></td>
                                          
                                      </tr>
                                </tbody>
                                
                              </table>
                  
                 
                  
                </div>
                </div>

              </div>
          
            
            </div>
            <!-- /.modal-content -->
         
        </div>
        <!-- /.modal -->
      </div>


                        <div class="modal fade bs-example-modal-lg" id="imagen<?php echo $compra->id; ?>" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg">
                              
                                <div class="modal-content">
                                   

                                  <div class="modal-body" style="background-color:#fff !important;">
                                    
                                    <div class="row">
                                    <div class="col-md-offset-2 col-md-8">

                                      <?php if($compra->imagen!=""):?>
                                        <img src="img/boleta/<?php echo $compra->imagen;?>" style="width:100%;">
                                      <?php endif;?>
                                      
                                     
                                      
                                    </div>
                                    </div>

                                  </div>
                              
                                
                                </div>
                                <!-- /.modal-content -->
                             
                            </div>
                            <!-- /.modal -->
                          </div>
                              

                        </td>
                      </tr> 
                  

   
                    <?php endforeach; ?>
                    </tbody>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="7" class="text-center">
                            <ul class="pagination"></ul>
                          </td>
                        </tr>
                      </tfoot>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
          
        
          </div>

 
</div>

</section>
</div>
</div>


  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script>
          
            var table = $('#editable-usage').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
               
            });

        </script>

        <!--/ Page Specific Scripts -->
