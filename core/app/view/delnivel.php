<?php
// Verifica si se ha pasado un ID por GET
if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    // Incluye la clase NivelData para poder usar la función delById
    require_once 'NivelData.php';
    
    // Intenta eliminar el registro utilizando el ID proporcionado
    NivelData::delById($id);
    
    // Redirige al usuario a una página de confirmación o a donde desees
    header("Location: index.php?view=reserva"); // Puedes cambiar 'reserva' por la vista que desees mostrar después de eliminar.
    exit;
} else {
    // Si no se proporcionó un ID, puedes redirigir al usuario a una página de error o a la página principal
    header("Location: index.php?view=reserva"); // Cambia 'reserva' por la vista que desees mostrar en caso de error.
    exit;
}
?>
