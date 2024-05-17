<style>
 /* Oculta la primera columna de la tabla */
table tr th:nth-child(1),
table tr td:nth-child(1) {
    display: none;
}

/* Oculta la tercera columna de la tabla */
table tr th:nth-child(4),
table tr td:nth-child(4) {
    display: none;
}
</style>


<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
      <li class="active">Categorías</li>
    </ol>
</section> 
</div> 


<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE CATEGORÍAS</strong> </h1>
        <ul class="controls">
    <li class="remove">
        <a data-toggle="modal" data-target="#myModal" href="#" style="display: inline-block; text-decoration: none; background-color: #31C61A; color: white; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease; cursor: pointer; margin-right: 50px;"
           onmouseover="this.style.backgroundColor='#259813';" onmouseout="this.style.backgroundColor='#31C61A';">
            <span style="display: flex; align-items: center; gap: 10px; height: 100%;">
                <i class="fa fa-user-plus"></i>
                <strong style="height: 100%; display: flex; align-items: center; margin: 0;">REGISTRAR NUEVA CATEGORÍA</strong>
            </span>
        </a>
    </li>

</ul>

      </div>
      <!-- tile body -->
      <div class="tile-body">
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>


              <?php $categorias = CategoriaData::getAll();
                if(@count($categorias)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="100" class="footable table table-custom" style="font-size: 18px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>EDITAR</th> 
                        <th>ELIMINAR</th> 
                  </thead>
                   <?php foreach($categorias as $categoria):?>
                      <tr>
                        <td><?php echo $categoria->id; ?></td>
                        <td>
                          <?php if($categoria->imagen!=""):?>
                            <img src="img/categoria/<?php echo $categoria->imagen;?>" style="width:74px;">
                          <?php endif;?>
                        </td>
                        <td><?php echo $categoria->nombre; ?></td>
                        <td><?php echo $categoria->cant; ?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $categoria->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        
                      <td>
                        <a href="" data-toggle="modal" data-target="#myModalDel<?php echo $categoria->id; ?>"   class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr>  

<div class="modal fade bs-example-modal-xm" id="myModalDel<?php echo $categoria->id; ?>" role="dialog" aria-labelledby="myModalLabel">
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
                      <b > Puede afectar a algunos registros que contengan esta categoría </b>
                      
                    </div>
                  </div>

                  

                   
                    
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
                <a href="index.php?view=delcategoria&id=<?php echo $categoria->id; ?>"   class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar de todos modos</a>
               
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>


      <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $categoria->id; ?>" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-warning">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=updatecategoria" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR CATEGORÍA O TIPO</h4>
                    </div>
                    <div class="modal-body" style="background-color:#fff !important;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"> Nombre </span>
                                        <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $categoria->nombre; ?>" required placeholder="Ingrese Nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"> Imagen </span>
                                        <input type="file" name="imagen" id="imagen" placeholder="" accept="image/x-png,image/gif,image/jpeg">
                                        <?php if($categoria->imagen!="" and  $categoria->imagen!='NULL' ):?>
                                            <br> <img src="img/categoria/<?php echo $categoria->imagen;?>" class="img-responsive">
                                        <?php endif;?>
                                    </div>
                                </div>
                                <!-- Campo oculto para la Cantidad con valor predeterminado -->
                                <input type="hidden" name="cant" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                        <input type="hidden" class="form-control" name="id_categoria" value="<?php echo $categoria->id; ?>">
                        <button type="submit" class="btn btn-success">Actualizar Datos</button>
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
                <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addcategory" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVA CATEGORÍA</h4>
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

                  <div class="form-group">
                    <div class="input-group"> 
                      <span class="input-group-addon"> Imagen </span>
                      <input type="file" name="imagen" id="imagen" placeholder="" accept="image/x-png,image/gif,image/jpeg" >
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <input type="hidden" class="form-control col-md-8"  name="cant"  value="1" required placeholder="Ingrese cantidad">
                    </div>
                  </div>
              
                   
                    
                   
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Agregar Datos</button>
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