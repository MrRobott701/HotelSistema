<?php
header('Content-Type: application/json');

$base = new Database();
$pdo = $base->connect1();

function getHabitacionesDisponiblesHoy($pdo) {
    $fechaHoy = date("Y-m-d");

    $sentenciaSQL = $pdo->prepare("SELECT habitacion.nombre as title, categoria.nombre as nom, habitacion.id as id
                                    FROM `habitacion`
                                    INNER JOIN categoria ON categoria.id = habitacion.id_categoria
                                    LEFT JOIN proceso ON habitacion.id = proceso.id_habitacion
                                    WHERE proceso.estado IS NULL AND DATE(proceso.fecha_entrada) = :fecha
                                    ORDER BY habitacion.id");

    $sentenciaSQL->bindParam(':fecha', $fechaHoy);
    $sentenciaSQL->execute();

    $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

    return $resultado;
}
