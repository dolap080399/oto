<?php 
    // $sql = "SELECT hoa_don.id_hoadon,hoa_don.name,hoa_don.phone,hoa_don.address,order_product.name_product,order_product.date_buy,order_product.price,order_product.quantity,order_product.stt FROM hoa_don,order_product WHERE hoa_don.id_hoadon= order_product.id_hoadon";
    // $query = mysqli_query($conn,$sql);
    // while ( $arr = mysqli_fetch_array($query)) {
    //     # code...
    //      print_r($arr);
    // }
    $sql = "SELECT *FROM hoa_don";
    $query = mysqli_query($conn,$sql);
    $stt = 1;
   
 ?>
<div class="right__content">
    <div class="right__title">Đơn hàng</div>
    <div style="float: right;"><a href="../export-an-excel/export.php"><button type="button" class="btn btn-success">Thống kê đơn hàng</button></a></div>
    <div class="right__table">
        <div class="right__tableWrapper">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hoá đơn</th>
                         <th>Tên khách hàng</th>  
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Giá tiền</th>
                        <th>Trạng thái</th>
                        <th>Xoá</th>
                        <th>In hoá đơn</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php 
                        while ($arr = mysqli_fetch_array($query)) {
                            # code...
                            $id_hoadon=$arr['id_hoadon'];
                          
                            //Tìm tổng số sản phẩm trong 1 hoá đơn 
                            $query_count=mysqli_query($conn,"SELECT count(ma_hoadon) as total from order_product WHERE id_hoadon=$id_hoadon");
                            $row = mysqli_fetch_assoc($query_count);
                            $count = $row['total'];
                            //truy suất các sản phẩm trogn 1 hoá đơn
                            $tong=0;
                            $sql_1 = "SELECT *FROM order_product WHERE id_hoadon=$id_hoadon";
                            $query_1 = mysqli_query($conn,$sql_1);
                            while ($row=mysqli_fetch_array($query_1)) {
                                # code...
                                $thanhtien=$row['price']*$row['quantity'];
                                 $tong+=$thanhtien;
                            }

                     
                     ?>
                    <tr>
                        <td data-label="STT" rowspan="<?php// echo $count; ?>"><?php echo $stt++ ;?></td>
                        <td data-label="Số hoá đơn" rowspan="<?php// echo $count; ?>"><?php echo $arr['id_hoadon']; ?></td>
                        <td data-label="Tên khách hàng" rowspan="<?php //echo $count; ?>"><?php echo $arr['name']; ?></td>

                        <td data-label="Số điên thoại" rowspan="<?php //echo $count; ?>"><?php echo $arr['phone']; ?></td>
                        <td data-label="Địa chỉ"rowspan><?php echo $arr['address']; ?></td>
                       
                       
                        <td data-label="Tổng"><?php echo  number_format($tong)."VNĐ"; ?></td>
                        <td data-label="Trạng thái"><?php echo "Đang chờ xử lý"; ?></td>
                        <td data-label="Xoá" class="right__iconTable"><a href="index.php?page=delete_order&id=<?php echo $id_hoadon; ?>"><img src="assets/icon-trash-black.svg" alt=""></a></td>
                        <td data-label="In"><a href="index.php?page=xuat_hd&id=<?php echo $arr['id_hoadon'];  ?>"style="color:#231414;font-size: 22px;"><i class="fas fa-print"></i></a></td>
                        <!-- <td data-label="Thanh toán" class="right__confirm">
                            <a href="" class="right__iconTable"><img src="assets/icon-check.svg" alt=""></a>
                            <a href="" class="right__iconTable"><img src="assets/icon-x.svg" alt=""></a>
                        </td> -->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>