<?php 
	if(isset($_GET['id']))
	{
		$id = (int) $_GET['id'];
		$sql = mysqli_query($conn,"DELETE FROM order_product WHERE id_hoadon=$id");		
		if(!$sql)
		{
			echo "<script>alert('K có thông tin sản phẩm cần xoá');</script>";
		}
		else
		{
			$sql = mysqli_query($conn,"DELETE FROM hoa_don WHERE id_hoadon=$id");
			echo "<script>alert('Xoá đơn hàng thành công');</script>";
			echo "<script>window.location.href='index.php?page=view_orders';</script>";
		}
	}
	
 ?>