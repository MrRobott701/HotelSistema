<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d");
$hora = date("H:i");
$doce = date("12:00:00");
$nuevafecha = strtotime('+1 day', strtotime($hoy));
$nuevafecha = date('Y-m-j', $nuevafecha);
$cajas = CajaData::getAllAbierto();
if (count($cajas) > 0) {
  $id_caja = $cajas->id;
  $dolarhoy = $cajas->dolarhoy;
} else {
  $id_caja = 'NULL';
}
?>

<?php
// Función para validar y limpiar datos
function limpiarDato($dato)
{
  $dato = trim($dato);                 // Eliminar espacios en blanco al inicio y al final
  $dato = stripslashes($dato);        // Eliminar barras invertidas (\)
  $dato = htmlspecialchars($dato);    // Convertir caracteres especiales a entidades HTML
  return $dato;
}

// Verificar y obtener los valores de los parámetros
$id_habitacion = isset($_GET['id_habitacion']) ? limpiarDato($_GET['id_habitacion']) : null;
$id_p = isset($_GET['id_p']) ? limpiarDato($_GET['id_p']) : null;
$fechaSalida = isset($_GET['fechaSalida']) ? limpiarDato($_GET['fechaSalida']) : null;
$horaSalida = isset($_GET['horaSalida']) ? limpiarDato($_GET['horaSalida']) : null;
$fechaEntrada = isset($_GET['fechaEntrada']) ? limpiarDato($_GET['fechaEntrada']) : date("Y-m-d H:i:s", strtotime($hoy . " " . $hora));
$fechaSal = isset($_GET['fechaSalida']) ? limpiarDato($_GET['fechaSalida']) : date("Y-m-d H:i:s", strtotime('+1 day', strtotime($hoy . " " . $hora)));
$nota = isset($_GET['nota']) ? limpiarDato($_GET['nota']) : null;

// Ahora puedes utilizar las variables $id_habitacion, $id_p, $fechaSalida, $horaSalida y $fechaEntrada con seguridad
?>
<link rel="stylesheet" href="js/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
  var hoy = '<?php echo $hoy; ?>';
  var hora = '<?php echo $hora; ?>';
  var id_p = '<?php echo $id_p; ?>';
  var hoyCompleto = hoy + ' ' + hora;
</script>
<script type="text/javascript">
  $('#txtDateEnd').val(datehhourEnd[0]);
  $('#txtHourEnd').val(datehhourEnd[1]);
  $(function() {
    $("#documento").autocomplete({
      source: "./?action=buscar_persona",
      minLength: 2,
      select: function(event, ui) {
        event.preventDefault();
        $('#documento').val(ui.item.documento);
        $('#nombre').val(ui.item.nombre);
        $('#giro').val(ui.item.giro);
        $('#estado_civil').val(ui.item.estado_civil);
        $('#nacionalidad').val(ui.item.nacionalidad);
        $('#medio_transporte').val(ui.item.medio_transporte);
        $('#destino').val(ui.item.destino);
        $('#ocupacion').val(ui.item.ocupacion);
        $('#motivo').val(ui.item.motivo);
        $('#direccion').val(ui.item.direccion);
        $('#id').val(ui.item.id);
      }
    });
  });
  
/*------------------------------------------------------------------------------
--------------------------------------------------------------------------------
--------------------------------------------------------------------------------*/


