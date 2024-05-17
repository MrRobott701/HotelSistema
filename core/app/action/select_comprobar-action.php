<?php 
// Obtener reservas dentro del rango de fechas seleccionado para la habitación específica
$reservas = ProcesoData::getHabConfirm2($_POST['id_h'], $_POST['start'], $_POST['end']);

// Verificar las reservas obtenidas
if (count($reservas) == 0) {
    // No hay reservas dentro del rango de fechas, se permite la creación de una nueva reserva
    echo '0';
} else {
    // Hay reservas dentro del rango de fechas
    $permitir_reserva = true;

    foreach ($reservas as $reserva) {
        // Verificar si el día de start es menor o igual al día de salida de la reserva existente
        if ($_POST['start'] <= $reserva->fecha_salida) {
            // No se permite la creación de una nueva reserva
            $permitir_reserva = false;
            break;
        }

        // Verificar si el día de end es mayor o igual al día de entrada de la reserva existente
        if ($_POST['end'] >= $reserva->fecha_entrada) {
            // No se permite la creación de una nueva reserva
            $permitir_reserva = false;
            break;
        }
    }

    // Imprimir el resultado basado en la decisión
    echo $permitir_reserva ? 0 : 1;
}
?>
