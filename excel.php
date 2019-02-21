<?php
session_start();
include_once('Classes/PHPExcel/IOFactory.php');


$fileName = 'Report';
$title=$_SESSION["title"];


$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Me")->setLastModifiedBy("Me")->setTitle("My Excel Sheet")->setSubject("My Excel Sheet")->setDescription("Excel Sheet")->setKeywords("Excel Sheet")->setCategory("Me");
$objPHPExcel->getDefaultStyle()->getFont()->setSize(12); 
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()
->setCellValue('A1', $title)
			->setCellValue('B2', ' Name')
			->setCellValue('B2', ' Name')
			->setCellValue('C2', 'Contact #')
			
			->setCellValue('D2', 'Email')
			
			;
			$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
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
$objPHPExcel->getActiveSheet()->getStyle('A1')->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->applyFromArray($styleArray1);
	while ($row=mysqli_fetch_assoc($select)){
	$ii = $i+3;
	
	$objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $x);
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$ii, $row['name']);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$ii, $row['contact']);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$ii, $row['email']);
	
	
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