function validarExtension(form) {
    var id_p = $('#id_p').val();
    if (id_p == null || id_p === "") {
        var id_p = 0;
    }
    var hoy = hoyCompleto;
    var id_habitacion = '<?php echo $id_habitacion ; ?>';
    var start = $('#fecha_entrada').val() + ' ' + $('#hora_entrada').val();
    var end = $('#fecha_salida').val() + ' ' + $('#hora_salida').val();
    
    // Perform AJAX call
    $.ajax({
        type: "POST",
        url: "./?action=select_comprobar2",
        data: { id_h: id_habitacion, start: start, end: end, id_p: id_p },
        success: function(response) {
            console.log(response);
            console.log(id_habitacion);
            console.log(start);
            console.log(end);
            console.log(id_p);
            if (response === '1') {
                alert('ERROR:\nEXISTE UN CONFLICTO DE FECHAS CON OTRA HABITACIÓN.\n\nSELECCIONA OTRA HABITACIÓN O AJUSTA LAS FECHAS DE ENTRADA Y SALIDA\n\nVERIFICA DISPONIBILIDAD EN EL MÓDULO DE RESERVACIONES.');
            } else if (response === '0') {
                if (start < hoy) {
                    alert('ERROR:\nLA FECHA DE ENTRADA NO PUEDE SER MENOR A LA FECHA ACTUAL');
                } else if (start > end) {
                    alert('ERROR:\nLA FECHA DE ENTRADA NO PUEDE SER MAYOR A LA FECHA DE SALIDA');
                } else {
                    
                    form.submit(); // Submit the form
                }
            }
        }
    });
    return false; // Prevent the default form submission
}

</script>
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->

</script>
<script type="text/javascript">
  $(function() {
    $("#nombre").autocomplete({
      source: "./?action=buscar_persona_nombre",
      minLength: 2,
      select: function(event, ui) {
        event.preventDefault();
        $('#documento').val(ui.item.documento);
        $('#nombre').val(ui.item.nombre);
        $('#giro').val(ui.item.giro);
        $('#estado_civil').val(ui.item.estado_civil);
        $('#nacionalidad').val(ui.item.nacionalidad);
        $('#medio_transporte').val(ui.item.medio_transporte);
        $('#destino').val(ui.item.destino);
        $('#ocupacion').val(ui.item.ocupacion);
        $('#motivo').val(ui.item.motivo);
        $('#direccion').val(ui.item.direccion);
        $('#id').val(ui.item.id);
      }
    });
  });
  
  </script>


