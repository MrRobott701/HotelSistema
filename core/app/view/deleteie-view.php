<?php


$eliminar = GastoData::getById($_GET['id']);
$eliminar->del();

print "<script>window.location='index.php?view=vista_caja';</script>";

?>