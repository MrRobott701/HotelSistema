  <link rel="stylesheet" href="assets/js/vendor/datatables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/datatables.bootstrap.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/ColVis/css/dataTables.colVis.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datatables/extensions/TableTools/css/dataTables.tableTools.min.css">

<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=cliebte"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Extra limpieza</li>
    </ol>
</section> 
<style type="text/css">
  .bg-default {
    background-color: #d7d6d6 !important;
    color: white !important;
}
</style>
</div> 
<?php  
$id_user=$_SESSION["user_id"];
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
?>

 <?php $user = UserData::getById($id_user);  ?>

<!-- row --> 
<div class="row">
  <!-- col --> 


  <div class="col-md-12">
      <section class="tile">
        <div class="tile-body">
          <div class="row"> 
            <div class="col-md-12"> 
              
              <form action="index.php?view=addextra" method="post">
              <div class="form-group col-md-4 col-xs-6">
                  <select name="area" required class="form-control">
                      <option value="" >-- AREA --</option>
                      <option value="Baños" >Baños</option>
                      <option value="Pasillos">Pasillos</option>
                      <option value="Habitaciones">Habitaciones</option>
                  </select>

                  <input type="text" name="especifico" class="form-control" required="" placeholder="Ingrese número">
              </div>
             
              <div class="form-group col-md-6 col-xs-6">
                  <textarea class="form-control col-md-8" name="glosa" placeholder="Algun comentario (OPCIONAL)"></textarea>
              </div>

              <div class="form-group col-md-2 col-xs-12">
                 <input type="hidden" name="id_usuario" value="<?php echo $user->id; ?>">
                 <input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
                 <button type="submit"  class="btn btn-success
                      btn-labeled btn-block btn-ladda btn-ladda-spinner"><b><i class="fa fa-plus"></i><br>
                      </b> Agregar <br>tarea
                 </button>
              </div>
            </form>

             

            </div>
           </div>
        </div>

      </section>
  </div>


  <div class="col-md-12">
      <section class="tile">
        <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong>EXTRA LIMPIEZA<?php echo $user->name;  ?></strong>  </h1>
                  
        </div>
        <div class="tile-body">
          <div class="row"> 
          <?php $tareas = ExtraData::getAllHoyUser($hoy,$user->id);  
          if(@count($tareas)>0){ ?>
            <?php foreach($tareas as $tarea):?>

              <section class="tile bg-default widget-appointments" >
                <div class="row"> 
                  <div class="col-md-12" style="padding-top: 15px;"> 
              
                    
                    <div class="form-group col-md-4 col-xs-4">
                        <input type="text" name="" class="form-control" value="<?php echo $tarea->area; ?>" disabled>
                        <input type="text" name="" class="form-control" value="<?php echo $tarea->especifico; ?>" disabled>
                    </div>
                   
                    <div class="form-group col-md-6 col-xs-4">
                        <textarea class="form-control col-md-8" name="glosa" disabled> <?php echo $tarea->glosa; ?></textarea>
                    </div>

                    <div class="form-group col-md-2 col-xs-4"> 
                       <?php if($tarea->estado=='0'){  ?>
                        <form action="index.php?view=updateextra" method="post" id="myform">
                            <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                            <button type="button" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #26ae0a;background-color: #fff;border: 1px solid;">
                            <b style="font-size: 9px;" onclick="return updateClock();"> INICIO</b><br><span id="countdown"></span></button>
                        </form>
                        <?php }else if($tarea->estado=='1'){  ?>
                          <form action="index.php?view=finextra" method="post" >
                              <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                              <button type="submit" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #ae290a;background-color: #fff;border: 1px solid;">
                              <b style="font-size: 9px;" > LISTO</b></button>
                          </form>
                        <?php }else{  ?>
                            <button type="button" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #606060;background-color: #fff;border: 1px solid;">
                              <b style="font-size: 9px;" > LISTO</b></button>
                        <?php };  ?>
                    </div>
                 

                   

                  </div>
                  </div>
                  </section>

                  

            <?php endforeach; }; ?>
           </div>
        </div>

      </section>
  </div>
 

    

  </div> 


     

<script type="text/javascript">
  



var totalTime = 10;
var formulario = document.getElementById("myform");

function updateClock() {
  document.getElementById('countdown').innerHTML = totalTime;
  if(totalTime==0){
    formulario.submit();
    return true;
  }else{
    totalTime-=1;
    setTimeout("updateClock()",1000);

  }
}


</script>


