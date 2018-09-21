<?php 

require_once ('Classes/PHPExcel.php');
$objPHPExcel = new PHPExcel();
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(10);
 
 
$objPHPExcel->getActiveSheet()->setCellValue('A1','Creando el documento excel');
$objRichText = new PHPExcel_RichText();
$objRichText->createText('Creando textos');
$objPHPExcel->getActiveSheet()->getCell('A5')->setValue($objRichText);
 
 
 
//combinando celdas
 
$objPHPExcel->getActiveSheet()->mergeCells('A5:E10');
 
$objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);
 
$objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
 
 
 
//Utilizar formulas
$objPHPExcel->getActiveSheet()->setCellValue('B11', 'Sumando datos');
$objPHPExcel->getActiveSheet()->setCellValue('B15', 2);
$objPHPExcel->getActiveSheet()->setCellValue('B21', 8);
$objPHPExcel->getActiveSheet()->setCellValue('B15', 10);
 
//Aplicando fórmulas
$objPHPExcel->getActiveSheet()->setCellValue('B16', '=SUM(B13:B15)');
 
// Nombramos la hoja
$objPHPExcel->getActiveSheet()->setTitle('PHP to Excel');
 
// Elegimos en que hoja se abre el Excel
$objPHPExcel->setActiveSheetIndex(0);
 
 
// Y ahora guardamos el archivo con el nombre que quieras
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PHPExcelNombre');
 
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));

?>

<script type="text/javascript">
	/*var fecha = new Date();
	document.write(fecha.getDate()+"/"+(fecha.getMonth() + 1) + "/" + fecha.getFullYear());
//	alert(fecha);*/
</script>



