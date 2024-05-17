<?php if(isset($_POST['id']) and $_POST['id']!=""){ ?>
<?php if($_POST['id']=='1') {?>        
                  <input type="hidden" name="terminacion"  value="" placeholder="ingrese número de operación">               
<?php }else if($_POST['id']=='2'){?>
    <style>
    /* Estilo para el placeholder */
    .tarj::placeholder {
        font-weight: normal; /* Elimina negritas */
        color: #999; /* Color del texto del placeholder */
    }
    /* Ajuste para evitar que se acorte el ancho del input */
    .tarj {
        width: calc(50%); /* Resta 20px al ancho total */
        padding: 5px; /* Ajuste de relleno */
    }
</style>
<input type="text" class="tarj" name="terminacion" placeholder="Terminación de la tarjeta">
<?php  }else if($_POST['id']=='3'){?>               
    <style>
    /* Estilo para el placeholder */
    .tarj::placeholder {
        font-weight: normal; /* Elimina negritas */
        color: #999; /* Color del texto del placeholder */
    }
    /* Ajuste para evitar que se acorte el ancho del input */
    .tarj {
        width: calc(50%); /* Resta 20px al ancho total */
        padding: 5px; /* Ajuste de relleno */
    }
</style>
<input type="text" class="tarj" name="terminacion" placeholder="Nota">
<?php }else if($_POST['id']=='6'){?>
     <div class="col-md-12">
    <strong><h3 style="color: #009688;"><strong>Tipo de cambio hoy: $<?php echo number_format($_POST['dolarhoy'], 2, '.', ',');?></strong></h3></strong>
    <strong><h3 style="color: #009688;"><strong>Total en DLS: $<?php echo number_format((($_POST['totalpagar']  - $_POST['abon']) / $_POST['dolarhoy']), 2, '.', ',');?></strong></h3></strong>    
    <?php
    $total = number_format(($_POST['totalpagar'] / $_POST['dolarhoy']) - $_POST['adelanto'], 2, '.', ',');
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><center style="font-size: 12px;">MONEDA</center></th>
                <th><center style="font-size: 12px;">PAGO</center></th>
                <?php if ($total < 0) { ?>
                    <th><center style="font-size: 12px;">CAMBIO</center></th>
                <?php } else { ?>
                    <th><center style="font-size: 12px;">FALTANTE</center></th>
                <?php } ?>
            </tr>
        </thead>
                                <tbody> 
                                <tr>
                                    <td><center><b style="font-size: 13px;">PAGO EN DOLAR</b></center></td>
                                    <td><center><b style="font-size: 13px;color:#16a085;">$    
                                        <?php echo number_format($_POST['adelanto'],2,'.',',');?></b></center></td>          
                                        <?php if ($total < 0) { ?>
                                             <td><center><b style="font-size: 13px;color: #e05d6f;">$    
                                             <?php echo number_format( (((($_POST['totalpagar'] -$_POST['abon']) /$_POST['dolarhoy']) )-$_POST['adelanto']) * (-1),2,'.',',');?></b></center></td>
                <?php } else { ?>
                    <td><center><b style="font-size: 13px;color: #e05d6f;">$    
                    <?php echo number_format( (((($_POST['totalpagar'] -$_POST['abon']) /$_POST['dolarhoy']) )-$_POST['adelanto']),2,'.',',');?></b></center></td>
                <?php } ?>
                                </tr>
                                <tr>
                                    <td><center><b style="font-size: 13px;">EQUIVALENTE EN PESOS</b></center> <span id="totalpago" ></td>
                                    <td><center><b style="font-size: 13px;color:#16a085;">$    
                                        <span id="adelantoo" ><?php echo number_format($_POST['adelanto']*$_POST['dolarhoy'],2,'.',',');?></span></b> </center></td>          
                                        <?php if ($total < 0) { ?>
                                             <td><center><b style="font-size: 13px;color: #e05d6f;">$    
                                             <span id="adelantoo" ><?php echo number_format((((($_POST['totalpagar'] -$_POST['abon']) / $_POST['dolarhoy']) )-$_POST['adelanto']) * ($_POST['dolarhoy']) * (-1),2,'.',',');?></span></b></center></td>
                <?php } else { ?>
                    <td><center><b style="font-size: 13px;color: #e05d6f;">$    
                    <span id="adelantoo" ><?php echo number_format((((($_POST['totalpagar'] -$_POST['abon']) / $_POST['dolarhoy']) )-$_POST['adelanto']) * ($_POST['dolarhoy']),2,'.',',');?></span></b></center></td>
                <?php } ?>
                                </tr>
                                </tbody> 
                            </table>
                            <br>
                        </div>
                        <input type="hidden" name="terminacion" value="Tipo de Cambio: $<?php echo number_format($_POST['dolarhoy'], 2, '.', ',');?>" placeholder="">
<?php }else if($_POST['id']=='7'){?>  
    <style>
    /* Estilo para el placeholder */
    .tarj::placeholder {
        font-weight: normal; /* Elimina negritas */
        color: #999; /* Color del texto del placeholder */
    }
    /* Ajuste para evitar que se acorte el ancho del input */
    .tarj {
        width: calc(50%); /* Resta 20px al ancho total */
        padding: 5px; /* Ajuste de relleno */
    }
</style>
<input type="text" class="tarj" name="terminacion" placeholder="Terminación de la tarjeta">
<?php } ?>
<?php }; ?>