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
<!--     <script type="text/javascript" src="js/datoscapacit.js"></script>
 -->    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
<!--     <script src="js/Formularioscrea.js"></script>
 -->    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<body>
 <?php include("nabvar.php"); ?>

        <script type="text/javascript">
           function realizaP(tabla){
            opli = document.getElementById("opcionLis").value;
            opliPro = document.getElementById("opcionProye").value;
            if(opli=="0" || opliPro=="0"){
               alertify.error('Seleccione una opcion');
              
            }else{
               var parametros = {
                "oplista" : opli,
                "tabla" : tabla,
                "opcionProye": opliPro,
                "accion" : "verproy"
                
              };
           
              $.ajax({
                      data:  parametros, //datos que se envian a traves de ajax
                      url:   'php/ajax.php', //archivo que recibe la peticion
                      type:  'post', //método de envio
                      beforeSend: function () {
                         $("#resultado").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');

                      },
                      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                              $("#resultado").html(response);
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
        <div class="container">
          <div class="row">
          <br>
           <div class="input-field col s6">
            <select id="opcionLis" >
                    <option value="0">opciones</option>
                    <option value="4">Poryectos Registrados</option>
                    <option value="1">Proyectos Aprobados</option>
                    <option value="2">Banco de Proyectos</option>
                    <option value="3">Descargar Evidencias</option>
                    <option value="5">Establecer Formato</option>
                  </select>  
                  <label>Seleccione una opcion</label>
            </div>

             <div class="input-field col s6">
                    <select id="opcionProye" >
                    <option value="0">proyectos</option>
                    <option value="Aprendiz">Semci - Aprendices</option>
                    <option value="Instructor">Sennova - Instructores</option>
                  </select>  
                  <label>Seleccione el proyecto</label>
            </div>
          </div>
        </div>
         <center>

          <button class="btn waves-effect waves-light green text-darken-2" value="investigacion" onclick="realizaP(this.value)">Investigación</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="innovacion" onclick="realizaP(this.value)">Innovación</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="servicios" onclick="realizaP(this.value)">Servícios</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="modernizacion" onclick="realizaP(this.value)">Modernización</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="divulgacion" onclick="realizaP(this.value)">Divulgación</button>
          </center>  
          
        
        <div id="resultado" style="margin: 50px; ">

        </div>

        <div id="modalVerProg" class="modal modal-fixed-footer" style="width: 500px; height:auto; border-radius: 10px; margin-top: 70px;">
     
        </div>
        

     

        <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <script type="text/javascript">
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