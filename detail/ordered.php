<?php 
	if (isset($_POST['order_ex'])) {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $note=$_POST['note'];
    if (isset($_SESSION['name_user'])) {
      $name_user = $_SESSION['name_user'];
     $sql = mysqli_query($conn,"SELECT *FROM user WHERE username = '$name_user'");
      $row=mysqli_fetch_array($sql);  
     $idnd = $row['id'];
      //echo $idnd;
      $sql="INSERT INTO hoa_don(id_user,name,phone,email,address,note) VALUES 
('$idnd','$name', '$phone', '$email', '$address', '$note')";
      $query = mysqli_query($conn,$sql);
        $sql = "SELECT id_hoadon FROM hoa_don ORDER BY id_hoadon DESC LIMIT 0,1";
        $query= mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query);
        $id_hoadon = $row['id_hoadon'];
        $price= $_SESSION['total_price'];
        $quantity = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart']))
         {
            foreach ($_SESSION['cart'] as $id => $pro) 
            {
              $qty = $pro['qty'];
              $price = $pro['price'];
              $quantity += $pro['qty'];
              $name_product = $pro['name_product'];
              $id_sp = $pro['id_product'];
              $sql_order = "INSERT INTO order_product(id_hoadon,id_product,price,quantity,stt,name_product)VALUES($id_hoadon,$id_sp,$price,$qty,1,'$name_product')";
              $quey_order = mysqli_query($conn,$sql_order);
            }
            unset($_SESSION['cart']);
         }
         ?>
         <script type="text/javascript">alert('Bạn đã đặt hàng thành công;')</script>
         <script type="text/javascript">window.location.href="index.php"</script>
<?php $sqlhd = mysqli_query($conn,"SELECT * FROM hoa_don ORDER by id_hoadon DESC  LIMIT 0,1"); 
while ($bien = mysqli_fetch_array($sqlhd))
        { ?>

    <center><a href="index.php?page=xuat_hd&id=<?php echo $bien['id_hoadon']; ?> "target="_blank"><button style="height: 30px;width: 200px; background: #5BF984;" type="button">Xem hoá đơn</button></a></center>

  <?php } 
       
    }
    else
    {
      echo " <script>alert('bạn phải đăng nhập tài khoản');</script>";
      header("Location:index.php?page=login");
    }


}

//       if(!$result)
//       {
//         echo "thất bại";
//       }
//       else
//       {
//          $mahd=mysqli_insert_id($sql);
//          echo $mahd;
//        $price= $_SESSION['total_price'];
//         $quantity = 0;
//         if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
//             foreach ($_SESSION['cart'] as $id => $pro) {
//               $qty = $pro['qty'];
//               $price = $pro['price'];
//               $quantity += $pro['qty'];
//               $name_product = $pro['name_product'];
//               $id_sp = $pro['id_product'];
//               $sql = mysqli_query($conn,"INSERT INTO order_product(id_hoadon,id_product,price,quantity,stt,name_product)VALUES(,$id_sp,$price,$qty,1,'$name_product')");
//       }
//   # code...
// }

    // }
    // else
    // {
    //   echo "string";
    // }
		// $price= $_SESSION['total_price'];
	 //      $quantity = 0;
	 //      if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	 //          foreach ($_SESSION['cart'] as $id => $pro) {
  //             $qty = $pro['qty'];
  //             $price = $pro['price'];
	 //            $quantity += $pro['qty'];
  //             $name_product = $pro['name_product'];
  //             $id_sp = $pro['id_product'];
  //             $sql = mysqli_query($conn,"INSERT INTO order_product(id_product,price,quantity,stt,name_product)VALUES($id_sp,$price,$qty,1,'$name_product')");
	 //         }
	 //      } 
	 //    //  print_r( $_SESSION['cart'][$id]);
		
		// $row=mysqli_query($conn,"INSERT INTO order_product(id_product,price,quantity,name,phone,email,address,note,name_product)VALUES($id_sp,$price,$quantity,'$name',$phone,'$email','$address','$note','$name_product')");
  //   if(!$row)
  //   {
  //     echo "That baij";
  //   }
		// //Xuất execel
  //   else
  //     {

		// $objExcel = new PHPExcel;
  // $objExcel->setActiveSheetIndex(0);
  // $sheet = $objExcel->getActiveSheet()->setTitle('Đơn hàng');

  //      $rowCount = 1;
  //      $sheet->setCellValue('A'.$rowCount,'STT');
  //       $sheet->setCellValue('B'.$rowCount,'Mã đơn hàng');
  //       $sheet->setCellValue('C'.$rowCount,'Tên khách hàng');
  //       $sheet->setCellValue('D'.$rowCount,'Số điện thoại');
  //       $sheet->setCellValue('E'.$rowCount,'Địa chỉ');
  //       $sheet->setCellValue('F'.$rowCount,'Số lượng');
  //       $sheet->setCellValue('G'.$rowCount,'Giá tiền');
  //       $sheet->setCellValue('H'.$rowCount,'Ghi chú');
  //       $stt=0;
       //  $query=mysqli_query($conn,"SELECT order_product.id_hoadon,order_product.price,order_product.quantity,order_product.name,order_product.phone,order_product.email,order_product.address,order_product.note ,order_product.date_buy,product.name_product,product.img_product FROM order_product.id_product=product.id_product");
       // while($result=mysqli_fetch_array($query)){
            // $rowCount++;
            // // $sheet->setCellValue('A'.$rowCount,$stt+=1);
            // $sheet->setCellValue('B'.$rowCount,$result['id_hoadon']);
            // $sheet->setCellValue('C'.$rowCount,$result['name']);
            // $sheet->setCellValue('D'.$rowCount,$result['phone']);
            // $sheet->setCellValue('E'.$rowCount,$result['address']);
            // $sheet->setCellValue('F'.$rowCount,$result['quantity']);
            // $sheet->setCellValue('G'.$rowCount,$result['price']);
            // $sheet->setCellValue('H'.$rowCount,$result['note']);
      // }
                                  

       // $result = $mysqli->query("SELECT diem.name,toan,ly,hoa FROM diem INNER JOIN lop ON lop.id=diem.id_lop WHERE lop.name='10A1'");
       // while($row = mysqli_fetch_array($result)){
       //        $rowCount++;
       //        $sheet->setCellValue('A'.$rowCount,$row['name']);
       //        $sheet->setCellValue('B'.$rowCount,$row['toan']);
       //        $sheet->setCellValue('C'.$rowCount,$row['ly']);
       //        $sheet->setCellValue('D'.$rowCount,$row['hoa']);
       // }

  //     $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
  // $filename = 'export.xlsx';
  // $objWriter->save($filename);

  // header('Content-Disposition: attachment; filename="' . $filename . '"');  
  // header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');  
  // header('Content-Length: ' . filesize($filename));  
  // header('Content-Transfer-Encoding: binary');  
  // header('Cache-Control: must-revalidate');  
  // header('Pragma: no-cache');  
  // readfile($filename);  
  // return;
    
  
	
 ?>
 
            