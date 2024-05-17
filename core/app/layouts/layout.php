<!doctype html>
 <html class="no-js" lang="es"> 
 
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>HOTEL </title>
        <link rel="icon" type="image/ico" href="assets/images/favicon.ico" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/vendor/animate.css">
        <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/js/vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" href="assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="assets/js/vendor/daterangepicker/daterangepicker-bs3.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.carousel.css">
        <link rel="stylesheet" href="assets/js/vendor/owl-carousel/owl.theme.css"> 
        <link rel="stylesheet" href="assets/js/vendor/chosen/chosen.css">
        <link rel="stylesheet" href="assets/js/vendor/summernote/summernote.css">
        <link rel="stylesheet" href="assets/css/vendor/weather-icons.min.css">

        <link rel="stylesheet" href="assets/css/main.css">
    <script src="https://kit.fontawesome.com/176a2a93fe.js" crossorigin="anonymous"></script>


       

    </head>




    <body  id="minovate" class="<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?> appWrapper sidebar-sm-forced <?php else:?>appWrapper<?php endif; ?>"  >




        <div id="wrap" class="animsition">


            <?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>
            <section id="header">
                <header class="clearfix">

                    <!-- Branding -->
                    <div class="branding">
                        <a class="brand" href="index.php?view=recepcion">
                            <span><strong>COSTA ENSENADA </strong></span>
                        </a>
                        <a href="#" class="offcanvas-toggle visible-xs-inline"><i class="fa fa-bars"></i></a>
                    </div>
                    <!-- Branding end -->


                    <!-- Left-side navigation -->
                    <ul class="nav-left pull-left list-unstyled list-inline">
                        <li class="sidebar-collapse divided-right">
                            <a href="#" class="collapse-sidebar">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <!--
                        <li class="dropdown divided-right settings">
                            <a href="index.php?view=pre_venta">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                            
                        </li>
            -->
                        
                    </ul>
                    <!-- Left-side navigation end -->
                    
                   <!-- Right-side navigation -->
                    <ul class="nav-right pull-right list-inline">
                        
                        <li class="dropdown nav-profile">

                            <a style="font-size: 17px;" href class="dropdown-toggle" data-toggle="dropdown">
                                
                                <span><strong><?php if(isset($_SESSION["user_id"]) ){ echo UserData::getById($_SESSION["user_id"])->name;}?></strong>
                  <i class="fa fa-angle-down"></i></span>
                            </a>

                            <ul class="dropdown-menu animated littleFadeInRight" role="menu">
                                <!--
                                <li>
                                    <a href="#">
                                        <span class="badge bg-greensea pull-right">86%</span>
                                        <i class="fa fa-user"></i>Perfil
                                    </a>
                                </li>
                            -->
                                <li>
                                    <a href="./logout.php">
                                        <i class="fa fa-sign-out"></i>Salir
                                    </a>
                                </li>
 
                            </ul>

                        </li>

                        
                    </ul>
                    <!-- Right-side navigation end -->
 
 
                    <!-- Search 
                    <div class="search" id="main-search">
                        <form action="index.php?view=cliente" method="get">
                            <input type="hidden" name="view" value="recepcion">
                            <input type="text" class="form-control underline-input" name="buscar" placeholder="Buscar Cliente...">
                        </form>
                    </div>
                    -->




                    



                </header>

            </section>
            <!--/ HEADER Content  -->





            <!-- =================================================
            ================= CONTROLS Content ===================
            ================================================== -->
            <div id="controls">





                <!-- ================================================
                ================= SIDEBAR Content ===================
                ================================================= -->
                <aside id="sidebar">


                    <div id="sidebar-wrap">

                        <div class="panel-group slim-scroll" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#sidebarNav">
                                            Navegación <i class="fa fa-angle-up"></i>
                                        </a>
                                    </h4>
                                </div>
                                <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                                    <div class="panel-body">
                                <?php 
                                    $u=null; 
                                    $u = UserData::getById(Session::getUID());
                                ?>

                                        <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->

                                        
                                        <ul id="navigation">
                                            <?php if($u->reserva):?>
                                            <li class="<?php if($_GET['view']=='reserva'){ echo 'active';} ?>"><a href="./?view=reserva"><i class="fa fa-calendar"></i> <span>Reserva</span></a></li>
                                            <?php endif;?>
                                            <?php if($u->recepcion):?>
                                            <li class="<?php if($_GET['view']=='recepcion'){ echo 'active';} ?>">
                                                <a href="index.php?view=recepcion"><i class="fa fa-sign-in"></i> <span>Recepción</span> <span class="badge bg-lightred">6</span></a>
                                               
                                            </li> 
                                             
                                            
                                            <?php endif;?>
                                            <!--
                                            <li class="<?php if($_GET['view']=='reservap' or $_GET['view']=='reservasp'){ echo 'active';} ?>">
                                                <a href="index.php?view=reservasp"><i class="fa fa-search"></i> <span>Reserva</span> </a>
                                               
                                            </li> 
                                            -->
                                           

                                            <?php if($u->recepcion):?>
                                                <!--
                                            <li class="<?php if($_GET['view']=='tablero_mensual'){ echo 'active';} ?>">
                                                <a href="index.php?view=tablero_mensual"><i class="fa fa-table"></i> <span>Tablero mensual</span> </a>
                                               
                                            </li> 
                                             -->
                                            
                                            <?php endif;?>
                                            <?php if($u->configuracion):?>
                                        

                                           
                                         
                                            

                                        <li class="<?php if($_GET['view']=='habitacion' or $_GET['view']=='categoria' or $_GET['view']=='tarifa' or $_GET['view']=='esperado'){ echo 'active';} ?>">
                                          <a role="button" tabindex="0"><i class='fa fa-bed'></i> <span>Configuración de Habitaciones</span> </a>
                                          <ul>
                                            <li><a href="./?view=habitacion"> <i class="fa fa-caret-right"></i>  Habitaciones</a></li>
                                            <li><a href="./?view=categoria"> <i class="fa fa-caret-right"></i>  Categorías</a></li>
                                            <li><a href="./?view=tarifa"> <i class="fa fa-caret-right"></i>  Tarifas</a></li>
                                            <li><a href="./?view=nivel"> <i class="fa fa-caret-right"></i>Pisos</a></li>                                              
                                            <li><a href="./?view=historial_ma"> <i class="fa fa-caret-right"></i>Historial de Mantenimiento</a></li>                                              </ul>
                                        </li>

                                        <?php endif;?> 
                                            <?php if($u->credito):?>
                                            <!--
                                            <li class="<?php if($_GET['view']=='credito'){ echo 'active';} ?>">
                                                <a href="index.php?view=credito"><i class="fa fa-money"></i> <span>Histórico de crédito</span> </a>
                                               
                                            </li> 
                                        -->


                                        <?php endif;?> 
                                            
                                           

                                        <?php if($u->limpieza):?>
                                             
                                           
                                            <li class="<?php if($_GET['view']=='libro_limpieza' or $_GET['view']=='extras' or $_GET['view']=='reporte_limpieza'){ echo 'active';} ?>">
                                              <a role="button" tabindex="0"><i class='fa fa-key'></i> <span> Limpieza</span> </a>
                                              <ul>
                                                <li><a href="./?view=reporte_limpieza"> <i class="fa fa-caret-right"></i> Reporte Limpieza</a></li>
                                                <!--<li><a href="./?view=rlibro"> <i class="fa fa-caret-right"></i>  Registro de libros</a></li>-->
                                              </ul>
                                            </li> 
                                         <?php endif;?>   
                                            
                                            
                                            <!--CAJA-->
                                            <?php if($u->caja):?>
                                            <!--
                                            <li class="<?php if($_GET['view']=='apertura_caja'){ echo 'active';} ?>">
                                                <a role="button" tabindex="0"><i class="fa fa-cube"></i> <span>Módulo caja</span></a>
                                                <ul>
                                                    <li><a href="./?view=apertura_caja"><i class="fa fa-caret-right"></i> Apertura caja</a></li>
                                                    <li><a href="./?view=cierre_caja"><i class="fa fa-caret-right"></i> Cierre caja</a></li>
                                                    <li><a href="./?view=resumen_caja"><i class="fa fa-caret-right"></i> Resumen liquidación</a></li>
                                                    <li><a href="./?view=reporte_diario"><i class="fa fa-caret-right"></i> Reporte diario</a></li>
                                                <li><a href="./?view=pre_reporte_user"><i class="fa fa-caret-right"></i> Reporte Recepcionista</a></li>
                                                </ul>
                                            </li> 
                                        -->

                                            <li class="<?php if($_GET['view']=='vista_caja' || $_GET['view']=='grafica_caja' || $_GET['view']=='grafica_caja_nivel'  || $_GET['view']=='grafica_ingresos'){ echo 'active';} ?>">
                                                <a role="button" tabindex="0"><i class="fa fa-cube"></i> <span>Caja</span></a>
                                                <ul>
                                                    <li><a href="./?view=vista_caja"><i class="fa fa-caret-right"></i> CORTE DE CAJA</a></li>
                                                    <li><a href="./?view=lista_caja"><i class="fa fa-caret-right"></i> HISTORIAL DE CAJAS</a></li>
                                                </ul>
                                            </li> 

                                            <?php endif;?>

                                            <?php if($u->cliente):?>

                                             
