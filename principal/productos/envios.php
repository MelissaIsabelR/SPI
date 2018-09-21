<?php include("../../conexion.php"); ?>
  <script src="../../alertas/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../../alertas/dist/sweetalert.css">
<?php
$conn = new mysqli($local,$user,$pass,$base);
$tipo=$_POST['tipo'];
$subtipo= $_POST['subtipo'];
$areas=$_POST['areas'];
$subareas=$_POST['subareas'];
$areas2=$_POST['areas2'];
$disciplina=$_POST['disciplina'];
$tit_pro= $_POST['tit_pro'];
$eviden= $_POST['eviden'];
$identificacion= $_POST['identificacion'];
$linea= $_POST['linea'];
$codigo= $_POST['codigo'];
$producto= $_POST['producto'];
$lid_grup= $_POST['LidGrup'];
$lid_sen= $_POST['LidSeno'];
 


$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 month' , strtotime ($fecha )) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$fecha2=$nuevafecha;

$formatos = array('.xlsx','.doc','.pdf', '.docs', '.rar');
 $nombreArchivo1= $_FILES['archivo1']['name'];
 $nombreTmpArchivo1=$_FILES['archivo1']['tmp_name'];
 $ext1 = substr($nombreArchivo1, strrpos($nombreArchivo1, '.'));
    if (in_array($ext1, $formatos)){
    	if (move_uploaded_file($nombreTmpArchivo1, "../archivos/$nombreArchivo1")){
    		$Arch1="Archivos/".$nombreArchivo1."";

    		$consulta = "INSERT INTO 
    		envios(identificacion,linea,cod_pro,resultado,evidencia,fechaenviar,titulo_pro,tipo,subtipo,areas,subareas,confareas,disciplina,lid_grup, lid_sen ) 

                  VALUES('$identificacion','$linea','$codigo','$producto','$Arch1','$fecha2','$tit_pro','$tipo','$subtipo','$areas', '$subareas', '$areas2','$disciplina','$lid_grup','$lid_grup')";
  
		  if ($conn->query($consulta) === TRUE) {
			 ?>
			 <body onload='swal("Producto Enviado!", "Producto Enviado.", "success");'>
			 <?php 
		
			  header('refresh:2; url=../VPA.php');
		  }else{
			 ?>
			 <body onload='swal("Producto no Enviado!", "Debe seleccionar un archivo WinRaR.", "warning");'>
			 <?php 
			   header('refresh:2; url=../VPA.php');
		  }
  
    	 }else{
    	 	?>
			 <body onload='swal("Producto no Enviado!","Debe seleccionar un archivo WinRaR.", "warning");'>
			 <?php 
			   header('refresh:2; url=../VPA.php');
         }
    }else{
     	?>
			 <body onload='swal("Producto no Enviado!", "Debe seleccionar un archivo WinRaR.", "warning");'>
			 <?php 
			   header('refresh:2; url=../VPA.php');
    }
   

  /* cerrar la conexión */
$conn->close();

?>