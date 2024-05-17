


<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=cliebte"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Perfil</li>
    </ol>
</section> 
</div> 
<?php 
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
?>

 <?php $user = UserData::getById($_GET['id']);  ?>


<style type="text/css">
  .list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff0;
border: 0px solid #ddd;
}
</style>
<!-- row --> 
<div class="row">
  <!-- col --> 

  <div class="col-md-12">
      <section class="tile">
        <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong><?php echo $user->name;  ?></strong>  </h1>
                  
        </div>
        <div class="tile-body">
          <div class="row">
            <ul class="list-group list-group-sortable-handles">
          <?php $tareas = LibroLimpiezaData::getAllHoyUser($hoy,$user->id);  
          if(@count($tareas)>0){ ?> 
            <?php foreach($tareas as $tarea):?>

            
                <li class="" style="list-style:none;">
                  <div class="col-lg-3 col-xs-3">
                          

                              <span class="glyphicon glyphicon-move" style="font-size: 30px;"></span>
                              
                          
                    </div>
                


                    <div class="col-lg-3 col-xs-3">
                          <section class="tile bg-default widget-appointments">
                            <div class="tile-body" style="padding: 6px;">
                              <a class="dropdown-toggle" data-toggle="dropdown"  style="color: white;">
                                      <span style="font-size: 16px; font-weight: bold;"><?php echo $tarea->getHabitacion()->nombre; ?>
                                      </span>
                              </a>
                            </div>
                           </section>
                    </div>
                    <div class="col-lg-3 col-xs-3">
                          <section class="tile bg-default widget-appointments">
                            <div class="tile-body" style="padding: 6px;">
                              <a class="dropdown-toggle" data-toggle="dropdown"  style="color: white;">
                                      <span style="font-size: 16px; font-weight: bold;"><?php echo $tarea->tipo; ?>
                                      </span>
                              </a>
                            </div>
                           </section>
                    </div>
                    <div class="col-lg-3 col-xs-3">

                      <?php if($tarea->estado=='0'){  ?>
                      <form action="index.php?view=updatetarea" method="post" id="myform">
                          <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                          <input type="hidden" name="id_user" value="<?php echo $_GET['id']; ?>">
                          <input type="hidden" name="id_habitacion" value="<?php echo $tarea->id_habitacion; ?>">
                          <button type="button" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #26ae0a;background-color: #eff4de;border: 1px solid;">
                          <b style="font-size: 9px;" onclick="return updateClock();"> INICIO</b><br><span id="countdown"></span></button>
                      </form>
                      <?php }else if($tarea->estado=='1'){  ?>
                        <form action="index.php?view=fintarea" method="post" >
                            <input type="hidden" name="id" value="<?php echo $tarea->id; ?>">
                            <input type="hidden" name="id_user" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="id_habitacion" value="<?php echo $tarea->id_habitacion; ?>">
                            <button type="submit" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #ae290a;background-color: #eff4de;border: 1px solid;">
                            <b style="font-size: 9px;" > LISTO</b></button>
                        </form>
                      <?php }else{  ?>
                          <button type="button" class="btn btn-rounded-50p btn-ef btn-ef-2 btn-ef-2-green btn-ef-2a mb-10 ml-10 wh50" style="color: #606060;background-color: #eff4de;border: 1px solid;">
                            <b style="font-size: 9px;" > LISTO</b></button>
                      <?php };  ?>
                    </div>

                  </li>

            <?php endforeach; }; ?>
            </ul>
           </div>
        </div>

      </section>
  </div>
 

    

  </div> 

<span id="countdown"></span>
     

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





            
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.sortable.js"></script>
    <script>
        $(function() {
            
            $('.list-group-sortable-handles').sortable({
                placeholderClass: 'list-group-item',
                handle: 'span'
            });
            
        });
    </script>




        <!-- ===============================================
        ============== Page Specific Scripts ===============
        ================================================ -->
        <script>
            $(window).load(function(){
                $(".sortable").sortable({
                    connectWith: ".sortable",
                    handle: ".tile-header",
                    placeholder: "ui-sortable-placeholder",
                    start: function()
                    {
                        $('.sortable .tile').addClass('drag-active');
                    },
                    stop: function()
                    {
                        $('.sortable .tile').removeClass('drag-active');
                    }
                }).disableSelection();
            });
        </script>
        <!--/ Page Specific Scripts -->




