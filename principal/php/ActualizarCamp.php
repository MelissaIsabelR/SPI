<?php include '../../conexion.php'; ?>
<?php  
 $conn = new mysqli($local,$user,$pass,$base); 
 $valor=$_POST['Valor'];
 $id=$_POST['id'];
 $consulta="UPDATE tablaparametrica  SET estadoC='$valor' WHERE idT=$id"; 
if ($conn->query($consulta) === TRUE) {
    echo "1";
  }else{
    echo "0";
  }

?>