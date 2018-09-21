<?php
	 include("../conexion.php");
	$conn = new mysqli($local,$user,$pass,$base);
	$cedula=$_POST["cedula"];
	$nombre=utf8_decode($_POST["nombre"]);
	$apellidos=utf8_decode($_POST["apellidos"]);
	$Rol=$_POST["Rol"];
	$profe=$_POST["profe"];
	$Dir=utf8_decode($_POST["Dir"]);
	$tel=$_POST["tel"];
	$correo=utf8_decode($_POST["correo"]);
	$genero=$_POST["genero"];
	$fnaci=$_POST["fnaci"];
	$clave=sha1($_POST["clave"]);
	$estadmin='RI';
	//$confclave=$_POST["confclave"];
	
	/*include("validaciones.php");*/
	$consulta = "INSERT INTO registros(cedula,nombre,apellidos,Rol,profe,Dir,tel,correo,genero,fnaci,clave,estadmin) 
									VALUES('$cedula','$nombre','$apellidos','$Rol','$profe','$Dir','$tel','$correo','$genero','$fnaci','$clave','$estadmin')";
	
	if ($conn->query($consulta) === TRUE) {
	  echo 1;
	}else{
      echo 0;
	}
	
	/* cerrar la conexión */
	$conn->close();
?>