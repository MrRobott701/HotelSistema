
  
  <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
	
 <?php 
     date_default_timezone_set('America/Tijuana');
     $hoy = date("Y-m-d");

      			 $u=null;
                $u = UserData::getById(Session::getUID());
                $usuario = $u->is_admin;

	 $hora = date("H:i:s");
        
            
	?>

<style>

.box-header.with-border {
    border-bottom: 1px solid #3c8dbc;
    color: white;
    background-color: #3c8dbc;
}

.box.box-primary{
	border:1px solid #3c8dbc;
	
	}
.box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title{
	font-size:15px;
	}


.h4 {
	margin-top: 0px;
    margin-bottom: 0px;
	}
.h5{
	margin-top: 0px;
    margin-bottom: 0px;
	}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	padding:3px;
	}
.box{
	margin-bottom:6px;
	}
.col-md-2, .col-md-4
{
	padding-right: 1px;
    padding-left: 1px;	
}
ul {

padding-top:0px;

}
.main-header>.navbar{
	

	}
#buscador{
margin-bottom:27px;
	}
#destinatario{
margin-bottom:27px;
	}
</style>


<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=recepcion"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active">Ingreso</li>
    </ol>
</section> 
</div> 

<div class="row">



  
<div class="box box-primary">
            <div class="box-header with-border">
              		<P class="box-title">:: REGISTRAR OTRO INGRESO :</P>
            	</div>
               <div class="box-body">
           
                 
                    <div class="tab-content">
                      	


  
<form class="form-horizontal" method="post" id="addproduct" action="index.php?view=agregar_ingreso" role="form">

 
<input type="hidden" name="fecha" value="<?php echo $hoy; ?>">
<input type="hidden" name="hora" value="<?php echo $hora; ?>">

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">FECHA DEL REGISTRO*</label>
    <div class="col-md-8">
      <input type="date" name="vigencia_circulacion" disabled required class="form-control"  id="address1" placeholder="Ingrese vigencia de circulacion" value="<?php echo $hoy; ?>"  >
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">DESCRIPCIÓN*</label>
    <div class="col-md-8">
      <textarea class="form-control" name="descripcion" required="" placeholder="Ingrese una descripcion"></textarea>
    </div>
  </div>
  <script type="text/javascript">
                  $(function(){

                    $('.validanumericos').keypress(function(e) {
                    if(isNaN(this.value + String.fromCharCode(e.charCode))) 
                       return false;
                    })
                    .on("cut copy paste",function(e){
                    e.preventDefault();
                    });

                  });
                </script>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">PRECIO*</label>
    <div class="col-md-8">  
       <input type="text" name="precio" required class="form-control validanumericos"  placeholder="Ingrese precio total" >   
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label">TIPO PAGO*</label>
    <div class="col-md-8">  
       <select  name="id_tipopago" class="form-control" style="text-transform:uppercase;" >
            <?php $medipagos = TipoPagoData::getAllSC();
            if(count($medipagos)>0){ ?>
                  
            <?php foreach($medipagos as $mediopago):?>
                <option value="<?php echo $mediopago->id; ?>" ><?php echo $mediopago->nombre; ?></option>
            <?php endforeach; ?>
                  

            <?php }else{ };?>  
                                      
        </select>   
    </div>
  </div>

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label"></label>
    <div class="col-md-8">  
          <p class="alert alert-info">* Campos obligatorios</p>
    </div>
  </div>

 

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-3 control-label"></label>
    <div class="col-md-8">
      <button type="submit" class="btn btn-primary"> Registrar ingreso <i class="fa fa-print"></i></button>
    </div>
  </div>
  
  
  
                    
</form>
  

 




                        
                      </div>
            

        
              </div>
              <!-- /.tab-pane -->

           
</div>
