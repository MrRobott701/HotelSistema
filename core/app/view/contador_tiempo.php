<?php 
$fecha1 = new DateTime($proceso->fecha_salida); // Fecha final
$fecha2 = new DateTime($fecha_completa); // Fecha de hoy

$intervalo = $fecha1->diff($fecha2);

$contar_dias = $intervalo->format('%d');
$contar_horas = $intervalo->format('%H');
$contar_minutos = $intervalo->format('%i');
$contar_segundos = $intervalo->format('%s');

// Asegúrate de tener un número entero para los segundos
$contar_segundos = intval($contar_segundos);

// Calcula las horas totales, incluyendo los días
$contar_horas_totales = $intervalo->format('%h');
$contar_horas_totales += $contar_dias * 24;

?>

<b style="color:red;">
<?php echo '<b> Días: ' . $contar_dias . '</b>  Horas: <b>' . $contar_horas_totales . '</b>  Minutos: <b>' . $contar_minutos . '</b> Segundos: <b>' . $contar_segundos . '</b>'; ?>
</b>
