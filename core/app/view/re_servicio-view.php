<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
      <li class="active">Config. servicios reserva</li>
    </ol>
</section> 
</div> 


<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE SERVICIO</strong></h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-user-plus"></i> REGISTRAR NUEVO SERVICIO</a>
          </li>
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
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>


              <?php $shreservas = SHreservaData::getAll();
                if(@count($shreservas)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="30" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>NOMBRE</th>
                        <th></th> 
                        <th></th> 
                  </thead>
                   <?php foreach($shreservas as $shreserva):?>
                      <tr>
                        <td><?php echo $shreserva->id; ?></td>
                        
                        <td><?php echo $shreserva->nombre; ?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $shreserva->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        
                      <td>
                        <a href="" data-toggle="modal" data-target="#myModalDel<?php echo $shreserva->id; ?>"   class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr>  

<div class="modal fade bs-example-modal-xm" id="myModalDel<?php echo $shreserva->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-danger">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> ¿ESTAS SEGURO DE ELIMINAR? </h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">


                   <div class="form-group">
                    <div class="input-group">
                      <b > Puede afectar a algunos registros que contengan este servicio </b>
                      
                    </div>
                  </div>

                  

                   
                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <a href="index.php?view=delshreserva&id=<?php echo $shreserva->id; ?>"   class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar de todos modos</a>
               
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>



    <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $shreserva->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post"  enctype="multipart/form-data" action="index.php?view=updateshreserva" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> EDITAR SERVICIO</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">


                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre </span>
                      <input type="text" class="form-control col-md-8"  name="nombre"  value="<?php echo $shreserva->nombre; ?>" required placeholder="Ingrese Nombre">
                    </div>
                  </div>

                

                   
                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden"  name="tipo" value="1">
                <input type="hidden" class="form-control" name="id_shreserva" value="<?php echo $shreserva->id; ?>">
                <button type="submit" class="btn btn-outline"  name="servicio">Actualizar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

                    <?php endforeach; ?>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>

           </div>
     
</section>

</div>
 </div>  

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addshreserva" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> INGRESAR NUEVO SERVICIO</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">


                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre </span>
                      <input type="text" class="form-control col-md-8"  name="nombre" required placeholder="Ingrese Nombre">
                    </div>
                  </div>

                  
                    
                   
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden"  name="tipo" value="1">
                <button type="submit" class="btn btn-outline" name="servicio">Agregar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

      
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
        <script src="assets/js/main.js"></script>
         <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>