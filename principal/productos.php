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
   <script type="text/javascript" src="js/guardarinvest.js"></script>

    <script src="../alertas/dist/sweetalert-dev.js"></script>
     <link rel="stylesheet" href="../alertas/dist/sweetalert.css">


   <!-- <script src="js/agregarSemill.js"></script>-->
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrea.js"></script>
    <script src="js/productosinves.js"></script>
  <link type="text/css" rel="stylesheet" href="css/animate.css"/> 
</head>
<style type="text/css">
  #sesione{
    float: left;
    color:black;
  }
</style>
 <?php include("nabvar.php"); ?>
<body>
 <br>
<div class="container ">
<?php  $_GET['c']; ?>
    <div class="row">           
      <form method="post" action="">

           <div class="input-field col s12">
              <label  class="active" id="sesione">Objetivo General</label>
           </div>
           <br><br>
          <div class="input-field col s12">
              <select id="obje" name="cantidad">
                <option value="0">Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
              <label>Cantidad de Objetivos</label>
          </div>
          <button class="btn waves-effect waves-light" name="enviar"></button>
    </div>
</div>

    <?php 
    if (isset($_POST['enviar'])) {
    $cantidad=$_POST['cantidad'];

    
    $ob="<div class='container '>
    <div class='row'>";

     $ob.='<div class="input-field col s12">
                <textarea id="obj_general_inves" name="general" class="materialize-textarea"></textarea>
                <label for="textarea1">Objetivo General</label>
        </div>';

    for ($i=1; $i <= $cantidad; $i++) { 
    $ob.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" name="objet[]" id="obj_esp('.$i.'">
    </textarea><label for="textarea1">objetivo.'.$i.'</label>
    </div>';

    $ob.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" name="resul[]" id="resu_obj_esp"'.$i.'">
    </textarea><label for="textarea1">Resutado.'.$i.'</label>
    </div>';

    $ob.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" name="prod[]" id="Prod_Resul"'.$i.'">
    </textarea><label for="textarea1">Producto.'.$i.'</label>
    </div>';


    }

    $ob.="<center><br><br><button class='btn waves-effect waves-light' name='env'>enviar</button></center>
    </div>
    </div>
    ";
    echo $ob;
    }

    if (isset($_POST['env'])) {
    $conn = new mysqli($local, $user, $pass, $base);
    $obj=$_POST['objet'];
    $res=$_POST['resul'];
    $pro=$_POST['prod'];
    $Objgeneral=$_POST['general'];

   
    $canti=count($obj);
      for ($j=0; $j <$canti ; $j++) { 

      $consulta = "INSERT INTO opr(cod_pro, general,objetivo,resultado,producto)

      VALUES('".$_GET['c']."','$Objgeneral','".$obj[$j]."','".$res[$j]."','".$pro[$j]."')";

        if ($conn->query($consulta) === TRUE) {
            $sw=1;
          }else{
            $sw=0;
          }
     }
         
     if($sw==1){
         //echo  "<script> alertify.success('Proyecto Registrado');</script>";
         //echo "<script> location.href ='Sesion.php'; </script>";

          ?>
         <body onload='swal("Guardado!", "el proyecto fue registrado satisfactoriamente", "success");'>

        <?php
        echo "<script> location.href ='Sesion.php'; </script>";
      }elseif($sw==0){
         ?>
         <body onload='swal("Error!", "Error al registrar Proyecto", "error");'>

        <?php
      }      

    $conn->close();
  }
?>
</form>
  </script>
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