<?php 
include("../../conexion.php");
$fecha=$_POST['fechaEnv'];
$nuevafecha = strtotime ( '+0 month' , strtotime ($fecha )) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$fecha2=$nuevafecha;
$conn = new mysqli($local,$user,$pass,$base);
$consulta="UPDATE envios SET fechaenviar='".$fecha2."' WHERE numer_env=".$_POST['AcCodigo']."";
if ($conn->query($consulta) === TRUE) {
echo 1;
}else{
echo 2;
}
?>