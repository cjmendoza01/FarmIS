<?php
session_start();
include_once('Classes/PHPExcel/IOFactory.php');


$fileName = 'Report';



$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Me")->setLastModifiedBy("Me")->setTitle("My Excel Sheet")->setSubject("My Excel Sheet")->setDescription("Excel Sheet")->setKeywords("Excel Sheet")->setCategory("Me");
$objPHPExcel->getDefaultStyle()->getFont()->setSize(12); 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()
			->setCellValue('B1', 'Farmer Name')
			->setCellValue('C1', 'Brgy')
			
			->setCellValue('D1', 'Area(ha)')
			->setCellValue('E1', 'trees')
			->setCellValue('F1', 'Contact')
			->setCellValue('G1', 'Email')
			
			;
include'dbconn.php';
$s=$_SESSION["query"];
$select=mysqli_query($con,$s);
$i=0;
$s="";
$x=1;
$styleArray1 = array(
	'font' => array(
		'bold' => true,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
		'top' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
		),
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => '13D900',
		),
		'endcolor' => array(
			'argb' => '13D900',
		),
	),
);
$styleArray = array(
	'font' => array(
		'bold' => true,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
	'borders' => array(
		'top' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
		),
	),
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
		'rotation' => 90,
		'startcolor' => array(
			'argb' => '3DFF6A',
		),
		'endcolor' => array(
			'argb' => 'FFFFFFFF',
		),
	),
);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray1);
	while ($row=mysqli_fetch_assoc($select)){
	$ii = $i+2;
	$s2=$row['location'];
	if ($s!=$s2){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $s2);
		$objPHPExcel->getActiveSheet()->getStyle('A'.$ii)->applyFromArray($styleArray);
		$a="A";
		$b=":G";
		$c=$a.$ii.$b.$ii;
		$objPHPExcel->getActiveSheet()->mergeCells($c);
		$s=$s2;
		$i++;
		$ii=$i+2;
	}
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $x);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$ii, $row['name_of_farmer']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$ii, $row['farm_location']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$ii, $row['area']);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$ii, $row['no_of_trees']);
	
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$ii, $row['contact']);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$ii, $row['email']);
	
	$x++;
	$i++;
}


$objPHPExcel->getActiveSheet()->setTitle($fileName);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>