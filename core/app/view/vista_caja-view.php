<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

<?php 
date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d"); 

      $fechaaa = date("d/m/Y"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");

$nuevafecha = strtotime ( '+1 day' , strtotime ( $hoy ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );



?>
 
<style type="text/css">
.nuevo {
    margin-top: 20px !important;
    margin-bottom: 20px !important;
}
.b-r {
    border-right: 3px solid rgba(0, 0, 0, 0.11) !important;
}
.table-bordered{
    font-size: 18px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px !important;
}





/* Estilo base para el botón */
    .btn {
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    /* Estilo para el botón de información */
    .btn-info {
        background-color: #5bc0de;
        color: #fff;
    }

    /* Estilo personalizado para hacer el botón más grande y agregar bordes redondeados */
    .boton-personalizado {
        font-size: 18px;
        padding: 15px 30px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        margin-top: 40px; /* Ajusta la cantidad de espacio en la parte superior según tus preferencias */
    
    }

    /* Efecto de hover para resaltar el botón */
    .boton-personalizado:hover {
        background-color: #4cae4c; /* Cambia el color al pasar el ratón sobre el botón */
    }
    
    
    
    
</style>

<!--IMPRIMIR PDF DE ULTIMA CAJA-->
<?php
// Establece la conexión con la base de datos (ajusta según tu configuración)
$base = new Database();
$conexion = $base->connect();
    
// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consulta para obtener el último ID de la tabla cajas
$sql = "SELECT MAX(id) as ultimo_id FROM caja";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $ultimoID = $fila["ultimo_id"];
} else {
    $ultimoID = 0; // Si no hay registros, el ID será 0 o el valor inicial
}

/* Cierra la conexión. */
mysqli_close($conexion);

// Define la URL para el PDF
$urlPDF = "reporte/pdf/documentos/pdf_caja.php?id=" . $ultimoID;
?>
<button id="btnMostrarPDF" class="btn btn-info" style="font-size: 16px; padding: 15px 25px;">IMPRIMIR CORTE DE CAJA</button>

<script>
    $(document).ready(function() {
        // Obtiene la URL del PHP al inicio
        var urlPDF = "<?php echo $urlPDF; ?>";
        
        $("#btnMostrarPDF").click(function() {
            // Abre una nueva ventana o pestaña para mostrar el PDF.
            window.open(urlPDF, "_blank");
        });
    });
</script>
<?php 
    $cajas = CajaData::getAllAbierto(); 
    if(@count($cajas)>0){ $id_caja=$cajas->id;
    
    $fecha = date($cajas->fecha_); //5 agosto de 2004 por ejemplo 

$fechats = strtotime($fecha); //a timestamp

//el parametro w en la funcion date indica que queremos el dia de la semana
//lo devuelve en numero 0 domingo, 1 lunes,....
switch (date('w', $fechats)){
    case 6: $dia = "Domingo"; break;
    case 0: $dia =  "Lunes"; break;
    case 1: $dia =  "Martes"; break;
    case 2: $dia =  "Miércoles"; break;
    case 3: $dia =  "Jueves"; break;
    case 4: $dia =  "Viernes"; break;
    case 5: $dia =  "Sábado"; break;
    default: $dia =  ""; break;
} 

?>


<?php $otros = GastoData::getIngresosCajaaNew($id_caja);  ?>
<?php $ihotel=0; $iresto=0; $iparking=0; $ialmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ihotel=$ihotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ialmacen=$ialmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $iresto=$iresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $iparking=$iparking+$otro->precio; } ?>
<?php endforeach; ?>

<?php $otros = GastoData::getEgresosCajaaNew($id_caja);  ?>
<?php $ehotel=0; $eresto=0; $eparking=0; $ealmacen=0; ?>
<?php foreach($otros as $otro):?> 
    <?php if($otro->modulo=="Hotel"){  $ehotel=$ehotel+$otro->precio; } ?>
    <?php if($otro->modulo=="Almacen"){  $ealmacen=$ealmacen+$otro->precio; } ?>
    <?php if($otro->modulo=="Restaurant"){  $eresto=$eresto+$otro->precio; } ?>
    <?php if($otro->modulo=="Parking"){  $eparking=$eparking+$otro->precio; } ?>
<?php endforeach; ?>


<?php $hotel_efectivo=0; $hotel_transf=0; $hotel_tarjeta=0; $hotel_dolar=0; $hotel_expidia=0; $hotel_total=0; ?>
<?php $tmps = PagoProcesoData::getAllCajaMostrar($id_caja); 
    foreach($tmps as $p):  ?>
        <?php $hotel_total=$hotel_total+$p->monto; ?>
        <?php if($p->id_tipopago=='1'){  $hotel_efectivo=$hotel_efectivo+$p->monto; } ?>
        <?php if($p->id_tipopago=='3'){  $hotel_transf=$hotel_transf+$p->monto; } ?>
        <?php if($p->id_tipopago=='2'){  $hotel_tarjeta=$hotel_tarjeta+$p->monto; } ?>
        <?php if($p->id_tipopago=='6'){  $hotel_dolar=$hotel_dolar+$p->monto; } ?>
        <?php if($p->id_tipopago=='7'){  $hotel_expidia=$hotel_expidia+$p->monto; } ?>
<?php endforeach; ?>

<div class="row" >
    <br>
    <div class="col-md-12">
    <!-- tile -->
        <section class="tile">
 
           
            <form method="post" action="index.php?view=addcierrecaja">
            <!-- tile body -->
            <div class="tile-body p-0">
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-4">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea" style="font-size: 16px;"> <b>Usuario:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo UserData::getById($_SESSION["user_id"])->name;
                                 ?></div>
<div class="p-10 mb-10 event-control b-l b-2x b-greensea" style="font-size: 16px;">
    <b>Turno:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <select name="turno" style="font-size: 16px;">
    <option value="Mañana" <?php if(strtolower($cajas->turno) == 'mañana'){ echo "selected"; } ?>>Mañana</option>
    <option value="Tarde" <?php if(strtolower($cajas->turno) == 'tarde'){ echo "selected"; } ?>>Tarde</option>
    <option value="Noche" <?php if(strtolower($cajas->turno) == 'noche'){ echo "selected"; } ?>>Noche</option>
</select>

</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nuevo">
                                 <div class="p-10 mb-10 event-control b-l b-2x b-greensea" style="font-size: 16px;">
    <b>Fecha:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php echo date('Y-m-d H:i:s', strtotime($cajas->fecha_creada . ' -8 hours')); ?>
</div>


                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea" style="font-size: 16px;"> <b>Día:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $dia;?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <img src="img/logoH.png" style="width: 20%;"> <b style="font-size: 28px;">#<?php echo $cajas->id;?></b></div>
                               
                            </div>
                        </div>

                       
                        <div class="col-md-12 b-r">

                            <table class="table table-bordered">
                                <tbody>

                                    <?php $otros = GastoData::getIngresosEgresosCajaa($id_caja);  ?>
                                    <?php $negreso1=0; $ningreso1=0; ?>
                                    <?php foreach($otros as $otro):?> 
                                        <?php if($otro->estado=='1'){  $negreso1=$negreso1+$otro->precio; } ?>
                                        <?php if($otro->estado=='3'){  $ningreso1=$ningreso1+$otro->precio; } ?>
                                    <?php endforeach; ?>


                                    

                                    <tr>

                                        

                                    <td><b>Fondo de Caja:</b>&nbsp;&nbsp;$<?php echo $cajas->monto_apertura; ?></td><td><b>Ingreso Total MXN:</b> $<?php echo $hotel_total - $hotel_dolar + $ihotel - $ehotel; ?></td>
                                    <td><b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dólares Recibidos :</b> $<?php echo $hotel_dolar; ?><br></td>
                                     

                                        <!--

                                        <td rowspan="5"><b style="line-height: 10px;">METODOS DE PAGO</b><br><b style="line-height:40px;">Efectivo:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$</b>  <?php echo $hotel_efectivo+($cajas->almacen+$ialmacen-$ealmacen)+($cajas->resto+$iresto-$eresto)+($cajas->parking+$iparking-$eparking); ?> 
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                         <?php echo $cajas->monto_apertura+$hotel_efectivo+($cajas->almacen+$ialmacen-$ealmacen)+($cajas->resto+$iresto-$eresto)+($cajas->parking+$iparking-$eparking)-$negreso1; ?><br>

                                         <b style="line-height: 20px;">Tarjeta:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$</b>  <?php echo $hotel_tarjeta; ?> <br>

                                         <b style="line-height: 40px;">Transferencia / Deposito:</b> &nbsp;&nbsp;$</b>  <?php echo $hotel_transf; ?> <br>

                                         <b style="line-height: 20px;">Dolares:</b> &nbsp;&nbsp;$</b>  <?php echo $hotel_dolar; ?>

                                         <b style="line-height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expedia:</b> &nbsp;&nbsp;$</b>  <?php echo $hotel_expidia; ?>


                                          </td>
                                        <td rowspan="5"><b style="line-height: 80px;">Total:</b> <?php echo $cajas->monto_apertura+$hotel_efectivo+($hotel_dolar*17)+($cajas->almacen+$ialmacen-$ealmacen)+($cajas->resto+$iresto-$eresto)+($cajas->parking+$iparking-$eparking)+($ningreso1-$negreso1); ?> </td>-->
                                    </tr>
                                    <!--<tr>
                                        <td><b>Almacén: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cajas->almacen+$ialmacen-$ealmacen; ?> </td>
                                        
                                    </tr>-->
                                    
                                   <!-- <tr>
                                        <td><b>Restaurant:</b> &nbsp;&nbsp;&nbsp;<?php echo $cajas->resto+$iresto-$eresto; ?></td>

                                        
                                        
                                    </tr>
                                    <tr>
                                        <td><b>Parking:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $cajas->parking+$iparking-$eparking; ?> </td>
                                       
                                    </tr>-->
                                
                                </tbody> 
                            </table> 
                        </div>

                        

                        <div class="col-md-12" >
                            <h4 style="text-decoration: underline;">Cobros Hotel</h4>
                            <table class="table table-bordered" >
                                <thead>
                                <tr>
                                    <th><center>Folio</center></th>
                                    <th><center>Descripción</center></th>
                                    <th><center>Nombre</center></th>
                                    <th><center>USD</center></th>
                                    <th><center>MXN</center></th>
                                    
                                </tr>
                                </thead>
                                <tbody> 
                                <?php  $hotel_total=0; ?>
                                <?php $tmps = PagoProcesoData::getAllCajaMostrar($id_caja); 
                                    foreach($tmps as $p):  ?>
                                     
                                      <tr>
                                        <td><?php echo $p->getProceso()->nro_folio; ?></td>
                                        <td><b><?php echo $p->getProceso()->getHabitacion()->nombre; ?></b></td>
                                        <td><?php echo $p->getProceso()->getCliente()->nombre; ?></td>
                                        <td><?php if($p->id_tipopago=='6'){  echo $p->monto; } ?></td>
                                        <td><?php if($p->id_tipopago!='6'){  echo $p->monto; } ?></td>
                                      </tr> 

                                        <?php $hotel_total=$hotel_total+$p->monto; ?>
                                        
                                    <?php endforeach; ?>
                                 
                                </tbody> 
                            </table>
                        </div>

                        <div class="col-md-3">
                            <div class="nuevo">
                            <h4 style="text-decoration: underline; ">Ingresos por Tipo de Pago</h4>
                            <style>
    .fila {
        display: flex;         /* Usamos flexbox para mostrar los divs en una fila */
        justify-content: space-between; /* Distribuye el espacio entre los divs */
        align-items: center;    /* Centra verticalmente los divs */
    }
    .fila2 {
        display: flex;         /* Usamos flexbox para mostrar los divs en una fila */
        justify-content: space-between; /* Distribuye el espacio entre los divs */
        align-items: center;    /* Centra verticalmente los divs */
    }

    .event-control {
        flex: 1;                /* Hace que todos los divs tengan el mismo tamaño */
        flex-basis: 0;          /* Establece la base flex a 0 para que se distribuyan por igual */
        margin: 0 10px;         /* Espaciado entre los divs */
    }
</style>

<div class="fila" style="font-size: 16px;">
    <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Efectivo:</b> <input type="text" name="" style="" class="pull-right" value="<?php echo $hotel_efectivo; ?>"></div>
    <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Tarjeta:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_tarjeta; ?>" ></div>
    <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Transferencia o Depósito:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_transf; ?>" ></diV>
    <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Dólares:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_dolar; ?>" ></div>
    <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Expedia:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_expidia; ?>" ></div>
</div>

<div class="fila">
                                <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Total USD:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_dolar; ?>" ></div>

                                <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Total MXN:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $hotel_total-$hotel_dolar; ?>" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 style="text-decoration: underline;">Ingresos y egresos</h4>
                            <table class="table table-bordered" style="font-size: 16px;">
                                <thead>
                                <tr>
                                    <th><center>Tipo</center></th>
                                    <th><center>Módulo</center></th>
                                    <th><center>Categoría</center></th>
                                    <th><center>Descripción</center></th>
                                    <th><center>Monto</center></th>
                                    
                                </tr>
                                </thead>
                                <tbody>  
                                <?php $otros = GastoData::getIngresosEgresosCajaa($id_caja);  ?>
                                <?php $ningreso=0; $negreso=0; ?>
                                    <?php foreach($otros as $otro):?> 
                                      <tr> 
                                        <td> <a href="index.php?view=deleteie&id=<?php  echo $otro->id; ?>"  class="tex-danger btn-xs b-0" style="color:#e05d6f;" style="font-size: 16px;"><i class="glyphicon glyphicon-trash"></i></a> <b> <?php if($otro->estado=='1'){ echo "Egreso";}else{ echo "Ingreso";} ?> </b></td>
                                        <td><?php echo $otro->modulo; ?></td>
                                        <td><?php echo $otro->categoria; ?></td>
                                        <td><?php echo $otro->descripcion; ?></td>
                                        <td><?php echo $otro->precio; ?></td>
                                        <?php //$hotel_total=$hotel_total+$otro->monto; ?>
                                        <?php if($otro->estado=='3'){  $ningreso=$ningreso+$otro->precio; } ?>
                                        <?php if($otro->estado=='1'){  $negreso=$negreso+$otro->precio; } ?>

                                      </tr> 
                                    <?php endforeach; ?>

                                
                                 
                                </tbody> 
                            </table>
                        </div>
                        <div class="col-md-3">
                            <div class="nuevo" >
                                <div class="fila">
                                <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Total ingresos:</b> <input type="text" name="" style="" class="pull-right " value="<?php echo $ningreso; ?>"></div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-primary" style="font-size: 16px;"> <b>Total egresos:</b>  <input type="text" name="" style="" class="pull-right " value="<?php echo $negreso; ?>"></div>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12" style="font-size: 16px;">
                            <input type="hidden" name="id_caja" value="<?php echo $id_caja; ?>">
                            <input type="hidden" name="monto_cierre" value="<?php echo $cajas->monto_apertura+$hotel_total+($cajas->almacen+$ialmacen-$ealmacen)+($cajas->resto+$iresto-$eresto)+($cajas->parking+$iparking-$eparking)+($ningreso-$negreso) - $hotel_dolar + ($hotel_dolar * $cajas->dolarhoy ) ; ?>">
                            <div class="input-group" style="margin-left: auto;margin-right: auto;;"> 
                                  <button type="submit" class="btn btn-sm btn-danger btn-flat" style="font-size: 24px;" ><b>CERRAR CAJA</b></button>
                                  
                    
                            </div>

                        </div>


                    </div>
                </div>

            </div>
            <!-- /tile body -->
            </form>
        </section>
        <!-- /tile -->
        <hr><hr><hr><hr><hr>
    </div>


<!-- MODAL ALAMCEN -->
<div class="modal fade bs-example-modal-lg" id="modalalmacen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> MODIFICAR MONTO DE ALMACEN!!</h4>
            </div>
            <form method="post" action="index.php?view=updatealmacen">
            <div class="modal-body"> 
            <div class="row"> 
                <div class="col-md-12" style="padding-top: 20px;">
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">MONTO*</label>
                        <div class="col-md-8">
                          <input type="text" name="almacen" value="<?php echo $cajas->almacen; ?>" id="almacen" required class="form-control"  placeholder="Ingrese monto">
                        </div>
                      </div>

                </div>
            </div>

             </div>
             <div class="modal-footer"> 
                <input type="hidden" name="id_caja" value="<?php echo $id_caja; ?>">
               <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" ><i class="fa fa-arrow-right"></i> Modificar</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
             </div>
             </form>
            
          </div>
      </div>
    </div>


<!-- MODAL ALAMCEN -->
<div class="modal fade bs-example-modal-lg" id="modalresto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> MODIFICAR MONTO DE RESTAURANT!!</h4>
            </div>
            <form method="post" action="index.php?view=updateresto">
            <div class="modal-body"> 
            <div class="row"> 
                <div class="col-md-12" style="padding-top: 20px;">
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">MONTO*</label>
                        <div class="col-md-8">
                          <input type="text" name="resto" value="<?php echo $cajas->resto; ?>" id="resto" required class="form-control"  placeholder="Ingrese monto">
                        </div>
                      </div>

                </div>
            </div>

             </div>
             <div class="modal-footer"> 
                <input type="hidden" name="id_caja" value="<?php echo $id_caja; ?>">
               <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" ><i class="fa fa-arrow-right"></i> Modificar</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
             </div>
             </form>
            
          </div>
      </div>
    </div>



<!-- MODAL ALAMCEN -->
<div class="modal fade bs-example-modal-lg" id="modalparking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog " role="document">
          <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> MODIFICAR MONTO DE PARKING!!</h4>
            </div>
            <form method="post" action="index.php?view=updateparking">
            <div class="modal-body"> 
            <div class="row"> 
                <div class="col-md-12" style="padding-top: 20px;">
                      <div class="form-group">
                        <label for="inputEmail1" class="col-lg-3 control-label">MONTO*</label>
                        <div class="col-md-8">
                          <input type="text" name="parking" value="<?php echo $cajas->parking; ?>" id="parking" required class="form-control"  placeholder="Ingrese monto">
                        </div>
                      </div>

                </div>
            </div>

             </div>
             <div class="modal-footer"> 
                <input type="hidden" name="id_caja" value="<?php echo $id_caja; ?>">
               <button type="submit" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" ><i class="fa fa-arrow-right"></i> Modificar</button>
                <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Cancelar</button>
             </div>
             </form>
            
          </div>
      </div>
    </div>



<?php
}else{

date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");

    $u=null;
    $u = UserData::getById(Session::getUID());
    $usuario = $u->is_admin;
    $id_usuario = $u->id;

   $hora = date("H:i:s");
  $fecha_completo = date("Y-m-d H:i:s"); 

?>
<section class="tile tile-simple col-md-12 ">
      
      <div class="tile-widget dvd dvd-btm" style="text-align: center;">
              <h1 style="    font-size: 60px; font-weight: bold;">¡ Bienvenido <?php echo $u->name; ?> !</h1>
              
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
           <form method="post"  action="index.php?view=agregar_caja" id="addcaja">
              <div class="tile-body p-0" style="text-align: left; margin:50px;">

                <table style="margin-left: auto; margin-right: auto;">
                  
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">FECHA APERTURA: </h5></td>
                      <td><h5><input class="form-control" type="date" name="fecha" value="<?php echo $hoy; ?>" ></h5></td>
                      <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                  </tr>
                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">FONDO DE CAJA: </h5></td>
                      <td><h5><input class="form-control" type="text" name="monto_apertura" value="0" ></h5></td>
                      
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">DOLAR HOY: </h5></td>
                      <td><h5><input class="form-control" type="text" name="dolarhoy" value="17.28" ></h5></td>
                      
                  </tr>

                  <tr>
                      <td><h5 style="font-size: 16px; font-weight: bold;" class="pull-right">TURNO: </h5></td>
                      <td><h5>
                          <select name="turno" class="form-control">
                                <option>Mañana</option>
                                <option>Tarde</option>
                                <option>Noche</option>
                          </select>
                          </h5>
                      </td>
                      
                  </tr>

                
                </table>
 
              </div>

            
 
              <!-- tile footer -->
              <div class="tile-footer dvd dvd-top">
                <input type="hidden" name="monto_apertura" value="0">
                <input type="hidden" name="fecha_apertura" value="<?php echo $fecha_completo; ?>">
                <input type="hidden" name="hora" value="<?php echo $hora; ?>">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                  <div class="input-group" style="margin-left: auto;margin-right: auto;;"> 
                      <button type="submit" class="btn btn-sm btn-success btn-flat" style="font-size: 32px;color: #fff;
    background-color: #16a085;
    border-color: #16a085;" ><b>APERTURAR CAJA</b></button>
                  </div>
              </div>
              <!-- /tile footer -->

          </form>

</section>
<?php
 
};
 
?>



