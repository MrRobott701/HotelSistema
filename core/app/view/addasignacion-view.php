<?php
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
	$fecha=$_POST["fecha"];
    $estado=$_POST["estado"];
 
    for ($i=0; $i< count($habitacion); $i++){
        
        $extra_reserva = new LibroLimpiezaData();
    	$extra_reserva->id_tiempo = $id_tiempo[$i];
    	$extra_reserva->id_usuario = $id_usuario[$i];
    	$extra_reserva->tipo = $tipo[$i];

    	$hab = HabitacionData::getByName($habitacion[$i]);

    	$extra_reserva->id_habitacion = $hab->id;
    	$extra_reserva->fecha = $fecha[$i];
        $extra_reserva->estado = $estado[$i];
    	$extra_reserva->add();
	
    } 

}


print "<script>window.location='index.php?view=libro_limpieza';</script>";


}


?>