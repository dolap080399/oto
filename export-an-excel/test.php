<?php
$num='1';
include 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ha Minh");
$objPHPExcel->getProperties()->setLastModifiedBy("Ha Minh");
$objPHPExcel->getProperties()->setTitle("demo");
$objPHPExcel->getProperties()->setSubject("hướng dẫn sử dụng excel php");
$objPHPExcel->getProperties()->setDescription("");

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'PHP');
$objPHPExcel->getActiveSheet()->SetCellValue('B2', 'thật');
$objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Đơn giản phải không nào');
$objPHPExcel->getActiveSheet()->setTitle('demo');
$gdImage = imagecreatefromjpeg('2.jpg');
$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
$objDrawing->setName('demo');
$objDrawing->setDescription('demo');
$objDrawing->setImageResource($gdImage);
$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
$objDrawing->setHeight(25);
$objDrawing->setCoordinates("C$num");
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
echo date('H:i:s') . "Bạn Đã Tạo Tập Tin Exel Thành Công.\r\n";
?>