<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' /> 
<script src='lib/locale/es.js'></script>
<!-- jQuery 2.2.3 -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href='lib/fullcalendar.min.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='lib/scheduler.min.css' rel='stylesheet' />
<script src='lib/moment.min.js'></script>
<script src='lib/fullcalendar.min.js'></script>
<script src='lib/scheduler1.min.js'></script>

<style>
  body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 20px;
  }
  p {
    text-align: center;
  }
.tooltip.top {
    padding: 5px 0;
    margin-top: 3px !important;
}
  #calendar {
    max-width: 3000px !important;
    margin: 50px auto;
  }


  .fc-head .fc-time-area.fixed { 
  position:fixed; 
  width: 89.9%; 
  z-index: 500; 
  background-color: #E3E3E3; 
}


  .fc-resource-area td {
    cursor: pointer;
  }
  .close{
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 1;
  }
  .fc-timeline-event .fc-time {
    font-weight: 700;
    padding: 0 1px;
    display: none !important;
}
#popover-content{
  font-size: 13px;
} 
.pop-title {
    display: none;
    color: blue;
    font-size: 15px;
}
.pop-content {
    display: none;
    color: red;
    font-size: 10px;
}
.tooltip-inner {
    max-width: 200px;
    padding: 3px 8px;
    color: #000;
    text-align: center;
    text-decoration: none;
    background-color: #ffffff;
    border-radius: 4px;
}
.tooltip.top .tooltip-arrow {
    bottom: 0;
    left: 50%;
    margin-left: -5px;
    border-width: 5px 5px 0;
    border-top-color: #fff;
}

.inline-elements {
    display: flex;
    align-items: center;
}

.inline-elements h4 {
    margin-right: 5px; /* Ajusta este valor según tu preferencia para el espacio entre elementos */
}

.inline-elements h4.modal-title:last-child {
    margin-left: 44px; /* Ajusta este valor para dar más espacio solo al último h4 */
}


</style>
</head>
<body>


<a style="margin-top: 50px;" href="index.php?view=reservap"  class="btn btn-warning btn-lg btn-rounded">Reservar Grupo</a>

<a style="margin-top: -57px; margin-left: 83%; width: 17%;" class="btn btn-info btn-lg btn-rounded" data-toggle="modal" data-target="#Tarifas">Tarifas</a>



<!-- Modal Tarifas-->

<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">      
<script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
<script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
<script src="assets/js/vendor/footable/footable.all.min.js"></script>
<script src="assets/js/main.js"></script>

       
<div class="modal fade bs-example-modal-xl" id="Tarifas" role="dialog" aria-labelledby="myModalLabel">
        
          <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius:20px;"> 
<!-- Modal Header -->
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                <h1 class="custom-font"><strong>REGISTRO DE TARIFAS</strong></h1>          
              </div> 
<!-- Modal Body -->
              <div class="modal-body">
              <div class="tile-body">
        <div class="form-group">
          <strong><a for="filter" style="color:#000; padding-top: 5px; font-size:25px;">CATEGORÍA:</a></strong>
          <input id="filter" type="text" class="form-control input-sm w-sm mb-12 inline-block" style="font-size: 23px;"/>
        </div>
              <?php $tarifas = TarifaData::getAll();
                if(@count($tarifas)>0){
                  // si hay tarifas
                  ?>
                  <table id="searchTextResults" data-filter="#filter" data-page-size="20" class="footable table table-custom" style="font-size: 20px; color:#000;">
                  <thead>
                        <th>NOMBRE DE TARIFA</th>
                        <th>PRECIO</th>
                        <th>CATEGORÍA</th>
                  </thead>
                   <?php foreach($tarifas as $tarifa):?>
                      <tr>
                        <td><?php echo $tarifa->nombre; ?></td>
                        <td>$<?php echo $tarifa->precio; ?></td>
                        <td><?php if($tarifa->id_categoria!=null){ echo $tarifa->getCategoria()->nombre;}?></td>
                      </tr>  
                    <?php endforeach; ?>
               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";
                };
                ?>
                </table> 
