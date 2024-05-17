<?php
$base = new Database();
$pdo = $base->connect1();

$sentenciaSQL=$pdo->prepare("INSERT INTO tmp(id_producto,precio_tmp)
			values(:id_producto,:precio_tmp)");
			
			$respuesta=$sentenciaSQL->execute(array(
				"id_producto" =>20,
				"precio_tmp" =>300
				
			));
			$id = $pdo->lastInsertId();
			echo $id;