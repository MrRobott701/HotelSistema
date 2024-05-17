<?php
error_reporting(0);
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");


$dels = LibroLimpiezaData::getAllHoy($hoy);
    foreach($dels as $del):
        $eliminar = LibroLimpiezaData::getById($del->id);
        $eliminar->del();
    endforeach;


if(@count($_POST)>0){


if ( !empty($_POST["id_habitacion"]) && is_array($_POST["id_habitacion"]) ) { 

    $habitacion=$_POST["id_habitacion"];
    $tipo=$_POST["tipo"];
    $id_usuario=$_POST["id_usuario"];
    $id_tiempo=$_POST["id_tiempo"];

    $nusuario=$_POST["id_nusuario"];
    $id_user=$_POST["id_user"];
    $fecha=$_POST["fecha"];
    $estado=$_POST["estado"];
     
 
    for ($i=0; $i< count($habitacion); $i++){

        for ($j=0; $j< count($nusuario); $j++){
                if($nusuario[$j]==$id_usuario[$i]){ $usuario=$id_user[$j]; };
        }
        
        if($habitacion[$i]!='' ){ 

        
            $extra_reserva = new LibroLimpiezaData();
            $extra_reserva->id_tiempo = $id_tiempo[$i];
            $extra_reserva->id_usuario = $usuario;
            $extra_reserva->tipo = $tipo[$i];

            $hab = HabitacionData::getByName($habitacion[$i]);

            $extra_reserva->id_habitacion = $hab->id;
            $extra_reserva->fecha = $fecha[$i];
            $extra_reserva->estado = $estado[$i];
            $extra_reserva->posi = $id_usuario[$i];
            $extra_reserva->add();


        }

    
    } 


if(isset($_POST["nombre"]) and $_POST["nombre"]!='' and isset($_POST["razon"]) and $_POST["razon"]!=''){
$error = new ErrorData();
  $error->nombre = $_POST["nombre"];
  $error->accion = $_POST["accion"];
  $error->razon = $_POST["razon"];
  $error->fecha= $_POST["fecha1"];
  $error->hora= $_POST["hora1"];
  $error->add();
};




 }

 


//print "<script>window.location='index.php?view=clibro_limpieza';</script>"; 
}


?>