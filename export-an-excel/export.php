<?php include_once('config.php'); include('Classes/PHPExcel.php');

$objPHPExcel	=	new	PHPExcel();
$result			=	$db->query("SELECT hoa_don.*,order_product.* FROM hoa_don, order_product WHERE hoa_don.id_hoadon= order_product.id_hoadon  ") or die(mysql_error());

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'STT');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Mã hoá đơn');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Tên khách hàng');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Số điện thoại');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Địa chỉ');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Số lượng');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Giá');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Trạng thái');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Trạng thái');

$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->applyFromArray(
            array('type'       => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,'rotation'   => 0, 'startcolor' => array('rgb' => 'FFFF00'),'endcolor'   => array('argb' => '00ffff00')));

//căn giữa
$objPHPExcel->getActiveSheet()->getStyle("A:H")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//$objPHPExcel->getActiveSheet()->getStyle("F:G")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//Căn theo chiều dọc
$objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$stt=0;
$rowCount	=	2;
//$tong =0;

while($row	=	$result->fetch_array()){
	$stt +=1;
	//$tien = $row['quantity'] * $row['price'];
	//$gia = $row['money']*$row['count'];
	//$tong += $tien;	

		if($row['stt']==0){
			$xuly =  'Đang chờ xử lý...'; 
		}elseif($row['stt']==1) {
			$xuly = 'Đã giao hàng.';
		}
		// }elseif($row['status']==2) {
		// 	$xuly = 'Đang giao hàng';
		// }


	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount,$stt);
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($row['id_hoadon '],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($row['name'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($row['phone'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($row['address'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($row['quantity'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($row['price'],'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($xuly,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($row['note'],'UTF-8'));
	
	
	//$objPHPExcel->getActiveSheet()->SetCellValue(''.$rowCount, $tong);
	$rowCount++;
}

$sum = "=SUM(G2:G$rowCount)";
$objPHPExcel->getActiveSheet()->SetCellValue('G'.($rowCount+1),$sum);
$objPHPExcel->getActiveSheet()->SetCellValue('F'.($rowCount+1),'Tổng Tiền:');
$objPHPExcel->getActiveSheet()->getStyle('F'.($rowCount+1))->getFont()->setBold(true);


$styleArray=array(
				'borders'=> array(
                 'allborders' => array(
                  	'style' => PHPExcel_Style_Border::BORDER_THIN
                 )
            )
      );
$objPHPExcel->getActiveSheet()->getStyle('A1:' .'I'.($rowCount+1))->applyFromArray($styleArray);


$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="xuathoadon.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
?>
