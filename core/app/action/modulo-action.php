<?php $gastos = GastoData::getIngresosEgresos();
                            $nhotel=0; $nalmacen=0; $nresto=0; $nparking=0;

                            $ncustodia=0; $nsobrante=0; $ngastom=0; $ngastoc=0; $ngasc=0; $nfiesta=0; $nproveedor=0; $nadelanto=0; $otros=0;
                             if(@count($gastos)>0){ ?>

                            <?php foreach($gastos as $gasto):?>

                                <?php if($gasto->modulo=="Hotel"){$nhotel=$nhotel+1;} ?>
                                <?php if($gasto->modulo=="Almacen"){$nalmacen=$nalmacen+1;} ?>
                                <?php if($gasto->modulo=="Restaurant"){$nresto=$nresto+1;} ?>
                                <?php if($gasto->modulo=="Parking"){$nparking=$nparking+1;} ?>

                                <?php if($gasto->categoria=="Custodia"){$ncustodia=$ncustodia+1;} ?>
                                <?php if($gasto->categoria=="Sobrante"){$nsobrante=$nsobrante+1;} ?>
                                <?php if($gasto->categoria=="Gastos de mantenimiento"){$ngastom=$ngastom+1;} ?>
                                <?php if($gasto->categoria=="Gastos de cocina"){$ngastoc=$ngastoc+1;} ?>
                                <?php if($gasto->categoria=="Recibos"){$ngasc=$ngasc+1;} ?>
                                <?php if($gasto->categoria=="Proveedores"){$nfiesta=$nfiesta+1;} ?>
                                <?php if($gasto->categoria=="Proveedores de almacen"){$nproveedor=$nproveedor+1;} ?>
                                <?php if($gasto->categoria=="Adelantos"){$nadelanto=$nadelanto+1;} ?>
                                <?php if($gasto->categoria=="Otros"){$otros=$otros+1;} ?>



                             <?php endforeach; ?>
                            <?php };?>
<?php if(isset($_POST['modulo']) and $_POST['modulo']=='1'){ ?>
<div class="nuevo">
                                <div class="p-10 mb-10 event-control b-l b-2x b-greensea"> <b></b> 
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Todos los Módulo: <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if($nhotel>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_1" name="modulo[]" value="Hotel"><label class="form-check-label" for="country_1">Hotel</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nalmacen>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_2" name="modulo[]" value="Almacen"><label class="form-check-label" for="country_2">Almacen</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nresto>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_3" name="modulo[]" value="Restaurant"><label class="form-check-label" for="country_3">Restaurant</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        <?php if($nparking>0){ ?>
                                        <li>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="country_4" name="modulo[]" value="Parking"><label class="form-check-label" for="country_4">Parking</label>
                                            </div>
                                        </li>
                                        <?php }; ?>
                                        
                                    </ul>
                                </div>
                                </div>
                                
                            </div>

<?php }else if (isset($_POST['id_forma_pago']) and $_POST['id_forma_pago']=='2') { ?>
<?php }; ?>