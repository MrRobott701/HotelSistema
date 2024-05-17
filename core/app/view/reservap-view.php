<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' /> 
<!-- jQuery 2.2.3 -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- jQuery UI 1.11.4 -->
</head>
<body>
    <center><h1>Reservación En Grupo</h1></center>
    <div style="padding: 10px;">
      <div class="modal-content modal-success">
     <div class="modal-header">
    <div class="inline-elements">
    <div>
        <h4 class="modal-title" id="titleEvent"></h4>
        <span id="numeroReserva" style="display: none;"></span>
    </div>
    <div>
        <h3 class="modal-title">Nro. DE RESERVA :</h3>
    </div>
    <div>
        <input type="text" class="form-control" style="font-weight: bold; font-size: 1.5em;margin: right 50px;" name="num_reserva" id="num_reserva" required placeholder="Numero de Reserva">
    </div>
</div>
</div>
        <div class="modal-body" style="background-color: #f5eded !important;">
          <div class="row">
            <div class="col-md-2">
            <div class="form-group">  
                <div >
                    <strong><h3>Habitaciones</h3></strong>
                    <select name="id_habitacion[]" id="id_habitacion" class="form-control" multiple style="display: none;">
    <?php $rooms = HabitacionData::getHabitaciones();?>
    
    <?php foreach($rooms as $room):?> 
        <option value="<?php echo $room->id;?>" style="font-size: 4em;"><?php echo $room->nombre;?></option>
    <?php endforeach;?>
</select>
<div class="checkbox-list">
    <?php foreach($rooms as $room):?>
        <div class="checkbox">
            <label>
                <input type="checkbox" class="room-checkbox" value="<?php echo $room->id;?>">
                <?php echo $room->nombre;?>
            </label>
        </div>
    <?php endforeach;?>
</div>
<script>
    // JavaScript para manejar la selección de habitaciones
    $(document).ready(function(){
        // Escuchar el cambio en las casillas de verificación
        $('.room-checkbox').change(function(){
            var selectedRooms = []; // Array para almacenar las habitaciones seleccionadas

            // Iterar sobre todas las casillas de verificación
            $('.room-checkbox').each(function(){
                if($(this).is(':checked')) {
                    selectedRooms.push($(this).val()); // Agregar el valor de la casilla de verificación seleccionada al array
                }
            });

            // Actualizar el valor del select con las habitaciones seleccionadas
            $('#id_habitacion').val(selectedRooms);
        });
    });
</script>
<style>
    /* Estilo para ocultar el select original */
    select#id_habitacion {
        display: none;
    }
