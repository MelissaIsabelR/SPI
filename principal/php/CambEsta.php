<?php 
include("../../conexion.php");
$conn = new mysqli($local,$user,$pass,$base);
if ($_POST['tablaEst']==1) {
	$tabla="investigacion";
}elseif($_POST['tablaEst']==2){
	$tabla="innovacion";
}elseif($_POST['tablaEst']==3){
	$tabla="servicios";
}elseif($_POST['tablaEst']==4){
	$tabla="modernizacion";
}elseif($_POST['tablaEst']==5){
	$tabla="divulgacion";
}
$_POST['ValoEst'];
$codigo=$_POST['codigoEst'];

if ($_POST['ValoEst']=="true") {
$estado="Aprobado";
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 month' , strtotime ($fecha )) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$fecha2=$nuevafecha;

$consulta="UPDATE $tabla SET estado='$estado', envio='$fecha2'
        WHERE codigo=$codigo";

if ($conn->query($consulta) === TRUE) {
echo 1;
}else{
echo 2;
}

}elseif($_POST['ValoEst']=="false"){
$estado="Reprobado";
$fecha2="0000-00-00";

$consulta="UPDATE $tabla SET estado='$estado', envio='$fecha2'
        WHERE codigo=$codigo";

if ($conn->query($consulta) === TRUE) {
echo 3;
}else{
echo 4;
}

}

 ?>