<!-- Paginación -->
<div class="text-center">
    <ul class="pagination">
        <li class="footable-page-arrow disabled" >
            <a data-page="first" style="border-radius:5px; margin-left:4px; margin-right:4px;" href="#">«</a>
        </li>
        <li class="footable-page-arrow disabled">
            <a data-page="prev" style="border-radius:5px; margin-left:4px; margin-right:4px;" href="#">‹</a>
        </li>
        <li class="footable-page active">
            <a href="#" style="border-radius:5px; margin-left:4px; margin-right:4px;">1</a>
        </li>
        <!-- Puedes agregar más números de páginas aquí según sea necesario -->
        <li class="footable-page-arrow">
            <a data-page="next" style="border-radius:5px; margin-left:4px; margin-right:4px;" href="#">›</a>
        </li>
        <li class="footable-page-arrow">
            <a data-page="last" style="border-radius:5px; margin-left:4px; margin-right:4px;" href="#">»</a>
        </li>
    </ul>
</div>
           </div>
              </div> 
<!-- Modal Footer -->
              <div class="modal-footer" style="border-radius:8px;"> 
              <button class="btn btn-danger  pull-left" style="border-radius:5px; font-size:20px;" data-dismiss="modal"><i class="fa fa-arrow-left"  aria-hidden="true"></i> Cerrar</button>
              </div>
                         
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      
        <!-- /.modal -->

         <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>

<style>
    /* Estilos para la tabla */
    .table-custom {
        width: 100%;
    }

    /* Estilos para las celdas de la tabla */
    .table-custom td, .table-custom th {
        border: 1px solid #000;
        padding: 8px;
    }

    /* Estilos para el encabezado de la tabla */
    .table-custom thead {
        background-color: #000;
        color: white;
    }

    /* Estilos para las filas impares */
    .table-custom tbody tr:nth-child(odd) {
        background-color: #ff9d00;
    }

    /* Estilos para el enlace de paginación */
    .pagination a {
        border-radius: 5px;
        margin-left: 4px;
        margin-right: 4px;
    }
</style>

      </div>
<!-- Modal End-->











<div id='calendar' style="margin-top:3px;"></div>
  <!-- Modal add. update, delete-->
  <div class="modal fade" id="ModalEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-success">


     <div class="modal-header">
    <div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="inline-elements">
    <div>
        <h4 class="modal-title" id="titleEvent"></h4>
        <span id="numeroReserva" style="display: none;"></span>
    </div>
    <div>
        <h4 class="modal-title">Nro. DE RESERVA :</h4>
        
    </div>
    <div>
        <input type="text" class="form-control" style="font-weight: bold; font-size: 1.0em;margin: right 50px;" name="num_reserva" id="num_reserva" required placeholder="Numero de Reserva">
    </div>
</div>




