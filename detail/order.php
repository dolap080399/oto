<?php 
if (isset($_GET['id'])) 
{
		# code...
	$id = (int)$_GET['id'];
	$sql = "SELECT *FROM product WHERE id_product=$id";
	$query = mysqli_query($conn,$sql);
	$result = array();
	$result = mysqli_fetch_array($query);
	if ($result)
	{
		if (!isset($_SESSION['cart']) && empty($_SESSION['cart']))
		{
			$_SESSION['cart'][$id] = $result;
			$_SESSION['cart'][$id]['qty'] = 1;
			
		}
		else
		{
			if (array_key_exists($id, $_SESSION['cart'])) 
			{
				$_SESSION['cart'][$id]['qty'] += 1;
			}
			else
			{
				$_SESSION['cart'][$id] = $result;
				$_SESSION['cart'][$id]['qty'] = 1;
			}
		}
		$_SESSION['noti_cart'] = 1;
		echo $_SESSION['cart'][$id]['qty'];
	}
	else
	{

	}
}
header("Location:index.php");
?>