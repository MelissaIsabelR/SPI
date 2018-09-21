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
    <script type="text/javascript" src="js/datoscapacit.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrea.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<body>
  <script type="text/javascript">
           function verProAprins(tabla3, usuario3){
           opli = document.getElementById("opcionLis").value;
            if(opli=="0"){
               alertify.error('Seleccione una opcion');
              
            }else{
               var parametros = {
                "oplista" : opli,
                "usuario3" : usuario3,
                "tabla3" : tabla3,
                "accion" : "verProAprins"
                
              };
           
              $.ajax({
                      data:  parametros, //datos que se envian a traves de ajax
                      url:   'php/ajax.php', //archivo que recibe la peticion
                      type:  'post', //método de envio
                      beforeSend: function () {
                         $("#resutVerProAI").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
                      },
                      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              $("#resutVerProAI").html(response);
                      }
              });
              }
            }
      
        </script>
<style type="text/css">
   .btn.waves-effect.waves-light.green.text-darken-2{
    font-family: Cambria;

   }
 </style>
 
  <?php include("nabvar.php"); ?>
  <div class="container">
    <br>
     <section class='card-panel white accent-4 col s12 z-depth-5'>
    <div class="row">
       <h5 style="text-align:center;">Proyectos</h5>

       <div  class="input-field col s12">
                    <select id="opcionLis" >
                    <option value="0">Seleccione</option>
                    <option value="1">Lista de Proyectos</option>
                    <option value="2">Enviar Evidencias</option>
                    <option value="3">Ver proyectos guardados</option>
                  </select>  
        </div>
      <div  class="input-field col s12">
        
       <!--  <button type="submit" target='_blank' class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='Añadir' name="apro" class='btn waves-effect waves-light green text-darken-2' value="Añadir"><i class='Small material-icons'>library_add</i></button>

 -->
 
        <center>
        <button  class="btn waves-effect waves-light green text-darken-2" value="investigacion" onclick="verProAprins(this.value,<?php echo $user_id ?>)">Investigacion</button>
        <button class="btn waves-effect waves-light green text-darken-2" value="innovacion" onclick="verProAprins(this.value,<?php echo $user_id ?>)">innovación</button>
        <button class="btn waves-effect waves-light green text-darken-2" value="servicios" onclick="verProAprins(this.value,<?php echo $user_id ?>)">servicios</button>
        <button class="btn waves-effect waves-light green text-darken-2" value="modernizacion" onclick="verProAprins(this.value,<?php echo $user_id ?>)">modernización</button>
        <button class="btn waves-effect waves-light green text-darken-2" value="divulgacion" onclick="verProAprins(this.value,<?php echo $user_id ?>)">divulgación</button>
      </center>
         <br><br>
      </div>

        <div id="resutVerProAI">
         
        </div>
    
    </div>
  </section>
  </div>

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/desplegable.js"></script>
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