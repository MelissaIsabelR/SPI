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

$usuario=$_SESSION['user_id'];
?>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/datoscapacita.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrear.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

      
<body>
     <?php include("nabvar.php"); ?>

<div class="container">
           <div class="row">
            <br>
         <section class='card-panel white accent-4 col s12 z-depth-5'>
              <br>
              <H5 href="#" class="brand-logo center">Registro de Semilleros</H5>
            
          
                <br><br>
                <div class="input-field col s6">
                <input  id="nombreSemille" type="text" class="validate">
                <label class="active" for="first_name2">Nombres</label>
                </div>

                <div class="input-field col s6">
                <input id="apellidoSemille" type="text" class="validate">
                <label class="active" for="first_name2">Apellido</label>
              </div>
                
                 <div class="input-field col s6">
                <input id="fichaSemille" type="number" class="validate">
                <label class="active" for="first_name2">Ficha</label>
                </div>
              
               <!--   <div class="input-field col s6">
                <input id="programaSemille" type="text" class="validate">
                <label class="active" for="first_name2">Programa</label>
              </div> -->
           <div class="input-field col s6" id="pro">
              <select id="programaSemille">
                <option value="" disabled selected>Seleccione su programa</option>
                <?php 
                 $conexion = new mysqli($local,$user,$pass,$base);
                  $consulta = "SELECT * from programa";
                  if ($resultado = $conexion->query($consulta)) { 
                 while($fila = mysqli_fetch_array($resultado)){
                     echo "<option value=".$fila["programaId"].">".utf8_encode($fila["nombreP"])."</option>";
                  }
                  }
     
                ?>
              </select>
             <label>programa:</label>
           </div>
                
                
                <div class="input-field col s6" style="display:none;" >
                <input id="documentoSemille" type="number" class="validate" value="<?php echo $usuario; ?>">
                <label class="active" for="first_name2">Documento de identidad</label>
              </div>
                
                
                <div class="input-field col s8">
                <input id="correoSemille" type="text" class="validate">
                <label class="active" for="first_name2">Correo</label>
              </div>
                
                
                 <div class="input-field col s6">
                <input id="telefonoSemille" type="number" class="validate">
                <label class="active" for="first_name2">Telefono</label>
              </div>
                
                
                <div class="input-field col s6">
                <input id="fechanaSemille" onchange="Vfecha()" type="date" class="validate">
                <label class="active" for="first_name2">fecha de nacimiento</label>
                   <div id="ValFecha1">
              </div>
              </div>
           
                
                
                <!--  <div class="input-field col s6">
                <input id="iniforSemille" type="date" class="validate">
                <label class="active" for="first_name2">Fecha inicio de formacion</label>
              </div> -->
                
              <div class="input-field col s6">
                <input id="periactSemille" onchange="Vfecha2()" type="date" class="validate">
                <label class="active" for="first_name2">Periodo actual</label>
                 <div id="ValFecha">
              </div>
              </div>
             
                
              <!--   <div class="input-field col s6">
                <input id="finaetaSemille" type="date" class="validate">
                <label class="active" for="first_name2">Final etapa lectiva</label>
              </div> -->
                
                <div class="input-field col s6">
                <input id="instecSemille" type="text" class="validate">
                <label class="active" for="first_name2">instructor tecnico</label>
              </div>
                
                 <div class="input-field col s8">
                <input id="corrinsSemille" type="text" class="validate">
                <label class="active" for="first_name2">correo instructor</label>
              </div>
                
               
              <div class="input-field col s6" >
                <select id="opcexperienciaSemille" onchange="experiencia()">
                  <option value="0"  disabled selected>Tiene alguna Experiencia</option>
                  <option value="1">si</option>
                  <option value="2">no</option>
                </select>
                <label>experienca</label>
              </div>

                <div class="input-field col s12" id="exp" style="display: none;">
                  <textarea id="experienciaSemille" class="materialize-textarea"></textarea>
                  <label for="textarea1">Experiencia</label>
                </div>


                <div class="input-field col s6" >
                <select id="opcinclinacionSemille" onchange="Inclinacion()">
                  <option value="" disabled selected>Inclinacion hacia la investigacion:</option>
                  <option value="1">si</option>
                  <option value="2">no</option>
                </select>
                <label>Inclinacion</label>
                </div>
                              
                <div class="input-field col s12" id="inc" style="display: none;">
                  <textarea id="inclinacionSemille" class="materialize-textarea"></textarea>
                  <label for="textarea1">Inclinacion</label>
                </div>


                <div class="input-field col s12">
                  <textarea id="actividadesSemille" class="materialize-textarea"></textarea>
                  <label for="textarea1">Actividades Extracurriculares</label>
                </div>

                <div class="input-field col s12">
                  <textarea id="habilidadesSemille" class="materialize-textarea"></textarea>
                  <label for="textarea1">Habilidades en la generacion de ideas creativas e innovadoras(mencionelas)</label>
                </div>
                
                <!-- <div class="input-field col s6">
                <input id="firmapreSemille" type="text" class="validate">
                <label class="active" for="first_name2">Firma del Aprendiz</label>
              </div> -->
                
             <!--  <div class="input-field col s6">
                <input id="ceduapreSemille" type="number" class="validate">
                <label class="active" for="first_name2">cedula</label>
              </div> -->

                 <!--  <div class="input-field col s6">
                <input id="firminsSemille" type="text" class="validate">
                <label class="active" for="first_name2">Firma del instructor</label>
              </div> -->

              <!-- <div class="input-field col s6">
                <input id="ceduinsSemille" type="number" class="validate">
                <label class="active" for="first_name2">cedula</label>
              </div> -->

              <div class="input-field col s6">
                <input id="fechai1Semille" type="date" class="validate" onchange="Vfecha3()">
                <label class="active" for="first_name2">Fecha inicio de formacion:</label>
                <div id="ValFecha3">
                  
                </div>
              </div>

               <div class="input-field col s6">
                <input id="fechai2Semille" type="date" class="validate" onchange="Vfecha4()">
                <label class="active" for="first_name2">Final etapa lectiva:</label> 
                 <div id="ValFecha4">
                  
                </div> 
                </div> 
                  <div class="col s11" id="respSemill" >
              <!--en este espacio van los mensajes de validacion-->
                  <br><br>     
                 </div>

               <div class="input-field col s12">
                <center><button id="agregar" onclick="agregaSemill()" class="btn waves-effect waves-light green text-darken-2">Enviar
                  </button></center>
                   <br><br><br>
                </div> 

           </section>
           </div> 
         </div>
           
    
              <script type="text/javascript">
          function Vfecha(){
            FechaNac=document.getElementById('fechanaSemille').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (FechaNac>=hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#ValFecha1").html('<STRONG style="color:red;">la fecha de nacimiento incorrecta</STRONG>');
              f=document.getElementById("agregar");
              f.style.display='none';
          
            }else{
              $("#ValFecha1").html('');
              f=document.getElementById("agregar");
              f.style.display='block';
            }

          }

          function Vfecha2(){
            FechaNac=document.getElementById('periactSemille').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (FechaNac>hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#ValFecha").html('<div class="input-field col s12"><strong  STRONG style="color:red;">la fecha del Periodo actual incorrecta</strong></div>');
              f=document.getElementById("agregar");
              f.style.display='none';
          
            }else{
              $("#ValFecha").html('');
              f=document.getElementById("agregar");
              f.style.display='block';
            }

          }

           function Vfecha3(){
            Fecha=document.getElementById('fechai1Semille').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (Fecha>hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#ValFecha3").html('<div class="input-field col s12"><strong  STRONG style="color:red;">la fecha de inicio de formacion es incorrecta</strong></div>');
              f=document.getElementById("agregar");
              f.style.display='none';
          
            }else{
              $("#ValFecha3").html('');
              f=document.getElementById("agregar");
              f.style.display='block';
            }

          }

           function Vfecha4(){
            Fecha=document.getElementById('fechai2Semille').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (Fecha<hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#ValFecha4").html('<div class="input-field col s12"><strong  STRONG style="color:red;">la fecha  fin de etapa lectiva es incorrecta</strong></div>');
              f=document.getElementById("agregar");
              f.style.display='none';
          
            }else{
              $("#ValFecha4").html('');
              f=document.getElementById("agregar");
              f.style.display='block';
            }

          }
        </script>   
                  
                 
                
          
        <!--Import jQuery before materialize.js-->
       <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
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