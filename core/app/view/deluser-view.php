<?php

if(@count($_GET)>0){ 

 
	$proceso = UserData::getById($_GET["id"]);
  $proceso->estado = 0;
	$proceso->update_del();   
 
	

 
  print "<script>window.location='index.php?view=users';</script>";


}

?>