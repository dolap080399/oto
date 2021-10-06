<?php

require('Classes/PHPExcel.php');
require('connect/db_connect.php');

if(isset($_POST['btnExport'])){
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('10A1');

	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'Mã Hóa Đơn');
	$sheet->setCellValue('B'.$rowCount,'Tên SP');
	$sheet->setCellValue('C'.$rowCount,'Số Lượng');
	$sheet->setCellValue('D'.$rowCount,'Giá');
	$sheet->setCellValue('E'.$rowCount,'Phương Thức Thanh Toán');
	$sheet->setCellValue('F'.$rowCount,'Khách Hàng');
	$sheet->setCellValue('G'.$rowCount,'Địa Chỉ');
    $sheet->setCellValue('H'.$rowCount,'SĐT');
	$sheet->setCellValue('I'.$rowCount,'Ngày Đặt Hàng');
	

	// $result = $mysqli->query("SELECT diem.name,toan,ly,hoa FROM diem INNER JOIN lop ON lop.id=diem.id_lop WHERE lop.name='10A1'");
	$result = $mysqli->query("SELECT hoadon.*,chitiethoadon.* FROM hoadon, chitiethoadon WHERE hoadon.mahd= chitiethoadon.mahd");
	
	while($row = mysqli_fetch_array($result)){
		$total = 0;
		$rowCount++;
		$total = $row['gia']*$row['soluong'];

		// echo $total; echo "<br>";
		// echo $row['soluong'];echo "<br>";
		

		if ($row['phuongthucthanhtoan']==1) {
			$pt='Qua bưu điện';
		}elseif ($row['phuongthucthanhtoan']==2) {
			$pt='Qua thẻ ATM';
		}elseif ($row['phuongthucthanhtoan']==3) {
			$pt='Thanh toán trực tiếp';
		}
		$sheet->setCellValue('A'.$rowCount,$row['mahd']);
		$sheet->setCellValue('B'.$rowCount,$row['Tensp']);
		$sheet->setCellValue('C'.$rowCount,$row['soluong']);
		$sheet->setCellValue('D'.$rowCount,$row['gia']);
		$sheet->setCellValue('E'.$rowCount,$pt);
		$sheet->setCellValue('F'.$rowCount,$row['hoten']);
		$sheet->setCellValue('G'.$rowCount,$row['diachi']);
		$sheet->setCellValue('H'.$rowCount,$row['dienthoai']);
		$sheet->setCellValue('I'.$rowCount,$row['ngaydathang']);
		

		
	}


	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'exportData.xlsx';
	$objWriter->save($filename);

	header('Content-Disposition: attachment; filename="' . $filename . '"');  
	header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');  
	header('Content-Length: ' . filesize($filename));  
	header('Content-Transfer-Encoding: binary');  
	header('Cache-Control: must-revalidate');  
	header('Pragma: no-cache');  
	readfile($filename);  
	return;

}


?>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Export data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="POST">
		<button name="btnExport" type="submit">Xuất file</button>
	</form>
</body>
</html> -->