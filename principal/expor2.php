
 <?php 
@session_start();

/*echo $linea=$_GET['l'];
echo $tabla=$_GET['t'];
echo $opcionProyeEnv=$_GET['o'];
echo $programa=$_GET['p'];*/


include("../conexion.php");
 $conn = new mysqli($local,$user,$pass,$base);
 //$sw1=1;
 $consultaP="SELECT * FROM prog_proy INNER JOIN ".$_SESSION['tablaE']." ON prog_proy.id_proy=".$_SESSION['tablaE'].".codigo INNER JOIN programa ON prog_proy.id_prog=programa.programaId WHERE id_prog=".$_SESSION['programaE']." AND linea=".$_SESSION['lineaE']." AND ".$_SESSION['tablaE'].".Rol='".$_SESSION['opcionProyeEnvE']."'";
  

$resultado1 = $conn->query($consultaP);

  while($rows1 = mysqli_fetch_assoc($resultado1) ) {
  	/*if ($sw1==2) {
  		 $cont;*/
  		
  		
  	/*if($sw1==3){
  		
  	}
  	*/
	$cont=0;
	$codigo1=$rows1['codigo'];

 $consultaPe="SELECT * FROM envios WHERE envios.cod_pro=".$codigo1." and linea=".$_SESSION['lineaE']."";
      $resultado21 = $conn->query($consultaPe);
      	
       while($rows21 = mysqli_fetch_assoc($resultado21) ) {
       		
             if ($codigo1==$rows21['cod_pro']) {
              
             	 $cont++;
             }
       }

       $arraRow[]=$cont;


}


//print_r($arraRow);


$tablaEXPOR="<table border='2px'><tbody>";
$cont2=0;
$sw=0;
$resultado = $conn->query($consultaP);

  while($rows = mysqli_fetch_assoc($resultado) ) {

 $nProg=$rows['titulo_pro'];
$codigo=$rows['codigo'];
$tablaEXPOR.="<tr><td rowspan=".$arraRow[$cont2].">".$nProg."</td>";
$cont2++;
$sw=0;
$consultaPe2="SELECT * FROM envios WHERE envios.cod_pro=".$codigo." and linea=".$_SESSION['lineaE']."";
      $resultado2 = $conn->query($consultaPe2);
      	
      	
       while($rows2 = mysqli_fetch_assoc($resultado2) ) {
       		 
       		
       		if ($sw==0) {
       			$tablaEXPOR.="<td>".$rows2['resultado']."</td></tr>";
       			$sw=1;
       		}else{
       			$tablaEXPOR.="<tr><td>".$rows2['resultado']."</td></tr>";
       		}
            $rows2["resultado"];
       }
}


$tablaEXPOR.="</tbody></table>";
 echo $tablaEXPOR;

?>
<!-- <table border="2px">	
<tbody>	
<tr >
	<td rowspan="3">proyoecto de entrenamiento</td>
	<td>resulatdso 1</td>
	
</tr>
<tr >
	<td>resulatdso 2</td>
	
</tr>
<tr >
	<td>resulatdso 3</td>
	
</tr>

<tr >
	<td rowspan="2">proyoecto de entrenamiento</td>
	<td>resulatdso 1</td>
	
</tr>
<tr >
	<td>resulatdso 2</td>
	
</tr>

</tbody>
</table> -->