<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	 $codi_capa=$_POST['codi_capa'];
	 $sw=0;
    $consulta="SELECT * FROM asistenciapre WHERE capacitacion=".$codi_capa."";
     if($result = $conn->query($consulta)){
      while($row = mysqli_fetch_array($result)){
      $sw=1;
      }
     }
   
      $consulta2="DELETE FROM asistenciapre WHERE capacitacion=".$codi_capa."";
     	
     	if ($conn->query($consulta2) === TRUE) {
			$sw2=1;
		}else{
			$sw2=0;
		}

	    $consulta3="DELETE FROM capacitaciones WHERE codigo=".$codi_capa."";
		 if ($conn->query($consulta3) === TRUE) {
			echo 1;
		}else{
			echo 0;
		}
		

     
     $conn->close();
?>