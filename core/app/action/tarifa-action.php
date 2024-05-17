
<?php if(isset($_POST['id']) and $_POST['id']!=""){ ?>

  <?php $tarifa = TarifaData::getById($_POST['id']);?>
<?php $abono = HabitacionData::getById($_POST['id']);?>                
                <div class="form-group col-md-4 mb-0">
                    <label for="pr-subject"><strong>Tarifa por Noche:</strong></label>
                    <div class="input-group">
                      <input type="hidden" class="form-control monto" name="precio_a"  value="<?php echo $tarifa->precio; ?>" >
                      <input type="number" step="any" class="form-control monto" name="precio" placeholder="Ingrese precio" value="<?php echo $tarifa->precio; ?>" onkeyup="sumar();" onchange="sumar();" id="precio" readonly>
                      <span class="input-group-btn" id="resultados">
                          <a href="#"  data-toggle="modal" data-target="#confirmarcambio" data-options="splash-2 splash-ef-11" class="tex-danger btn-xs b-0" style="color:#e05d6f;"><i class="glyphicon glyphicon-lock"></i></a>
                      </span>
                    </div>
                    <div class="input-group"> 
                    <i class="fa fa-money"></i><strong>&nbsp;&nbsp;&nbsp;Descuento o Cargo:&nbsp;&nbsp;&nbsp;</strong>
                    <strong><input type="number" step="any" class="form-control monto" name="extra" placeholder="Ingrese precio" value="0" onkeyup="sumar();" onchange="sumar();" id="extra"></strong>
                  </div> 
                </div>
                <script type="text/javascript">           
                $(document).ready(function(){
                  const min = 1;    // Valor mínimo
                  const max = 365; // Valor máximo
                  $(document).on('keyup', '#cant_noche', function(){
                    var self = $(this);
                    var value = self.val();
                    if(value < min || value > max){
                      self.val('');
                    }
                  })
                });
                </script>    
                <div class="form-group col-md-4 mb-0">
                    <h4 for="pr-subject" style="color: red;"><strong> Días de la Estadía:</strong> </h4>
                    <strong><input type="number" step="any" class="form-control monto" required="" name="cant_noche" id="cant_noche" min="1" max="365" value="1" onkeyup="sumar();" onchange="sumar();" ></strong>
                  </div>
                <!--  
                </div>
              -->
                <!-- /.input group -->

<!-- Agrega el input para el adelanto -->
<div class="input-group">
    <!--<i class="fa fa-money"></i><strong>&nbsp;&nbsp;&nbsp;Adelanto:&nbsp;&nbsp;&nbsp;</strong>-->
    <strong><input type="hidden" step="any" class="form-control monto" name="adelanto" id="adelanto" value='0' placeholder="Ingrese adelanto" onkeyup="restarAdelanto(); actualizarTotal();" onchange="restarAdelanto(); actualizarTotal();"></strong>
</div>

<!-- Input oculto para almacenar el valor inicial de adelanto -->
<input type="hidden" id="dinero_abonado" value="<?php echo $abono->dinero_dejado; ?>">

<!-- Mostrar el total a pagar -->
<h2 style="font-size: 25px; font-weight: bold; color: black;">
    <span>Total a pagar: $</span>
    <span id="spTotal"><?php echo number_format($tarifa->precio * 1, 2, '.', ','); ?></span>
</h2>



</div>


<script>
// Espera a que el documento esté listo
$(document).ready(function() {
    // Establece el valor inicial de adelanto
    restarAdelanto();

    // Código adicional...
});

function restarAdelanto() {
    // Obtén los valores de precio, adelanto y dinero abonado
    var precio = parseFloat(document.getElementById('precio').value);
    var adelanto = parseFloat(document.getElementById('adelanto').value);
    var dineroAbonado = parseFloat(document.getElementById('dinero_abonado').value);
    var descuentoCargo = parseFloat(document.getElementById('extra').value);
    var diasEstadia = parseFloat(document.getElementById('cant_noche').value);

  // Calcula el total restando el adelanto, descuento/cargo y sumando el dinero abonado
  var total = (precio * diasEstadia) + descuentoCargo - adelanto - dineroAbonado;

// Actualiza el campo de total
document.getElementById('spTotal').textContent = total.toFixed(2);
}


function sumar() {
  // Obtener valores como números decimales usando parseFloat
  var m1 = parseFloat(document.getElementById("precio").value) || 0;
  var m2 = parseFloat(document.getElementById("cant_noche").value) || 0;
  var extra = parseFloat(document.getElementById("extra").value) || 0;
  var adelantoo = parseFloat(document.getElementById("adelanto").value) || 0;
  var dineroAbonado = parseFloat(document.getElementById('dinero_abonado').value);
    

  
  // Realizar la operación y redondear a dos decimales
  var r = (m1 * m2) + extra - adelantoo - dineroAbonado;

  // Mostrar el resultado con dos decimales
  document.getElementById('spTotal').innerHTML = r.toFixed(2);

  // Resto del código...
  var dolarhoy = parseFloat(document.getElementById("dolarhoy").value) || 0;
  document.getElementById('totalpago').innerHTML = r;
  document.getElementById('adelantoo').innerHTML = adelantoo;

  // Resto del código...
  var fechamin = $("#fecha_entrada").val()
  var fechaSumada = sumaFecha(m2, fechamin);
  document.getElementById('fecha_salida').value = fechaSumada;
}
</script>
<script>
function actualizarTotal() {
    // Desencadena el evento de cambio para el campo adelanto
    document.getElementById('adelanto').dispatchEvent(new Event('change'));
}
</script>

<?php }; ?>

