<div class="container" id="info_product" style="background: white; border-radius: 5px;">
	<?php 
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "SELECT *FROM product WHERE id_product='$id'";
		$query = mysqli_query($conn,$sql);
		$row = mysqli_num_rows($query);
		if($row==1)
		{
		while($arr = mysqli_fetch_array($query))
		{
		?>
		<div class="image">
		<img class="card-img-top" src="img_oto/<?php echo $arr['img_product']; ?>" alt="Card image cap">
		</div>
		<div class="info">
		<h3 style="text-align: center;"><?php echo $arr['name_product']; ?></h3>
		<span style="text-align: center;"><?php 
			if($arr['in_design']==1 || $arr['in_design']==2)
				echo"(Xe gia đình)";
			else if($arr['in_design']==0 || $arr['in_design']==2)
				echo"(Xe thể thao)";
		 ?></span>
		<hr>
		<h5 class="card-text"><?php
		$sql_sale = "SELECT sale.price_sale FROM sale,product WHERE product.id_product=sale.id_product";
		$query_sale = mysqli_query($conn,$sql_sale);
		?>
		<strike style="color:  red;">
		<?php
		if($arr_sale=mysqli_fetch_array($query_sale))
		{
			echo $arr_sale['price_sale'];
		}

		?></strike> gia-sieu-xe- <?php echo  number_format($arr['price'])."VNĐ"; ?>	</h5>
		<span>Thông tin xe</span>
		<p>
			<?php echo $arr['info']; ?>
		</p>
		<button type="button" class="btn" style="background:#BF6060; " ><i class="fas fa-cart-plus fa-1x"></i>Giỏ hàng</button>
		<button type="button" class="btn" style="background: #BE1414;"><i class="fas fa-bicycle"></i> Mua hàng</button>
		</div>
		<?php
		}
	}
	else
	{
		echo "<h1>Không có thông tin sản phẩm cần xem</h1>";
	}
	}
	 ?>
	
	
</div>