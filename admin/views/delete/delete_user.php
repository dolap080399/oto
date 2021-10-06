<?php 
	if(isset($_GET['id']))
	{
		$id = (int) $_GET['id'];
		$sql = mysqli_query($conn,"DELETE FROM user WHERE id=$id");		
		if(!$sql)
		{
			echo "<script>alert('K có thông tin người dùng cần xoá');</script>";
		}
		else
		{
			echo "<script>alert('Xoá thành công');</script>";
			echo "<script>window.location.href='index.php?page=view_customers';</script>";
			
		}
	}
	else
	{
		header('Location:index.php?page=404');
	}
 ?>