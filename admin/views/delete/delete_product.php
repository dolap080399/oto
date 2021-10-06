<?php 
	if(isset($_GET['id']))
	{
		$id = (int) $_GET['id'];
		$sql = mysqli_query($conn,"DELETE FROM product WHERE id_product=$id");		
		if(!$sql)
		{
			echo "<script>alert('K có thông tin sản phẩm cần xoá');</script>";
		}
		else
		{
			echo "<script>alert('Xoá sản phẩm thành công');</script>";
			echo "<script>window.location.href='index.php?page=view_product';</script>";
		}
	}
	else
	{
		header('Location:index.php?page=404');
	}
 ?>