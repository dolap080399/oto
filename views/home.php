
				<div id="product_hot">
					<div class="title_product">Sản phẩm hot</div>
					<?php 
					$sql = "SELECT id_product,name_product,price,img_product FROM product ORDER BY time_input DESC LIMIT 6";
					$query = mysqli_query($conn,$sql);
						while(	$array = mysqli_fetch_array($query))
						{
					?>
						
							<div class="card product" style="width: 18rem;height: 400px;">
								<a href="index.php?page=info_product&id=<?php echo $array['id_product']; ?>"><img class="card-img-top" src="img_oto/<?php echo $array['img_product']; ?>" alt="Card image cap">
								</a> 	
								<div class="card-body" >
									<h5 class="card-title"><?php echo $array['name_product'] ;?></h5>
									<p class="card-text">gia-sieu-xe- <?php echo  number_format($array['price'])."VNĐ"; ?>	</p>
								</div>
								<a href="index.php?page=order&id=<?php echo $array['id_product']; ?>"name = "buy" class="btn btn-danger" style="width: 100%">
								Thêm vào giỏ hàng
								</a>
							</div>
					
					<?php
						}
					 ?>
				</div>
				<div id="product_sale">
					<div class="title_product">Sản phẩm Sale</div>
					<?php 
						$sql = "SELECT product.id_product, product.name_product,product.price,product.img_product,sale.price_sale FROM sale,product WHERE product.id_product=sale.id_product LIMIT 6 ";
						$query = mysqli_query($conn,$sql);
						while ($array=mysqli_fetch_array($query)) {
							# code...
					?>
						<div class="card product" style="width: 18rem;height: 400px;">
							<a href="index.php?page=info_product&id=<?php echo $array['id_product']; ?>"><img class="card-img-top" src="img_oto/<?php echo $array['img_product']; ?>" alt="Card image cap">
								</a>
							<div class="card-body card ">
								<h5 class="card-title"><?php echo $array['name_product'] ;?></h5>
								<p class="card-text">gia-cũ- <strike style="color:  red;"><?php echo  number_format($array['price'])."VNĐ"; ?></strike></p>
								<p class="card-text">giá-sale- <?php  echo  number_format($array['price_sale'])."VNĐ"; ?></p>
							</div>
							<a href="index.php?page=order&id=<?php echo $array['id_product']; ?>"name="buy" class="btn btn-danger" style="width: 100%">
							Thêm vào giỏ hàng</a>
						</div>
					<?php
						}
					 ?>
	
				</div>			
			