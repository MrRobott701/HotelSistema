<?php

if(@count($_GET)>0){
  
  $nivel = HabitacionData::getById($_GET["id"]);
  $nivel->limpieza = 0;
  $nivel->update_aseo();

  
print "<script>window.location='index.php?view=clibro_limpieza';</script>";


}


?>