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
      <li class="active"><a href="index.php?view=historial_ma">Historial mantenimiento</a></li>
    </ol>
</section> 
</div> 

 <!-- row -->  
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>HISTORIAL DE MANTENIMIENTO</strong></h1>
        <ul class="controls">
          
          
          
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        
        <?php 
          $historiales = HistorialMantenimientoData::getAll();  
           
        if(@count($historiales)>0){  ?>
        <div class="table-responsive">
        <table class="table table-custom" id="editable-usage" style="font-size: 20px;">
            <thead >
                <tr>
                  <th>Fecha</th> 
                  <th>Habitación</th> 
                  <th>Detalle</th>
                  <th data-hide="phone">Costo</th>
                  <th data-hide='phone, tablet'>Estado</th> 
                  <th data-hide='phone, tablet'></th> 

                </tr>
              </thead>
              <tbody>
                 <?php foreach($historiales as $historial):?>
                      <tr>
                        <td><?php echo $historial->fecha; ?></td>
                        <td><b><?php echo $historial->getHabitacion()->nombre; ?></b></td>
                        <td><?php echo $historial->detalle; ?></td>
                        <td><?php echo $historial->costo; ?></td>
                        <td><?php if($historial->fecha_fin!='' and $historial->fecha_fin!='NULL'){ echo "Finalizado"; }else{echo "Pendiente"; } ?>
                          
                        </td>
                 
<td>
  <?php if ($historial->fecha_fin != '' && $historial->fecha_fin != 'NULL'): ?>
    <a href="" data-toggle="modal" data-target="#myModalDel<?php echo $historial->id; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar Registro</a>
<?php else: ?>
    <a href="index.php?view=habitacion" class="btn btn-warning btn-xs"> Mantenimiento en Curso</a>
<?php endif; ?>
</td>
</tr>  

<div class="modal fade bs-example-modal-xm" id="myModalDel<?php echo $historial->id; ?>" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-danger">
        <div class="modal-dialog">
            <div class="modal-content">              
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> ¿ESTÁS SEGURO DE ELIMINAR? </h4>
                </div>
                <div class="modal-body" style="background-color:#fff !important;">             
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <b> Puede afectar a algunos registros</b>                     
                                </div>
                            </div>           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                    <!-- Aquí está el cambio -->
                    <button type="button" onclick="eliminarRegistro(<?php echo $historial->id; ?>);" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar de todos modos</button>              
                </div>   
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>

<!-- Añade este script en alguna parte de tu archivo -->
<script>
    function eliminarRegistro(id) {
        // Redireccionar a la página después de eliminar
        window.location.href = "index.php?view=delhistorial&id=" + id;
        
        // Esperar un breve momento (por si la redirección anterior tarda un poco) y luego redirigir a la siguiente página
        setTimeout(function() {
            window.location.href = "index.php?view=historial_ma";
        }, 100); // Aquí puedes ajustar el tiempo de espera si es necesario. Por ejemplo, 1000 es 1 segundo.
    }

</script>






                    <?php endforeach; ?>
                    </tbody>
                      
                  </table>
                </div>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>



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