<li class="<?php if($_GET['view']=='cliente' or $_GET['view']=='lista_pasajeros'){ echo 'active';} ?>">
  <a role="button" tabindex="0"><i class='fa fa-users'></i> <span> Huespedes</span> </a>
  <ul>

    <li><a href="index.php?view=cliente"> <i class="fa fa-caret-right"></i>  Listado general</a></li>

    <li><a href="index.php?view=lista_pasajeros"> <i class="fa fa-caret-right"></i>  Historial de Huespedes</a></li>

   


  </ul>
</li> 


<?php endif;?>                      <!--
                                        <?php if($u->mantenimiento):?>

                                            <li class="<?php if($_GET['view']=='mantenimiento' or $_GET['view']=='rmantenimiento'){ echo 'active';} ?>">
                                              <a role="button" tabindex="0"><i class='fa fa-cogs'></i> <span> Mantenimiento</span> </a>
                                              <ul>

                                                <li><a href="./?view=mantenimiento"> <i class="fa fa-caret-right"></i>  Registrar mantenimiento</a></li>

                                                <li><a href="./?view=rmantenimiento"> <i class="fa fa-caret-right"></i>  Registro de mantenimientos</a></li>

                                               


                                              </ul>
                                            </li> 
                                            <?php endif;?>  
                                        -->
                                            <?php if($u->egreso):?>
                                            <li class="<?php if($_GET['view']=='newingreso' or $_GET['view']=='registro_ingresos' or $_GET['view']=='lista_ingreso'){ echo 'active';} ?>">
                                              <a role="button" tabindex="0"><i class='fa fa-bar-chart'></i> <span>Ingresos / Egresos</span> </a>
                                              <ul>

                                                <li><a href="./?view=newingreso"> <i class="fa fa-caret-right"></i>  Reportar Ingreso / Egreso</a></li>

                                                <li><a href="./?view=registro_ingresos"> <i class="fa fa-caret-right"></i> Lista de Ingresos / Egresos</a></li>

                                                <!-- <li><a href="./?view=otro_ingreso"> <i class="fa fa-caret-right"></i>  Registrar otro ingreso</a></li> 

                                                <li><a href="./?view=lista_ingresos"> <i class="fa fa-caret-right"></i>  Lista otros ingresos</a></li>

                                                <li><a href="./?view=reporte_ingreso"> <i class="fa fa-caret-right"></i>  Reporte por fechas</a></li>-->

                                              </ul>
                                            </li>
                                            <?php endif;?>


                                            <li class="<?php if($_GET['view']=='lista_error'){ echo 'active';} ?>">
                                              <a role="button" tabindex="0" href="./?view=lista_error"><i class='fa fa-money'></i> <span>Correcciones</span> </a>
                                              
                                            </li>



                                            

                                           
                                            
                                            
                                            <?php if($u->reporte):?>

                                            <li>
                                              <a  role="button" tabindex="0"><i class='fa fa-file-text-o'></i> <span>Reportes</span></a>
                                                                                            <ul >
                                                
                                              <li><a href="./?view=grafica_ocupacion"><i class="fa fa-caret-right"></i> OCUPACIÓN DE HABITACIONES</a></li> 
                                              <li><a href="./?view=lista_caja"><i class="fa fa-caret-right"></i> HISTORIAL DE CAJAS</a></li>
                                              <li><a href="./?view=pre_reporte_rango"><i class="fa fa-caret-right"></i> REPORTE DE COBROS</a></li>  
                                              <li><a href="./?view=pre_reporte_user"><i class="fa fa-caret-right"></i> COBROS POR RECEPCIONISTA</a></li>
                                                <li><a href="./?view=grafica_caja"><i class="fa fa-caret-right"></i>GRÁFICA DE VENTAS</a></li>
                                                <li><a href="./?view=grafica_ingresos"><i class="fa fa-caret-right"></i>GRÁFICA POR TIPOS DE PAGO</a></li>
                                                <li><a href="index.php?view=lista_pasajeros"> <i class="fa fa-caret-right"></i>HISTORIAL DE HUÉSPEDES</a></li>
                                                <li><a href="./?view=registro_ingresos"> <i class="fa fa-caret-right"></i> LISTA DE INGRESOS/EGRESOS</a></li>
                                                <!--
                                                <li><a href="./?view=reserva_esperado"><i class="fa fa-caret-right"></i> Reporte Reserva esperado</a></li>                                      
                                                <li><a href="./?view=reserva_confirmado"><i class="fa fa-caret-right"></i> Reporte Reserva confirmado</a></li>
                                                <li><a href="./?view=reporte_diario"><i class="fa fa-caret-right"></i> Reporte diario</a></li>                 
                                                  <li><a href="./?view=pre_reporte_caja"><i class="fa fa-caret-right"></i> Reporte de caja</a></li>                                                                                       
                                                <li><a href="./?view=reporte_mensual"><i class="fa fa-caret-right"></i> Reporte de mensual</a></li>                                                                                       
                                                <li><a href="./?view=reporte_caja"><i class="fa fa-caret-right"></i> Reporte de mensual</a></li>
                                            -->
                                              </ul>
                                            </li> 
                                            <?php endif;?>
                                            
                                        <!--
                                             <li>
                                              <a  role="button" tabindex="0"><i class='fa fa-bar-chart-o'></i> <span>Gráficos</span></a>
                                              <ul >
                                                <li><a href="./?view=pre_reporte_fecha_barra"><i class="fa fa-caret-right"></i> Reporte por fecha</a></li>
                                                <li><a href="./?view=pre_reporte_fecha_circular"><i class="fa fa-caret-right"></i> Reporte Circular</a></li>
                                                <li><a href="./?view=pre_reporte_anio_barra"><i class="fa fa-caret-right"></i> Reporte Anual</a></li>
                                                
                                              </ul> 
                                            </li>
                                            -->
                                        

                                           
                                            <?php if($u->administracion):?>
                                                        <li class="<?php if($_GET['view']=='users'){ echo 'active';} ?>">
                                                        
                                                          <a href="#"><i class='fa fa-male'></i> <span>Administracion de Usuarios</span> </a>
                                                          <ul>
                                                            <li><a href="./?view=users"><i class="fa fa-caret-right"></i> Usuarios</a></li>


                                                            <li><a href="./?view=configuracion"><i class="fa fa-caret-right"></i> Datos del Hotel </a></li>

                                                            <!--
                                                             <li><a href="./?view=configuracion"><i class="fa fa-caret-right"></i> Configurar</a></li>
                                                            -->
                                                          </ul>
                                                        </li>
                                            <?php endif;?>
                                            
                                            <li >
                                                        
                                                <a href="./logout.php"><i class='fa fa-sign-out'></i> <span>Salir</span> </a>
                                                          
                                            </li>

                                            <li>
                                                <a><br> </a>         
                                            </li><li>
                                                <a><br> </a>         
                                           

                                        </ul>
                                        <!--/ NAVIGATION Content -->
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>

                    </div>


                </aside>
                <!--/ SIDEBAR Content -->


            </div>
            <!--/ CONTROLS Content -->
 
            

