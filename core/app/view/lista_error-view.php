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
      <li class="active"><a href="#">Lista de errores</a></li>
    </ol>
</section> 
</div> 

 <!-- row -->  
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>LISTA DE CORRECCIONES</strong></h1>
        <ul class="controls">
          
          
         
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        
        <?php if(isset($_GET['buscar']) and $_GET['buscar']!=""){
          $clientes = ErrorData::getLike($_GET['buscar']);
        }else{
          $clientes = ErrorData::getAll();  
        } ?>
        <?php   
        if(@count($clientes)>0){  ?>
        <div class="table-responsive">
        <table class="table table-custom" id="editable-usage" style="font-size: 18px;">
            <thead >
                <tr>
                  <th>Nº</th> 
                  <th>NOMBRE</th> 
                  <th>ACCIÓN</th>
                  <th data-hide="phone">RAZÓN</th>
                  <th data-hide='phone, tablet'>FECHA</th>
                  <th data-hide='phone, tablet'>HORA</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php foreach($clientes as $cliente):?> 
                      <tr>
                        <td><?php echo $cliente->id; ?></td>
                        <td><?php echo $cliente->nombre; ?></td>
                        <td><b><?php echo $cliente->accion; ?></b></td>
                        <td><?php echo $cliente->razon; ?></td>
                        <td><?php echo $cliente->fecha; ?></td>
                        <td><?php echo $cliente->hora; ?></td>
                       
                      </tr> 

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
           "order": [],
          "columnDefs": [ {
            "targets"  : 'no-sort',
            "orderable": false,
          }]
               
            });

        </script>

        <!--/ Page Specific Scripts -->







<style type="text/css">
 

div.hijo1 {
    width: 50px;
    height: 50px;
    float: right;
    border-bottom-left-radius: 130px;
    background-color: #f5f22a;
  }


</style>