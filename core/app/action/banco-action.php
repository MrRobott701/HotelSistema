              
<?php if(isset($_POST['id']) and $_POST['id']!=""){ ?>

<?php if($_POST['id']=='1') {?>      
                
                
                  <input type="hidden" name="nro_operacion"  value="-" placeholder="ingrese número de operación">
                  
               
<?php }else if($_POST['id']=='2'){?>


                
                <input type="hidden" name="nro_operacion"  value="-" placeholder="ingrese número de operación">
                <!-- /.input group -->
            

<?php  }else if($_POST['id']=='3'){?>

				<label for="inputEmail1" class="col-lg-3 control-label">BANCO*</label>
                <div class="col-md-8">  

                    <select class="form-control select2" required  name="banco" >  
                      <option value="NULL">--- NINGUNO ---</option>
                        <option value="SANTANDER">SANTANDER</option>
                        <option value="ITAU">ITAU</option>
                     </select>

                </div>

                
                <input type="hidden" class="form-control" name="nro_operacion"  value="-"  placeholder="Nombre banco">
                <!-- /.input group -->
              

<?php }else if($_POST['id']=='3'){?>


               <input type="hidden" name="nro_operacion"  value="-" placeholder="ingrese número de operación">
                  
              
              

<?php } ?>



<?php }; ?>