</div>



        <div class="modal-body" style="background-color: #f5eded !important;">
          <div class="row">
            <div class="col-md-offset-1 col-md-10">
              <div class="form-group">  
                <div class="input-group">
                    <span class="input-group-addon"> Habitación &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                     <select name="id_habitacion" id="id_habitacion" class="form-control">
                      <?php $rooms = HabitacionData::getAll();?>
                      <?php foreach($rooms as $room):?>
                      <option value="<?php echo $room->id;?>"><?php echo $room->nombre;?></option>
                      <?php endforeach;?>
                    </select> 
                </div> 
              </div>
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Check In  &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <input type="date" class="form-control" name="txtDate" id="txtDate" required value="12:00">
                    <span class="input-group-addon"> Hora</span>
                    <input type="time" class="form-control" name="txtHour" id="txtHour"  required >
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Check Out &nbsp;&nbsp; &nbsp;</span>
                    <input type="date" class="form-control" name="txtDateEnd" id="txtDateEnd"  required >
                    <span class="input-group-addon"> Hora &nbsp;&nbsp;</span>
                    <input type="time" class="form-control" name="txtHourEnd" id="txtHourEnd" required >
                </div>
              </div>
              <div class="form-group">  
                <div class="input-group">
                  <span class="input-group-addon">Tipo  Documento </span>
                  <?php $tipo_documentos = TipoDocumentoData::getAll();?>
                                    <select name="tipo_documento" id="tipo_documento" required class="form-control">
                                    <?php foreach($tipo_documentos as $tipo_documento):?>
                                      <option value="<?php echo $tipo_documento->id;?>" ><?php echo $tipo_documento->nombre;?></option>
                                    <?php endforeach;?>
                                    </select> 
                </div>
              </div>
              <div class="form-group">  
                <div class="input-group">
                  <span class="input-group-addon">‎ Documento</span>
                  <input type="text" class="form-control" name="documento" id="documento" required placeholder="Ingrese documento">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon"> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Nombre </span>
                  <input type="text" class="form-control" name="nombre" id="nombre" required placeholder="Nombre Completo">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon">&nbsp;&nbsp; &nbsp;&nbsp;Teléfono</span>
                  <input type="text" class="form-control" name="estado_civil" id="estado_civil" required placeholder="Teléfono">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;Correo e.</span>
                  <input type="text" class="form-control" name="direccion" id="direccion" required placeholder="E-mail">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nota&nbsp;</span>
                  <input type="text" class="form-control" name="descripcion" id="descripcion" required placeholder="Nota de la Reserva">
                </div>
              </div>
              
                            <div class="form-group"> 
               <!-- <div class="input-group">
                  <span class="input-group-addon">Reserva</span>-->
                  <input type="hidden" class="form-control" name="num_reserva" id="num_reserva" required placeholder="Numero de Reserva">
               <!-- </div>-->
              </div>
              
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon">Reserva Confirmada</span>
                     <select name="estado" id="estado" class="form-control">
                      <option value="3">No confirmado</option>
                      <option value="4">Confirmado</option>
                    </select>  
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                  <span class="input-group-addon">&nbsp;Pago Adelantado&nbsp;&nbsp;&nbsp;&nbsp; </span>
                  <input type="text" class="form-control" name="dinero_dejado" id="dinero_dejado" required="" value="0" placeholder="Se Agregará en el Corte de Caja">
                </div>
              </div>
              <div class="form-group"> 
                <div class="input-group">
                    <span class="input-group-addon"> Forma de Pago </span>
                     <select name="tipopago" id="tipopago" class="form-control">
                     <option value="1">EFECTIVO</option> 
                     <option value="2">TARJETA DEBITO / CREDITO</option>
                      <option value="3"> DEPÓSITO O TRANSFERENCIA</option>
                      <option value="6">DOLARES</option>
                      <option value="7">EXPIDIA</option>
                    </select>  
                </div>
              </div>
            </div>
           </div>
          <input type="hidden" id="txtId" name="txtId"><br>
        </div>
        <div class="modal-footer" >
          <button type="button" class="btn btn-success"  id="btnAdd">Agregar</button>
          <button type="button" class="btn btn-primary"  id="btnCheckin">Pasar a check-in</button>
          <button type="button" class="btn btn-warning" id="btnUpdate">Actualizar</button>
          <button type="button" class="btn btn-danger" id="btnDel" onclick="alerta();">Cancelar reserva</button>
        </div>
      </div>
    </div>
  </div>
     <style>
    #detectascroll{
        background-color: #cfc;
    }
    .conscroll{
        height: 500px;
        width: 1200px;
        overflow: scroll;
        background-color: #cdd;
    }
    #hastaaqui{
        background-color: #900;
        padding: 10px;
        color: white;
        font-size: 0.6em;
        width: 200px;
    }
.fc-toolbar .fc-center h2{
    font-size:25px;   
}
    </style>
