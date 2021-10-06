<div id="menu">
	<div class="container">
		<div class="row">
			<div class="col-md-3 ">
				<a href="index.php"><img src="img/Untitled-3.png" alt=""></a>
			</div>
			<div class="col-md-5" >
				<form action=""method="GET">
					<input type="hidden" name="page" value="search">
					<input class="search" type="text" name="keyword" value="" placeholder="Search...">
					<span><button type="submit">Search</button></span>
				</form>
			</div>
			<div class="col-md-2">
				<a href="tel:+84338080399">
					<div class="hotline">
						<i class="fas fa-phone"></i>
						<span class="hotline-number">0338.080.399</span>
					</div>
				</a>

			</div>
			<div class="col-md-1 login">

				<ul>
					<?php 
						if (!isset($_SESSION['name_user'])) { ?>
							<li><a href="index.php?page=login">Đăng nhập</a></li>
						<?php } 
						else {?>

					<li >
						<a onclick="info_user()"style="cursor: pointer;">
						<?php echo $_SESSION['name_user']; ?>
						</a>
						<ul>
							<li ><a href="index.php?page=destroy" style="color: white" id="logout"></a></li>
						</ul>

					</li>
				<?php } ?>
				</ul>
			</div>
		<div class="col-md-1 cart"><a href="index.php?page=detail_order"><i class="fas fa-cart-plus text-white"></i>
		<sup>
			 <?php  
                              $quantity = 0;
                              if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                  foreach ($_SESSION['cart'] as $id => $pro) {
                                    $quantity += $pro['qty'];
                                 }
                              }
                              echo $quantity;
                           ?>
		</sup></a>
		</div>
	</div>
</div>
</div>
</div>
