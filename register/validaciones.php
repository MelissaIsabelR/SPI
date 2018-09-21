<?php 
	/*if(isset($cedula) and ($cedula=="")){
		echo "digite el cedula";
	}else if(isset($nombre) and ($nombre=="")){
		echo "digite nombre";
	}else if(isset($apellidos) and ($apellidos=="")){
		echo "digite apellidos";
	}else if(isset($Rol) and ($Rol=="")){
		echo "digite Rol";
	}else if(isset($profe) and ($profe=="")){
		echo "digite profe";
	}else if(isset($Formacion) and ($Formacion=="")){
		echo "digite Formacion";
	}else if(isset($jornada) and ($jornada=="")){
		echo "digite jornada";
	}else if(isset($ficha) and ($ficha=="")){
		echo "digite ficha";
	}else if(isset($Dir) and ($Dir=="")){
		echo "digite Dir";
	}else if(isset($tel) and ($tel=="")){
		echo "digite tel";
	}else if(isset($correo) and ($correo=="")){
		echo "digite correo";
	}else if(isset($genero) and ($genero=="")){
		echo "digite genero";
	}else if(isset($fnaci) and ($fnaci=="")){
		echo "digite fnaci";
	}else if(isset($clave) and ($clave=="")){
		echo "digite clave";
	}else if(isset($confclave) and ($confclave=="")){
		echo "digite confclave";
	}
*/

?>

<?php
	 include("../conexion.php");
	$conn = new mysqli($local, $user, $pass, $base);

$cam1=$_POST['c1'];
$cam2=$_POST['c2'];
$cam3=$_POST['c3'];
$cam4=$_POST['c4'];


	$consulta = "INSERT INTO prueba(campo1, campo2,campo3,campo4)
						VALUES('$cam1','$cam2','$cam3','$cam4')";

	if ($conn->query($consulta) === TRUE) {
		echo "1";
      }else{
echo "0";
      }
 

	//echo $fecha;
	/* cerrar la conexión */
	$conn->close();
?>