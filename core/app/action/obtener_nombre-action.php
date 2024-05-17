<?php


$id_habitacion = $_POST['id'];
$nombre_habitacion = HabitacionData::getNameById($id_habitacion);
echo $nombre_habitacion;
?>