<?php endif;?>


         
<?php if(isset($_SESSION["user_id"]) || isset($_SESSION["client_id"])):?>

    <section id="content">
    <div class="page page-sidebar-xs-layout" style="padding: 0 50px;"> <!-- Añadido padding a los lados del contenedor -->
        <div class="row">
            
            <?php if(isset($_GET['view']) && $_GET['view'] == 'reserva'): ?>
            
<!-- Sección de colores -->
<style>

    .content-header .breadcrumb {
        display: flex;
        list-style: none;
        padding: 0;
        background-color: transparent;
        border: none;
        align-items: center; /* Centrar verticalmente */
        justify-content: space-between; /* Espacio uniforme entre elementos */
        margin: 0 -10px; /* Aplica un margen negativo para el espacio a ambos lados */
    }

    .content-header .breadcrumb li {
        flex: 1;
        text-align: center;
        padding: 0px 0px; /* 5px arriba y abajo, 10px a la izquierda y derecha */
        font-size: 18px;
        line-height: 1;
    }

    .content-header .breadcrumb li h5 {
        margin: 0; /* Elimina cualquier margen predeterminado para asegurar la alineación */
    }

    /* Elimina el símbolo ">" */
    .content-header .breadcrumb li::before {
        content: "";
    }




    


  body {
    margin: 0; /* Elimina el margen predeterminado del cuerpo del documento */
  }

  .container {
    display: flex;
    justify-content: space-around; 
    gap: 20px; /* Separación entre elementos */
    width: 100%; /* Ocupa el ancho completo del contenedor padre */
  }

  .reserva-container, .check-out {
    flex: 1; /* Hace que los contenedores sean flexibles y ocupen el espacio disponible */
    height: 40px; /* Altura ajustada */
    border-radius: 10px; /* Bordes redondeados */
    padding: 2px; /* Espaciado interno */
    text-align: center; /* Alineación del texto al centro */
    color: #fff; /* Color del texto, en este caso, blanco */
    font-size: 16px; /* Tamaño de la fuente ajustado */
    text-shadow: 2px 2px 6px #000; /* Bordes de letras en negro */
    line-height: 40px; /* Centra verticalmente el texto */
  }

  .reserva-no-conf {
    background-color: #0B6805;
  }

  .reserva-conf {
    background-color: #08FF00;
  }

  .reserva-sn-deuda {
    background-color: #002EFF; 
  }

  .reserva-cn-deuda {
    background-color: #00D4FF;
  }

  .hab-check-in {
    background: linear-gradient(to right, transparent, transparent calc(100% - 40px), #08FF00 calc(100% - 40px), #08FF00); /* Fondo degradado */
  }

  .hab-check-out {
    background: linear-gradient(to right, transparent, transparent calc(100% - 40px), #C80505 calc(100% - 40px), #C80505); /* Fondo degradado */
  }

  .hab-ob {
    background: linear-gradient(to left, transparent, transparent calc(100% - 40px), #C8B905 calc(100% - 40px), #C8B905); /* Fondo degradado */
  }

  .reserva-text {
    margin: 0; /* Elimina el margen predeterminado del párrafo */
  }
</style>

<section class="content-header" style="margin-top: 20px;">
<div class="container">
  <div class="reserva-container reserva-no-conf">
    <p class="reserva-text">RESERV. NO CONFIRMADA</p>
  </div>

  <div class="reserva-container reserva-conf">
    <p class="reserva-text">RESERV. CONFIRMADA</p>
  </div>

  <!-- Contenedor azul -->
  <div class="reserva-container reserva-sn-deuda">
    <!-- Texto dentro del rectángulo -->
    <p class="reserva-text">HAB. SN .DEUDA</p>
  </div>

  <!-- Contenedor azul -->
  <div class="reserva-container reserva-cn-deuda">
    <!-- Texto dentro del rectángulo -->
    <p class="reserva-text">HAB. CN .DEUDA</p>
  </div>

  <div class="check-out hab-check-in">
    <p class="reserva-text">HAB. CHECK-IN</p>
  </div>

  <div class="check-out hab-check-out">
    <p class="reserva-text">HAB. CHECK-OUT</p>
  </div>

  <div class="check-out hab-ob">
    <p class="reserva-text">HAB. CN OBSERVACION</p>
  </div>
</div>

    
</section>

<div style="margin-top: -30px;"> <!-- Ajusta este valor según sea necesario para evitar el solapamiento -->


            <?php endif; ?>
            
            <?php View::load("reserva");?>
            
        </div>
    </div>
</section>

<?php else:?>

                
<style type="text/css">

    html,body {
        height: 100%;
        background: #fff;
        overflow: hidden;
    }
</style>


<script type="text/javascript" src="css/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>

<!--<img src="assets/images/bg//blurred-bg-3.jpg" class="login-img wow fadeIn" alt="">-->
 <body id="minovate" class="appWrapper scheme-default default-scheme-color header-fixed aside-fixed rightbar-hidden device-md">
    <div id="wrap" class="animsition" style="animation-duration: 1.5s; opacity: 1; background-image: url('assets/images/bg/logoF.png'); background-size: cover; background-position: center; height: 100vh; overflow: hidden;">

        <style type="text/css">
            html,
            body {
                height: 100%;
                overflow: hidden;
            }
        </style>

        <script type="text/javascript" src="css/wow/wow.js"></script>
        <script type="text/javascript">
            /* WOW animations */
            wow = new WOW({
                animateClass: 'animated',
                offset: 100
            });
            wow.init();
        </script>
<center> <img src="img/logoI.png" width="40%"></center>
        <!-- col -->
        <div class=" page-login col-md-12">

            <!-- tile -->
            <section class="tile container w-420 p-15 mt-40" style="border-radius: 25px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

                <!-- tile header -->
                <div class="tile-header dvd dvd-btm">
                    <center> <img src="img/logoH.png" width="50%"></center>
                </div>

                <!-- tile body -->
                <div class="tile-body">
                    <form role="form" action="./?action=processlogin" method="post">
                        <div class="form-group">
                            <h4><label for="exampleInputEmail1">Usuario</label></h4>
                            <input type="text" class="form-control" required="" id="exampleInputEmail1" placeholder="Ingrese su usuario" name="username">
                           
                            <h4><label for="exampleInputPassword1">Contraseña</label></h4>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
                            <div class="input-group-append">
                                <span class="input-group-text" id="passwordToggle" onclick="togglePasswordVisibility()" style="cursor: pointer;">
                                <h4>  <i  id="eyeIcon" class="fa fa-eye" style="font-size: 15px;" <h4>&nbsp;&nbsp;ver contrase&#209;a</h4></i></h4>
                                    
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" style="background-color: #2fcc71; color: white;" class="btn btn-rounded btn-primary btn form-control">Ingresar</button>
                        </div>
                    </form>
                </div>
                <!-- /tile body -->
            </section>
            <!-- /tile -->

        </div>
        <!-- /col -->
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("exampleInputPassword1");
            var eyeIcon = document.getElementById("eyeIcon");

            // Cambiar el tipo de entrada entre "password" y "text"
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>


                            </section>
                            <!-- /tile -->

                        </div>
                        <!-- /col -->


      <?php endif;?>

            
            <!--/ CONTENT -->






        </div>


       <?php if(isset($_GET['view'])){ ?>
        <?php if($_GET['view']!='reserva' and $_GET['view']!='proceso' and $_GET['view']!='proceso_venta' and $_GET['view']!='reporte_fecha_circular' and $_GET['view']!='cierre_caja' and $_GET['view']!='reporte_rango' and $_GET['view']!='tarea'  ){ ?>
        <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
        <?php }; ?>
        <?php }else if(!isset($_SESSION["user_id"])) { ?>
<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>

        <?php }?>

        
        </div>
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>

        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script> 

        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>

        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>

        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>

        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>

        <script src="assets/js/vendor/owl-carousel/owl.carousel.min.js"></script>

        <script src="assets/js/vendor/daterangepicker/moment.min.js"></script>

        <script src="assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

       
        <script src="assets/js/vendor/chosen/chosen.jquery.min.js"></script>
       

        <script src="assets/js/vendor/summernote/summernote.min.js"></script>

        <script src="assets/js/vendor/coolclock/coolclock.js"></script>
        <script src="assets/js/vendor/coolclock/excanvas.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>

        <script src="assets/js/main.js"></script>







    </body>


</html>
