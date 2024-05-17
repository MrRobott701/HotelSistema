 <?php $id_proceso=$id;  ?>

 <?php 
 $sumatoria_s=0; 
 $tmps = PagoProcesoData::getAllProcesoExtender($id_proceso); 
    foreach($tmps as $p):  
    	$sumatoria_s+=($p->total*$p->cantidad); 
    endforeach; 
$total_s=$sumatoria_s; 
?>

<?php 
$total=0;
$producto_pagado=0;
$productos = ProcesoVentaData::getByAll($id_proceso);
    if(count($productos)>0){ 
        foreach($productos as $producto):
        	if($producto->fecha_creada!=NULL and $producto->fecha_creada!='0000-00-00 00:00:00'){ 
                $producto_pagado+=$producto->precio*$producto->cantidad;
            }else{ $producto_pagado+=0; }

            $total=($producto->cantidad*$producto->precio)+$total; 
        endforeach; 
    }; 
?>    

<?php 
$total_extra=0;
$gastos = GastoData::getAllIngresoProceso($id_proceso);  
    if(@count($gastos)>0){
        foreach($gastos as $gasto):
        	$total_extra+=$gasto->precio;
        endforeach; 
    }
?>



<?php 
$sumatoria_pagado=0; 
$tmps_p = PagoProcesoData::getAllProceso($id_proceso); 
    foreach($tmps_p as $p_p):  
        $sumatoria_pagado+=$p_p->monto; 
    endforeach; 
?>
<?php $total_total=$total_extra+$total+$total_s; ?>
<?php $deuda=$total_total-($sumatoria_pagado+$producto_pagado);?>
<?php if ($deuda < 0) {
    $cambio = $deuda;
}?>
<?php $pagadooo=$total_total-$deuda; ?>

