<?php  
	if (isset($_POST['submit_cart'])) {
		foreach ($_SESSION['cart'] as $id => $pro) {
		 $qty_id = $pro['id_product'];
		
		$qty = $_POST['$qty_id'];
		echo $qty;
			//print_r($pro);
	}
	}
?>