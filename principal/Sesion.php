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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>

    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    <link rel="stylesheet" href="../alertas/dist/sweetalert.css">

    </head>

      
<body>
<style type="text/css">
  body{
   /* background:url("images/mosaico.jpg");*/
  }
</style>

 <!--///////////////////////////////MODAL PARA CREAR CAPACITACION/////////////////////////////-->
<div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
              <h4>Crear Capacitacion</h4>
              <div class="switch right">
                  <label >
                      In
                      <input name="in" type="checkbox" checked id="estado" >
                      <span class="lever" ></span>
                      Ac
                  </label>
              </div>
                <br>
                <div class="row">
                  <br>
                  <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="mensaje" class="materialize-textarea"></textarea>
                        <label for="mensaje">Mensage Adicional</label>
                      
                  </div>
                  <br><br><br> <br>
                  <div class="input-field col s6">
                        <input id="nombre" type="text" class="validate">
                        <label for="nombre">Nombre De Capacitacion</label>

                  </div>
                  <div class="input-field col s6">
                        <input id="dir" type="text" class="validate">
                        <label for="dir">Direccion</label>
                  </div>
                  <div class="input-field col s6">
                        <input  id="lugar" type="text"  class="validate">
                        <label for="lugar">Nombre Del Lugar</label>
                  </div>
                  <div class="input-field col s6">
                        <input id="fechaini" type="date" class="validate">
                       <label class="active" for="fechaini">Fecha inicio</label>
                  </div>
                  <div class="input-field col s6">
                        <input id="fechafin" type="date" class="validate" data-length="30" maxlength="30">
                       <label class="active" for="fechafin">Fecha Fin</label>
                  </div>
                  <div class="input-field col s6">
                        <input id="hora" type="time" class="validate">
                        <label for="hora" class="active">Hora</label>
                  </div>
                  <div class="input-field col s6">
                          <input id="dictador" type="text" class="validate" data-length="30" maxlength="30" >
                          <label for="dictador">Dictador</label>
                  </div>
            </div>
      </div>
        <div class="modal-footer">
          <span id="res"></span>
          <a  class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
          <a class="btn waves-effect waves-light green text-darken-2"  onclick="insertarCapa()"><i class="large material-icons">save</i> Crear</a>
        </div> 
</div>

<!--/////////////////////////////////////////////////////////MODAL PARA EDITAR CAPACITACION//////////////////////////////////-->
<div id="modal2" class="modal">
  <div class="modal-content">
      <h4>Capacitaciones</h4>
      <p>Aqui Podras Cambiar El Estado De Las Capacitaciones De Activas A Inactivas o Viceverza a Demas Podras Modificarle Cualquier Campo De La Capacitaciones.</p>
      <br>
      <ul class="collapsible popout" data-collapsible="accordion">
        <?php 
        $conexion = new mysqli($local,$user,$pass,$base);
        $consulta = "select * from capacitaciones";
        $result = $conexion->query($consulta);
        while($row = mysqli_fetch_array($result)){ 
        $row["nombre_capac"];
        $row["lugar"];
        $row["fecha_inicio"];
        $row["fecha_fin"];
        $row["tiempo_capa"];
        $row["nombre_del_capa"];
        $row["observacion"];
        $row["dir"];
        $estado=$row["estado"];
        $codigo=$row["codigo"];
        if ($estado == "I") {
          $AS="";
        }else{
          $AS="checked='true'";
        }
                      
        $capa=
        "<li>
        <div class='collapsible-header waves-effect waves-light waves-orange'>
        <i class='material-icons'>description</i><div class='switch right'>
        <label>In<input type='checkbox' $AS id='estado$codigo' >
        <span class='lever'></span>Ac</label></div><span 
          >".utf8_encode($row["nombre_capac"])."</span></div>

          <div class='collapsible-body'><span>".utf8_encode($row["observacion"])."</span>
            
        <div class='row'>
          <br>
          <div class='input-field col s6'>
                  <input id='acnombre$codigo' type='text' class='validate' value='".utf8_encode($row["nombre_capac"])."'>
                  <label for='nombre'>Nombre De Capacitacion</label>
          </div>
          <div class='input-field col s6'>
                  <input id='acdir$codigo' type='text' class='validate' value='".utf8_encode($row["dir"])."'>
                  <label for='dir'>Direccion</label>
          </div>
          <div class='input-field col s6'>
                  <input  id='aclugar$codigo' type='text'  class='validate' value='".utf8_encode($row["lugar"])."'>
                  <label for='lugar'>Nombre Del Lugar</label>
          </div>
          <div class='input-field col s6'>
                  <input id='acfechaini$codigo' type='date' class='validate' value='".$row["fecha_inicio"]."'>
                 <label class='active' for='fechaini'>Fecha inicio</label >
          </div>
          <div class='input-field col s6'>
                  <input id='acfechafin$codigo' type='date' class='validate' value='".$row["fecha_fin"]."'>
                 <label class='active' for='fechafin'>Fecha Fin</label>
          </div>
          <div class='input-field col s6'>
                  <input id='achora$codigo' type='time' class='validate' value='".$row["tiempo_capa"]."'>
                  <label for='hora' class='active'>Hora</label>
          </div>
          <div class='input-field col s6'>
                    <input id='acdictador$codigo' type='text' class='validate' value='".utf8_encode($row["nombre_del_capa"])."'>
                    <label for='dictador'>Dictador</label>
          </div>
          <div class='input-field col s6' style='display:none;'>
                    <input id='codigo$codigo' type='number' class='validate' value=".$row["codigo"].">
                    <label for='dictador'>Dictador</label>
           </div>

          </div>

        <div class='modal-footer'>
           <a  class='modal-action  waves-effect waves-green btn-flat' onclick='actualCapa($codigo)'><i class='large material-icons'>edit</i> Actualizar </a>
           <a  class='modal-action  waves-effect waves-red btn-flat' onclick='EliminarCapa($codigo)'><i class='large material-icons'>delete</i> Eliminar </a>
       </div>
    </div>                                          
</li>";
  echo $capa;
}
?>  