</style>
                </div> 
                </div>
                </div> 
              <div class="col-md-10">
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon" style="font-size: 1.5em;"> Check In  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input style="font-size: 1.5em;" type="date" class="form-control" name="txtDate" id="txtDate" required value="12:00">
                    <span class="input-group-addon" style="font-size: 1.5em;"> Hora</span>
                    <input style="font-size: 1.5em;" type="time" class="form-control" name="txtHour" id="txtHour"  required >
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon" style="font-size: 1.5em;"> Check Out &nbsp;&nbsp; &nbsp;</span>
                    <input style="font-size: 1.5em;" type="date" class="form-control" name="txtDateEnd" id="txtDateEnd"  required >
                    <span style="font-size: 1.5em;" class="input-group-addon" > Hora &nbsp;&nbsp;</span>
                    <input  style="font-size: 1.5em;" type="time" class="form-control"  name="txtHourEnd" id="txtHourEnd" required >
                </div>
              </div>
              <div class="form-group">  
                <div class="input-group">
                  <span class="input-group-addon" style="font-size: 1.5em;" >Tipo  Documento </span>
                  <?php $tipo_documentos = TipoDocumentoData::getAll();?>
                                    <select name="tipo_documento" id="tipo_documento" required class="form-control">
                                    <?php foreach($tipo_documentos as $tipo_documento):?>
                                      <option style="font-size: 1.5em;" value="<?php echo $tipo_documento->id;?>" ><?php echo $tipo_documento->nombre;?></option>
                                    <?php endforeach;?>
                                    </select> 
                </div>
              </div>
              <div class="form-group">  
                <div class="input-group">
                  <span class="input-group-addon" style="font-size: 1.5em;" >‎ Documento</span>
                  <input style="font-size: 1.5em;" type="text" class="form-control" name="documento" id="documento" required placeholder="Ingrese documento">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon" style="font-size: 1.5em;"> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Nombre </span>
                  <input style="font-size: 1.5em;" type="text" class="form-control" name="nombre" id="nombre" required placeholder="Nombre Completo">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon" style="font-size: 1.5em;">&nbsp;&nbsp; &nbsp;&nbsp;Teléfono</span>
                  <input style="font-size: 1.5em;" type="text" class="form-control" name="estado_civil" id="estado_civil" required placeholder="Teléfono">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon" style="font-size: 1.5em;" >&nbsp;&nbsp;&nbsp;Correo e.</span>
                  <input style="font-size: 1.5em;"  type="text" class="form-control" name="direccion" id="direccion" required placeholder="E-mail">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span style="font-size: 1.5em;" class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nota&nbsp;</span>
                  <input  style="font-size: 1.5em;" type="text" class="form-control" name="descripcion" id="descripcion" required placeholder="Nota de la Reserva">
                </div>
              </div>
                            <div class="form-group"> 
                  <input type="hidden" class="form-control" name="num_reserva" id="num_reserva" required placeholder="Numero de Reserva">
               <!-- </div>-->
              </div> 
              <div class="form-group"> 
                <div class="input-group">
                    <span style="font-size: 1.5em;" class="input-group-addon">Reserva Confirmada</span>
                     <select style="font-size: 1.5em;" name="estado" id="estado" class="form-control">
                      <option style="font-size: 1em;" value="3">No confirmado</option>
                      <option style="font-size: 1em;" value="4">Confirmado</option>
                    </select>  
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span style="font-size: 1.5em;" class="input-group-addon">&nbsp;Pago Adelantado&nbsp;&nbsp;&nbsp;&nbsp; </span>
                  <input style="font-size: 1.5em;"  type="text" class="form-control" name="dinero_dejado" id="dinero_dejado" required="" value="0" placeholder="Se Agregará en el Corte de Caja"  style="font-size: 1.5em;">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                    <span style="font-size: 1.5em;" class="input-group-addon"> Forma de Pago </span>
                     <select style="font-size: 1.3em;" name="tipopago" id="tipopago" class="form-control">
                     <option style="font-size: 1.5em;" value="1">EFECTIVO</option> 
                     <option style="font-size: 1.5em;"value="2">TARJETA DEBITO / CREDITO</option>
                      <option style="font-size: 1.5em;" value="3"> DEPÓSITO O TRANSFERENCIA</option>
                      <option style="font-size: 1.5em;"value="6">DOLARES</option>
                      <option style="font-size: 1.5em;" value="7">EXPEDIA</option>
                    </select>  
                </div>
                <div class="text-right" style="padding: 10px;">
    <strong><button type="button" class="btn btn-success btn-lg btn-rounded" id="btnAdd">Agregar</button></strong>
    <button type="button" class="btn btn-info btn-lg btn-rounded" id="btnUpdate">Limpiar</button>
    <a href="index.php?view=reserva"  class="btn btn-warning btn-lg btn-rounded">Salir</a>

  </div>


              </div>
            </div>                       
           </div>
          <input type="hidden" id="txtId" name="txtId"><br>
        </div>
        <div class="modal-footer" >
        </div>
      </div> 
    </div>
  </div>
