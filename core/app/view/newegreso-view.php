

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





<section class="tile tile-simple col-md-6 col-md-offset-3">
      
            <div class="tile-widget dvd dvd-btm" style="text-align: center;">
              <a href="index.php?view=newingreso" class="btn btn-sm btn-success btn-flat" style="border-bottom-left-radius: 20px; border-top-left-radius: 20px;background-color: #818181;border-color: #818181;" ><b style="font-size: 28px;">Ingreso</b></a>
              <a href="index.php?view=newegreso"  class="btn btn-sm btn-danger btn-flat" style="border-bottom-right-radius: 20px;border-top-right-radius: 20px;"><b style="font-size: 28px;">Egreso</b></a>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <form method="post"  action="index.php?view=addnewegreso" id="addcaja">
              <div class="tile-body p-0" style="text-align: left;">

                <table>
                  <th style="width: 50%;"></th>
                  <th style="width: 45%;"></th>
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">FECHA:&nbsp;&nbsp;&nbsp;</h5></td>
                      <td><h5><input class="form-control" type="date" name="fecha" value="<?php echo $hoy; ?>" ></h5></td>
                      <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                  </tr>
                  <tr>
                      <td><h5  style="font-size: 16px; font-weight: bold;" class="pull-right" >MÓDULO:&nbsp;&nbsp;&nbsp;</h5></td>
                      <td><h5>
                        <select class="form-control" name="modulo">
                            <option value="Hotel" >Hotel</option>
                        </select>
                      </h5>
                      </td>
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right" >CATEGORÍA:&nbsp;&nbsp;&nbsp;</h5></td>
                      <td><h5>
                        <select class="form-control" name="categoria">
                            <option value="Gastos de mantenimiento" >Gastos de mantenimiento</option>
                            <option value="Recibos" >Recibos</option>
                            <option value="Proveedores" >Proveedores</option>
                            <option value="Adelantos" >Adelantos</option>
                            <option value="Otros" >Otro</option>
                        </select>
                      </h5>
                      </td>
                  </tr>
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right" >DESCRIPCION:&nbsp;&nbsp;&nbsp;</h5></td>
                      <td><h5>
                        <textarea class="form-control" name="glosa"></textarea>
                      </h5>
                      </td>
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right" >MONTO:&nbsp;&nbsp;&nbsp;</h5></td>
                      <td><h5>
                        <input type="text" name="monto" class="form-control">
                      </h5>
                      </td>
                  </tr>
    
                
                </table>
 
              </div>

            
 
              <!-- tile footer -->
              <div class="tile-footer dvd dvd-top">
                  <div class="input-group" style="margin-left: auto;margin-right: auto;;"> 
                      <input type="submit" class="btn btn-sm btn-success btn-flat" value="REGISTRAR"  >
                  </div>
              </div>
              <!-- /tile footer -->

          </form>


</section>
<script>
  $("#addcaja").submit(function(e){
    caja = $("#caja_abierta").val();
     
    if(caja=="1"){
      alert("HAY UNA CAJA ABIERTA, NO PUEDES ABRIR OTRA CAJA, NECESITAS CERRARLA");
      e.preventDefault();
    }
  });
</script>

