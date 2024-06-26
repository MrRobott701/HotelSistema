<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=users"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="#">Configuración</a></li>
      <li class="active">Nivel de usuario</li>
    </ol>
</section> 
</div> 

<?php $user = UserData::getById($_GET["id"]);?>
<!-- row --> 
<div class="row">
  <!-- col -->
  <div class="col-md-12">
    <section class="tile">
      <div class="tile-header dvd dvd-btm">  
        <h1 class="custom-font"><strong>ACTUALIZAR NIVELES DE USUARIO</h1>
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
        <div class="form-group">
          <label for="filter" style="padding-top: 5px">Buscar:</label>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block"/>
        </div>


             
                  <table id="searchTextResults" data-filter="#filter" data-page-size="25" class="footable table table-custom" style="font-size: 11px;">

                    <thead style="color: white; background-color: #827e7e;">
                        <th>Nº</th> 
                        <th>MÓDULO</th>
                        <th>ACCESO</th>
                         
                    </thead>
                    <form method="post" action="index.php?view=update_nivelusuario">
                    <tbody>

                      <tr>
                        <td>1</td> 
                        <td>RESERVA</td>
                        <td><input type="checkbox" name="reserva" <?php if($user->reserva=='1'){ echo "checked";} ?> ></td>
                      </tr>

                      <tr>
                        <td>2</td> 
                        <td>RECEPCIÓN</td>
                        <td><input type="checkbox" name="recepcion" <?php if($user->recepcion=='1'){ echo "checked";} ?>></td>
                      </tr>

                      <tr>
                        <td>3</td> 
                        <td>CONFIGURACIÓN DE HABITACIONES</td>
                        <td><input type="checkbox" name="configuracion" <?php if($user->configuracion=='1'){ echo "checked";} ?>></td>
                      </tr>                     
                      <tr>
                        <td>4</td> 
                        <td>MÓDULO DE CAJA</td>
                        <td><input type="checkbox" name="caja" <?php if($user->caja=='1'){ echo "checked";} ?>></td>
                      </tr>

                      <tr>
                        <td>5</td> 
                        <td>HUESPEDES</td>
                        <td><input type="checkbox" name="cliente" <?php if($user->cliente=='1'){ echo "checked";} ?>></td>
                      </tr>                      

                      <tr>
                        <td>6</td> 
                        <td>INGRESOS / EGRESOS</td>
                        <td><input type="checkbox" name="egreso" <?php if($user->egreso=='1'){ echo "checked";} ?> ></td>
                      </tr>

                      <tr>
                        <td>7</td> 
                        <td>REPORTES</td>
                        <td><input type="checkbox" name="reporte" <?php if($user->reporte=='1'){ echo "checked";} ?>></td>
                      </tr>

                      <tr>
                        <td>8</td> 
                        <td>ADMINISTRACIÓN DE USUARIOS</td>
                        <td><input type="checkbox" name="administracion" <?php if($user->administracion=='1'){ echo "checked";} ?>></td>
                      </tr>
                      
                    </tbody> 
                   
                    <tfoot>
                      <th></th> 
                      <th></th>
                      <th>
                         <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
                        <button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-check"></i> Editar nivel de usuario</button>
                      </th>
                    </tfoot> 
                    </form>
                  </table>

               

           </div>
     
</section>

</div>
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