<!--<div class="row">
        <div class="col s12 m7">
          <div class="card">
            <div class="card-image">
              <img src="images/sample-1.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
        </div>
      </div>-->

      
</div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
    </div>
</div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
 <?php include("nabvar.php"); ?>
<div class="container ">
   <div class="row"  >       
   <BR> <br>  
      <section class="card-panel white accent-4 col s12">
          <div class="fixed-action-btn vertical">
          <?php
          if ($_SESSION['cargo']=="Administrador"){
           echo '<a class="btn-floating btn-large   waves-left orange accent-4" title="Capacitaciones">
            <i class="large material-icons">library_books</i>
           </a>';
           }else{
           echo '<a style=" display:  none; " class="btn-floating btn-large   waves-left orange accent-4">
            <i class="large material-icons">mode_edit</i>
           </a>';
          }
         ?>
      
          <ul>
            
            <li><a href="#modal2" class="btn-floating blue" title="Editar Capacitaciones"><i class="material-icons">edit</i></a></li>
            <li><a id="op1" href="#modal1" class="btn-floating green darken-1" title="Crear Capacitaciones"><i class="material-icons">save</i></a></li>
          </ul>
    </div>

          <!--<div id="a" class="rotateInUpLeft animated">
             <h1 STYLE="text-align:center; font-family:cambria;">BIENVENIDO</h1> 
             <h4 STYLE="text-align:center; font-family:cambria;"> SISTEMATIZACION DE PROYECTOS DE INVESTIGACION</h4>
             <img  style="width:100%;" src="images/ss.png"></img>  --> 
             <br>
    <div class="slider">
    <ul class="slides">
      <li>
        <img src="images/sena1.png">
      </li>
      <li>
        <img src="images/sennova.png" width="790" height="430">
      </li>
      <li>
        <img src="images/SPIimg.PNG"> <!-- random image -->
        <div class="caption right-align">
          <!--<h3>SPI</h3>
          <h5 class="light grey-text text-lighten-3">Sistematización de proyectos de Investigación .</h5>-->
        </div>
      </li>
    </ul>
  </div>
  <br><br>  


                              
          <!--</div>-->

<!--/////////////////////////////////////////////////////////////////////////////////////-->
</section>     
</div>
</div>

<?php include("../pie.php") ?>
                   
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

     $(document).ready(function(){
      $('.carousel').carousel();
    });

      $(document).ready(function(){
      $('.slider').slider();
    });
</script> 
<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });


  $('.carousel').carousel('next');
$('.carousel').carousel('next', 3); // Move next n times.

// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', 4); // Move prev n times.

// Set to nth slide
$('.carousel').carousel('set', 4);

// Destroy carousel
/*$('.carousel').carousel('destroy');*/



</script>
    <script type="text/javascript" src="js/datoscapacitaci.js"></script>
<!--     <script type="text/javascript" src="js/ess.js"></script>
 -->    <script type="text/javascript" src="js/alertify.min.js"></script>
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrear.js"></script>
    <script src="js/desplegable.js"></script>

    <script src="../alertas/dist/sweetalert-dev.js"></script>



</body>



</html>