<body id="minovate" class="appWrapper sidebar-sm-forced">
  <div class="row">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
        <li class="active"><a href="index.php?view=recepcion">recepción</a></li>
        <li class="active">Procesar</li>
      </ol>
    </section>
  </div>
  <?php
  ?>
  <?php if (isset($_GET['id_habitacion'])) { ?>
    <?php $habitacion = HabitacionData::getById($_GET['id_habitacion']);
    if (@count($habitacion) > 0) {
      // si hay habitacion
    ?>
      <div class="page page-ui-tiles" style="padding: 5px 5px;">
        <!-- row -->
        <div class="row">
          <!-- col -->
          <div class="col-md-2">
            <!-- tile -->
            <section class="tile bg-dutch">
              <!-- tile header -->
              <div class="tile-header dvd dvd-btm" style="padding: 5px;">
                <h1 class="custom-font"><strong>NOMBRE</strong></h1>
              </div>
              <!-- /tile header -->
              <!-- tile widget -->
              <div class="tile-widget" style="padding: 5px;">
                <p><?php echo $habitacion->nombre; ?> / DISPONIBLE</p>
              </div>
              <!-- /tile widget -->
            </section>
            <!-- /tile -->
          </div>
          <!-- /col -->
          <!-- col -->
          <div class="col-md-3">
            <!-- tile -->
            <section class="tile bg-dutch">
              <!-- tile header -->
              <div class="tile-header dvd dvd-btm" style="padding: 5px;">
                <h1 class="custom-font"><strong>TIPO / CATEGORÍA</strong> </h1>
              </div>
              <!-- /tile header -->
              <!-- tile widget -->
              <div class="tile-widget" style="padding: 5px;">
                <p><?php echo $habitacion->getCategoria()->nombre; ?></p>
              </div>
              <!-- /tile widget -->
            </section>
            <!-- /tile -->
          </div>
          <!-- /col -->
          <!-- col -->
          <div class="col-md-7">
            <!-- tile -->
            <section class="tile bg-dutch">
              <!-- tile header -->
              <div class="tile-header dvd dvd-btm" style="padding: 5px;">
                <h1 class="custom-font"><strong>DETALLES</strong> </h1>
              </div>
              <!-- /tile header -->
              <!-- tile widget -->
              <div class="tile-widget" style="padding: 5px;">
                <p><?php echo $habitacion->descripcion; ?></p>
              </div>
              <!-- /tile widget -->
            </section>
            <!-- /tile -->
          </div>
          <!-- /col -->
        </div>
        <!-- /row -->
      </div>
      <!-- row -->


      <!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->

        <form method="post" id="addproduct" action="index.php?view=addproceso" role="form">
          <div class="col-md-6">
            <!-- col -->
            <!-- tile -->
            <section class="tile">
              <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>DATOS DEL CLIENTE</strong></h1>
              </div>
              <!-- /tile header -->
              <div class="tile-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Tipo Documento&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <?php $tipo_documentos = TipoDocumentoData::getAll(); ?>
                    <select name="tipo_documento" id="tipo_documento" required class="form-control">
                      <?php foreach ($tipo_documentos as $tipo_documento) : ?>
                        <option value="<?php echo $tipo_documento->id; ?>"><?php echo $tipo_documento->nombre; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Documento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <input type="text" class="form-control" name="documento" id="documento" required="required" placeholder="Ingrese documento para buscar" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                                                      echo ProcesoData::getById($_GET['id_p'])->getCliente()->documento;
                                                                                                                                                                    } ?>">
                    <input type="hidden" id="id">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Nombres &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <input type="text" class="form-control" name="nombre" id="nombre" required placeholder="Ingrese nombres" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                      echo ProcesoData::getById($_GET['id_p'])->getCliente()->nombre;
                                                                                                                                    } ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Teléfono &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <input type="text" class="form-control col-md-8" name="estado_civil" id="estado_civil" placeholder="Ingrese Teléfono  (OPCIONAL)" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                                                echo ProcesoData::getById($_GET['id_p'])->getCliente()->estado_civil;
                                                                                                                                                              } ?>">
                  </div>


                </div>
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Correo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <input type="text" class="form-control col-md-8" name="direccion" id="direccion" placeholder="Ingrese E-mail (OPCIONAL)" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                                      echo ProcesoData::getById($_GET['id_p'])->getCliente()->direccion;
                                                                                                                                                    } ?>">
                  </div>
                </div>

                <?php
                if (100 <> 100) {
                  echo "HOLA DIFERENTE";
                }
                ?>
                <style>
                  .add_button {
                    display: inline-block;
                    padding: 5px 10px;
                    background-color: green;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    text-align: center;
                    cursor: pointer;
                  }
                </style>


                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Observación &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                    <input type="text" class="form-control col-md-8" name="motivo" id="motivo" value="<?php echo $nota; ?>">
                  </div>
                </div>


                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon"><strong> Datos Vehículares </strong></span>
                    <input type="text" class="form-control col-md-8" name="nacionalidad" placeholder="MARCA / MODELO / COLOR / PLACAS" id="nacionalidad">
                  </div>
                </div>



                <input type="hidden" name="tipo_servicio" value="1" id="tipo_servicio">
                <input type="hidden" class="form-control" name="destino" id="destino" value="-">
                <input type="hidden" name="ocupacion" value="1" id="ocupacion">
                <div class="field_wrapper">
                  <div>
                    <div class="input-group ">
                      <span class="input-group-addon" style="border-color: black;"><strong> Pasajeros &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
                      <input type="text" style="border-color: black;" class="form-control" name="pasajero[]" placeholder="Ingrese nombres">
                    </div>
                    <a href="javascript:void(0);" class="add_button" title="Agregar ">Agregar</a>
                  </div>
                </div>


                <input type="hidden" name="cant_pa" value="<?php echo $habitacion->getCategoria()->cant; ?>">
              </div>
            </section>
          </div>
          <div class="col-md-6">
            <section class="tile">
              <div class="tile-header dvd dvd-btm">
                <h1 class="custom-font"><strong>DATOS DE ALOJAMIENTO</strong></h1>

                <h1 style="float: right; color: green; font-weight: bold;">
                  <?php
                  if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                    echo "Abonado: $" . number_format(ProcesoData::getById($_GET['id_p'])->dinero_dejado, 2, '.', ',');
                    $abon=number_format(ProcesoData::getById($_GET['id_p'])->dinero_dejado);
                  } else {
                    echo "";
                  }
                  ?>
                </h1>
                <input type="hidden" name="dinero_abonado" id="dinero_abonado" value="<?php echo isset($_GET['id_p']) ? ProcesoData::getById($_GET['id_p'])->dinero_dejado : 0; ?>">


              </div>
              <!-- /tile header -->
              <div class="tile-body">
                <h4> <strong>
                    <?php
                    // Verifica si las fechas están presentes en la URL
                    if (isset($_GET['fechaEntrada']) && isset($_GET['fechaSalida'])) {
                      // Crea objetos DateTime para las fechas de entrada y salida
                      $fechaEntrada = new DateTime($_GET['fechaEntrada']);
                      $fechaSalida = new DateTime($_GET['fechaSalida']);

                      // Obtiene la diferencia entre las fechas
                      $diferencia = $fechaSalida->diff($fechaEntrada);

                      // Obtiene el número de días de la diferencia
                      $dias = $diferencia->days;

                      // Imprime el número de días con estilo
                      echo "<strong><span style='color: red;'>Días de la Estadía:</span></strong> <span style='color: red;'>$dias</span>";
                    } else {
                      echo "";
                    }

                    ?></strong></h4>
                <div class="form-group">
                  <label for="pr-subject"><strong>Selecciona tarifa:</strong></label>
                  <select class="form-control" onchange="CargarTarifa(this.value);" required name="id_tarifa">
                    <?php $tarifas_ha = TarifaData::getAllCategoria($habitacion->id_categoria); ?>
                    <option value="">--- Selecciona ---</option>
                    <?php foreach ($tarifas_ha as $tarifa_ha) : ?>
                      <option value="<?php echo $tarifa_ha->id; ?>"><?php echo $tarifa_ha->nombre . ' // ' . $tarifa_ha->precio;; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <input type="hidden" name="cantidad" value="1">
                <input type="hidden" name="tarjeta_e" value="Entregada">
                <input type="hidden" name="observacion" value="Turismo">
                <input type="hidden" name="pagado" value="1">
               
                <div id="mostrar_precio">
                
                </div>
                
                <h5>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="pr-subject"><br><strong>Total Pagado:</label>
                        <input type="hidden" name="monto_abonado" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                            echo ProcesoData::getById($_GET['id_p'])->dinero_dejado;
                                                                          } else {
                                                                            echo "";
                                                                          } ?>">
                        <input type="text" name="monto" id="monto" required="" onkeyup="formatDecimal(this)" class="form-control" style="border-color: red;" value="">
                      </div>
                    </div>
                  </div>
                  <h5 style="text-decoration: underline;">Medios de pago</h5>
                <h5>
                  <select class="form-control" onchange="CargarMediopago(this.value);" required name="id_tipo_pago">
                    <?php $medipagos = TipoPagoData::getAll();
                    if (@count($medipagos) > 0) { ?>
                      <?php foreach ($medipagos as $mediopago) : ?>
                        <option <?php if (isset($habitacion->id_tipo_pago) && $mediopago->id == $habitacion->id_tipo_pago) {
                                  echo "selected";
                                } ?> value="<?php echo $mediopago->id; ?>"><?php echo $mediopago->nombre; ?></option> <?php endforeach; ?>
                    <?php } else {
                    }; ?>
                  </select>
                </h5>
                  <input type="hidden" id="dolarhoy" name="dolarhoy" value="<?php echo $dolarhoy; ?>">
                  <div class="form-group" id="mostrar_efectivo">
                  </div>
                  <div class="form-group" id="mostrar_mediopago">
                  </div>
                  <input type="hidden" value="0" name="id_comisionista">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="pr-subject"><br><strong>Descripción<strong></label>
                        <input type="text" name="aval" class="form-control" placeholder="Ingrese Descripción">
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="display: none;">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="pr-subject"><strong>Tipo comprobante<strong></label>
                        <select class="form-control select2" required name="comprobante">
                          <?php $tipocomprobantes = TipoComprobanteData::getAll(); ?>
                          <?php foreach ($tipocomprobantes as $tipocomprobante) : ?>
                            <option value="<?php echo $tipocomprobante->id; ?>"><?php echo $tipocomprobante->nombre; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pr-subject"><strong>Fecha entrada:<strong></label>
                        <input type="date" class="form-control" name="fecha_entrada" id="fecha_entrada" data-inputmask='"mask": "(999) 999-9999"' value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                                            echo date("Y-m-d", strtotime(ProcesoData::getById($_GET['id_p'])->fecha_entrada));
                                                                                                                                                          } else {
                                                                                                                                                            echo $hoy;
                                                                                                                                                          } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <?
                        echo "Por favor, proporciona ambas fechas.";
                        ?>
                        <label for="pr-subject"><strong>Hora entrada:<strong></label>
                        <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" value="<?php echo $hora; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pr-subject"><strong>Fecha salida:<strong></label>
                        <input type="date" class="form-control" name="fecha_salida" id="fecha_salida" data-inputmask='"mask": "(999) 999-9999"' value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                                                                                                          echo date("Y-m-d", strtotime(ProcesoData::getById($_GET['id_p'])->fecha_salida));
                                                                                                                                                        } else {
                                                                                                                                                          echo $hoy;
                                                                                                                                                        } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pr-subject"><strong>Hora salida:<strong></label>
                        <input type="time" class="form-control" id="hora_salida" name="hora_salida" value="<?php echo $horaSalida; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <?php
                    ?>
                    <div class="modal fade bs-example-modal-xm" id="myModalVoucher" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-info">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title"><span class="fa fa-spinner"></span> REGISTRAR CORRELATIVO</h4>
                            </div>
                            <div class="modal-body" style="background-color:#fff !important;">
                              <div class="row">
                                <div class="col-md-offset-1 col-md-10">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"> Nro Comprobante </span>
                                      <input type="text" class="form-control" name="nro_folio" value="NULL" placeholder="Ejem. T-0001">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-outline btn-primary pull-left close" data-dismiss="modal">Aceptar </button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                    </div>
                  </div>
                  <div class="tile-footer">
                    <div class="form-group ">
                      <a href="index.php?view=recepcion" style="font-size: bold;" class="btn btn-danger">Cancelar</a>
                      <input type="hidden" name="id_habitacion" value="<?php echo $habitacion->id; ?>">
                      <input type="hidden" name="id_proceso" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {
                                                                      echo $_GET['id_p'];
                                                                    } ?>">
                     <input type="hidden" id="id_p" name="id_proceso" value="<?php if (isset($_GET['id_p']) and $_GET['id_p'] != "") {echo $_GET['id_p'];} ?>">
                      <button type="submit" class="btn btn-success pull-right" onclick="return validarExtension(this.form)">Registrar ingreso</button>

            </section>
          </div>
        </form>
    <!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->
