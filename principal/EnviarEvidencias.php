<?php ob_start (); ?>
<?php @session_start(); ?>
<?php error_reporting(0);?>
<?php
include("../conexion.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else {
   header('refresh:1; url=../logear.php');

exit;
}

  $user_id=$_SESSION["user_id"];
?>
<html>
<head>
  <title>Lista de Proyectos</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/animate.css"/> 
    <link rel="stylesheet" href="../alertas/dist/sweetalert.css">
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <script type="text/javascript" src="js/datoscapacit.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrea.js"></script>
     <script src="../alertas/dist/sweetalert-dev.js"></script> 
    </head>
<body>
<script type="text/javascript">
function product(valor, respuesta ,caso){
  var res="#resp"+respuesta;
 $.ajax({
 url: "php/prod.php",
       data: {
             
          codigoTipo : valor,
          Opcion : caso
             },
        type: "POST",
         
       beforeSend: function () {
                         $(res).html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');

      },
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $(res).html(response);
      }

});

}


</script>
<nav style="background: orange;">
       <center><span style="font-size: 30px; background: orange;">Enviar Evidencias</span></center>
     </nav>
 <div class="container">
   <div class="row">
     <br>
         <section class='card-panel white accent-4 col s12 z-depth-5'>
   <form action="productos/envios.php"  method="POST" enctype="multipart/form-data">
     <?php 
     include("../conexion.php");
       $_GET['c'];
      $_GET['t'];
 	  
      $conexion = new mysqli($local,$user,$pass,$base);

      $consulta1="SELECT * FROM envios INNER JOIN ".$_GET['t']." ON envios.cod_pro=".$_GET['t'].".codigo WHERE cod_pro=".$_GET['c']." and ".$_GET['t'].".pro_linea=".$_GET['l']."";

      $consulta2 ="SELECT * FROM opr INNER JOIN ".$_GET['t']." ON opr.cod_pro=".$_GET['t'].".codigo
      WHERE cod_pro=".$_GET['c']." and ".$_GET['t'].".pro_linea=".$_GET['l']."";

      $resulta1 = $conexion->query($consulta1);

      $resulta4 = $conexion->query($consulta1);
      
      $resulta2 = $conexion->query($consulta2);

      $resulta22 = $conexion->query($consulta2);

      $sw=0;
      $CantEnv=0;
      while($row1 = mysqli_fetch_array($resulta1)){ 
        $sw=1;
          $CantEnv++;
            $ArrayFechaEnv[$CantEnv]=$row1['fechaenviar'];
       } 
        $CantEnv;


      $conObj=0;
      while($row2 = mysqli_fetch_array($resulta22)){ 
           $conObj++;
            $Arrayproductos[$conObj]=$row2['producto'];
       } 

       $obj=$conObj-$CantEnv;

    
      
       if ($sw==0) {
              if ($row22 = mysqli_fetch_array($resulta2)) {
                //echo "puede primer envio ";
                  $fechaTabla=$row22['envio'];
                    $fechaActual = date('Y-m-j');
                   if ($fechaTabla==$fechaActual) {
                     //echo "es igual";
                    

                  //$con++;
                   $row22['id'];
                   $row22['producto'];

                  echo'
                  <br><h6 style="text-align:center;"><b><u>#1 Envio</u></b></h6>
                   <div class="input-field col s12">
                   <h6><b>Titulo: </b>' .utf8_encode($row22['titulo_pro']).'</h6>
                    <input type="hidden" name="tit_pro" id="tit_pro"  value="'.utf8_encode($row22['titulo_pro']).'" >
                    <input type="hidden" name="identificacion" id="identificacion"  value="'.$row22['identificacion'].'" >
                    <input type="hidden" name="linea" id="linea"   value="'.$row22['pro_linea'].'" >
                    <input type="hidden" name="codigo"  id="codigo" value="'.$row22['codigo'].'" >
                  </div>

                  <div class="input-field col s12">
                   <h6><b>Producto: </b>'.utf8_encode($row22['producto']).'</h6><br>
                    <input type="hidden" name="producto" id="producto"  value="'.utf8_encode($row22['producto']).'" >
                  </div>';
                 

                 
              $tipopro='
              <br>
              <div class="input-field col s6">
              <select name="tipo" id="tipo" class="form-control" onChange="product(this.value, 1, 11)">                        
              <option>seleccione</option>';
                        $consulta2 = "select * from tpproducto";
                        $result = $conexion->query($consulta2);
                         $opcion1="";
                        while($row = mysqli_fetch_array($result)){
                            $tipopro.="<option value='".$row["codigo"]."'>".utf8_encode($row["nombre"])."</option>";  
                          }
                        $tipopro.="<br><br>";
               $tipopro.="</select>";
               $tipopro.=" <label>Seleccione tipo Producto</label>";
               $tipopro.="</div>";
              
               ;
               echo $tipopro;

                ?>
              <div id="resp1"></div>
              <div id="resp2"></div>
              <div id="resp3"></div>
              <div id="resp4"></div>
              <div id="resp5"></div>
              <div id="resp6"></div>
              <div id="resp7"></div>
              <div id="resp8"></div>
               <?php 

              
            }else{
              echo "no se ah cumplido la fecha para Enviar los productos";
            }
        }else{
          //echo "no hay informacoi para mortrar";
        }
}elseif($sw==1){
   $envi=$CantEnv+1;
   $obje=$obj-1;
  

  if ($obj!=0) {
   if ($row22 = mysqli_fetch_array($resulta4)) {
                //echo "puede primer envio ";
                   $fechaenviar=$row22['fechaenviar'];

                    $ArrayFechaEnv[$CantEnv];

                    $fechaActual = date('Y-m-j');
                   if ($ArrayFechaEnv[$CantEnv]==$fechaActual) {
                    // echo "es igual";
                    
                    // echo "conftador del arrau".$Arrayproductos[$CantEnv+1];
                  //$con++;
                   $row22['numer_env'];
                   $row22['resultado'];

                  echo'
                   <br><h6 style="text-align:center;"><b><u>#'.$envi.' Envio</u></b></h6>
                   <div class="input-field col s12">
                   <h6><b>Titulo: </b> '.utf8_encode($row22['titulo_pro']).'</h6>
                    <input type="hidden" name="tit_pro" id="tit_pro"  value="'.utf8_encode($row22['titulo_pro']).'" >
                    <input type="hidden" name="identificacion" id="identificacion"  value="'.$row22['identificacion'].'" >
                    <input type="hidden" name="linea" id="linea"   value="'.$row22['linea'].'" >
                    <input type="hidden" name="codigo"  id="codigo" value="'.$row22['codigo'].'" >
                  </div>

                  <div class="input-field col s12">
                   <h6><b> Producto: </b>' .$Arrayproductos[$CantEnv+1].'</h6><br>
                    <input type="hidden" name="producto" id="producto"  value="'.utf8_encode($Arrayproductos[$CantEnv+1]).'" >
                  </div>';
                 

                 
              $tipopro='
              <br>
              <div class="input-field col s6">
              <select name="tipo" id="tipo" class="form-control" onChange="product(this.value, 1, 11)">                        
              <option>seleccione</option>';
                        $consulta2 = "select * from tpproducto";
                        $result = $conexion->query($consulta2);
                         $opcion1="";
                        while($row = mysqli_fetch_array($result)){
                            $tipopro.="<option value='".$row["codigo"]."'>".utf8_encode($row["nombre"])."</option>";  
                          }
                        $tipopro.="<br><br>";
               $tipopro.="</select>";
               $tipopro.=" <label>Seleccione tipo Producto</label>";
               $tipopro.="</div>";
              
               ;
               echo $tipopro;

                ?>
              <div id="resp1"></div>
              <div id="resp2"></div>
              <div id="resp3"></div>
              <div id="resp4"></div>
              <div id="resp5"></div>
              <div id="resp6"></div>
              <div id="resp7"></div>
              <div id="resp8"></div>
               <?php 

              
            }else{
            
             ?>
            <body onload='swal("", "No se ha cumplido la fecha de envio", "warning");'>
              <br><a href="VPA.php" class="btn waves-effect waves-light green text-darken-2"">Volver</a>
            <?php

            }
        }else{
         // echo "no hay informacoi para mortrar";
        }

  }else{
    ?>
    <body onload='swal("", "ah superado la cantidad de envios", "warning");'>
      <br><a href="VPA.php" class="btn waves-effect waves-light green text-darken-2"">Volver</a>
    <?php

   // echo "<label style='font-size:20px;'>ah superado la cantidad de envios</label>";
  }
 //echo "ya realizo un envio";
}

      
		/*$nuevafecha = strtotime ( '+2 month' , strtotime ($fecha )) ;
		$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
		$fecha2=$nuevafecha;*/


      ?>
      <!--PRODUCTOS-->
     
  <!--//////////////////////////////////////////////-->
</form>
<br><br>
</section>

   </div>
 </div>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript">
    $( document ).ready(function(){
    $(".button-collapse").sideNav();
    })
    $(document).ready(function(){
    $('.modal').modal();
    });
    $(document).ready(function(){
    $('.collapsible').collapsible();
    });

    $(document).ready(function() {
    $('select').material_select();
    });
</script>

</body>
</html>