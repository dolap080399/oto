<?php 
	$sql = "SELECT count(product.id_product) as total FROM sale,product WHERE product.id_product=sale.id_product";
				$query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($query);
				$total_records = $row['total'];
	//Số record hiện trên 1 trang
	$current_page = isset($_GET['page_pt']) ? $_GET['page_pt'] : 1;
  	$limit = 6;
  	//tổng số trang hiển thị
  	$total_page = ceil($total_records/$limit);
  	//kiểm tra đk 
			    if($current_page>$total_page)
			    {
			    	$current_page=$total_page;
			    }
			    else if ($current_page < 1){
			    $current_page = 1;
				}
  	//tìm sản phẩm đầu tiên cho trang
  	$start = ($current_page - 1) *$limit;
 ?>
					<div class="title_product">Sản phẩm Sale</div>
					<?php 
						$sql = "SELECT product.id_product, product.name_product,product.price,product.img_product,sale.price_sale FROM sale,product WHERE product.id_product=sale.id_product LIMIT $start,$limit ";
						$query = mysqli_query($conn,$sql);
						while ($array=mysqli_fetch_array($query)) {
							# code...
					?>
					
						<div class="card product" style="width: 18rem;height: 400px;">
							<a href="index.php?page=info_product&id=<?php echo $array['id_product']; ?>">
							<img class="card-img-top" src="img_oto/<?php echo $array['img_product']; ?>" alt="Card image cap">
						</a>
							<div class="card-body card ">
								<h5 class="card-title"><?php echo $array['name_product'] ;?></h5>
								<p class="card-text">gia-cũ- <strike style="color:  red;"><?php echo  number_format($array['price'])."VNĐ"; ?></strike></p>
								<p class="card-text">giá-sale- <?php  echo  number_format($array['price'])."VNĐ"; ?></p>
							</div>
							<a href="index.php?page=order&id=<?php echo $array['id_product']; ?>"name = "buy" class="btn btn-danger" style="width: 100%">
								Thêm vào giỏ hàng
								</a>
						</div>
					<?php
						}
					 ?>

				<div class="pagination">
				<?php 
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
				if ($total_page>1) {
				
            if ($current_page > 1 && $total_page > 1){
                echo '<a style="color:black;font-weight: bold;text-align: center; background:white;padding:0 10px;margin-left:10px;" href="index.php?page=product_sale&page_pt='.($current_page-1).'">Prev</a> ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span style="color:red;font-weight: bold;text-align: center; background:white;padding:0 10px;margin-left:10px;">'.$i.'</span> ';
                }
                else{
                    echo '<a style="color:black;font-weight: bold;text-align: center; background:white;padding:0 10px;margin-left:10px;" href="index.php?page=product_sale&page_pt='.$i.'">'.$i.'</a> ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a style="color:black;font-weight: bold;text-align: center; background:white;padding:0 10px;margin-left:10px;" href="index.php?page=product_sale&page_pt='.($current_page+1).'">Next</a>  ';
            }
        }
           ?>
           </div>
			
