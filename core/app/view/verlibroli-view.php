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
      <li><a href="#">Punto de venta</a></li>
      <li class="active">Productos</li>
    </ol>
</section> 
</div> 
<?php 
date_default_timezone_set('America/Tijuana');
$hoy = $_GET['fecha']; 
$hora = date("H:i:s");
?>

<!-- row --> 
<div class="row">
  <!-- col --> 

 

  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>LIBRO DE LIMPIEZA</strong>  </h1>
                
      </div>
      <div class="table-responsive">
          <table class="table table-custom"  style="font-size: 11px; border: 1px solid;">

            <thead style="background-color: #dbdbdb; ">
              <td style="border: 1px solid; width: 80px !important;">TIEMPO</td>
              <?php $users = UserData::getLimpieza();  ?>
              <?php $tiempos = TiempoData::getAll();  
              if(@count($users)>0){ ?>
                <?php foreach($users as $user):?>
                  <td style="border: 1px solid;"><?php echo $user->name; ?></td>
                  <td style="border: 1px solid;">TIPO</td>
              <?php endforeach; }; ?>
            </thead>
             <?php foreach($tiempos as $tiempo):?>
                <tr>
                  <?php $dhab=""; $dtipo=""; $destado="0"; ?>
                  <td style="border: 1px solid;"><?php echo $tiempo->nombre; ?></td>
                  <?php foreach($users as $user):?>

                      
                      <?php $asignaciones = LibroLimpiezaData::getAllHoy($hoy);  
                      if(@count($asignaciones)>0){ ?>
                      <?php foreach($asignaciones as $asignacion):?>
                          <?php if($asignacion->id_tiempo==$tiempo->id && $asignacion->id_usuario==$user->id){
                            $dhab=$asignacion->getHabitacion()->nombre; $dtipo=$asignacion->tipo; $destado=$asignacion->estado; break;
                          ?>
                        <?php  }else{ $dhab=""; $dtipo=""; $destado="0"; } ?>

                      <?php  endforeach; }  ?>

                      <?php if($destado=='2'){ ?>
                        <td style="background-color: #57a8ee;"><input type="text" value="<?php echo $dhab; ?>" style="width: 40px; width: 40px;background-color: #57a8ee;color: white;border-color: #57a8ee;" disabled>
                          <input type="hidden" name="id_habitacion[]" value="<?php echo $dhab; ?>" id="id_habitacion<?php echo $user->id; ?>" >
                        </td>
                      <?php }else{ ?>
                        <td><input type="text" name="id_habitacion[]" value="<?php echo $dhab; ?>" id="id_habitacion<?php echo $user->id; ?>" style="width: 40px;" disabled></td>
                      <?php }; ?>

                      <input type="hidden" name="estado[]" value="<?php echo $destado; ?>" id="estado<?php echo $user->id; ?>" style="width: 40px;" >

                      <td><input type="text" name="tipo[]" value="<?php echo $dtipo; ?>" id="tipo<?php echo $user->id; ?>" style="width: 40px;" disabled></td>
                          <input type="hidden" name="fecha[]" value="<?php echo $hoy; ?>" id="<?php echo $user->id; ?>" >
                          <input type="hidden" name="id_usuario[]" value="<?php echo $user->id; ?>" id="<?php echo $user->id; ?>">
                          <input type="hidden" name="id_tiempo[]" value="<?php echo $tiempo->id; ?>" id="<?php echo $user->id; ?>">
                  <?php endforeach; ?> 
                </tr>
            <?php endforeach; ?>
                
                <tfoot>
                  
                    <td>LLAVES LIMPIADAS</td>
                    <?php if(@count($users)>0){ ?>
                      <?php foreach($users as $user):?>

                        <?php $limpiadas = LibroLimpiezaData::getAllHoyUserCompleto($hoy,$user->id);  
                        if(@count($limpiadas)>0){ $total=@count($limpiadas); }else{ $total=0;};?>

                        <td style="border: 1px solid;"><b style="font-size: 20px;"><?php echo $total; ?></b></td>
                        <td style="border: 1px solid;"></td>
                    <?php endforeach; }; ?>
                  
                </tfoot>

                     
          </table>        
                        <?php $ltotal = LibroLimpiezaData::getAllHoyCompleto($hoy);  
                        if(@count($ltotal)>0){ $total1=@count($ltotal); }else{ $total1=0;};?>
                          <section class="tile bg-default widget-appointments" style="text-align: right;">
                            <div class="tile-body" style="padding: 6px;">
                              
                              <span style="font-size: 22px; font-weight: bold;">TOTAL DE LLAVES: <?php echo $total1; ?></span>
                              </a>
                            </div>
                           </section>

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
