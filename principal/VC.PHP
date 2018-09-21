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
  <title>Capacitaciones</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="js/datoscapacit.js"></script>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <script type="text/javascript" src="js/ess.js"></script>
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/bloqueo.js"></script>
    <script src="js/Formularioscrea.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/> 

       <script src="../alertas/dist/sweetalert-dev.js"></script>
     <link rel="stylesheet" href="../alertas/dist/sweetalert.css"> 
    </head>

</head>
<body>
   <?php include("nabvar.php"); ?>
<div class="container">
<div class="row">
     <br><br><h4 style="text-align:center;">Capacitaciones</h4><br><br>
          <ul class="collapsible popout" data-collapsible="accordion">
             <script type="text/javascript">
              function asi(codigo,opcion,cedula){
                if (opcion=="1") {
                    asistencia="Asistira";
                    asistencias="Asistire";
                }else if(opcion=="2"){
                    asistencia="Asistira";
                     asistencias="No Asistire";
                };
                
                   swal({
                  title: asistencias,
                  text: "seguro que "+asistencia+"?",
                  type: false,
                  showCancelButton: true,
                  confirmButtonColor: "green",
                  confirmButtonText: "Aceptar",
                  cancelButtonText: "Cancelar",
                  closeOnConfirm: false, 
                  
                  },
                  function(){
                 $.ajax({
               url: "Capacitaciones/asistencia.php",
                        data: {
                               'cacodigo' : codigo,
                                'caopcion' : opcion,
                                'cacedula' : cedula
                         
                         },
                        type: "POST",
                         
                        success: function(response){
                           if (response==0){
                            alertify.success('Su asistencia fue registrada');
                          }else if(response==1){
                              alertify.error('solo puede registrar la asisencia una sola vez');
                          };
                     location.reload(true);
                  
                    }
      
                });
   
            });

   }
             </script> 

              <?php 
              $usuario=$_SESSION['user_id'];
              $conexion = new mysqli($local,$user,$pass,$base);
              $consulta = "select * from capacitaciones where estado = 'A'";
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
                $codigo=$row["codigo"];
                $capa="<li>
                <div class='collapsible-header waves-effect waves-green'><i class='material-icons'>textsms</i>
                <span>".utf8_encode($row["nombre_capac"])."</span></div>
                <div class='collapsible-body'><span> ".$row["observacion"]."</span>
                            
                <div class='row'>
                  <br>
                  <div class='input-field col s6' >
                      <input disabled id='acnombre$codigo' type='text' class='validate' value='".utf8_encode($row["nombre_capac"])."' style='color:green;'>
                      <label style='color:black;' for='nombre'>Nombre De Capacitacion</label>
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='acdir$codigo' type='text' class='validate' value='".utf8_encode($row["dir"])."' style='color:green;'>
                      <label style='color:black;' for='dir'>Direccion</label>
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='aclugar$codigo' type='text'  class='validate' value='".utf8_encode($row["lugar"])."' style='color:green;'>
                      <label style='color:black;' for='lugar'>Nombre Del Lugar</label>
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='acfechaini$codigo' type='date' class='validate' value='".$row["fecha_inicio"]."' style='color:green;'>
                      <label style='color:black;' class='active' for='fechaini'>Fecha inicio</label >
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='acfechafin$codigo' type='date' class='validate' value='".$row["fecha_fin"]."'' style='color:green;'>
                      <label style='color:black;' class='active' for='fechafin'>Fecha Fin</label>
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='achora$codigo' type='time' class='validate' value='".utf8_encode($row["tiempo_capa"])."' style='color:green;'>
                      <label style='color:black;' for='hora' class='active'>Hora</label>
                  </div>
                  <div class='input-field col s6'>
                      <input disabled id='acdictador$codigo' type='text' class='validate' value='".utf8_encode($row["nombre_del_capa"])."' style='color:green;'>
                      <label style='color:black;' for='dictador'>Dictador</label>
                  </div>
                  <div class='input-field col s6' style='display:none;' >
                    <input id='codigo$codigo' type='number' class='validate' value='".$row["codigo"]."'>
                    <label for='dictador'>Dictador</label>
                  </div>
                    </div>
                       <div class='modal-footer'>
                          <center>
                             <button onclick='asi(".$codigo.",1,".$usuario.")' 'target='_blank' class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='La Asistencia solo se Registrara una vez'>Asistire
                             </button>
                             <button onclick='asi(".$codigo.",2,".$usuario.")' 'target='_blank' class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='La Asistencia solo se Registrara una vez'>No Asistire
                             </button>
                          </center>
                      </div>
                  </div>                                          
                  </li>";
                  echo $capa;
                  }
              ?>       
          </ul>
      <br>
</div>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>
</body>
</html>
