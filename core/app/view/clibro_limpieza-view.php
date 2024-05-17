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
      <li><a href="#">LIBRO</a></li>
      <li class="active">Limpieza</li>
    </ol>
</section> 
</div> 
<?php 
error_reporting(0);
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
?>

<!-- row --> 
<div class="row">
  <!-- col --> 

  <div class="col-md-2">
      <section class="tile">
        <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong>Lista de Habitaciones Ocupadas</strong>  </h1>
                  
        </div>
        <div class="tile-body">
          <div class="row">
<?php
$habitaciones = HabitacionData::getLimpieza();
$totalHabitaciones = 0;

if (count($habitaciones) > 0) :
    foreach ($habitaciones as $habitacion) :
        ?>
        <div class="col-lg-6 col-xs-12">
            <section class="tile bg-danger widget-appointments">
                <div class="tile-body" style="padding: 1px;">
                    <h6 style="text-align: center;"><?php echo $habitacion->nombre; ?></h6>
                </div>
                <!-- /tile body -->
            </section>
        </div>
        <?php
        $totalHabitaciones++;
    endforeach;
endif;
?>

<div>
</div>
</div>
 
    <h4><strong>Habitaciones: <?php echo $totalHabitaciones; ?></strong></h4>
</div>
  <!--------------RESERVACIONES--------------------------->        
  <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong>Habitaciones por Llegar</strong>  </h1>
                  
        </div>
        <div class="tile-body">
          <div class="row">
          <?php
$habitaciones = HabitacionData::getCheckin();
$totalHabitaciones = 0;

if (count($habitaciones) > 0) :
    foreach ($habitaciones as $habitacion) :
        ?>
        <div class="col-lg-6 col-xs-12">
            <section class="tile bg-danger widget-appointments">
                <div class="tile-body" style="padding: 1px;">
                    <h6 style="text-align: center;"><?php echo $habitacion->nombre; ?></h6>
                </div>
                <!-- /tile body -->
            </section>
        </div>
        <?php
        $totalHabitaciones++;
    endforeach;
endif;
?>

<div>
</div>
</div>
 
    <h4><strong>Habitaciones: <?php echo $totalHabitaciones; ?></strong></h4>
