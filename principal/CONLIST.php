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
<html>
<head>
  <title>Control de listas</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--<script type="text/javascript" src="js/datoscapacit.js"></script>-->
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <!--<script type="text/javascript" src="js/ess.js"></script>-->
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
<!--     <script type="text/javascript" src="js/jquery.js"></script>
 -->    <!--<script src="js/bloqueo.js"></script>-->
<!--     <script src="js/Formularioscrea.js"></script>
 -->    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<body>
 <script type="text/javascript">
  function controldelista(){
    var espera='button';
    var codigoca = document.getElementById('capacita').value;
    var asistencia = document.getElementById('asistenop').value;

     $.ajax({
     url: "php/ajax.php",
           data: {
                  'accion' : 'listadoasistencia',
                  capacita : codigoca,
                  oplista : asistencia
           
                 },
            type: "POST",
             
            beforeSend: function () {
             $("#resultlista").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultlista").html(response);
            }

  });

  }
 </script> 
    <?php include("nabvar.php"); ?>
 <div class="container" >
<div class="row">
  <br>
         <section class='card-panel white accent-4 col s12 z-depth-5'>
        <h5>Control de Listas</h5>
        <?php 
        $select='<select id="capacita" class="input-field col s6">';
        $conexion = new mysqli($local,$user,$pass,$base);
        $consulta="SELECT * FROM capacitaciones
        WHERE capacitaciones.estado='A'";
        $result = $conexion->query($consulta);
        while($row = mysqli_fetch_array($result)){
        $select.='<option value='.$row['codigo'].'>'.utf8_encode($row['nombre_capac']).'</option>';
        }
        $select.='</select>';
        echo $select;
        ?>
                      
         </select> 
            <div  class="input-field col s6">
                <select id="asistenop" >
                        <option value="1">Lista de Asistencia</option>
                        <option value="2">Lista de Inasistencia</option>
                </select>  

            </div>
            <center>
              <button class="btn waves-effect waves-ligth green text-darken-2" onclick="controldelista()"><i class="Large material-icons">list</i> Listado </button> 
            </center> 
            <br>  
            <div id="resultlista">
              
            </div>
          </section>
</div>
 </div>
 
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="Data/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="data/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="data/estilo.css">
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
<script type="text/javascript">
$(document).ready(function() {
/*    $("#example1").DataTable();
    $("#example2").DataTable();
*/} );
</script>
</body>
</html>
                