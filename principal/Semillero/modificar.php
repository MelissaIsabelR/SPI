
 <html>
    <!--<head>
      <meta http-equiv="Content-Type" content="text/htm" charset="utf-8"/>
    <meta charset="utf-8"/>
		<script src="js/jquery-3.1.1.js"></script>
        
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <!--Import materialize.css-->
        <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
       <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">-->
       
		<script>
    function act(){
    
        $.ajax({
          url: "Semillero/actualiza.php",
          data: {nombre : $("#nombres").val(),
            identificacion : $("#identificacion").val(),
            apellido : $("#apellido").val(),
            corre: $("#cor").val(),
            telefono : $("#telefono").val(),
            fechana : $("#fechana").val(),
            instec  : $("#instec").val(),
            corrins : $("#corrins").val()
           },
          type: "POST",
           
          success: function(response){
                   alertify.success(response);

              
          }
          
          /*success: function(response){
               if (response==0){
              alert('Error al Guardar');
            }else if(response==1){
              alert('Datos Grabados');
            };
          }*/
        });
        // window.location.reload();
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
  if ($resultado = $conn->query($consulta)) {
  	
  }
     if ($fila = $resultado->fetch_assoc()) {

     		
			$tabla= "<div class='rotateInDownleft animated'>
      
           <div class='row'>
             <div class='col s12'>
             <nav  class='orange'>
            <div class='nav-wrapper'>
              <span href='#'' class='brand-logo center'>Actualizar datos </span>
            </div>
          </nav>
                <br><br>

                <div class='input-field col s6' style='display:none;''>
                <input  id='identificacion' type='text' class='validate' value='$usuario'>
                <label class='active' for='first_name2'>identificacion</label>
                </div>

				        <div class='input-field col s6'>
                <input  id='nombres' type='text' class='validate' value=".$fila["nombre"].">
                <label class='active' for='first_name2'>Nombres</label>
                </div>

                <div class='input-field col s6'>
                <input  id='apellido' type='text' class='validate' value=".$fila["apellido"].">
                <label class='active' for='first_name2'>apellido</label>
                </div>

                <div class='input-field col s6'>
                <input  id='cor' type='text' class='validate' value=".$fila["correo"].">
                <label class='active' for='first_name2'>correo</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='telefono' type='number' class='validate' value=".$fila["telefono"].">
                <label class='active' for='first_name2'>telefono</label>

                </div>


                 <div class='input-field col s6'>
                <input  id='fechana' type='date' class='validate' value=".$fila["fechana"].">
                <label class='active' for='first_name2'>Fecha de Nacimiento</label>
                </div>


                 <div class='input-field col s6'>
                <input  id='instec' type='text' class='validate' value=".$fila["instec"].">
                <label class='active' for='first_name2'>instructor tecnico</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='corrins' type='text' class='validate' value=".$fila["corrins"].">
                <label class='active' for='first_name2'>correo instructor</label>
                </div>
                 </div> 
          </div>
          <center>
            <button onclick='act()' class='btn waves-effect waves-light'>Actualizar
          </button>
          </center>
          <br>
          
          </div>
          
		  <br>
		  <br>
		  <br>
                ";

			
			echo $tabla;
		}
		
   
 ?>
        <!--<li><a><?php //echo $_SESSION['cargo'];?></a></li>
             <li><a><?php //echo $_SESSION['user_id'];?></a></li>-->
          
          
        <!--Import jQuery before materialize.js-->
       <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
      
     
        </body>
        
</html>
