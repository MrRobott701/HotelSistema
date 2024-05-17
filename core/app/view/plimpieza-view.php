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
      <li class="active">Perfil</li>
    </ol>
</section> 
</div> 
<?php 
date_default_timezone_set('America/Tijuana');
$hoy = date("Y-m-d"); 
$hora = date("H:i:s");
?>

<!-- row --> 
<div class="row">
  <!-- col --> 

  <div class="col-md-12">
      <section class="tile">
        <div class="tile-header dvd dvd-btm">  
          <h1 class="custom-font"><strong>PERFIL</strong>  </h1>
                  
        </div>
        <div class="tile-body">
          <div class="row">
          <?php $users = UserData::getLimpieza();  
          if(@count($users)>0){ ?>
            <?php foreach($users as $user):?>
                  <div class="col-lg-2 col-xs-12">

                    <?php if(isset($_SESSION["user_id"]) and $_SESSION["user_id"]==$user->id ):?>
                          <section class="tile bg-default widget-appointments">
                            <div class="tile-body" style="padding: 6px;">
                              <a href="./?view=tarea&id=<?php echo $user->id; ?>"  style="color: white;">
                                      <img src="img/user.png" alt="" class="img-circle size-30x30">
                                      <span style="font-size: 16px; font-weight: bold;"><?php echo $user->name; ?>
                                        
                                      </span>
                              </a>
                            </div>
                           </section>
                    <?php else:?>
                          <section class="tile bg-default widget-appointments">
                            <div class="tile-body" style="padding: 6px;">
                              <a class="dropdown-toggle" data-toggle="dropdown"  style="color: white;">
                                      <img src="img/user.png" alt="" class="img-circle size-30x30">
                                      <span style="font-size: 16px; font-weight: bold;"><?php echo $user->name; ?>
                                        <i class="fa fa-lock" style="color: white;"></i>
                                      </span>
                              </a>
                            </div>
                           </section>
                    <?php endif;?>

                    </div>
            <?php endforeach; }; ?>
           </div>
        </div>

      </section>
  </div>
 

    

  </div> 


     
