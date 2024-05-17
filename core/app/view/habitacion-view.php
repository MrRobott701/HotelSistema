<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
        <li class="active">Habitaciones</li>
    </ol>
</section> 
</div> 


<?php 
date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");
   $fecha_completa= date("Y-m-d H:i:s");
?>

 <!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>CONFIGURACION DE HABITACIONES</strong></h1>
        <ul class="controls">
          <li class="remove">
          <a data-toggle="modal" data-target="#myModal" href="#" style="display: inline-block; text-decoration: none; background-color: #31C61A; color: white; padding: 18px 20px; border-radius: 5px; transition: background-color 0.3s ease; cursor: pointer;margin-right: 50px;"
   onmouseover="this.style.backgroundColor='#259813';" onmouseout="this.style.backgroundColor='#31C61A';">
    <span style="display: flex; align-items: center; gap: 18px; height: 100%;">
        <i class="fa fa-hotel"></i>
        <strong style="height: 100%; display: flex; align-items: center; margin: 0;">REGISTRAR NUEVA HABITACIÓN</strong>
    </span>
</a>


          </li>
          <!--
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
          <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>-->
        </ul>
      </div>
      <!-- tile body -->
      <div class="tile-body">
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>

               

              <?php $habitaciones = HabitacionData::getAll();
                if(@count($habitaciones)>0){
                  // si hay usuarios
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="50" class="footable table table-custom" style="font-size: 18px;">

                  <thead style="color: white; background-color: #827e7e;">
                         
                        <th>NOMBRE</th>
                        <th>CATEGORÍA</th>
                        <th>NIVEL</th>
                      
                        <th>DETALLES</th>
                        <!--<th></th> -->
                        <th>EDITAR</th> 
                        <th>MANTENIMIENTO</th>
                        <th>ELIMINAR</th>
                        <!--
                        <th></th>
                      -->
                  </thead>
                   <?php foreach($habitaciones as $habitacion):?>
                      <tr>
                        
                        <td><?php echo $habitacion->nombre; ?></td>
                        <td><?php echo $habitacion->getCategoria()->nombre; ?></td>
                        <td><?php if($habitacion->id_nivel!='0' and $habitacion->id_nivel!=null){ echo $habitacion->getNivel()->nombre; }else{echo "---";} ?></td>
                        <td><?php echo $habitacion->descripcion; ?></td>
                        <!--
                        <td> 

                          <?php $tarifas_hab = TarifaHabitacionData::getAllHabitacion($habitacion->id);
                          if(@count($tarifas_hab)>0){ ?>
                            <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver tarifas</a>

                          <?php }else{ ?>
                            <a href="index.php?view=ha_tarifas&id=<?php echo $habitacion->id; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Ver tarifas</a>
                          <?php }; ?>
                          
                        </td>
                      -->
                        <td>
                          <a href=""  data-toggle="modal" data-target="#myModal<?php echo $habitacion->id; ?>"  class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Editar</a>
                        </td>
                        <td> 
                          <?php if($habitacion->estado=='4'){ ?>
                          <a href=""  data-toggle="modal" data-target="#mantenimienthabilitar<?php echo $habitacion->id; ?>"  class="btn btn-info btn-xs"> Finalizar Mantenimiento</a>
                          <?php }else if($habitacion->estado=='1' or $habitacion->estado=='3'){ ?>
                          <a href=""  data-toggle="modal" data-target="#mantenimient<?php echo $habitacion->id; ?>"  class="btn btn-warning btn-xs">Mantenimiento</a>
                          <?php }else if($habitacion->estado=='2'){ ?>
                          <a href=""  data-toggle="modal" data-target=""<?php echo $habitacion->id; ?>  class="btn btn-secondary"> Habitación Ocupada</a>
                          <?php }; ?>
                        </td>
                        <td>
                        <a href="" data-toggle="modal" data-target="#myModalDel<?php echo $habitacion->id; ?>"   class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td>
                      </tr>  

                      

<div class="modal fade bs-example-modal-xm" id="myModalDel<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
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
                <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Cancelar</button>
                <a href="index.php?view=delhabitacion&id=<?php echo $habitacion->id; ?>"   class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar de Todos Modos</a>              
              </div>   
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
                                            <!--
                        <td> 
                          <a  href="index.php?view=inventary_bed&id=<?php echo $habitacion->id; ?>"  class="btn btn-success btn-xs"> Inventario</a>
                        </td>
                          
                        <td>
                          <a href="index.php?view=delhabitacion<?php echo $habitacion->id; ?>"    class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
                        </td> 
                          -->
                   

<div class="modal fade bs-example-modal-xm" id="mantenimienthabilitar<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> HABILITAR HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>


                  
                </div>
                </div>

              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
                <a href="index.php?view=mhhabitacion&id=<?php echo $habitacion->id; ?>"   class="btn btn-info "> Finalizar Mantenimiento</a>
       
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>


 <div class="modal fade bs-example-modal-xm" id="mantenimient<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=mhabitacion" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> MANTENIMIENTO HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row"> 
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Habitacion </span>
                      <input type="text" class="form-control col-md-8" name="nombre" disabled value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                      <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">
                    </div>
                  </div>

                  <div class="form-group"> 
                    <div class="input-group">
                      <span class="input-group-addon"> Fecha &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="date" class="form-control col-md-8" name="" disabled value="<?php echo $hoy; ?>" disabled >
                      <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Detalle &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <textarea class="form-control col-md-8" name="detalle" required="" placeholder="Ingresa detalle"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Costo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="number" class="form-control col-md-8" name="costo"  required placeholder="Ingrese costo">
                    </div>
                  </div>

                  

                  
                </div>
                </div>

              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >

                <a href="index.php?view=historial_ma"   class="btn btn-outline btn-info "> Historial de Mantenimiento</a>
 
                <button type="submit" class="btn btn-warning "> Pasar a Mantenimiento</button>
       
              </div>
            </form>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>



 
     <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $habitacion->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=updateroom" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> EDITAR HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group"> 
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" value="<?php echo $habitacion->nombre; ?>" required placeholder="Ingrese nombre">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nivel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <select class="form-control select2" required  name="id_nivel">   
                        <?php $niveles = NivelData::getAll();?>
                        
                        <?php foreach($niveles as $nivel):?>
                        <option value="<?php echo $nivel->id;?>" <?php if($habitacion->id_nivel!=null&&$habitacion->id_nivel!='0'&& $habitacion->id_nivel==$nivel->id){ echo "selected";}?>><?php echo $nivel->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoria</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <?php foreach($categorias as $categoria):?>
                        <option value="<?php echo $categoria->id;?>" <?php if($habitacion->id_categoria!=null&& $habitacion->id_categoria==$categoria->id){ echo "selected";}?>><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Tipo hab</span>
                      <select class="form-control select2" required  name="tipo_hab">   
                        
                       
                        
                        <option value="1" <?php if($habitacion->tipo_hab!=null&& $habitacion->tipo_hab=='1'){ echo "selected";}?> >Normal</option>
                        <option value="2" <?php if($habitacion->tipo_hab!=null&& $habitacion->tipo_hab=='2'){ echo "selected";}?> >Expedia</option>
                       
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Detalles &nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="descripcion" value="<?php echo $habitacion->descripcion; ?>" required placeholder="Ingrese detalles">
                    </div>
                  </div>

                 
                  <input type="hidden" class="form-control" name="precio" value="0" required placeholder="Ingrese Precio">
                    


                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                <input type="hidden" class="form-control" name="id_habitacion" value="<?php echo $habitacion->id; ?>" >
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
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="6" class="text-center">
                            <ul class="pagination"></ul>
                          </td>
                        </tr>
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
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=addroom" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-sitemap"></span> INGRESAR NUEVA HABITACIÓN</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nombre &nbsp;&nbsp;</span>
                      <input type="text" class="form-control col-md-8" name="nombre" required placeholder="Ingrese nombre">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Nivel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <select class="form-control select2" required  name="id_nivel">  
                        <option value="">--- Seleciona ---</option> 
                        <?php $niveles = NivelData::getAll();?>
                        <?php foreach($niveles as $nivel):?>
                        <option value="<?php echo $nivel->id;?>" ><?php echo $nivel->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Categoria</span>
                      <select class="form-control select2" required  name="id_categoria">   
                        <?php $categorias = CategoriaData::getAll();?>
                        <option value="">--- Seleciona ---</option> 
                        <?php foreach($categorias as $categoria):?>
                          <option value="<?php echo $categoria->id;?>"><?php echo $categoria->nombre;?></option>
                        <?php endforeach;?>
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Tipo hab</span>
                      <select class="form-control select2" required  name="tipo_hab">   
                        
                        <!--<option value="">--- Selecion ---</option> -->
                        
                        <option value="1">Normal</option>
                        <option value="2">Expidia</option>
                       
                      </select>  
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Detalles &nbsp;&nbsp;</span>
                      <input type="text" class="form-control" name="descripcion" required placeholder="Ingrese detalles">
                    </div>
                  </div>

                  
                  <input type="hidden" class="form-control" name="precio" value="0" required placeholder="Ingrese Precio">
                    

                  
                   

                    
                  
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

       <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
      
        
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>