</div>
<!----------------------------------------------->
      </section>
       
  </div> 
  <form action="index.php?view=addasignacion1" method="post" id='form1' name='form1'>
  <div class="col-md-8">


    <div class="modal fade bs-example-modal-xm" id="eliminar" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        
                      </div> 
                    
                      <div class="modal-body" style="background-color:#5ea4a8 !important;">
                        
                        <center><h3 style="color:red;"><b>¿ESTAS SEGURO?</b></h3></center>

                        <div class="row"> 
                                                        <div class="col-md-12" style="padding-top: 20px;">
                                                                  <div class="form-group">
                                                                    <label for="inputEmail1" class="col-lg-3 control-label">NOMBRE*</label>
                                                                    <div class="col-md-8">
                                                                      <input type="text" name="nombre"  class="form-control"  id="address1" placeholder="Ingrese nombre">
                                                                    </div>
                                                                  </div>

                                                                  <div class="form-group"  style="padding-top: 40px;">
                                                                    <label for="inputEmail1" class="col-lg-3 control-label">RAZÓN*</label>
                                                                    <div class="col-md-8">  
                                                                       <input type="text" name="razon"  class="form-control validanumericos"  placeholder="Ingrese la razón" >   
                                                                    </div>
                                                                  </div>

                                                            </div>
                                                        </div>


                      </div> 
              
                      <div class="modal-footer"> 

                      <input type="hidden" name="accion" value="Eliminó asignacion de una habitacion en limpieza">
                      <input type="hidden" name="fecha1" value="<?php echo $hoy; ?>">
                      <input type="hidden" name="hora1" value="<?php echo $hora; ?>">
                      <button type="submit"  class="btn btn-outline btn-success pull-right" id="finalizar1" name="finalizar1" ><i class="fa fa-arrow-right"></i> SI </button>

                      <a  data-dismiss="modal"  class="close btn btn-outline btn-danger pull-left">NO</a>

                       
                      </div>
                     
                   
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>

              
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>LIBRO DE LIMPIEZA</strong>  </h1>
                
      </div>
      <div class="table-responsive">
          <table class="table table-custom"  style="font-size: 11px; border: 1px solid;">

            <thead style="background-color: #dbdbdb; ">
              <td style="border: 1px solid; width: 80px !important;">TIEMPO</td>


                    <?php 
                    $numero=0;
                    $user1=0; $user2=0; $user3=0; $user4=0;
                    $asignaciones = LibroLimpiezaData::getAllHoyUserrr($hoy);  
                      if(@count($asignaciones)>0){ ?>
                      <?php foreach($asignaciones as $asignacion):
                        $numero=$numero+1;
                        if($numero=='1'){
                          $user1=$asignacion->id_usuario;
                    
                        }else if($numero=='2'){
                          $user2=$asignacion->id_usuario;
                 
                        }else if($numero=='3'){
                          $user3=$asignacion->id_usuario;
                      
                        }else if($numero=='4'){
                          $user4=$asignacion->id_usuario;
                         
                        }

                        
                      endforeach; } 
                    ?>

              <td style="border: 1px solid;"> 
                <select class=""   name="id_user[]" style="width: 80%">   
                        <?php $usuarios = UserData::getAll();?>
                        <option value=""></option>
                        <?php foreach($usuarios as $usuario):?>
                        <option value="<?php echo $usuario->id;?>" <?php if($user1==$usuario->id){ echo "selected";}?> ><?php echo $usuario->name;?></option>
                        <?php endforeach;?>
                </select> 
                <input type="hidden" name="id_nusuario[]" value="1"> 
              </td>
              <td style="border: 1px solid;">TIPO</td>

              <td style="border: 1px solid;"> 
                <select class=""   name="id_user[]" style="width: 80%">   
                        <?php $usuarios = UserData::getAll();?>
                        <option value=""></option>
                        <?php foreach($usuarios as $usuario):?>
                        <option value="<?php echo $usuario->id;?>" <?php if($user2==$usuario->id){ echo "selected";}?>><?php echo $usuario->name;?></option>
                        <?php endforeach;?>
                </select>  
                <input type="hidden" name="id_nusuario[]" value="2"> 
              </td>
              <td style="border: 1px solid;">TIPO</td>

              <td style="border: 1px solid;"> 
                <select class=""   name="id_user[]" style="width: 80%">   
                        <?php $usuarios = UserData::getAll();?>
                        <option value=""></option>
                        <?php foreach($usuarios as $usuario):?>
                        <option value="<?php echo $usuario->id;?>" <?php if($user3==$usuario->id){ echo "selected";}?> ><?php echo $usuario->name;?></option>
                        <?php endforeach;?>
                </select>  
                <input type="hidden" name="id_nusuario[]" value="3"> 
              </td>
              <td style="border: 1px solid;">TIPO</td>

              <td style="border: 1px solid;"> 
                <select class=""   name="id_user[]" style="width: 80%">   
                        <?php $usuarios = UserData::getAll();?>
                        <option value=""></option>
                        <?php foreach($usuarios as $usuario):?>
                        <option value="<?php echo $usuario->id;?>" <?php if($user4==$usuario->id){ echo "selected";}?> ><?php echo $usuario->name;?></option>
                        <?php endforeach;?>
                </select>  
                <input type="hidden" name="id_nusuario[]" value="4"> 
              </td>
              <td style="border: 1px solid;">TIPO</td>

              <?php $users = UserData::getLimpieza();  ?> 
              <?php $tiempos = TiempoData::getAll();   ?>
             
            </thead>
             <?php foreach($tiempos as $tiempo):?>
                <tr>
                  <?php $dhab1=""; $dhab2=""; $dhab3=""; $dhab4=""; 
                        $dtipo1=""; $dtipo2=""; $dtipo3=""; $dtipo4=""; 
                        $destado1="0"; $destado2="0"; $destado3="0"; $destado4="0"; 
                  ?>
                  <td style="border: 1px solid;"><?php echo $tiempo->nombre; ?></td>


                    <?php $asignaciones = LibroLimpiezaData::getAllHoy($hoy);  
                      if(@count($asignaciones)>0){ ?>
                      <?php foreach($asignaciones as $asignacion):

                        if($asignacion->id_tiempo==$tiempo->id && $asignacion->posi=='1'){
                            $dhab1=$asignacion->getHabitacion()->nombre; $dtipo1=$asignacion->tipo; $destado1=$asignacion->estado; break;
                          
                        }else if($asignacion->id_tiempo==$tiempo->id && $asignacion->posi=='2'){
                            $dhab2=$asignacion->getHabitacion()->nombre; $dtipo2=$asignacion->tipo; $destado2=$asignacion->estado; break;
                          
                        }else if($asignacion->id_tiempo==$tiempo->id && $asignacion->posi=='3'){
                            $dhab3=$asignacion->getHabitacion()->nombre; $dtipo3=$asignacion->tipo; $destado3=$asignacion->estado; break;
                          
                        }else if($asignacion->id_tiempo==$tiempo->id && $asignacion->posi=='4'){
                            $dhab4=$asignacion->getHabitacion()->nombre; $dtipo4=$asignacion->tipo; $destado4=$asignacion->estado; break;
                          
                        }else{ $dhab=""; $dtipo=""; $destado="0"; }

                      endforeach; }  ?>



                  <?php if($destado1=='2'){ ?>
                        <td style="background-color: #57a8ee;"><input type="text" value="<?php echo $dhab1; ?>" style="width: 40px; width: 40px;background-color: #57a8ee;color: white;border-color: #57a8ee;" disabled>
                          <input type="hidden" name="id_habitacion[]" value="<?php echo $dhab1; ?>" id="id_habitacion<?php echo $user->id; ?>" >
                        </td>
                  <?php }else{ ?>
                        <td><input type="text" name="id_habitacion[]" value="<?php echo $dhab1; ?>" id="id_habitacion<?php echo $user->id; ?>" style="width: 40px;"></td>
                  <?php }; ?>
                  <input type="hidden" name="id_usuario[]" value="1">
                  <td style="border: 1px solid;">
                    <select class=""  name="tipo[]" style="width: 80%">   
                        <option value=""></option>
                        <option value="L" <?php if($dtipo1=='L'){ echo "selected";}?> >L: Limpieza</option>
                        <option value="A" <?php if($dtipo1=='A'){ echo "selected";}?>>A: Aseo</option>
                        <option value="R" <?php if($dtipo1=='R'){ echo "selected";}?>>R: Retoque</option>
                        <option value="PS" <?php if($dtipo1=='PS'){ echo "selected";}?>>PS: Pieza sucia</option>
                    </select> 
                  <input type="hidden" name="estado[]" value="<?php echo $destado1; ?>" id="estado<?php echo $user->id; ?>" style="width: 40px;">
                  </td>





                  <?php if($destado2=='2'){ ?>
                        <td style="background-color: #57a8ee;"><input type="text" value="<?php echo $dhab2; ?>" style="width: 40px; width: 40px;background-color: #57a8ee;color: white;border-color: #57a8ee;" disabled>
                          <input type="hidden" name="id_habitacion[]" value="<?php echo $dhab2; ?>" id="id_habitacion<?php echo $user->id; ?>" >
                        </td>
                  <?php }else{ ?>
                        <td><input type="text" name="id_habitacion[]" value="<?php echo $dhab2; ?>" id="id_habitacion<?php echo $user->id; ?>" style="width: 40px;"></td>
                  <?php }; ?>
                  <input type="hidden" name="id_usuario[]" value="2">
                  <td style="border: 1px solid;">
                    <select class=""  name="tipo[]" style="width: 80%">   
                        <option value=""></option>
                        <option value="L" <?php if($dtipo2=='L'){ echo "selected";}?> >L: Limpieza</option>
                        <option value="A" <?php if($dtipo2=='A'){ echo "selected";}?>>A: Aseo</option>
                        <option value="R" <?php if($dtipo2=='R'){ echo "selected";}?>>R: Retoque</option>
                        <option value="PS" <?php if($dtipo2=='PS'){ echo "selected";}?>>PS: Pieza sucia</option>
                    </select> 
                    <input type="hidden" name="estado[]" value="<?php echo $destado2; ?>" id="estado<?php echo $user->id; ?>" style="width: 40px;">
                  </td>




                  <?php if($destado3=='2'){ ?>
                        <td style="background-color: #57a8ee;"><input type="text" value="<?php echo $dhab3; ?>" style="width: 40px; width: 40px;background-color: #57a8ee;color: white;border-color: #57a8ee;" disabled>
                          <input type="hidden" name="id_habitacion[]" value="<?php echo $dhab3; ?>" id="id_habitacion<?php echo $user->id; ?>" >
                        </td>
                  <?php }else{ ?>
                        <td><input type="text" name="id_habitacion[]" value="<?php echo $dhab3; ?>" id="id_habitacion<?php echo $user->id; ?>" style="width: 40px;"></td>
                  <?php }; ?>
                  <input type="hidden" name="id_usuario[]" value="3">
                  <td style="border: 1px solid;">
                    <select class=""  name="tipo[]" style="width: 80%">   
                        <option value=""></option>
                        <option value="L" <?php if($dtipo3=='L'){ echo "selected";}?> >L: Limpieza</option>
                        <option value="A" <?php if($dtipo3=='A'){ echo "selected";}?>>A: Aseo</option>
                        <option value="R" <?php if($dtipo3=='R'){ echo "selected";}?>>R: Retoque</option>
                        <option value="PS" <?php if($dtipo3=='PS'){ echo "selected";}?>>PS: Pieza sucia</option>
                    </select> 
                    <input type="hidden" name="estado[]" value="<?php echo $destado3; ?>" id="estado<?php echo $user->id; ?>" style="width: 40px;">
                  </td>




                  <?php if($destado4=='2'){ ?>
                        <td style="background-color: #57a8ee;"><input type="text" value="<?php echo $dhab4; ?>" style="width: 40px; width: 40px;background-color: #57a8ee;color: white;border-color: #57a8ee;" disabled>
                          <input type="hidden" name="id_habitacion[]" value="<?php echo $dhab4; ?>" id="id_habitacion<?php echo $user->id; ?>" >
                        </td>
                  <?php }else{ ?>
                        <td><input type="text" name="id_habitacion[]" value="<?php echo $dhab4; ?>" id="id_habitacion<?php echo $user->id; ?>" style="width: 40px;"></td>
                  <?php }; ?>
                  <input type="hidden" name="id_usuario[]" value="4">
                  <td style="border: 1px solid;">
                    <select class=""  name="tipo[]" style="width: 80%">   
                        <option value=""></option>
                        <option value="L" <?php if($dtipo4=='L'){ echo "selected";}?> >L: Limpieza</option>
                        <option value="A" <?php if($dtipo4=='A'){ echo "selected";}?>>A: Aseo</option>
                        <option value="R" <?php if($dtipo4=='R'){ echo "selected";}?>>R: Retoque</option>
                        <option value="PS" <?php if($dtipo4=='PS'){ echo "selected";}?>>PS: Pieza sucia</option>
                    </select> 
                    <input type="hidden" name="estado[]" value="<?php echo $destado4; ?>" id="estado<?php echo $user->id; ?>" style="width: 40px;">
                  </td>

                  
                 <input type="hidden" name="id_tiempo[]" value="<?php echo $tiempo->id; ?>" id="<?php echo $user->id; ?>">
                 <input type="hidden" name="id_tiempo[]" value="<?php echo $tiempo->id; ?>" id="<?php echo $user->id; ?>">
                 <input type="hidden" name="id_tiempo[]" value="<?php echo $tiempo->id; ?>" id="<?php echo $user->id; ?>">
                 <input type="hidden" name="id_tiempo[]" value="<?php echo $tiempo->id; ?>" id="<?php echo $user->id; ?>">  


                 

                 
                 <input type="hidden" name="fecha[]" value="<?php echo $hoy; ?>" id="<?php echo $user->id; ?>" >

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

    <div class="col-md-2">
      <section class="tile">
        <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong></strong>  </h1>       
        </div>
        <div class="tile-body">
          <div class="row">
            <div class="col-md-12">
              <button type="submit"  class="btn btn-success
                      btn-labeled btn-block btn-ladda btn-ladda-spinner"  ><b><i class="fa fa-plus"></i><br>
                      </b> ACTUALIZAR <br>CAMBIOS
              </button>


              

               <a  data-toggle="modal" data-target="#eliminar"  class="btn btn-danger
                      btn-labeled btn-block btn-ladda btn-ladda-spinner"><b><i class="fa fa-minus"></i><br>
                      </b> ELIMINAR <br>ASIGNACIÓN</a>

              

              


           
            </div>
          </div>
        </div>

      </section>
    </div>
    </form>

    

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
