
<?php include '../../conexion.php'; ?>
<?php 
$conn = new mysqli($local,$user,$pass,$base);

$rolF=$_POST['rolF'];
$linF=$_POST['linF'];
$checkF=$_POST['checkF'];
$valorF=$_POST['valorF'];
$idF=$_POST['idF'];

if ($checkF=="true") {
	$opcion="S";
}elseif($checkF=="false"){
	$opcion="N";
}

if($rolF=="Aprendiz"){
$rol="RolApreC";
}elseif($rolF=="Instructor"){
$rol="RolInstC";
}

  $consulta="UPDATE tablaparametrica SET $rol='$opcion' WHERE  idT=$idF";

    if($result = $conn->query($consulta)){
      if ($conn->query($consulta) === TRUE) {
      	echo "1";
      }else{
      	echo "0";
      }
}

?>