<!----------------------------------------------------------------------->


      <!-- /.box -->
    <?php } else {
      echo "<h4 class='alert alert-success'>NO EXISTE ESTA HABITACIÓN</h4>";
    }; ?>
  <?php } else {
    echo "<h4 class='alert alert-success'>NO SE SELECCIONÓ HABITACIÓN</h4>";
  }; ?>
  </section>
  </div>
  <style>
    .modal-title {
      text-align: center;
      /* Centra el texto horizontalmente */
      color: red;
      /* Aplica el color rojo al texto */
      font-weight: bold;
      /* Hace que el texto sea negrita */
    }
  </style>

  </div>
  <!-- MODAL CANDADO -->
  <div class="modal fade bs-example-modal-lg" id="confirmarcambio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="myModalLabel"><i class="fa fa-alert"></i> ALERTA!!</h2>
        </div>

        <div class="modal-body">
          <h3><strong>DESBLOQUEAR PRECIO DE TARIFA POR DÍA</strong></h3>
          <div class="row">
            <div class="col-md-12" style="padding-top: 20px;">
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-3 control-label"><strong>NOMBRE DE USUARIO</strong></label>
                <div class="col-md-8">
                  <input type="text" name="nombre" id="idnombre" required class="form-control" id="address1" placeholder="Ingrese nombre">
                </div>
              </div>
              <div class="form-group" style="padding-top: 40px;">
                <label for="inputEmail1" class="col-lg-3 control-label"><strong>RAZÓN DEL DESBLOQUEO</strong></label>
                <div class="col-md-8">
                  <input type="text" name="razon" id="idrazon" required class="form-control validanumericos" placeholder="Ingrese la razón">
                  <input type="hidden" name="idhab" id="idhab" value="<?php echo $habitacion->nombre; ?>">
                  <input type="hidden" name="idfolio" id="idfolio" value="null">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="#" onclick="agregar_error()" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c" data-dismiss="modal"><i class="fa fa-arrow-right"></i><strong>QUITAR CANDADO</strong></a>
          <button class="btn btn-lightred btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i><strong>Cancelar</strong></button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN MODAL CANDADO -->
  <script>
    $(function() {
      $("#fechamin").datepicker();
    });
  </script>
  <script>
    $(function() {
      $("#fechamax").datepicker();
    });
  </script>
  </head>

  <body>
    <script>
      function formatDecimal(input) {
        // Reemplaza caracteres no permitidos excepto números y un punto decimal
        input.value = input.value.replace(/[^0-9.]/g, '');

        // Reemplaza múltiples puntos decimales con uno solo
        input.value = input.value.replace(/(\..*)\./g, '$1');

        // Asegúrate de que no comience con un punto decimal
        input.value = input.value.replace(/^\./, '');

        // Asegúrate de que no haya más de dos decimales
        var decimalCount = (input.value.match(/\./g) || []).length;
        if (decimalCount > 1) {
          var parts = input.value.split('.');
          input.value = parts[0] + '.' + parts[1].slice(0, 2);
        }
      }
    </script>


    <script>
      $(document).ready(function() {
        var maxField = 10; // Numero maximo de campos
        var addButton = $('.add_button'); // Selector del boton de Insertar
        var wrapper = $('.field_wrapper'); // Contenedor de campos
        var fieldHTML = '<style>.remove_button {display: inline-block;padding: 5px 15px;background-color: red;color: white;text-decoration: none;border-radius: 5px;text-align: center;cursor: pointer;transition: background-color 0.3s ease;}.remove_button:hover {background-color: darkred;}</style><div><br><input type="text" name="pasajero[]" value="" class="form-control" placeholder="Ingrese nombres"><a href="javascript:void(0);" class="remove_button" title="Quitar">Quitar</a></div>';
        var x = 1; // Iniciamos el contador a 1
        $(addButton).click(function() { // Una vez que se haga clic en el boton
          if (x < maxField) { //Comprobamos el maximo
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Añadimos el HTML
          }
        });
        $(wrapper).on('click', '.remove_button', function(e) { // Una vez se ha hecho clic en el boton de eliminar
          e.preventDefault();
          $(this).parent('div').remove(); //Eliminamos el div
          x--; // Reducimos el contador a 1
        });
      });
      sumaFecha = function(d, fecha) {
        var Fecha = new Date();
        var sFecha = fecha || (Fecha.getFullYear() + "-" + (Fecha.getMonth() + 1) + "-" + Fecha.getDate());
        var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
        var aFecha = sFecha.split(sep);
        var fecha = aFecha[0] + '/' + aFecha[1] + '/' + aFecha[2];
        fecha = new Date(fecha);
        fecha.setDate(fecha.getDate() + parseInt(d));
        var anno = fecha.getFullYear();
        var mes = fecha.getMonth() + 1;
        var dia = fecha.getDate();
        mes = (mes < 10) ? ("0" + mes) : mes;
        dia = (dia < 10) ? ("0" + dia) : dia;
        var fechaFinal = anno + sep + mes + sep + dia;
        return (fechaFinal);
      }


      function CargarTarifa(val) {
        $('#mostrar_precio').html("Por favor espera un momento");
        $.ajax({
          type: "POST",
          url: 'index.php?action=tarifa',
          data: 'id=' + val,
          success: function(resp) {
            $('#mostrar_precio').html(resp);
          }
        });
      };

      function CargarEfectivo(val) {
        $('#mostrar_efectivo').html("Por favor espera un momento");
        $.ajax({
          type: "POST",
          url: 'index.php?action=mostrar_efectivo',
          data: 'id=' + val,
          success: function(resp) {
            $('#mostrar_efectivo').html(resp);
            // PARA DOLARES
            m1 = document.getElementById("precio").value;
            m2 = document.getElementById("cant_noche").value;
            extra = document.getElementById("extra").value;
            r = (m1 * m2) + parseInt(extra);
            document.getElementById('totalpagar').innerHTML = r;
            document.getElementById('abon').innerHTML = abon;
            adelantoo = document.getElementById("monto").value;
            document.getElementById('adelantoo').innerHTML = adelantoo;
            dolarhoy = document.getElementById("dolarhoy").value;
            document.getElementById('dolarhoytxt').innerHTML = dolarhoy;
            // CIERRE DOLARES
          }
        });
      };

      function CargarMediopago(val) {
        m1 = document.getElementById("precio").value;
        m2 = document.getElementById("cant_noche").value;
        extra = document.getElementById("extra").value;
        r = (m1 * m2) + parseInt(extra);
         abon = document.getElementById("dinero_abonado").value;
        var adelantoo = $('#monto').val();
        var dolarhoy = $('#dolarhoy').val();
        var parametros = {
          "id": val,
          "adelanto": adelantoo,
          "totalpagar": r,
          "dolarhoy": dolarhoy,
          "abon": abon
        };
        $.ajax({
          type: "POST",
          url: 'index.php?action=mediopago',
          data: parametros,
          beforeSend: function(objeto) {
            $("#mostrar_mediopago").html("Mensaje: Cargando...");
          },
          success: function(datos) {
            $('#mostrar_mediopago').html(datos);
          }
        });
      };

      function MostrarDocumento(val) {
        $('#mostrar_documento').html("Por favor espera un momento");
        $.ajax({
          type: "POST",
          url: 'index.php?action=documento',
          data: 'id=' + val,
          success: function(resp) {
            $('#mostrar_documento').html(resp);
          }
        });
      };

      function MostrarSelectMedioPago(val) {
        $('#mostrar_selectmediopago').html("Por favor espera un momento");
        $.ajax({
          type: "POST",
          url: 'index.php?action=select_mediopago',
          data: 'id=' + val,
          success: function(resp) {
            $('#mostrar_selectmediopago').html(resp);
          }
        });
      };

      function agregar_error() {
        var nombre = $('#idnombre').val();
        var razon = $('#idrazon').val();
        var precio = $('#precio').val();
        var hab = $('#idhab').val();
        var folio = $('#idfolio').val();
        //Inicia validacion
        if (nombre == "") {
          alert('Ingrese nombre');
          document.getElementById('idnombre').focus();
          return false;
        }
        if (razon == "") {
          alert('Ingrese razon');
          document.getElementById('idrazon').focus();
          return false;
        }

        //Fin validacion
        var parametros = {
          "nombre": nombre,
          "razon": razon,
          "precio": precio,
          "hab": hab,
          "folio": folio
        };
        $.ajax({
          type: "POST",
          url: "./?action=agregar_errorc",
          data: parametros,
          beforeSend: function(objeto) {
            $("#resultados").html("Mensaje: Cargando...");
          },
          success: function(datos) {
            var emailInput = document.getElementById('precio');
            emailInput.readOnly = false;
            $("#resultados").html(datos);
          }
        });
      }
    </script>