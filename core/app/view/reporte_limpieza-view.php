<link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
<link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
<link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
<link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
<link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

<?php
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$doce = date("12:00:00");
$fecha_completa = date("Y-m-d");

?>

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active"><a href="#">Reporte limpieza hoy</a></li>
        </ol>
    </section> 
</div> 

<div class="row">
    <div class="col-md-12">
        <section class="tile">
            <div class="tile-header dvd dvd-btm">  
                <h1 class="custom-font">REPORTE LIMPIEZA <strong><?php echo $hoy; ?></strong></h1>
                <ul class="controls">
                    <li class="remove">
                    <a href="#" onclick="generarReporte()" style="color: green;"><i class="fa fa-print"></i><strong> IMPRIMIR</strong></a>
                    </li> 
                    <li class="remove">
                        <a tabindex="20"><i class="fa fa-times"></i></a>
                    </li>
                </ul>
            </div>
            <div class="tile-body" id="database">
                <?php 
                $habitaciones = HabitacionData::getListaLimpieza();
                if(@count($habitaciones) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-custom" id="100" style="font-size: 20px;" size="20">
                            <thead>
                                <tr>
                                    <th>Hab</th> 
                                    <th>Tipo</th> 
                                    <th>F. entrada</th>
                                    <th data-hide="phone">F. salida</th>
                                    <th data-hide='phone, tablet'>OL</th> 
                                    <th data-hide='phone, tablet'>VL</th>
                                    <th data-hide='phone, tablet'>Camarista</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach (array_slice($habitaciones, 0, 20) as $habitacion): ?>
    
                                <tr>
        <?php $proceso = ProcesoData::getByRecepcion($habitacion->id); ?>
        <td><?php echo $habitacion->nombre; ?></td>
        <td><b><?php echo $habitacion->getCategoria()->nombre; ?></b></td>
        <td><?php echo is_object($proceso) ? $proceso->fecha_entrada : 'FINALIZADA'; ?></td>
        <td><?php echo is_object($proceso) ? $proceso->fecha_salida : 'FINALIZADA'; ?></td>
        <td><?php // Aquí puedes agregar la lógica para OL ?></td>
        <td><?php // Aquí puedes agregar la lógica para VL ?></td>
        <td>
            <?php if ($habitacion->estado != '3'): ?>
                <div class="form-group">
                    <div class="input-group">
                        <select class="form-control" required name="id_limpieza" onchange="ActualizarUser(this.value,<?php echo $proceso->id; ?>);">
                            <option value="">--- Selecciona ---</option>
                            <?php $users = UserData::getAll(); ?>
                            <?php foreach ($users as $user): ?>
                                <option value="<?php echo $user->id; ?>" <?php if ($proceso->id_limpieza != null && $proceso->id_limpieza != '0' && $proceso->id_limpieza == $user->id) { echo "selected"; } ?>><?php echo $user->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <h4 class='alert alert-success'>NO HAY REGISTRO</h4>
                <?php endif; ?>
                <strong><h4 class='alert alert-success'>HABITACIONES QUE LLEGAN HOY</h4></strong>
                <div class="col-md-12">
            <button type="button" class="btn btn-success" onclick="agregarCampoAseo()"><strong>Agregar</strong></button>
            <button type="button" class="btn btn-danger" onclick="eliminarUltimoCampoAseo()"><strong>Eliminar</strong></button>
        </div>
              </div>
              <div class="tile-footer">
    <div class="row" id="aseoRow">
        <div class="tamanoPH">
        <div style="display: none;">
    <input type="text" class="form-control" name="descripcion_aseo[]" id="descripcion_aseo" placeholder="#Nro DE HABITACION">
</div>

                

        </div>
    </div>
</div>

<style>
    .tamanoPH .form-control::placeholder {
        font-size: 16px;
    }
</style>

<script>
function obtenerValoresAseo() {
    var descripcionValues = [];
   

    // Capturar valores para los campos existentes
    descripcionValues.push(document.getElementById("descripcion_aseo").value);
  

    // Capturar valores para los campos adicionales
    var descripcionCampos = document.getElementsByName("descripcion_aseo[]");
  
    
    // Comenzar el bucle desde 1 para omitir el primer valor que ya capturamos
    for (var i = 1; i < descripcionCampos.length; i++) {
        descripcionValues.push(descripcionCampos[i].value);
 
    }

    return {
        descripcion: descripcionValues.join(","),
    
    };
}



function generarReporte() {
    try {
        var valoresAseo = obtenerValoresAseo();
        
        var url = "reporte/reporte_limpieza.php?descripcion=" + encodeURIComponent(valoresAseo.descripcion);
        
        window.open(url, '_blank');
    } catch (error) {
        console.error("Error al generar el reporte:", error);
    }
}





    var contadorAseo = 1; // Contador para los campos de Aseo

    function agregarCampoAseo() {
    contadorAseo++;
    var nuevoCampo = `<div id="rowAseo${contadorAseo}">
                        
                            <div class="tamanoPH">
                                <div class="col-lg-2 col-md-4 col-sm-12 mr-2">
                                    <h4><strong># HABITACIÓN<br></strong></h4>
                                    <strong><input type="text" class="form-control mr-2" name="descripcion_aseo[]" placeholder="#Nro DE HABITACION" style="border: 2px solid black;"></strong>
                             
                            </div>
                        </div>
                    </div>`;
    $('#aseoRow').append(nuevoCampo);
}

function eliminarUltimoCampoAseo() {
    if(contadorAseo > 1) {
        $(`#rowAseo${contadorAseo}`).remove();
        contadorAseo--;
    } else {
        alert('No puedes eliminar todos los campos.');
    }
}

</script>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
<script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
<script>
    var table = $('#editable-usage').DataTable({
        // Configuración de DataTables...
    });

    function ActualizarUser(val, idpro) {
        var parametros = {"id": val, "idpro": idpro}; 
        $.ajax({
            type: "POST",
            url: 'index.php?action=update_limpieza',
            data: parametros,
            beforeSend: function(objeto) {
                $("#database").html("Mensaje: Cargando...");
            },
            success: function(datos) {
                $('#database').html(datos);
            }
        });
    };
</script>