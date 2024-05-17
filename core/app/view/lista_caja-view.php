<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Lista de cajas</a></li>
    </ol>
</section> 

</div> 




<div id="reload-full-div">
	<div class="breadcrumb-line">
		
	  <div class="row">
		 <div class="breadcrumb col-lg-12">
				<div style="background-color: #16a085;color: white;padding: 2px;font-size: 20px;
				text-align: center; text-transform: uppercase;font-weight: bold;width: 100%;">
					<span>HISTORIAL DE CAJAS</span>
			    </div>
	   	  </div>
	  </div>
	</div>
	<br> 
	 <div class="row">
		 <div class="col-sm-12 col-md-12">
     <?php
// Verificar si no se han establecido las fechas de inicio y fin
if (!isset($_GET['desde']) || empty($_GET['desde'])) {
$_GET['desde'] = date('Y-m-d'/*,strtotime('-1 day')*/); // Establecer a un día anterior al día de hoy si no está establecido
}

if (!isset($_GET['hasta']) || empty($_GET['hasta'])) {
    $_GET['hasta'] = date('Y-m-d');  // Establecer a la fecha actual si no está establecido
}

// Resto de tu código...
?>
<script>
    // Cuando el documento esté listo
    $(document).ready(function() {
        // Si no hay parámetros GET o si no hay datos en el formulario, entonces envía el formulario
        if (!window.location.search || window.location.search === "?") {
            $('form.form-validate-jquery').submit();
        }
    });
</script>

<!--IMPRIMIR PDF DE ULTIMA CAJA
<?/*php 
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

/* Cierra la conexión.
mysqli_close($conexion);

// Define la URL para el PDF
$urlPDF = "reporte/pdf/documentos/pdf_caja.php?id=" . $ultimoID;
*/?>

<button id="btnMostrarPDF" class="btn btn-info">Mostrar PDF de la última caja</button>

<script>
    $(document).ready(function() {
        // Obtiene la URL del PHP al inicio
        var urlPDF = "<?/*php echo $urlPDF;*/ ?>";
        
        $("#btnMostrarPDF").click(function() {
            // Abre una nueva ventana o pestaña para mostrar el PDF.
            window.open(urlPDF, "_blank");
        });
    });
</script>
-->





		 	<form role="form" autocomplete="off" class="form-validate-jquery" id="" method="get">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label>DESDE</label>

              <input type="hidden" name="view" value="lista_caja">
 
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                
                 <input type="date" name="desde" class="form-control" value="<?php 
              if(isset($_GET['desde']) and $_GET['desde']!=''){ echo $_GET['desde']; } ?>">
               </div>
            </div>
            <div class="col-sm-3">
              <label>HASTA</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <!--
                <input type="text" id="txtMes" name="txtMes" placeholder=""
                 class="form-control input-sm" style=""> -->
                 <input type="date" name="hasta" class="form-control" value="<?php 
              if(isset($_GET['hasta']) and $_GET['hasta']!=''){ echo $_GET['hasta']; } ?>">
               </div>
            </div>
            <div class="col-sm-4">
              <button style="margin-top: 27px;" id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
              <i class="fa fa-search"></i> Consultar</button>
            </div>
          </div>
        </div>
        </form>
	   	  </div>
	  </div>


 






<!-- row --> 
<div class="row">
  <!-- col --> 
  <div class="col-md-12">
    <section class="tile">

             

           <div class="tile-body">
           

              <?php 
              if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!=""){
                $cajas = CajaData::getFiltroFechas($_GET['desde'],$_GET['hasta']);

              

                if(@count($cajas)>0){ 
                  // si hay usuarios
                  ?>
                  <div class="table-responsive">
                  <table class="table table-custom" id="editable-usage" style="font-size: 18px;">
  <thead>
    <th style="width: 5%;">Nro CAJA</th> 
    <th style="width: 5%;">RECEPCIONISTA</th> <!-- Ajusta el ancho de la columna según sea necesario -->
    <th style="width: 15%;">TURNO</th>
    <th style="width: 20%;">FECHA APERTURA</th>
    <th style="width: 20%;">FECHA CIERRE</th>
    <th style="width: 20%;">FONDO DE CAJA</th>
    <th style="width: 20%;">VENTA</th>
    <th style="width: 10%;">PDF</th>
  </thead>
  <?php foreach($cajas as $caja):?>
    <tr>
      <td>#<?php echo $caja->id; ?></td>
      <td style="font-size: 16px;"><?php echo $caja->getUsuario()->name; ?></td> <!-- Ajusta el tamaño de la fuente según sea necesario -->
      <td><?php echo $caja->turno; ?></td>
      <td><?php echo $caja->fecha_apertura; ?></td>
      <td><?php echo $caja->fecha_cierre; ?></td>
      <td>$<?php echo $caja->monto_apertura; ?></td>
      <td>$<?php echo $caja->monto_cierre - $caja->monto_apertura; ?></td>
      <td><a target="_blank" href="reporte/pdf/documentos/pdf_caja.php?id=<?php echo $caja->id; ?>" class="btn btn-success btn-md"><i class="fa fa-eye"></i></a></td>
    </tr> 
  <?php endforeach; ?>
</table>

                </div>

               <?php }else{ 
            echo "<h4 class='alert alert-success'>SELECCIONA UN RANGO DE FECHA Y DA CLICK EN<strong>  *CONSULTAR*</strong></h4>";


                }; };
                ?>

           </div>
</section>

</div>
</div>




    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/vendor/datatables/extensions/dataTables.bootstrap.js"></script>
        <script>
          
            var table = $('#editable-usage').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Cajas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Cajas",
                    "infoFiltered": "(Filtrado de _MAX_ cajas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Cajas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "searchPlaceholder": "Nom.Usuario o Nro.Caja",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },

                columnDefs: [
        {
            type: 'num',
            targets: 0, // Esto indica que la primera columna (índice 0) debe tratarse como numérica.
            render: function(data, type, row) {
                // Extraer el número después del "#" y convertirlo a un número real.
                return parseFloat(data.replace('#', ''));
            }
        }
    ],

    columns: [
        { name: "Nro CAJA", orderable: true, searchable: true },
        { name: "USUARIO", orderable: true, searchable: true },
        { name: "TURNO", orderable: true, searchable: false },
        { name: "FECHA APERTURA", orderable: true, searchable: false },
        { name: "FECHA CIERRE", orderable: true, searchable: false },
        { name: "MONTO", orderable: true, searchable: false },
        null // Para la última columna sin nombre, que es el botón de ver.
    ],

    order: [[0, 'desc']],  // Ordena por la primera columna de forma descendente

    initComplete: function() {
        var columnasBuscables = [1, 0]; // Columnas de Nombre de Usuario y Número de Caja
        this.api().columns().every(function() {
            var that = this;
            $.each(columnasBuscables, function(i, v) {
                if (that.index() === v) {
                    $('input', this.header()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                }
            });
        });
    }
});
        </script>

        <!--/ Page Specific Scripts -->