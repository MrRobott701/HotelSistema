<?php
date_default_timezone_set('America/Tijuana');
    $hoy = date("Y-m-d"); 
   $hora = date("H:i:s");
   $doce = date("12:00:00");
$session_id= session_id(); 

if(isset($_POST['nombre']) and isset($_POST['razon'])){


    $error = new ErrorData();
    $error->nombre = $_POST["nombre"];
    $error->accion = "Se modifico la tarifa de $". $_POST["precio"] ." / Hab. ".$_POST["hab"];
    $error->razon = $_POST["razon"];
    $error->fecha= $hoy;
    $error->hora= $hora;
    $error->add();
    
}
?>
<a href="#"  class="tex-danger btn-xs b-0" style="color:black;"><i class="fa fa-unlock"></i></a>
 




