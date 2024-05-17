<?php

define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

include "core/autoload.php";

ob_start();
session_start(); 
Core::$root="";

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
// Core::$debug_sql = true;

$lb = new Lb();
$lb->start();

date_default_timezone_set('America/Tijuana');

// Manejo de la eliminación de niveles
if(isset($_GET['view']) && $_GET['view'] == 'deletenivel' && isset($_POST['id_nivel'])) {
    $id_nivel = $_POST['id_nivel'];
    NivelData::deleteById($id_nivel);
    header("Location: index.php?view=nivel");
 // Redirecciona a la página principal después de eliminar
    exit();
}
?>
