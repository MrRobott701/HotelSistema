  <?php 
     date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");
 
             $u=null;
                $u = UserData::getById(Session::getUID());
                $usuario = $u->is_admin;
                $id_usuario = $u->id;

   $hora = date("H:i:s");
  $fecha_completo = date("Y-m-d H:i:s");   
             
  ?>
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
      
        <li class="active">REGISTRO DE TRANSFERENCIAS</li>
    </ol>
</section> 
</div> 

<?php if(isset($_GET['start']) and isset($_GET['end']) and $_GET['end']!="" ){ 
                $start=$_GET['start']; $end=$_GET['end'];  }else{
                $start=$hoy; $end=$hoy;
                } 
  $total_nuevo=0;
 ?>

              <?php $procesos = PagoProcesoData::getIngresoRangoFechasTotal($start,$end); ?>

              <?php if(@count($procesos)>0){  ?>
               
                  <?php foreach($procesos as $reportediario1):?>
                          <?php  $total_nuevo=$reportediario1->monto+$total_nuevo; ?>

                  <?php endforeach; ?>

               <?php }else{  }; ?>


 
<div class="row">
     <div class="col-sm-12 col-md-12">
      <form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-3">
              <input type="hidden" name="view" value="registro_transf">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i> Desde </span>
                <input type="date" name="start" placeholder="" class="form-control input-sm" style="" value="<?php  if(isset($_GET['start']) and isset($_GET['end']) and $_GET['end']!="" ){  echo $_GET['start'];  }else{echo $hoy; }  ?>"> 
                 
               </div>
            </div>
            <div class="col-sm-3">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i> Hasta </span>
                <input type="date"  name="end" placeholder="" class="form-control input-sm" style="" value="<?php  if(isset($_GET['start']) and isset($_GET['end']) and $_GET['end']!="" ){  echo $_GET['end'];  }else{echo $hoy; }  ?>"> 
               </div>
            </div>
            <div class="col-sm-2">
              <button  id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
              <i class="fa fa-search"></i> Consultar</button>
            </div>
            <div class="col-sm-3">
              <div class="input-group" style="border: 2px solid #5cb85c;">
                <span class="input-group-addon"><i class="fa fa-dollar"></i> Monto total: </span>
                <input type="input"  name="total" class="form-control input-sm" value="<?php echo $total_nuevo;  ?>"> 
               </div>
            </div>
           
           
          </div>
        </div>
        </form>
        </div>
    </div>


 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h2 class="custom-font"><strong>REGISTRO DE TRANSFERENCIAS</strong> </h2>
        <ul class="controls">
          
         
          <li class="dropdown">
            <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
            <i class="fa fa-cog"></i><i class="fa fa-spinner fa-spin"></i>
            </a>
            <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                <li>
                  <a role="button" tabindex="0" class="tile-toggle">
                  <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                  <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-refresh">
                    <i class="fa fa-refresh"></i> Refresh
                  </a>
                </li>
                <li>
                  <a role="button" tabindex="0" class="tile-fullscreen">
                  <i class="fa fa-expand"></i> Fullscreen
                  </a>
                </li>
            </ul>
          </li>
          <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">  
   
              <?php if(isset($_GET['start']) and isset($_GET['end']) and $_GET['end']!="" ){ 
                $start=$_GET['start']; $end=$_GET['end'];  }else{
                $start=$hoy; $end=$hoy;
                } ?>

              <?php $procesos = PagoProcesoData::getAllDepositFechas($start,$end); ?>

              <?php   
                if(@count($procesos)>0){
                  // si hay procesos
                  ?>
                  <form method="post" action="index.php?view=updatetransf">
                  <div class="table-responsive">
                    <div class="col-md-8   col-md-offset-4">
                      <div class="input-group" style="">
                        <span class="input-group-addon"> Operación &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" name="operacion" class="form-control" style="width: 200px;" placeholder="OPERACIÓN" value="">&nbsp;&nbsp;
                        <input type="submit" name="submit" value="COMBINAR" class="btn btn-success btn-sm" />
                      </div>
                    </div>

                  <table class="table table-custom" id="editable-usage" style="font-size: 11px;">

                  <thead >
                    <th></th>
                    <th>Usuario</th>
                    <th>Habitación</th>
                    <th>Fecha pago</th>
                    <th>Descripción</th>
                    <th>Hotel</th>
                        
                    <th>Alimentación</th>
                    <th>Valor</th> 
                    <th>Operación</th> 
                    <th>Banco</th>  
                        
                  </thead>
                  
                  <tbody>
                  
                  <?php
                  

                  $fechaInicio=strtotime($start);
                  $fechaFin=strtotime($end);
                  for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){ ?>

                    <tr style="background-color: #51445f;color: white; font-size: 14px;">
                            <td><input type="hidden"  value="<?php echo $i; ?>"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>FECHA:</td>
                            <td><?php echo date("Y-m-d", $i); $fecha=date("Y-m-d", $i); ?></td>
                            <td></td>
                            <td></td>
                            <td></td>

                    </tr>

                    <?php foreach($procesos as $reportediario):?>  

                      <?php 
                      $totall=0;
                      $procesos1 = PagoProcesoData::getAllpera($reportediario->operacion,$fecha); ?>
                      <?php if(@count($procesos1)>0){ ?>
                       <?php foreach($procesos1 as $reportediario1):?>

                          
                          <tr> 
                            <td><input type="checkbox" name="id[]" value="<?php echo $reportediario1->id; ?>"></td>
                            <td><?php echo $reportediario1->getProceso()->getUsuario()->name; ?></td>
                            <td><?php echo $reportediario1->getProceso()->getHabitacion()->nombre; ?></td>
                            <td><?php echo $reportediario1->fecha_creada; ?></td>
                            <td><?php echo $reportediario1->aval; ?></td>
                            <td><input type="text" name="hotel<?php echo $reportediario1->id; ?>" value="<?php echo $reportediario1->mbanco; ?>"></td>
                            <td><input type="text" name="alimentacion<?php echo $reportediario1->id; ?>" value="<?php echo $reportediario1->malimentacion; ?>"></td>
                            <input type="hidden" name="monto<?php echo $reportediario1->id; ?>" value="<?php echo $reportediario1->monto; ?>">
                            <input type="hidden" name="banco<?php echo $reportediario1->id; ?>" value="<?php echo $reportediario1->banco; ?>">
                            <input type="hidden" name="fecha<?php echo $reportediario1->id; ?>" value="<?php echo date("Y-m-d", strtotime($reportediario1->fecha_creada)); ?>">
                            <td><?php if(($reportediario1->mbanco+$reportediario1->malimentacion)!=$reportediario1->monto){ echo "<i class='fa fa-close' style='color:red;'></i>  ";} echo $reportediario1->monto; $totall=$reportediario1->monto+$totall; ?></td>
                            <td></td>
                            <td></td>

                         </tr>
                       
 
                        <?php endforeach; ?>


                         <tr style="background-color: #16a085;color: white;">
                            <td><input type="hidden"  value="<?php echo $reportediario->id; ?>"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>TOTAL DEPÓSITO:</td>
                            <td><?php echo $totall; ?></td>
                            <td><input type="text" value="<?php if($reportediario->operacion!=$reportediario->id){ echo $reportediario->operacion;} ?>" style="color:red;"></td>
                            <td><?php echo $reportediario->banco; ?></td>

                         </tr>
                         <?php }; ?>
                   <?php endforeach; ?>

                  <?php    
                  }
                  ?>

                   
                     
                    
                    
                    
                    </tbody>

                    
                    
                  </table>
                </div>
                     
                </form>
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
                "pageLength": 50,
               
            });

        </script>

        <!--/ Page Specific Scripts -->



