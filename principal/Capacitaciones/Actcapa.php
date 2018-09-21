<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
		
			$acnombre=utf8_decode($_POST['acnombre']);
			$acdir=utf8_decode($_POST['acdir']);
			$aclugar=utf8_decode($_POST['aclugar']);
			$acfechaini=utf8_decode($_POST['acfechaini']);
			$acfechafin=utf8_decode($_POST['acfechafin']);
			$achora=utf8_decode($_POST['achora']);
			$acdictador=utf8_decode($_POST['acdictador']);
			$codigo=utf8_decode($_POST['codigo']);
			$estado=utf8_decode($_POST['estado']);
			//echo $estado;

			if($_POST['estado'] == "true"){
		      $estado="A";
			}else{
				$estado="I";
			}

	$consulta = "UPDATE capacitaciones SET 
	nombre_capac='$acnombre' ,
	lugar='$aclugar',
	fecha_inicio='$acfechaini',
	fecha_fin='$acfechafin',
	tiempo_capa='$achora',
	nombre_del_capa='$acdictador',
	dir='$acdir',
	estado='$estado'
    WHERE codigo=$codigo";
	
	if ($conn->query($consulta) === TRUE) {
		echo 1;
	}else{
		echo 0;
	}
	
	
	/* cerrar la conexión */
	$conn->close();
?>