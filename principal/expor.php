<?php 
 require_once ('excelamysql/Classes/PHPExcel.php'); 

$objPHPExcel = new PHPExcel(); 
   
   

  $tmparray =array("Nom","Valor"); 

  $sheet =array($tmparray); 

  while ($res1 = mysql_fetch_array($exec1)) 
  { 
  foreach($sheet as $row => $columns) { 
    foreach($columns as $column => $data) { 
        $worksheet->setCellValueByColumnAndRow($column, $row + 1, $data); 
    } 
  } 
  } 
   header('Content-type: application/vnd.ms-excel'); 
   header('Content-Disposition: attachment; filename="name.xlsx"'); 
  $worksheet = $objPHPExcel->getActiveSheet(); 
  foreach($sheet as $row => $columns) { 
    foreach($columns as $column => $data) { 
        $worksheet->setCellValueByColumnAndRow($column, $row + 1, $data); 
    } 
  } 

  $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true); 
  $objPHPExcel->setActiveSheetIndex(0); 
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
  $objWriter->save("name.xlsx"); 

//Se crea la conexion y se verifica, si no se conecta termina aqui y da error 
$conexion = new mysqli('localhost','root','','proyectos'); 
if (mysqli_connect_errno()) { 
   printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error()); 
   exit(); 
} 

//Una vez conectados hacemos la consulta para obtener los datos 
$consulta = "SELECT nombre AS nom, apellido AS valor FROM semilleros "; 
  
$resultado = $conexion->query($consulta); 

//Ahora comprobamos si se han obtenido datos, si el numero de registros es mas grande que 0, es que ha obtenido datos y podemos crear el reporte 
if($resultado->num_rows > 0 ){ 
//Aqui se determina si se está accediendo al archivo vía HTTP o CLI, el archivo solo se va a mostrar si se accede desde un navegador web(HTTP). 
if (PHP_SAPI == 'cli') 
    die('Este archivo solo se puede ver desde un navegador web'); 
     
//Aqui se arma el reporte de excel 
 require_once ('excelamysql/Classes/PHPExcel.php'); 
  
// Se crea el objeto PHPExcel 
 $objPHPExcel = new PHPExcel(); 

 //agregamos las propiedades del archivo de Excel 
// Se asignan las propiedades del libro 
$objPHPExcel->getProperties()->setCreator("NexusL") // Nombre del autor 
    ->setLastModifiedBy("NexusL") //Ultimo usuario que lo modificó 
    ->setTitle("Reporte Excel con PHP y MySQL") // Titulo 
    ->setSubject("Reporte Excel con PHP y MySQL") //Asunto 
    ->setDescription("Simposiums") //Descripción 
    ->setKeywords("Info simposiums") //Etiquetas 
    ->setCategory("Reporte excel"); //Categorias 

//Para los títulos del reporte crea dos variables, de esta forma es más fácil realizar cambios si el reporte fuera muy extenso. 
$tituloReporte = "Info simposiums"; 
$titulosColumnas = array('nom', 'valor'); 

//El reporte tien 2 columnas: Nom y valor. Por lo tanto solo vamos a ocupar hasta la columna B. 
// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte 
$objPHPExcel->setActiveSheetIndex(0) 
    ->mergeCells('A1:B1'); 
  
// Se agregan los titulos del reporte 
$objPHPExcel->setActiveSheetIndex(0) 
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte 
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas 
    ->setCellValue('B3',  $titulosColumnas[1]); 

//Se agregan los datos de los alumnos 
  
 $i = 4; //Numero de fila donde se va a comenzar a rellenar 
 while ($fila = $resultado->fetch_array()) { 
     $objPHPExcel->setActiveSheetIndex(0) 
         ->setCellValue('A'.$i, $fila['nom']) 
         ->setCellValue('B'.$i, $fila['valor']); 

     $i++; 
 } 
  
 //Asignamos el ancho de las columnas de forma automática en base al contenido 
 for($i = 'A'; $i <= 'D'; $i++){ 
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE); 
} 

// Se asigna el nombre a la hoja 
$objPHPExcel->getActiveSheet()->setTitle('Simposiums'); 
  
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre 
$objPHPExcel->setActiveSheetIndex(0); 

// Inmovilizar paneles 
//$objPHPExcel->getActiveSheet(0)->freezePane('A4'); 
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4); 

// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
header('Content-Disposition: attachment;filename="name.xlsx"'); 
header('Cache-Control: max-age=0'); 
  
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007'); 
$objWriter->save('name.xlsx'); 
exit; 
} 

?>

<script type="text/javascript">
	var fecha = new Date();
	document.write(fecha.getDate()+1"/"+(fecha.getMonth()) + 1"/" + fecha.getFullYear());
//	alert(fecha);
</script>