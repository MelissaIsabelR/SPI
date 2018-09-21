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
          <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
          <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
             <link rel="stylesheet" type="text/css" href="css/icon.css">
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
    

         
      </head>
         <?php include("nabvar.php"); ?>
		<script>
    function actualizarSemill(){
    
        $.ajax({
          url: "Semillero/actualiza.php",
          data: {nombre : $("#nombresactuSe").val(),
            identificacion : $("#identificacionActSe").val(),
            apellido : $("#apellidoactuSe").val(),
            corre: $("#coractuSe").val(),
            telefono : $("#telefonoactuSe").val(),
            fechana : $("#fechanaactuSe").val(),
            instec  : $("#instecactuSe").val(),
            corrins : $("#corrinsactuSe").val()
           },
          type: "POST",
           
         success: function(response){
           if (response==0){
               alertify.error('Error al Editar');
          }else if(response==1){
              
               alertify.success('Datos editados Correctamente');
          };
        }

          /*success: function(response){
               if (response==0){
              alert('Error al Guardar');
            }else if(response==1){
              alert('Datos Grabados');
            };
          }*/
        });
         window.location.reload();
      }
    </script> 
    <body>
      <?php  $_SESSION['cargo'];?>
      <?php  $_SESSION['user_id'];?>
      <?php   
        $usuario=$_SESSION['user_id'];
        
       ?>

<?php 
//echo $usuario;
  /*$conn = new mysqli("localhost","root","","proyectos");*/
  $consulta ="SELECT * from semilleros where documento=$usuario";
  //echo($consulta);
  $conn = new mysqli($local,$user,$pass,$base);
  $resultado = $conn->query($consulta);
  	
  
     if ($fila = $resultado->fetch_assoc()) {

     		
			//$tabla= "<div class='rotateInDownleft animated'>
      $tabla= "<br>
            <div class='container' >
             <section class='card-panel white accent-4 col s12 z-depth-5'>
           <div class='row'>
           <h5 style='text-align:center;''>Actualizar Datos</h5><br><br>
              

                <div class='input-field col s6' style='display:none;''>
                <input  id='identificacionActSe' type='text' class='validate' value='$usuario'>
                <label class='active' for='first_name2'>identificacion</label>
                </div>

				        <div class='input-field col s6'>
                <input  id='nombresactuSe' type='text' class='validate' value='".utf8_encode($fila["nombre"])."'>
                <label class='active' for='first_name2'>Nombres</label>
                </div>

                <div class='input-field col s6'>
                <input  id='apellidoactuSe' type='text' class='validate' value='".utf8_encode($fila["apellido"])."'>
                <label class='active' for='first_name2'>apellido</label>
                </div>

                <div class='input-field col s6'>
                <input  id='coractuSe' type='text' class='validate' value='".utf8_encode($fila["correo"])."'>
                <label class='active' for='first_name2'>correo</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='telefonoactuSe' type='number' class='validate' value='".$fila["telefono"]."'>
                <label class='active' for='first_name2'>telefono</label>

                </div>


                 <div class='input-field col s6'>
                <input  id='fechanaactuSe' type='date' class='validate' value='".$fila["fechana"]."'>
                <label class='active' for='first_name2'>Fecha de Nacimiento</label>
                </div>


                 <div class='input-field col s6'>
                <input  id='instecactuSe' type='text' class='validate' value='".utf8_encode($fila["instec"])."'>
                <label class='active' for='first_name2'>instructor tecnico</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='corrinsactuSe' type='text' class='validate' value='".utf8_encode($fila["corrins"])."'>
                <label class='active' for='first_name2'>correo instructor</label>
                </div>
                 </div> 
       
          <center>
            <button onclick='actualizarSemill()' class='btn waves-effect waves-light green text-darken-2'>Actualizar
          </button>
          </center>
          <br>
             </div>
              </section>
          </div>
          
		  <br>
		  <br>
		  <br>
                ";

			
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
