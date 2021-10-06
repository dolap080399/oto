<?php 
	include_once 'Myconfig/config.php';
	session_start();
	if (isset($_GET['page'])) 
	 	{
	      $page = $_GET['page'];
	   	}
	  else
	  	{
	      $page = 'home';
	   	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auto Việt</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/desktop.css">
	<link rel="stylesheet" href="bootstrap/font_awesome/css/all.min.css">
	<script type="text/javascript" href="bootstrap/font_awesome/js/all.js"></script>
	<script type="text/javascript" src="bootstrap/jquery/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
</head>
<body style=" background: #878787;">
	<div id="boss">`
		<?php 
			include_once'layout/header.php'; 
			if($page=='login' || $page=='registration'||$page=='destroy')
			{
				?>
				<div class="col-md-6 co-md-push" style=" margin: 0px auto;">
				<?php
				include_once'user/'.$page.'.php';
				?>
				</div>
			<?php
			}
			else if($page=='info_product' || $page=='order' || $page=='detail_order' || $page=='update_cart' || $page=='delete_cart' || $page=='ordered' || $page == 'xuat_hd')
			{
				include_once'detail/'.$page.'.php';
			}
			else
			{
			include_once'layout/banner.php';
		?>
		
		<div id="main" class="container-fluid">
			<?php 
				include_once'layout/list.php';
			 ?>
		<div id="product">
			<?php 
				
				 if (file_exists('views/'.$page.'.php')) 
					 {
	                     include_once 'views/'.$page.'.php';
	                 }
                  else
	                {
	                    echo "<h3 style='color: red;'>ERROR 404 trang không tồn tại!</h3>";
	                }
                  if(isset($_GET['notice'])&&$_GET['notice']=='null')
					{
						echo "<script>alert('Không có sản phẩm cần tìm kiếm');</script>";
						
					}
			?>
		</div>
		</div>
		<?php 
		}
		include_once 'layout/footer.php';
		?>
	</div>
	<script src="bootstrap/js/main.js"></script>
</body>
</html>