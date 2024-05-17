  
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
                        <h2 style="text-decoration: underline;">Registro de ingresos y egresos</h2>
                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Desde:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="date" name="" style="line-height: 14px;">
                                </div>
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b>Hasta:</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="date" name="" style="line-height: 14px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <form class="row" id="multi-filters">
                            <div class="nuevo">
                                

                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b> </b>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            Todos los tipos: <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="type_1" name="estado[]" value="1" >
                                                <label class="form-check-label" for="type_1" >Egresos</label>
                                            </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="type_2" name="estado[]" value="3">
                                                <label class="form-check-label" for="type_2">Ingresos</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php $gastos = GastoData::getIngresosEgresosNuevoj();
                            $nhotel=0; $nalmacen=0; $nresto=0; $nparking=0;

                            $ncustodia=0; $nsobrante=0; $ngastom=0; $ngastoc=0; $ngasc=0; $nfiesta=0; $nproveedor=0; $nadelanto=0; $otros=0;
                             if(@count($gastos)>0){ ?>

                            <?php foreach($gastos as $gasto):?>

                                <?php if($gasto->modulo=="Hotel"){$nhotel=$nhotel+1;} ?>
                                <?php if($gasto->modulo=="Almacen"){$nalmacen=$nalmacen+1;} ?>
                                <?php if($gasto->modulo=="Restaurant"){$nresto=$nresto+1;} ?>
                                <?php if($gasto->modulo=="Parking"){$nparking=$nparking+1;} ?>

                                <?php if($gasto->categoria=="Custodia"){$ncustodia=$ncustodia+1;} ?>
                                <?php if($gasto->categoria=="Sobrante"){$nsobrante=$nsobrante+1;} ?>
                                <?php if($gasto->categoria=="Gastos de mantenimiento"){$ngastom=$ngastom+1;} ?>
                                <?php if($gasto->categoria=="Gastos de cocina"){$ngastoc=$ngastoc+1;} ?>
                                <?php if($gasto->categoria=="Recibos"){$ngasc=$ngasc+1;} ?>
                                <?php if($gasto->categoria=="Proveedores"){$nfiesta=$nfiesta+1;} ?>
                                <?php if($gasto->categoria=="Proveedores de almacen"){$nproveedor=$nproveedor+1;} ?>
                                <?php if($gasto->categoria=="Adelantos"){$nadelanto=$nadelanto+1;} ?>
                                <?php if($gasto->categoria=="Otros"){$otros=$otros+1;} ?>



                             <?php endforeach; ?>
                            <?php };?>

<!--
                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Todos los Módulo: <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if($nhotel>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_1" name="modulo[]" value="Hotel"><label class="form-check-label" for="country_1">Hotel</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        
                                    </ul>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                        -->

                        <div class="col-md-3">
                            <div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Todas las categorías: <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                
                                        <?php if($ncustodia>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="gender_1" name="categoria[]" value="Custodia"><label class="form-check-label" for="gender_1">Custodia</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nsobrante>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="gender_2" name="categoria[]" value="Sobrante"><label class="form-check-label" for="gender_2">Sobrante</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($ngastom>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_3" name="categoria[]" value="Gastos de mantenimiento"><label class="form-check-label" for="country_3">Gastos de mantenimiento</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($ngastoc>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_4" name="categoria[]" value="Gastos de cocina"><label class="form-check-label" for="country_4">Gastos de cocina</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($ngasc>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_5" name="categoria[]" value="Recibos"><label class="form-check-label" for="country_5">Recibos</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nfiesta>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_6" name="categoria[]" value="Proveedores"><label class="form-check-label" for="country_6">Proveedores</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nproveedor>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_7" name="categoria[]" value="Proveedores de almacen"><label class="form-check-label" for="country_7">Proveedores de almacen</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nadelanto>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_8" name="categoria[]" value="Adelantos"><label class="form-check-label" for="country_8">Adelantos</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($otros>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_9" name="categoria[]" value="Otros"><label class="form-check-label" for="country_9">Otros</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                     
                                        
                                    </ul>
                                </div>
                                </div>
                                
                            </div>
                        </div>

                     

                            

                        </form>
                       


                        

                        <div class="col-md-12" style="padding-top: 30px;">

                            <table class="table table-bordered table-hover">
                                <thead class="bg-gray">
                                <tr>
                                    
                                    <th><center>Tipo</center></th>
                                    <th><center>Módulo</center></th>
                                    <th><center>Categoría</center></th>
                                    <th><center>Descripcion</center></th>
                                    <th><center>Fecha</center></th>
                                    <th><center>Monto</center></th>
                                </tr>
                                </thead>
                                <tbody id="filters-result" class="bg-white">

                                </tbody>
                            </table>

                            
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


