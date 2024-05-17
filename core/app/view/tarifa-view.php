
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
      <li class="active">Tarifas</li>
    </ol>
</section> 
</div> 


<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>REGISTRO DE TARIFAS</strong></h1>
        <ul class="controls">
    <li class="remove">
        <a data-toggle="modal" data-target="#myModal" href="#" style="display: inline-block; text-decoration: none; background-color: #31C61A; color: white; padding: 10px 20px; border-radius: 5px; transition: background-color 0.3s ease; cursor: pointer; margin-right: 50px;"
           onmouseover="this.style.backgroundColor='#259813';" onmouseout="this.style.backgroundColor='#31C61A';">
            <span style="display: flex; align-items: center; gap: 10px; height: 100%;">
                <i class="fa fa-user-plus"></i>
                <strong style="height: 100%; display: flex; align-items: center; margin: 0;">REGISTRAR NUEVA TARIFA</strong>
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


              <?php $tarifas = TarifaData::getAll();
                if(@count($tarifas)>0){
                  // si hay tarifas
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="20" class="footable table table-custom" style="font-size: 18px;">

                  <thead style="color: white; background-color: #827e7e;">
                     
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>CATEGORIA</th>
                        <th>EDITAR</th> 
                        <th>ELIMINAR</th> 
                  </thead>
                   <?php foreach($tarifas as $tarifa):?>
                      <tr>
                        
                        <td><?php echo $tarifa->nombre; ?></td>
                        <td><?php echo $tarifa->precio; ?></td>
                        <td><?php if($tarifa->id_categoria!=null){ echo $tarifa->getCategoria()->nombre;}?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $tarifa->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                                  
                      <td>
                        <a href="" data-toggle="modal" data-target="#myModalDel<?php echo $tarifa->id; ?>"   class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr>  

<div class="modal fade bs-example-modal-xm" id="myModalDel<?php echo $tarifa->id; ?>" role="dialog" aria-labelledby="myModalLabel">
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
                <a href="index.php?view=deltarifa&id=<?php echo $tarifa->id; ?>"   class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar de todos modos</a>              
              </div>   
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
      


    <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $tarifa->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updatetarifa" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR TARIFA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">

                    <div class="input-group">
                      <span class="input-group-addon"> Nombre</span>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $tarifa->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>


                  
                </div>
                
                <div class="col-md-12" style="padding-top:20px; ">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio</span>
                      <input type="number" class="form-control" name="precio" step="0.01" value="<?php echo $tarifa->precio; ?>" required placeholder="Ingrese precio">
                    </div> 
                </div>
                

            


                <div class="col-md-12" style="padding-top:20px; ">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoría</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id;?>" <?php if($tarifa->id_categoria!=null&& $tarifa->id_categoria==$categoria->id){ echo "selected";}?>><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select> 
                    </div> 
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" class="form-control" name="id_tarifa" value="<?php echo $tarifa->id; ?>">
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
                

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
                </table>
                
<!-- Paginación -->
<div class="text-center">
    <ul class="pagination">
        <li class="footable-page-arrow disabled">
            <a data-page="first" href="#">«</a>
        </li>
        <li class="footable-page-arrow disabled">
            <a data-page="prev" href="#">‹</a>
        </li>
        <li class="footable-page active">
            <a href="#">1</a>
        </li>
        <!-- Puedes agregar más números de páginas aquí según sea necesario -->
        <li class="footable-page-arrow">
            <a data-page="next" href="#">›</a>
        </li>
        <li class="footable-page-arrow">
            <a data-page="last" href="#">»</a>
        </li>
    </ul>
</div>

           </div>
     
</section>

</div>
 </div>  

      <div class="modal fade bs-example-modal-xm" id="myModal" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addtarifa" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVA TARIFA</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">

                    <div class="input-group">
                      <span class="input-group-addon"> Nombre</span>
                      <input type="text" class="form-control" name="nombre" required placeholder="Ingrese nombre">
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio</span>
                      <input type="number" class="form-control" name="precio" step="0.01" required placeholder="Ingrese precio">
                    </div>

                    
                  
                </div>

                 <div class="col-md-12" style="padding-top:20px; ">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoría</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id;?>" <?php if($tarifa->id_categoria!=null&& $tarifa->id_categoria==$categoria->id){ echo "selected";}?>><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select> 
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