</head>
<style type="text/css">
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 3px !important;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>
<script>
 $(function() { // document ready
    $('#calendar').fullCalendar({
      now: new Date(),
      editable: true,
      selectable: true,
      height: 'auto', // will activate stickyHeaderDates automatically!
      initialDate: '2021-06-07',
      header: {
        left: 'promptResource today prev,next',
        center: 'title',
        right: 'timemeses,timelineMonth,timelineDay,resourceTimelineMonth'
      },
      defaultView: 'timemeses',
      views: {
        timelineThreeDays: {
          type: 'timeline',
          duration: { days: 5 } 
        },
        timemeses: {
          type: 'timeline',
          duration: { months: 2 } // Months en minúscula
        }
      },
      resourceAreaWidth: '20%',   
      resourceColumns: [
        {
          labelText: 'Habitación',  
          field: 'title',
          width: '55%' // Ancho para la columna 'Habitacion'
        },
        {
          labelText: 'Categoría',
          field: 'nom',
          width: '55%' // Ancho para la columna 'Categoría'
        }
      ],
      select: function(startDate, endDate,mjsEvent, view, resource) {
        limpiar();
        var fechaHora=startDate.format().split("T");
        var fechaHoraEnd=endDate.format().split("T");
        var check = moment(startDate).format('YYYY-MM-DD');
        var today = moment(new Date()).format('YYYY-MM-DD');
        $('#txtDate').val(fechaHora[0]);
        $('#txtHour').val(fechaHora[1]);
        $('#txtDateEnd').val(fechaHoraEnd[0]);
        $('#txtHourEnd').val(fechaHoraEnd[1]);
        $('#id_habitacion').val(resource.id);
        $('#titleEvent').html(resource.title);
        var horaentr="";
        var horasal="";
        if(fechaHora[1]!=undefined && fechaHora[1]!=''){ horaentr=fechaHora[1]; }else{ horaentr="23:59:00";}
        if(fechaHoraEnd[1]!=undefined && fechaHoraEnd[1]!=''){ horasal=fechaHoraEnd[1]; }else{ horasal="01:00:00";}
        var finicio=fechaHora[0]+' '+horaentr;
        var ffin=fechaHoraEnd[0]+' '+horasal;
        var id_h=resource.id; 
        //Fin validacion
        var parametros={"start":finicio,"end":ffin,"id_h":id_h}; 
        $.ajax({
            type: "POST",
            url: "./?action=select_comprobar3", 
            data: parametros,
            beforeSend: function(objeto){ },
            success: function(datos){
              if (check >= today || check == today) { 
                if(datos=='1'){ 
                  alert('ERROR, LA HABITACIÓN ESTÁ OCUPADA EN ESE LAPSO DE TIEMPO.');
                }else{ 
                  $("#ModalEvent").modal();
                  document.getElementById('btnCheckin').style.display = 'none';
                  document.getElementById('btnUpdate').style.display = 'none';
                  document.getElementById('btnDel').style.display = 'none';
                  document.getElementById('btnAdd').style.display = 'inline';
                } 
              }else {
                alert("***NO PUEDE HABER FECHAS ANTERIORES AL DIA DE HOY***");
              } 
            }
          });
    },
      eventClick:function(calEvent){
            // H2
            if (calEvent.estado == "3" || calEvent.estado == "4") {
            $('#titleEvent').html(calEvent.title);
            // Information events
            $('#id_habitacion').val(calEvent.resourceId);
            $('#documento').val(calEvent.documento);
            $('#txtId').val(calEvent.id);
            $('#nombre').val(calEvent.title);
            $('#direccion').val(calEvent.direccion);
            $('#estado_civil').val(calEvent.estado_civil);
            $('#num_reserva').val(calEvent.num_reserva);
            $('#dinero_dejado').val(calEvent.dinero_dejado);
            $('#estado').val(calEvent.estado);
            $('#tipopago').val(calEvent.tipopago);
            $('#descripcion').val(calEvent.descripcion);
            $('#tipo_documento').val(calEvent.tipo_documento);
            datehhour= calEvent.start._i.split(" ");
            datehhourEnd= calEvent.end._i.split(" ");
            $('#txtDate').val(datehhour[0]);
            $('#txtHour').val(datehhour[1]);
            $('#txtDateEnd').val(datehhourEnd[0]);
            $('#txtHourEnd').val(datehhourEnd[1]);
            document.getElementById('btnCheckin').style.display = 'inline';
            document.getElementById('btnUpdate').style.display = 'inline';
            document.getElementById('btnDel').style.display = 'inline';
            document.getElementById('btnAdd').style.display = 'none';
            $("#ModalEvent").modal();
          }else if(calEvent.estado == "0"){
            $('#titleEvent').html(calEvent.title);
            // Information events
            $('#id_habitacion').val(calEvent.resourceId);
            $('#documento').val(calEvent.documento);
            $('#txtId').val(calEvent.id);
            $('#nombre').val(calEvent.title);
            $('#direccion').val(calEvent.direccion);
            $('#estado_civil').val(calEvent.estado_civil);
            $('#num_reserva').val(calEvent.num_reserva);
            $('#dinero_dejado').val(calEvent.monto);
            $('#estado').val(calEvent.estado);
            $('#tipopago').val(calEvent.tipopago);
            $('#descripcion').val(calEvent.descripcion);
            $('#tipo_documento').val(calEvent.tipo_documento);
            datehhour= calEvent.start._i.split(" ");
            datehhourEnd= calEvent.end._i.split(" ");
            $('#txtDate').val(datehhour[0]);
            $('#txtHour').val(datehhour[1]);
            $('#txtDateEnd').val(datehhourEnd[0]);
            $('#txtHourEnd').val(datehhourEnd[1]);
            document.getElementById('btnCheckin').style.display = 'inline';
            document.getElementById('btnUpdate').style.display = 'inline';
            document.getElementById('btnDel').style.display = 'none';
            document.getElementById('btnAdd').style.display = 'none';
          }
      },
      eventResize:function(calEvent, delta, revertFunc){
        if (calEvent.estado == "3"  || calEvent.estado == "0") {
        $('#txtId').val(calEvent.id);
          $('#nombre').val(calEvent.title);
          $('#documento').val(calEvent.documento);
          $('#direccion').val(calEvent.direccion);
          $('#id_habitacion').val(calEvent.resourceId);
          $('#estado_civil').val(calEvent.estado_civil);
          $('#num_reserva').val(calEvent.num_reserva);
          $('#dinero_dejado').val(calEvent.dinero_dejado);
          $('#estado').val(calEvent.estado);
          $('#tipopago').val(calEvent.tipopago);
          $('#descripcion').val(calEvent.descripcion);
          $('#tipo_documento').val(calEvent.tipo_documento);
          var fechaHora= calEvent.start.format().split("T");
          var fechaHoraEnd= calEvent.end.format().split("T");
          $('#txtDate').val(fechaHora[0]);
          $('#txtHour').val(fechaHora[1]);
          $('#txtDateEnd').val(fechaHoraEnd[0]);
          $('#txtHourEnd').val(fechaHoraEnd[1]);
          DataGUI();
          DataSendUI('actualizar',NewEvent,true);
        }else {
          alert("No se permite hacer esta acción");
        }
      }, 
      eventDrop:function(calEvent){
           if (calEvent.estado == "3" || calEvent.estado == "0" ) {
          $('#id_habitacion').val(calEvent.resourceId);
          $('#documento').val(calEvent.documento);
          $('#txtId').val(calEvent.id);
          $('#nombre').val(calEvent.title);
          $('#estado_civil').val(calEvent.estado_civil);
           $('#num_reserva').val(calEvent.num_reserva);
          $('#dinero_dejado').val(calEvent.dinero_dejado);
          $('#estado').val(calEvent.estado);
          $('#tipopago').val(calEvent.tipopago);
          $('#descripcion').val(calEvent.descripcion);
          $('#tipo_documento').val(calEvent.tipo_documento);
          var fechaHora= calEvent.start.format().split("T");
          var fechaHoraEnd= calEvent.end.format().split("T");
          $('#txtDate').val(fechaHora[0]);
          $('#txtHour').val(fechaHora[1]);
          $('#txtDateEnd').val(fechaHoraEnd[0]);
          $('#txtHourEnd').val(fechaHoraEnd[1]);
           DataGUI();
           DataSendUI('actualizar',NewEvent,true);
           }
      }, 
      resources: "index.php?action=reserva",
      events: "index.php?action=reservas",
     eventRender: function(calEvent, element) {
        var estado = calEvent.estado;
        var fechaHora= calEvent.start.format().split("T");
        if(calEvent.estado=="1"){
          var fechaHoraEnd= calEvent.end.format().split("T");
          var texto='<b>Check-out:</b>';
          var texto_user='<b>Finalizado por:</b>';
          var content_user=calEvent.nombreusfin;
        }else if(calEvent.estado=="3"){
          var fechaHoraEnd= "";
          var texto='';
          var texto_user='';
          var content_user= ""; 
        }else{
          var fechaHoraEnd= "";
          var texto='';
          var texto_user='';
          var content_user= "";
        }
        if(calEvent.motivo!="NULL" &&  calEvent.motivo!=""){
          var texto_motivo='<b>Observación:</b>';
          var content_motivo=calEvent.motivo;
        }else{
          var texto_motivo='';
          var content_motivo='';
        }
        var titulo = '<div class="row" style="" >'+
                    '<div class="col-md-12">'+
                    '<h4 style="background-color:#16a085;color:white;">RESERVA '+ calEvent.num_reserva + '</h4>' +
                    '<h4 style="background-color:#16a085;color:white;">Folio '+ calEvent.nro_folio + '</h4>' +
                    '<table class="table table-responsive" style="font-size:10px;">'+
                        '<thead>'+
                            '<tr>'+
                                '<th colspan="2"><b style="color:#16a085;font-size:11px;"> Datos de reserva </b></th>'+
                            '</tr>'+
                        '</thead>'+
                        '<tbody>'+
                            '<tr>'+
                                '<td><b>Folio:</b></td>'+
                                '<td><a href="?view=addprocesoprueba&id=' + calEvent.id + '">' + calEvent.nro_folio + '</a></td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td><b>Nombre:</b></td>'+
                                '<td>'+ calEvent.title + '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td><b>Pasajeros:</b></td>'+
                                '<td>'+ calEvent.pasajero + '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td><b>Tarifa por:</b></td>'+
                                '<td>'+ calEvent.precio + '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td><b>Check-in:</b></td>'+
                                '<td>'+ fechaHora+ '</td>'+
                            '</tr>'+ 
                            '<tr>'+
                                '<td><b>Creado por:</b></td>'+
                                '<td>'+ calEvent.nombreus+ '</td>'+
                            '</tr>'+ 
                            '<tr>'+
                                '<td>'+ texto + '</td>'+
                                '<td>' + fechaHoraEnd + '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>'+ texto_user + '</td>'+
                                '<td>' + content_user + '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>'+ texto_motivo + '</td>'+
                                '<td>' + content_motivo + '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                    '</div>'+
                '</div>';
        $(element).popover({
            html : true,
            trigger : 'hover',
            placement: 'top',
            container: 'body',
            content: function () {
              return titulo;
            }
        }).on('hide.bs.popover', function () {
            if ($(".popover:hover").length) {
              return false;
            }                
        }); 
        $('body').on('mouseleave', '.popover', function(){
            $('.popover').popover('hide');
        });
        $(element).popover({
            html : true,
            trigger : 'hover',
            content : function() {
                return '<div class="box"></div>';
            }
        }).on('hide.bs.popover', function () {
            if ($(".popover:hover").length) {
              return false;
            }                
        }); 
        $('body').on('mouseleave', '.popover', function(){
            $('.popover').popover('hide');
        });
        limpiar();
        var hoy = Date();
        var monto = Number.parseFloat(calEvent.monto);
        var total_v = Number.parseFloat(calEvent.total_v);
        var precionoche = Number.parseFloat(calEvent.precio)*Number.parseFloat(calEvent.cant_noche);
        if (calEvent.estado == '3') {
            element.css({
                'background-color': 'rgb(11 106 5)',//0B6805 RESERVA NO CONFIRMADA
                'border-color': '#333333',
                'color': 'white'
            });
        }else if (calEvent.estado == '4') {
            element.css({
                'background-color': 'rgb(8 255 0)', //08FF00 RESERVA CONFIRMADA
                'border-color': '#333333',
                'color': 'white'
            });
        }else{ if (total_v >= monto ) { 
                element.css({
                    'background-color': '#002EFF',//OCUPADA SIN PAGO PENDIENTE
                    'border-color': '#333333',
                    'color': 'white'
                });
            }else {
                element.css({
                    'background-color': '#00D4FF',//OCUPADA CON PAGO PENDIENTE
                    'border-color': 'red',
                    'color': 'white'
                });
            };
/*
LINEA VERDE ESTA EN CHECK-IN
LINEA ROJA ESTA CHECK-OUT
LINEA AMARILLA ES QUE TIENE UNA OBSERVACION
*/
            if (estado == "1") {
                element.css({
                    'border-right': '5px solid #ff4a43'
                });
            }else {
                element.css({
                    'border-right': '5px solid #00ff3f'
                });
            };
            if (calEvent.motivo != "" && calEvent.motivo != "NULL") {
                element.css({
                    'border-left': '4px solid #fbff00'
                });
            };
        };
    }
    });
  }); 
   $('#bagregar').click(function(){
        DataGUI();
        DataSendUI('addroom',NewEvent);
        $('#ModalRoom').modal('toggle');
        limpiar();
        $('#calendar').fullCalendar('refetchResources');
    });
   $('#btnAdd').click(function(){
      documento = $("#documento").val();
      nombre = $("#nombre").val();
      direccion = $("#direccion").val();
      estado_civil = $("#estado_civil").val();
      descripcion = $("#descripcion").val();
      num_reserva = $("#num_reserva").val();
      if(documento!="" && nombre!=""  && num_reserva!=""){
      DataGUI();
      DataSendUI('agregar',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
        window.location.href = "index.php?view=reserva";
       }else{
        alert('INGRESA TODOS LOS DATOS');
      }
    }); 
    function alerta()
    {
    var mensaje;
    var opcion = confirm("Estás seguro de eliminar la reserva?");
    if (opcion == true) {
      DataGUI();
      DataSendUI('eliminar',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
        window.location.href = "index.php?view=reserva";
    } else {
    }
  };
    $('#btnUpdate').click(function(){  
      DataGUI();
      DataSendUI('actualizar_nuevo',NewEvent);
      $('#ModalEvent').modal('toggle');
      limpiar();
      
        window.location.href = "index.php?view=reserva";
    });
    

    
function validarEstado(id_habitacion) {   
    // Perform AJAX call
    
    $.ajax({
        type: "POST",
        url: "./?action=select_comprobar4",
        data: { id_h: id_habitacion},
        success: function(response) {
            console.log(response);
            if (response != '0') {
                alert('ERROR:\nACTUALMENTE HAY UN REGISTRO (CHECK-IN) EN ESTA HABITACIÓN\nFAVOR DE REALIZAR CHECK-OUT ANTES DE INGRESAR UNA NUEVA ESTADIA.');
               
            } else if (response === '0') {
              var id_proceso=document.getElementById("txtId").value;
      var id_habitacion=document.getElementById("id_habitacion").value;
      var fechaSalida = $('#txtDateEnd').val(); // Obtener la fecha de salida
      var fechaEntrada = $('#txtDate').val(); // Obtener la fecha de salida
      var horaSalida = $('#txtHourEnd').val(); // Obtener la hora de salida
      var nota = $("#descripcion").val();
      console.log(nota);
      location.href ="index.php?view=proceso&id_habitacion="+id_habitacion+"&id_p="+id_proceso+ "&fechaSalida=" + fechaSalida + "&horaSalida=" + horaSalida+ "&fechaEntrada=" +fechaEntrada + "&nota=" + encodeURIComponent(nota);
            }
        }
    });
}

  $('#btnCheckin').click(function(){
      var id_habitacion=document.getElementById("id_habitacion").value;
      validarEstado(id_habitacion);
    });



    
    $('#btnClose').click(function(){
      $('#ModalEvent').modal('toggle'),
      limpiar();
    });
    $('#btnClose1').click(function(){ 
      $('#ModalEvent').modal('toggle'), 
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
    }       function DataSendUI(accion, objEvento) {
    var modal = typeof modal !== 'undefined' ? modal : null; // Asigna null si modal no está definida
    
    $.ajax({
        type: 'POST',
        url: 'index.php?action=reserva&accion=' + accion,
        data: objEvento,
        success: function (msg) {
            if (msg) {
                $('#calendar').fullCalendar('refetchEvents');
                if (!modal) {
                    $('#ModalEvent').modal('toggle');
                    $('#ModalRoom').modal('toggle');
                }
            }
        },
        error: function () {
            $('#calendar').fullCalendar('refetchEvents');
            if (!modal) {
                $('#ModalEvent').modal('toggle');
                $('#ModalRoom').modal('toggle');
            }
        }
    });
}

</script>
<script src='lib/locale/es.js'>

</script>
 <script> 
 
    $(document).ready(function(){ 
      load(1);
    });
    function load(page){
            var dateString = new Date();
            var nuevafecha = moment(dateString).format('YYYY-MM-DD');
            var mostrar=dateString.setDate(dateString.getDate() - 12);
            var nuevafecha1 = moment(mostrar).format('YYYY-MM-DD');
            var testData = !!document.getElementById(""+nuevafecha1+"");
            if(testData == true){
                var posicion = $("#"+nuevafecha1+"").offset().left;
                $(".fc-scroller").animate({
                    scrollLeft: posicion + 250
                }, 900); 
            }
$(document).ready(function() { 
  var headerHeight = $(".fc-head .fc-time-area").height(); 
  var headerWidth = $(".fc-head .fc-time-area").width(); 
  var fixedHeaderTopMargin = 45; // Puedes ajustar este valor según tus necesidades

  $(window).scroll(function(){ 
    if($(window).scrollTop() > headerHeight){ 
      $(".fc-head .fc-time-area").addClass("fixed"); 
      $(".fc-head .fc-time-area").width(headerWidth-17); 
      $(".fc-head .fc-time-area.fixed").css("top", fixedHeaderTopMargin + "px");
    }
    else{ 
      $(".fc-head .fc-time-area").removeClass("fixed"); 
    } 
  }); 
});
    }

  </script> 
</body>
</html>