</head>
<script>
$('#btnAdd').click(function(){
    
    var habitaciones = $("#id_habitacion").val();
    var num_reserva = $("#num_reserva").val();
    var finicio = $("#txtDate").val() + " " + $("#txtHour").val();
    var ffin = $("#txtDateEnd").val() + " " + $("#txtHourEnd").val();

    // Obtener la fecha y hora actual en la zona horaria de Tijuana
    var fechaHoraActual = new Date().toLocaleString("en-US", {timeZone: "America/Tijuana"});

    // Convertir la fecha y hora actual a formato ISO para obtener la fecha en "YYYY-MM-DD" y la hora en "HH:mm:ss"
    var fechaActual = new Date(fechaHoraActual).toISOString().slice(0,10);
    var horaActual = fechaHoraActual.slice(11,19);

    // Restar un día a la fecha actual
    var fechaMenosUnDia = new Date(fechaActual);
    fechaMenosUnDia.setDate(fechaMenosUnDia.getDate() - 2);

    // Obtener la fecha en formato "YYYY-MM-DD"
    var fechaMenosUnDiaFormateada = fechaMenosUnDia.toISOString().slice(0,10);

    // Concatenar la fecha y la hora actual en el formato que necesitas (formato de 24 horas)
    var fechaHoraInicio = fechaMenosUnDiaFormateada + " " + horaActual;
    console.log("Fecha y hora actual en Tijuana menos un día (formato de 24 horas):", fechaHoraInicio);

    var habitacionesConErrores = []; // Array para almacenar nombres de habitaciones con errores
     
    var promesas = []; // Almacena las promesas de las solicitudes AJAX

    // Iterar sobre cada habitación seleccionada
    $.each(habitaciones, function(index, id_habitacion) {
        var parametros = {"start": finicio, "end": ffin, "id_h": id_habitacion};
        
        // Crear una nueva promesa para la solicitud AJAX y agregarla al array de promesas
        var promesa = new Promise(function(resolve, reject) {
            $.ajax({
                type: "POST",
                url: "./?action=select_comprobar",
                data: parametros,
                beforeSend: function(objeto){ },
                success: function(datos){
                    console.log(datos + ' id habitacion:' + id_habitacion);
                    if(datos != 0 ){
                        // Si hay conflicto, obtener el nombre de la habitación
                        $.ajax({
                            type: "POST",
                            url: "./?action=obtener_nombre",
                            data: { id: id_habitacion },
                            success: function(nombre_habitacion) {
                                // Agregar el nombre de la habitación al array de habitaciones con errores
                                habitacionesConErrores.push(nombre_habitacion);
                                // Resolver la promesa ya que se encontró un error
                                resolve();
                            }
                        });
                    } else {
                        // Si no hay conflicto, resolver la promesa
                        resolve();
                    }
                }
            });
        });

        // Agregar la promesa al array de promesas
        promesas.push(promesa);
    });

    // Esperar a que todas las promesas se resuelvan o se rechacen
    Promise.all(promesas).then(function() {
        // Si todas las promesas se resolvieron (no hubo conflictos), mostrar el modal de confirmación
        if (habitaciones.length > 0 && num_reserva) {
            // Si hay habitaciones con errores, mostrar una alerta con los nombres de esas habitaciones
            if (habitacionesConErrores.length > 0) {
                var erroresText = "LAS SIGUIENTES HBAITACIONES ESTÁN OCUPADAS\nEN ESE LAPSO DE TIEMPO:\n";
               
                
                $.each(habitacionesConErrores, function(index, nombre_habitacion) {
                    erroresText += "Habitación #" + nombre_habitacion;
                });
                alert(erroresText);
            } else {
                // Si no hay errores, mostrar el modal de confirmación
                $('#confirmModal').modal('show');
                // Al hacer clic en el botón de confirmación dentro del modal
                $('#confirmAdd').click(function() {
                    var formData = {
                        documento: $("#documento").val(),
                        nombre: $("#nombre").val(),
                        direccion: $("#direccion").val(),
                        estado_civil: $("#estado_civil").val(),
                        descripcion: $("#descripcion").val(),
                        dinero_dejado: $("#dinero_dejado").val(),
                        estado: $("#estado").val(),
                        tipopago: $("#tipopago").val(),
                        tipo_documento: $("#tipo_documento").val(),
                        start: $("#txtDate").val() + " " + $("#txtHour").val(),
                        end: $("#txtDateEnd").val() + " " + $("#txtHourEnd").val()
                    };
                    // Inicializar un array para almacenar las habitaciones seleccionadas
                    formData.id_habitacion = habitaciones;
                    
                    // Enviar los datos del formulario para cada habitación seleccionada
                    $.each(formData.id_habitacion, function(index, id_habitacion){
                        formData.num_reserva = num_reserva;
                        formData.id_habitacion = id_habitacion; // Asignar la habitación actual
                        DataSendUI('agregar', formData);
                    });
                    // Cierra el modal de confirmación
                    $('#confirmModal').modal('hide');
                    $('#win').modal('show');
                    limpiar();
                });

                // Mostrar los IDs de las habitaciones seleccionadas en el modal de confirmación
                var habitacionesText = habitaciones.join(", ");
                $('#habitacionesSeleccionadas').text(habitacionesText);
            }
        } else {
            alert('Ingresa datos');
        }
    });
});





    $('#btnUpdate').click(function(){  
      DataGUI();
      DataSendUI('actualizar_nuevo',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
    });
    <?php $numeroReserva = rand(100, 1000);?>
  function limpiar() {
      var nuevoNumero = Math.floor(Math.random() * (1000 - 100 + 1) + 100);
        document.getElementById("txtId").value = "";
        document.getElementById("id_habitacion").value = "";
        document.getElementById("documento").value = "";
        document.getElementById("nombre").value = "";
        document.getElementById("direccion").value = "";
        document.getElementById("txtDate").value = "";
        document.getElementById("txtDateEnd").value = "";
        document.getElementById("estado_civil").value = "";
        document.getElementById("num_reserva").value = "C-0" + nuevoNumero;
        document.getElementById("dinero_dejado").value = "";
        document.getElementById("descripcion").value = "";
        $("#titleEvent").empty();
    $('.room-checkbox').prop('checked', false);
    $('#id_habitacion').val([]);
    }
    function DataGUI(){
        NewEvent={ 
        // TABLE EVENTO 
        id:$('#txtId').val(),
        id_habitacion:$('#id_habitacion').val(),
        documento:$('#documento').val(),
        nombre:$('#nombre').val(),
        direccion:$('#direccion').val(),
        estado_civil:$('#estado_civil').val(),
        num_reserva:$('#num_reserva').val(),
        dinero_dejado:$('#dinero_dejado').val(),
        estado:$('#estado').val(),
        tipopago:$('#tipopago').val(),
        descripcion:$('#descripcion').val(),
        tipo_documento:$('#tipo_documento').val(),
        start:$('#txtDate').val()+" "+$('#txtHour').val(),
        end:$('#txtDateEnd').val()+" "+$('#txtHourEnd').val()
      };
    }
    function DataSendUI(accion,objEvento){ 
        $.ajax({
          type:'POST',
          url:'index.php?action=reserva&accion='+accion,
          data:objEvento, 
          success:function(msg){
            if (msg){
              $('#calendar').fullCalendar('refetchEvents');
              if(!modal){
              $('#ModalEvent').modal('toggle');
              $('#ModalRoom').modal('toggle');
              }
            }
          },
          error:function(){
            $('#calendar').fullCalendar('refetchEvents');
              if(!modal){
              $('#ModalEvent').modal('toggle');
              $('#ModalRoom').modal('toggle');
              }
          }
        });
    }

</script>
<script>
$(document).ready(function(){
    // Llamar a la función asociada al botón "Actualizar" al cargar la página
    $('#btnUpdate').click();
});
</script>



<!-- Modal de confirmación -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong><h2 class="modal-title" id="confirmModalLabel">Confirmar acción</h2></strong>
      </div>
      <div class="modal-body" style="font-size: 1.5em;">
        ¿Estás seguro de que deseas agregar la reserva?
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg btn-rounded" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success btn-lg btn-rounded" id="confirmAdd">Agregar</button>
      </div>
    </div>
  </div>

  <!-- Modal de confirmación -->
<div class="modal fade" id="win" tabindex="-1" role="dialog" aria-labelledby="winLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong><h2 class="modal-title" id="winLabel">GRUPO REGISTRADO CON ÉXITO</h2></strong>
      </div>
      </div>
      <div class="modal-footer">
      <a href="index.php?view=reservap"  class="btn btn-success btn-lg btn-rounded">Aceptar</a>

      </div>
    </div>
  </div>


</div>
</body>
</html>