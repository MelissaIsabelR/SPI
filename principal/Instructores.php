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
  <title>Instructores</title>
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
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
<!--     <script src="js/Formularioscrea.js"></script>
 -->    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  

      <script src="../alertas/dist/sweetalert-dev.js"></script>
     <link rel="stylesheet" href="../alertas/dist/sweetalert.css">
    </head>

</head>
<script type="text/javascript">
function EliminarInstru(codigo){   
      swal({
  title: "Eliminar",
  text: "seguro que desea Eliminar?",
  type: "",
  showCancelButton: true,
 confirmButtonColor: "green",
  confirmButtonText: "Aceptar",
  cancelButtonText: "Cancelar",
  closeOnConfirm: false, 
	
  },

	function(){
	  $.ajax({
    
      url: "Instructor/eliminarInstru.php",
      data: {

            codi_Instru: codigo
            
            },
      type: "POST",

     
      success: function(response){
        
        if (response==0){
           	 swal("Error!", "Error al Eliminar Semillero.", "error");
           	 
        }else if(response==1){
           
             swal("Eliminado!", "Semillero Eliminado Correctamente.", "success");
           
        }
        location.reload(true);
          
        }
      
        });
	 
	});

   }
   function CamEst(codigo){
   	//alert(codigo)
   	$.ajax({
 url: "php/actEsta.php",
       data: { 
          codigoSem : codigo   
            },
        type: "POST",
         
      
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $('#modal1').html(response);

      }

});
   }

function EditInstru(codigo){
    //alert(codigo)
    $.ajax({
 url: "Instructor/modificar.php",
       data: { 
          codigoInstru : codigo   
            },
        type: "POST",
         
      
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $('#modalEdiInstru').html(response);

      }

});
   }
</script>
<style type="text/css">
#cuerpo{
 /*background-image: url("../img/tex.jpg");*/
}

</style>
<body id="cuerpo">
	 <?php include("nabvar.php"); ?>
<div class="container">
<div class="row">
		<h5 STYLE="text-align:center;"><i class="material-icons Small"> people </i> Listado de Instructores </h5>
<hr color="green">
<?php

	$conn = new mysqli($local,$user,$pass,$base);
	  $consulta = "SELECT * FROM registros INNER JOIN programa ON registros.profe=programa.programaId WHERE Rol='1' AND estadmin = 'RA'";
	//mysql_query("SET NAMES UTF8");
	$resultado = $conn->query($consulta);
		$tabla="<table id='example1' class='display'>";
		$tabla.="<thead>";
				$tabla.="<th>Documento</th>";
				$tabla.="<th>Nombres</th>";
				$tabla.="<th>Apellidos</th>";
				//$tabla.="<th>Fecha de inicio</th>";
				$tabla.="<th>Programa</th>";
        
				$tabla.="<th>Estado</th>";
				$tabla.="<th>Eliminar</th>";
        $tabla.="<th>Ver</th>";
				$tabla.="<th>Editar</th>";
				//$tabla.="<th>Cambiar Estado</th>";
			$tabla.="</thead>";
			$tabla.="<tbody>";
		  while($fila = mysqli_fetch_array($resultado)){
			$tabla.="<tr>";
				$tabla.="<td>".$fila["cedula"]."</td>";
				$tabla.="<td>".utf8_encode($fila["nombre"])."</td>";
				$tabla.="<td>".utf8_encode($fila["apellidos"])."</td>";
				//$tabla.="<td>".$fila["fechai1"]."</td>";
				$tabla.="<td>".$fila["nombreP"]."</td>";
				$tabla.="<td class='green-text'>".$fila["estadmin"]."</td>";

				$tabla.="<td><button  class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='Eliminar'  OnClick='EliminarInstru(".$fila["cedula"].")'><i class='Small material-icons'>delete</i></button>

				</td>";
				$tabla.='<td><a href="VerInstructor.php?c='.$fila["cedula"].'" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">remove_red_eye</i></font></font></a></td>
           
				</td>';

         $tabla.='<td><a href="#modalEdiInstru"  onclick="EditInstru('.$fila["cedula"].')" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Editar "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">edit</i></font></font></a></td>
           
        </td>';
					
		}
			$tabla.="</tbody>";
		$tabla.="</table>";

		
	
	$conn->close();
	//echo htmlentities($tabla,ENT_QUOTES,"UTF-8");
	//echo htmlentities(utf8_decode($tabla));
	//echo htmlentities($tabla);
	echo ($tabla);
?>
</div>
</div>	

<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
<body>

  <a id="op" class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>


  <div id="modal1" class="modal">
    <div class="modal-content">
      <div class="input-field col s6">
        <input type="text" id="example" class="validate" required>
        <label for="example">Example</label
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar sin validar</a>
      <a href="#!" id="cl"class="modal-action waves-effect waves-green btn-flat ">Validar y Cerrar</a>
    </div>
  </div>
<script>
$(document).ready(function(){
    $("#op").click(function(){
      $('#modal1').openModal();
    });
      
    
    $( "#cl" ).click(function() {
       if($("#example").val() === ""){
         alert("Rellene todos los campos");
       }else{
         $('#modal1').closeModal();
       }
      
    });
  });
</script>
</body>-->

<!--/////////////////////////////////////////MODAL/////////////////////////////////-->

<div id="modal1" class="modal modal-fixed-footer" style="width: 500px; height: 410px; border-radius: 10px;">
     
</div>

<div id="modalEdiInstru" class="modal modal-fixed-footer" style="width: 800px; height: auto; border-radius: 10px;">
     
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

<script src="Data/datatables.min.js"></script>  
<script src="Data/personaliza.js"></script>  
    <script src="js/desplegable.js"></script>


<link rel="stylesheet" type="text/css" href="Data/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="data/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="data/estilo.css">


<script type="text/javascript">
$(document).ready(function() {
    $("#example1").DataTable();
    $("#example2").DataTable();
} );
</script>


</body>
</html>