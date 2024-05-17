  <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">



<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Lista de deudores</a></li>
    </ol>
</section> 
</div> 

 <!-- row -->  
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE DEUDORES</strong></h1>
        <ul class="controls">
          
          
         
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        
        <?php 
          $procesos = ProcesoData::getProcesoDeudor();  
        ?>
        <?php   
        if(@count($procesos)>0){  ?>
        <div class="table-responsive">
        <table class="table table-custom" id="editable-usage" style="font-size: 11px;">
            <thead >
                <tr>
                  <th>Folio</th> 
                  <th>Habitación</th> 
                  <th>Nombre</th>
                  <th data-hide="phone">Monto</th>
                  <th data-hide='phone, tablet'>Fecha inicio</th>
                  <th data-hide='phone, tablet'>Fecha fin</th>
                  <th data-hide='phone, tablet'>Usuario</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php foreach($procesos as $proceso):?> 


                                  <?php $sumatoria_s=0; $pagado_suma=0; ?>
                                  <?php $tmps = PagoProcesoData::getAllProcesoExtender($proceso->id); 
                                  foreach($tmps as $p):  ?>
                                        
                                        <?php $sumatoria_s+=($p->total*$p->cantidad); ?>
                                        <?php $pagado_suma+=$p->monto; ?>
                                  <?php endforeach; ?>

                                  <?php $total_s=$sumatoria_s; ?>


                                  <?php 
                                    $total=0;
                                    $producto_pagado=0;
                                    $productos = ProcesoVentaData::getByAll($proceso->id);
                                    if(count($productos)>0){ 
                                        foreach($productos as $producto):?>
                                        
                                        <?php 
                                        if($producto->fecha_creada!=NULL and $producto->fecha_creada!='0000-00-00 00:00:00'){ 
                                             $producto_pagado+=$producto->precio*$producto->cantidad;
                                        }else{ $producto_pagado+=0; }
                                        ?>
                                       
                                        <?php $total=($producto->cantidad*$producto->precio)+$total; 
                                        endforeach; 
                                     }; 
                                ?>    



                                <?php 
                                $total_extra=0;
                                $gastos = GastoData::getAllIngresoProceso($proceso->id);  
                                if(@count($gastos)>0){
                                foreach($gastos as $gasto):
                                $total_extra+=$gasto->precio;
                                endforeach; }
                                ?>


                                <?php 
                                 $sumatoria_pagado=0; 
                                 $tmps_p = PagoProcesoData::getAllProceso($proceso->id); 
                                    foreach($tmps_p as $p_p):  
                                     $sumatoria_pagado+=$p_p->monto; 
                                    endforeach; 
                                ?>


                                 <?php $total_total=$total_extra+$total+$total_s; ?>

                                    <?php $deuda=$total_total-($sumatoria_pagado+$producto_pagado); ?>

                                    <?php $pagadooo=$total_total-$deuda; ?>

                                   
                    <?php if($pagadooo<$total_total){ ?> 
                      <tr>
                        <td><?php echo $proceso->nro_folio; ?></td>
                        <td><?php echo $proceso->getHabitacion()->nombre; ?></td>
                        <td><?php echo $proceso->getCliente()->nombre; ?></td>
                        <td><b> $ <?php echo $total_total-$pagadooo; ?></b></td>
                        <td><?php echo $proceso->fecha_entrada; ?></td>
                        <td><?php echo $proceso->fecha_salida; ?></td>
                        <td><?php echo $proceso->getUsuario()->name; ?></td>
                       
                      </tr>
                    <?php }; ?>  

                    <?php endforeach; ?>
                    </tbody>
                      
                  </table>
                </div>

               <?php }else{ echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";}; ?>



                                </div>
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->
                    </div>
                    <!-- /row -->





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



