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
?>
  <html lang="es">
  <html lang="es">
       <head>
         
      <!--<script src="js/jquery-3.1.1.js"></script>-->
          <!--Import Google Icon Font-->
        <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
         <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <!--Import materialize.css-->
     
    <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/datoscapacit.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />

    <script type="text/javascript" src="js/ess.js"></script>
   
            <script type="text/javascript" src="js/alertify.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
   <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
   <script type="text/javascript" src="js/jquery.js"></script>
   <!-- <script src="js/agregarSemill.js"></script>-->
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrea.js"></script>


  <link type="text/css" rel="stylesheet" href="css/animate.css"/>
  <style type="text/css">
    #caja{
      color:black;
    }
    #caja2{
      color:green;
    }
    
  </style>
  <?php include("nabvar.php"); ?>
 <?php 

//echo $usuario;
  /*$conn = new mysqli("localhost","root","","proyectos");*/
   $consulta ="SELECT * from semilleros  INNER JOIN programa ON semilleros.programa=programa.programaId  where documento=".$_GET['c']."";
  //echo($consulta);
  $conn = new mysqli($local,$user,$pass,$base);
  $resultado = $conn->query($consulta);
    
  
     if ($fila = $resultado->fetch_assoc()) {

        
      //$tabla= "<div class='rotateInDownleft animated'>
      $tabla='
      <div class="container">
        <div>
           <div class="row">
           <br>
         <section class="card-panel white accent-4 col s12 z-depth-5">
             <div class="col s12">
            <!-- <nav class="orange">--> 
            <div class="nav-wrapper">
             <br><br>
            <h5 style="text-align:center;">Registro de semilleros</h5>
            </div>
          <!--</nav>-->
                <br><br>
                <div class="input-field col s6">
                <input  id="caja" disabled  type="text" class="validate" value="'.$fila['nombre'].'">
                <label  id="caja2" class="active" for="first_name2">Nombres</label>
                </div>

                <div class="input-field col s6">
                <input id="caja" disabled  type="text" class="validate" value="'.$fila['apellido'].'">
                <label id="caja2" class="active" for="first_name2">Apellido</label>
              </div>
                
                 <div class="input-field col s6">
                <input id="caja" disabled  type="number" class="validate" value="'.$fila['ficha'].'">
                <label id="caja2" class="active" for="first_name2">Ficha</label>
                </div>
                
                
                 <div class="input-field col s6">
                <input id="caja" disabled  type="text" class="validate" value="'.$fila['nombreP'].'">
                <label id="caja2" class="active" for="first_name2">Programa</label>
              </div>
                
                
                <div class="input-field col s6">
                <input id="caja" disabled  type="text" class="validate"  value="'.$fila['correo'].'">
                <label id="caja2" class="active" for="first_name2">Correo</label>
              </div>
                
                
                 <div class="input-field col s6">
                <input id="caja" disabled  type="number" class="validate" value="'.$fila['telefono'].'">
                <label id="caja2" class="active" for="first_name2">Telefono</label>
              </div>
                
                
                <div class="input-field col s6">
                <input id="caja" disabled  type="date" class="validate" value="'.$fila['fechana'].'">
                <label id="caja2" class="active" for="first_name2">fecha de nacimiento</label>
              </div>
                
                
               
               
              <div class="input-field col s6">
                <input id="caja" disabled id="periactSemille" type="date" class="validate" value="'.$fila['periact'].'">
                <label id="caja2" class="active" for="first_name2">Periodo actual</label>
              </div>
                
               
                
                <div class="input-field col s6">
                <input id="caja" disabled id="instecSemille" type="text" class="validate" value="'.$fila['instec'].'">
                <label id="caja2" class="active" for="first_name2">instructor tecnico</label>
              </div>
                
                 <div class="input-field col s8">
                <input id="caja" disabled  id="corrinsSemille" type="text" class="validate" value="'.$fila['corrins'].'">
                <label id="caja2" class="active" for="first_name2">correo instructor</label>
              </div>
                
               

                <div class="input-field col s12" id="exp" >
                  <textarea id="caja" disabled  class="materialize-textarea">'.$fila['experiencia'].'</textarea>
                  <label id="caja2" for="textarea1">Experiencia</label>
                </div>


                              
                <div class="input-field col s12" id="inc">
                  <textarea id="caja" disabled class="materialize-textarea">'.$fila['inclinacion'].'</textarea>
                  <label  id="caja2" for="textarea1">Inclinacion</label>
                </div>


                <div class="input-field col s12">
                  <textarea id="caja" disabled class="materialize-textarea">'.$fila['actividades'].'</textarea>
                  <label  id="caja2" for="textarea1">Actividades Extracurriculares</label>
                </div>

                <div class="input-field col s12">
                  <textarea id="caja" disabled class="materialize-textarea">'.$fila['habilidades'].'</textarea>
                  <label  id="caja2" for="textarea1">Habilidades en la generacion de ideas creativas e innovadoras(mencionelas)</label>
                </div>
                
                

              <div class="input-field col s6">
                <input id="caja" disabled type="date" class="validate" value="'.$fila['fechai1'].'">
                <label id="caja2" class="active" for="first_name2">Fecha de ingreso:</label>
              </div>

               <div class="input-field col s6">
                <input id="caja" disabled type="date" class="validate" value="'.$fila['fechai2'].'">
                <label id="caja2" class="active" for="first_name2">fecha de salida</label>  
                </div> 

           
           </div>
           </div>
    
          </div>
  
          </div>
    </div>';
            
      
      echo $tabla;
    }
    
   
 ?>
       
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <script>
      $( document ).ready(function(){
      $(".button-collapse").sideNav();
      })
      $(document).ready(function(){
      // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
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
