<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Servicios</a></li>
      <li class="active">Inventario </li>
    </ol>
</section> 
</div> 

<?php $servicio = CategoriaProData::getById($_GET['id']); ?>
<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font">REGISTRO INVENTARIO DE:<strong><?php echo $servicio->nombre; ?> </strong>  </h1>
        <ul class="controls">
          <li class="remove">
            <a  data-toggle="modal" data-target="#myModal"  ><i class="fa fa-user-plus"></i> REGISTRAR NUEVO ARTÍCULO</a>
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

              <?php $inventaries = InventaryBedData::getAllServicios($_GET['id']);
            $totall= 0; 
                if(@count($inventaries)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>Nombre</th>
                        <th>Descripción</th>
                        
                        <th>Fecha creada</th>
                        <th>Proveedor</th>
                        <th>Responsable</th>
                        <th>Cantidad</th>
                        <th>Precio uni.</th>
                        <th>Subtotal</th>
                        <th></th> 
                        <th></th> 
                  </thead>
                   <?php foreach($inventaries as $inventary):?>
                      <tr>
                        <td><?php echo $inventary->id; ?></td>
                        <td><?php echo $inventary->name; ?></td>
                        <td><?php echo $inventary->descripcion; ?></td>
                       
                        <td><?php echo $inventary->create_date; ?></td>
                        <td><?php echo $inventary->getProveedor()->nombre; ?></td>
                        <td><?php echo $inventary->getUsuario()->name; ?></td>
                         <td><?php echo $inventary->quantity; ?></td>
                        <td><?php echo $inventary->precio; ?></td>
                        <?php $totall= ($inventary->precio*$inventary->quantity)+$totall; ?>
                        <td><?php echo $inventary->precio*$inventary->quantity; ?></td>
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $inventary->id; ?>"  class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td>
                        <a href="index.php?view=delc_inventario&id=<?php echo $inventary->id; ?>&id_c=<?php echo $_GET['id']; ?>"  class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>

                      </tr>  


    <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $inventary->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct"  enctype="multipart/form-data" action="index.php?view=updateinventaryservice" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR ARTÍCULO</h4> 
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">


                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre </span>
                      <input type="text" class="form-control col-md-8"  name="name"  value="<?php echo $inventary->name; ?>" required placeholder="Ingrese Nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Descripción </span>
                      <textarea placeholder="Descripción" name="descripcion" class="form-control" value="<?php echo $inventary->descripcion; ?>" required=""></textarea>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Proveedor </span>
                      <select class="form-control"  name="id_proveedor">
                                <?php $proveedores = PersonaData::getProveedor();?>
                                  <option value="NULL">--- Selecciona ---</option>
                                  <?php foreach($proveedores as $proveedor):?>
                                    <option value="<?php echo $proveedor->id;?>" <?php if($inventary->id_proveedor!=null&&$inventary->id_proveedor!='0'&& $inventary->id_proveedor==$proveedor->id){ echo "selected";}?> ><?php echo $proveedor->razon_social;?></option>
                                  <?php endforeach;?> 
                                
                            </select> 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Cantidad </span>
                      <input type="text" class="form-control col-md-8"  name="quantity" value="<?php echo $inventary->quantity; ?>" required placeholder="Ingrese cantidad">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio uni. </span>
                      <input type="text" class="form-control col-md-8"  name="precio" required value="<?php echo $inventary->precio; ?>" placeholder="Ingrese precio">
                    </div>
                  </div>

                  <input type="hidden" name="bed_id" value="<?php echo $_GET['id']; ?>">


                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" class="form-control" name="id_inventary" value="<?php echo $inventary->id; ?>">
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
                    <tfoot>
                      <th colspan="8" ><b class="pull-right">TOTAL</b></th>
                      <th ><?php echo $totall; ?></th>
                      <th ></th>
                      <th ></th>
                    </tfoot>
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
                <form class="form-horizontal" method="post" id="addproduct" enctype="multipart/form-data" action="index.php?view=addinventaryservicio" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVO ARTÍCULO</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-12">
 

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre </span>
                      <input type="text" class="form-control col-md-8"  name="name"  required placeholder="Ingrese Nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Descripción </span>
                      <textarea placeholder="Descripción" name="descripcion" class="form-control" required=""></textarea>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Proveedor </span>
                      <select class="form-control"  name="id_proveedor">
                                <?php $proveedores = PersonaData::getProveedor();?>
                                  <option value="NULL">--- Selecciona ---</option>
                                  <?php foreach($proveedores as $proveedor):?>
                                    <option value="<?php echo $proveedor->id;?>" ><?php echo $proveedor->razon_social;?></option>
                                  <?php endforeach;?> 
                                
                            </select> 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Cantidad </span>
                      <input type="text" class="form-control col-md-8"  name="quantity" required placeholder="Ingrese cantidad">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio uni. </span>
                      <input type="text" class="form-control col-md-8"  name="precio" required placeholder="Ingrese precio">
                    </div>
                  </div>

                   
                  <input type="hidden" name="bed_id" value="<?php echo $_GET['id']; ?>">
                   
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