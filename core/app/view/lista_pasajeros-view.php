  
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
    font-size: 12px !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px !important;
}
.mb-10 {
    margin-bottom: 0px !important;
}
.p-10 {
    padding: 2px !important;
}
</style>
<?php 
    $cajas = CajaData::getAllAbierto(); 
    if(@count($cajas)>0){ $id_caja=$cajas->id;
    }else{$id_caja='NULL';}
?>

<div class="row" >
    <br>
    <div class="col-md-12">
    <!-- tile -->
        <section class="tile">

           

            <!-- tile body -->
            <div class="tile-body p-0">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" autocomplete="off" class="form-validate-jquery" id="enviarget" method="get">
                            <input type="hidden" name="view" value="lista_pasajeros">
                        <h2 style="text-decoration: underline;">HISTORIAL DE HUESPEDES</h2>
                        <div class="col-md-3">
                            <div class="nuevo" >
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b style="font-size: 20px;">Desde:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" required name="desde" style="font-size: 15px; line-height: 15px;" value="<?php 
              if(isset($_GET['desde']) and $_GET['desde']!=''){ echo date($_GET['desde']); } ?>">
                                </div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b style="font-size: 20px;">Hasta:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="date" required name="hasta" style="font-size: 15px; line-height: 15px;" value="<?php if(isset($_GET['hasta']) and $_GET['hasta']!=''){echo $_GET['hasta'];} ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2" >
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                <div class="btn-group">
    <label style="font-size: 20px;">Selecciona Su Estado Actual:</label>
<div class="form-check">
    <input type="radio" class="form-check-input" id="checkin" name="estado" value="checkin" <?php if(isset($_GET['checkin']) and $_GET['checkin']=='checkin'){ echo "checked"; } ?>>
    <label class="form-check-label" for="checkin" style="font-size: 18px;">&nbsp;&nbsp;Check-in</label> 
</div>
<div class="form-check">
    <input type="radio" class="form-check-input" id="checkout" name="estado" value="checkout" <?php if(isset($_GET['checkout']) and $_GET['checkout']=='checkout'){ echo "checked"; } ?>>
    <label class="form-check-label" for="checkout" style="font-size: 18px;">&nbsp;&nbsp;Check-out</label>
    </div>
    </div>




                                </div>
                                
                            </div>
                        </div>

                        

                         <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                  &nbsp;&nbsp;&nbsp;
                                    <button style="margin-top: 10px; font-size: 20px;"  id="btnGuardar" type="submit" class="btn btn-primary btn-sm"> 
                                      <i style="font-size: 20px;" class="fa fa-search"></i> Consultar</button>
                                </div>
                                
                            </div>
                        </div>
                       

  

                        </form>
                       
                        <style>
    .columna-folio { width: 5%; }
    .columna-habitacion { width: 5%; }
    .columna-documento { width: 18%; }
    .columna-nombre { width: 20%; }
    .columna-pasajeros { width: 20%; }
    .columna-fechai { width: 10%; }
    .columna-fechas { width: 10%; }
    .columna-estado { width: 10%; }
</style>

<div class="col-md-12" style="padding-top: 30px;">
    <?php if(isset($_GET['desde']) and $_GET['desde']!="" and isset($_GET['hasta']) and $_GET['hasta']!="" ){ ?>
        <table class="table table-custom" id="editable-usage" style="font-size: 20px; width: 100%;">
            <thead>
                <th class="columna-folio">Folio</th>
                <th class="columna-habitacion">Habitación</th>
                <th class="columna-documento">Documento</th>
                <th class="columna-nombre">Nombre</th>
                <th class="columna-pasajeros">Pasajeros</th>
                <th class="columna-fechai">Check-In</th>
                <th class="columna-fechas">Check-Out</th>
                <th class="columna-estado">Estado</th>
            </thead>
            <tbody>
                <?php 
                if(isset($_GET['checkin']) and $_GET['checkin']=='checkin'){
                    $reportediarios = ProcesoData::getIngresoRangoFechasCheckin($_GET['desde'],$_GET['hasta']);
                } else if(isset($_GET['checkout']) and $_GET['checkout']=='checkout'){
                    $reportediarios = ProcesoData::getIngresoRangoFechasCheckout($_GET['desde'],$_GET['hasta']);
                } else{
                    $reportediarios = ProcesoData::getIngresoRangoFechas($_GET['desde'],$_GET['hasta']);
                }

                if(@count($reportediarios)>0) { ?>
                    <?php foreach($reportediarios as $reportediario): ?>
                        <tr>
                            <td class="columna-folio"><a href="index.php?view=addprocesoprueba&id=<?php echo $reportediario->id; ?>"><?php echo $reportediario->nro_folio; ?></a></td>
                            <td class="columna-habitacion"><?php echo $reportediario->getHabitacion()->nombre; ?></td>
                            <td class="columna-documento"><?php echo $reportediario->getCliente()->documento; ?></td>
                            <td class="columna-nombre"><?php echo $reportediario->getCliente()->nombre; ?></td>
                            <td class="columna-pasajeros"><?php echo $reportediario->pasajero; ?></td>
                            <td class="columna-fecha"><?php echo $reportediario->fecha_entrada; ?></td>
                            <td class="columna-fecha"><?php echo $reportediario->fecha_salida; ?></td>
                            <td class="columna-estado"><?php if($reportediario->estado=='0'){ echo "Check-in";}else if($reportediario->estado=='1'){ echo "Check-out";} ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php }; ?>
            </tbody>
        </table>
    <?php  }; ?>
</div>



                       




                    </div>
                </div>

            </div>
            <!-- /tile body -->

        </section>
        <!-- /tile --> 
        <hr><hr><hr><hr><hr>
    </div>

<script src="js/filtro/slim.js"></script>
<script src="js/filtro/jquery.js"></script>
<script src="js/filtro/poper.js"></script>
<script src="js/filtro/bostr.js"></script>

<script type="text/javascript">
    $(function ()
{
    get_users();

    $(".form-check-input").on("click", function ()
    {
        get_users();
    });

});

function get_users()
{

    let form = $("#multi-filters");

    $.ajax(
        {
            type: "POST",
            url: "index.php?action=filtro_gasto",
            data: form.serialize(),
            success: function (data)
            {
                $("#filters-result").html("");


                $.each(JSON.parse(data), function(key, Gasto)
                {
                    var estado=Gasto.estado;
                    if(estado=='1'){ var newestado="Egreso";}else{ var newestado="Ingreso";}
                    let row = ""+
                        "<tr>"+ 
                        "<td>"+ newestado +"</td> " + 
                        "<td>"+Gasto.modulo+"</td> " +
                        "<td>"+Gasto.categoria+"</td> " +
                        "<td>"+Gasto.descripcion+"</td> " +
                        "<td>"+Gasto.fecha+"</td> " +
                        "<td>"+Gasto.precio+"</td> " +
                        "</tr>";

                    $("#filters-result").append(row);


                });

            }
        }
    )
}
</script>


