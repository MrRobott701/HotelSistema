<?php 
// Obtener reservas 
$reservas = ProcesoData::getByIdHab($_POST['id_h']);
echo $reservas->num_reservas;
?>
