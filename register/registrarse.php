<?php 
include("../conexion.php");
 ?>
<!DOCTYPE html>
<html>
	<head><head>
      <meta http-equiv="Content-Type" content="text/htm" charset="utf-8"/>
    <meta charset="utf-8"/>
		<script src="js/jquery-3.1.1.js"></script>
    <!--<script src="js/ajax.js"></script>-->
    <script src="js/graba.js"></script>
        <!--Import Google Icon Font-->
        <!--<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
       
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="icon" type="image/png" href="images/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="css/estyle.css"> 
       
  <script src="js/rolls.js"></script>
  </head>
<body>
        <div class="navbar-fixed">
          <nav >
               <div class="nav-wrapper orange ">
        <a href="#!" class="brand-logo"></a>
        <a href="../logear.php" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">Login</i></a>
        <ul class="right hide-on-med-and-down">
 <li onclick="proyec()"><a class="dropdown-button" data-activates="dropdown3">Opciones<i class="material-icons right"></i></a></li>
        </ul>

    
      </div>

             </nav>
            
          </div>
           <ul id="dropdown3" class="dropdown-content">
              <li><a href="../logear.php">Iniciar Sesion</a></li>
              <li><a href="../index.php">Volver</a></li>
               
            </ul>
          <br>  
          <br>  
          <br>  
    <div class="container z-depth-4">
           <div class="row">
             <div class="col s12">
             <nav class="nav-wrapper orange ">
            	<div class="nav-wrapper">
              <span href="#" class="brand-logo center">Registrarse</span>
            </div>
			</nav>
	<br>

  <div class="input-field col s6" id="roles">
                <select id="Rol" onchange="desactivar()">
           <OPTION  VALUE="0"  disabled selected>SELECCIONE ROL</option> 
           <OPTION VALUE="1">Instructor</OPTION> 
           <OPTION VALUE="2">Aprendiz</OPTION>
           <!--<OPTION VALUE="3">Adminstrador</OPTION>-->
        </select>
                <label>Cargo:</label>
    </div>

	<div class="input-field col s6">
                <input id="cedula" type="number" class="validate" >
                <label class="active" for="first_name2">N° de Identificación:</label>  
    </div>

    <div class="input-field col s6" id="nom">
                <input id="nombre" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Nombres:</label>  
    </div>

     <div class="input-field col s6" id="apell">
                <input id="apellidos" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Apellidos:</label>  
    </div>



     <div class="input-field col s12" id="pro">
        <select id="profe">
            <option value="N/A" disabled selected>Seleccione su Area</option>
            <?php 
                 $conexion = new mysqli($local,$user,$pass,$base);
                  $consulta = "SELECT * from tabla_areas";
                  if ($resultado = $conexion->query($consulta)) { 
                 while($fila = mysqli_fetch_array($resultado)){
                     echo "<option value=".$fila["areaId"].">".utf8_encode($fila["NombreArea"])."</option>";
                  }
                  }
     
                ?>
				</select>
                <label>Seleccione Area:</label>
    </div>

    <div class="input-field col s6" id="dire" >
                <input id="Dir" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Direccion:</label>  
    </div>
     
    <div class="input-field col s6" id="tele" >
                <input id="tel" type="text" class="validate" data-length="15" maxlength="15">
                <label class="active" for="first_name2">Telefono:</label>  
    </div>

    <div class="input-field col s6" id="corr" >
                <input id="correo" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Correo:</label>  
    </div>
      
   	<div class="input-field col s6" id="gene">
                <select id="genero">
				   <OPTION  VALUE="0"  disabled selected>Seleccione el genero</option> 
				   <option value="1" >Masculino</option>
        		   <option value ="2" >Femenino</option> 
				</select>
                <label>Genero:</label>
    </div>

   <div class="input-field col s7" id="fecha" >
                <input id="fnaci" type="date" class="validate" onchange="Vfecha()">
                <label class="active" for="first_name2">Fecha de Nacimiento:</label>  
                <div>
                  <STRONG id="ValFecha"> </STRONG>
                </div>
    </div>
     
    <div class="input-field col s5">
                <input id="clave" type="password" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">contraseña</label>  
    </div>
   
  <!-- <div class="input-field col s6">
                <input id="confclave" type="password" class="validate">
                <label class="active" for="first_name2" id="conf">Confirmar contraseña</label>
    </div>-->

   <div class="col s11" id="res" >
   <!--en este espacio van los mensajes de validacion-->
   <br><br>
    </div>
    
    </div>
		 <center>
            <button onclick="agregar()" class="btn waves-effect waves-light green text-darken-2" id="agregar" >Registrarse
          </button>
          <br><br>
    	</center>
          
		</div>
		</div>
         <?php include("../pie.php"); ?>
    
       <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript">
        	function Vfecha(){
        		FechaNac=document.getElementById('fnaci').value;
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
              $("#ValFecha").html('<STRONG style="color:red;">la fecha de nacimiento incorrecta</STRONG>');
              f=document.getElementById("agregar");
              f.style.display='none';
          
            }else{
              $("#ValFecha").html('');
              f=document.getElementById("agregar");
              f.style.display='block';
            }

        	}
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                Materialize.updateTextFields();
              });
        </script>
          <script> 
          $(document).ready(function() {
            $('select').material_select();
          });
          </script>
</body>
</html>
