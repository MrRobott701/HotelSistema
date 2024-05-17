<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<div class="col-md-12">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
        <li class="active">Niveles</li>
    </ol>
</section> 
</div>
</div> 

<div class="row">
<div class="col-md-12">
<section class="tile">


          <div class="box box box-danger">
            <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE NIVELES</strong></h1>
        <ul class="controls">
          <li class="remove">
          <a data-toggle="modal" data-target="#myModal" href="#" style="display: inline-block; text-decoration: none; background-color: rgb(49, 198, 26); color: white; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease 0s; cursor: pointer; margin-right: 50px;" onmouseover="this.style.backgroundColor='#259813';" onmouseout="this.style.backgroundColor='#31C61A';">
    <span style="display: flex; align-items: center; gap: 10px; height: 100%;">
        <i class="fa fa-hotel"></i>
        <strong style="height: 100%; display: flex; align-items: center; margin: 0;">REGISTRAR NUEVO NIVEL</strong>
    </span>
</a>
                </li>
                
            </ul>
          </li>
          </ul>
      </div>

            <!-- /.box-header -->
            <div class="box-body">


              <?php $niveles = NivelData::getAll();
                if(@count($niveles)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 18px;">

                  <thead style="color: white; background-color:  #827e7e;">
                        <th>Nº</th> 
                        <th>NOMBRE</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th> 
                  </thead>
                   <?php foreach($niveles as $nivel):?>
                      <tr>
                        <td><?php echo $nivel->id; ?></td>
                        <td><?php echo $nivel->nombre; ?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $nivel->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal2<?php echo $nivel->id; ?>"  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr> 
<!-- Modal de Edición -->
     <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $nivel->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatenivel" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR NIVEL</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">

                    <div class="input-group">
                      <span class="input-group-addon"> Nombre</span>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $nivel->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>

                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" class="form-control" name="id_nivel" value="<?php echo $nivel->id; ?>">
                <button type="submit" class="btn btn-outline">Actualizar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
      <!-- Modal de Edición -->

<!-- Modal de ELIMIAR -->
<div class="modal fade bs-example-modal-xm" id="myModal2<?php echo $nivel->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal" method="post" id="delnivel" action="index.php?view=deletenivel" role="form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title"><span class="fa fa-sitemap"></span> ELIMINAR NIVEL</h4>
                        </div>
                        <div class="modal-body" style="background-color:#fff !important;">
                            <p>¿Está seguro que desea eliminar este nivel?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Cancelar</button>
                            <input type="hidden" class="form-control" name="id_nivel" value="<?php echo $nivel->id; ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
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
    </div>    


</section>

</div>

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addnivel" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVO NIVEL</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">

                    <div class="input-group">
                      <span class="input-group-addon"> Nombre</span>
                      <input type="text" class="form-control" name="nombre" required placeholder="Ingrese nombre">
                    </div>

                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline">Agregar Datos</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

 <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
      
        
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>