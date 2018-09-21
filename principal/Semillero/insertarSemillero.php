<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	
	$nombre=utf8_decode($_POST["nombre"]);
	$apellido=utf8_decode($_POST["apellido"]);
	$ficha=$_POST["ficha"];
	$programa=$_POST["programa"];
	$documento=$_POST["documento"];
	$correo=utf8_decode($_POST["correo"]);
	$telefono=$_POST["telefono"];
	$fechana=$_POST["fechana"];
	//$inifor=$_POST["inifor"];
	$periact=$_POST["periact"];
	//$finaeta=$_POST["finaeta"];
	$instec=utf8_decode($_POST["instec"]);
	$corrins=$_POST["corrins"];
	$opcexperiencia=$_POST["opcexperiencia"];
	$experiencia=utf8_decode($_POST["experiencia"]);
	$opcinclinacion=$_POST["opcinclinacion"];
	$inclinacion=utf8_decode($_POST["inclinacion"]);
	$actividades=utf8_decode($_POST["actividades"]);
	$habilidades=utf8_decode($_POST["habilidades"]);
	/*$firmapre=utf8_decode($_POST["firmapre"]);
	$firmins=utf8_decode($_POST["firmins"]);*/
	/*$ceduapre=$_POST["ceduapre"];
	$ceduins=$_POST["ceduins"];*/
	$fechai1=$_POST["fechai1"];
	$fechai2=$_POST["fechai2"];
	$estado="A";
	$estadmin='RI';
	//include("validaciones.php");

	 $consulta = "INSERT INTO semilleros(nombre,apellido,ficha,programa,documento,correo,telefono,fechana,periact,instec,corrins,opcexperiencia,experiencia,opcinclinacion,inclinacion,actividades,habilidades,fechai1,fechai2,estado,estadmin) 
									VALUES('$nombre','$apellido','$ficha','$programa','$documento','$correo','$telefono','$fechana','$periact','$instec','$corrins','$opcexperiencia','$experiencia','$opcinclinacion','$inclinacion','$actividades','$habilidades','$fechai1','$fechai2','$estado','$estadmin')";
	
	if ($conn->query($consulta) === TRUE) {
	  echo 1;
	}else{
      echo 0;
	}
	
	/* cerrar la conexión */
	$conn->close();
?>