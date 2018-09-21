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
  <title>Lista de Proyectos por progrmas</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<body>
<style type="text/css">
   .btn.waves-effect.waves-light.green.text-darken-2{
    font-family: Cambria;

   }
 </style>
 
<script type="text/javascript">
	function verProyect(linea){
    var opcproy=document.getElementById('opcionProyeEnv').value;
    var Prog=document.getElementById('programa').value;
    var Prog=document.getElementById('programa').value;
    if(linea==" " || opcproy==00 || Prog==00){
               alertify.error('Seleccione programa y opcion de proyecto');
              
      }else{
              $.ajax({
         url: "php/ajax.php",
               data: {
                      'accion' : 'verProyProg',
                      programa: $("#programa").val(),
                      opcionProyeEnv: $("#opcionProyeEnv").val(),
                      'linea': linea
               
                     },
                type: "POST",
                 
              
               beforeSend: function () {
                 $("#tablaProy").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        $("#tablaProy").html(response);
                }

      });
            }
				
	}

</script>
 <?php include("nabvar.php"); ?>

       
        <div class="container">
          <div class="row">
          <br>

        	<?php 
        	
        		$conexion = new mysqli($local,$user,$pass,$base);
                  $consulta = "SELECT * from programa";
                  if ($resultado = $conexion->query($consulta)) { 

                  	$ProgProy='<div class="input-field col s6">
              		<select id="programa">
              		<option value="00" disabled selected>Seleccione:</option>';
                 while($row = mysqli_fetch_array($resultado)){
                    // echo "<input type='radio' value=".$fila["programaId"].">".utf8_encode($fila["nombreP"]);
                     $ProgProy.='<OPTION VALUE="'.$row['programaId'].'" >'.utf8_encode($row['nombreP']).'</OPTION>'; 
                    
                    }
                     $ProgProy.='</select>
              		<label>Programa</label>
            		 </div>';
              		echo $ProgProy;
                  }
              
        	 ?>

             <div class="input-field col s6">
                    <select id="opcionProyeEnv" >
                    <option value="00">proyectos</option>
                    <option value="Aprendiz">Semci - Aprendices</option>
                    <option value="Instructor">Sennova - Instructores</option>
                  </select>  
                  <label>Seleccione el proyecto</label>
            </div>
          </div>

            <center>

          <button class="btn waves-effect waves-light green text-darken-2" value="1" onclick="verProyect(this.value)">Investigación</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="2" onclick="verProyect(this.value)">Innovación</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="3" onclick="verProyect(this.value)">Servícios</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="4" onclick="verProyect(this.value)">Modernización</button>
          <button class="btn waves-effect waves-light green text-darken-2" value="5" onclick="verProyect(this.value)">Divulgación</button>
         

              <div id="ab_De">
                
              </div>
    		
                  </center>  

    		<div id="tablaProy">
    			
    		</div>
        </div>
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