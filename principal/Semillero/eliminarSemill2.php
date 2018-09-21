<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	 $codi_Sem=$_POST['codi_Seill'];
	 $sw=0;
   
      $consulta1="DELETE FROM registros WHERE cedula=".$codi_Sem."";
      if ($conn->query($consulta1) === TRUE) {
			
			 $consulta2="DELETE FROM semilleros WHERE documento=".$codi_Sem."";
     	
		     	if ($conn->query($consulta2) === TRUE) {
					echo 1;
				}else{
					echo 0;
				}
		
		}else{
			echo 0;
		}

     

	   
     $conn->close();
?>