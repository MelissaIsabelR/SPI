<?php
  $identificacion=$_POST['AcIdentifi'];
  $opc=$_POST['Acopcion'];
  $codigoCapa=$_POST['AcCodCap'];
 if ($opc==1) {
  $opcion="Si";
 }elseif($opc==2){
  $opcion="No";
 }
include("../../conexion.php");
  $conn = new mysqli($local,$user,$pass,$base);
 
   $consulta="UPDATE asistenciapre SET asistencia='$opcion'
   WHERE identificacion=$identificacion  AND capacitacion=$codigoCapa";
   
if ($conn->query($consulta) === TRUE) {
   echo "1";
}else{
  echo "2";
}
  
  
  /* cerrar la conexión */
 
?>
