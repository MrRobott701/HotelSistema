
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
      <li><a href="javascript:;">Inventario</a></li>
      <li class="active"><a href="#">BASE DE DATOS</a></li>
    </ol>
</section> 

</div> 




<div id="reload-full-div">
	
	 


<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">

             <div class="tile-header dvd dvd-btm">  
                <h1 class="custom-font"><strong>BASE DE DATOS DE INVENTARIO</strong>  </h1>



              </div>


           <div class="tile-body">

              <?php $productos = ProductoData::getAllKiosko();
                if(@count($productos)>0){ 
                  // si hay usuarios
                  ?>
                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead >
                        <th>Nro</th> 
                        <th>PRODUCTO</th>

                        <th>MARCA</th>
                        <th>DETALLES</th>
                        
                        
                        <th>PRECIO COMPRA</th>
                        <th>PRECIO VENTA</th>
                        
                        
                  </thead>
                   <?php foreach($productos as $producto):?>
                      <tr>

                       

                        <td><?php echo $producto->codigo; ?></td>
                        <td><?php echo $producto->nombre; ?></td>

                        <td><?php if($producto->marca!="NULL"){ echo $producto->marca;}else{ echo "------"; } ?></td>
                        <td><?php if($producto->descripcion!="NULL"){ echo $producto->descripcion;}else{ echo "------"; } ?></td>
                        
                        <td>$   <?php echo number_format($producto->precio_compra,2,'.',','); ?></td>
                        <td>$   <?php echo number_format($producto->precio_venta,2,'.',','); ?></td>
                        
                        
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