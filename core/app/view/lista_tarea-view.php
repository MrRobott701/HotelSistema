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
      <li><a href="index.php?view=cliebte"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Limpieza</a></li>
      <li class="active">Registro Lista tareas</li>
    </ol>
</section> 
</div> 

<?php 
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
?>
<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">

             <div class="tile-header dvd dvd-btm">  
                <h1 class="custom-font"><strong>REGISTRO DE LISTA TAREAS</strong></h1>
                
              </div>



              <?php 
              
              $libros = LibroLimpiezaData::getAllHoy($hoy); 
              
              if(@count($libros)>0){   ?>
                  <div class="table-responsive">

                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;margin: : 10px;">

                  <thead >
                        <th>NOMBRE</th> 
                        <th>HABITACION</th>
                        <th>FECHA Y HORA INICIO</th>
                        <th>FECHA Y HORA TERMINO</th>
                  </thead>
                   <?php foreach($libros as $libro):?>
                      <tr>
                        <td><?php echo $libro->getUsuario()->name; ?></td>
                        <td><?php echo $libro->getHabitacion()->nombre; ?></td>
                        <td><?php echo $libro->fecha; ?></td>
                        <td><?php echo $libro->fecha; ?></td>

                      </tr> 
                    
                    <?php endforeach; ?>
                     
                  </table>
                </div>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

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
