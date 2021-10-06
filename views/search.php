<?php 
if(isset($_GET['keyword']))
{

	$keyword = $_GET['keyword'];
	//phân trang
		$sql = "SELECT count(id_product) as total from product WHERE name_product LIKE '%$keyword%'";
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
  	//Tìm kiếm sản phẩm
	$sql = "SELECT id_product,name_product,img_product,price FROM product WHERE name_product LIKE '%$keyword%' LIMIT $start,$limit  ";
	$query_search = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($query_search);
					
	if($row=="")
	{

		header('location:index.php?notice=null');

	}
	else {
								# code...

		while ($array = mysqli_fetch_array($query_search)) 
		{
						# code...

			?>	
			
				<div class="card product" style="width: 18rem;">
					<a href="index.php?page=info_product&id=<?php echo $array['id_product']; ?>">
					<img class="card-img-top" src="img_oto/<?php echo $array['img_product']; ?>" alt="Card image cap">
					</a>
					<div class="card-body">
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
		<div class="pagination">
				<?php 
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev

            if ($current_page > 1 && $total_page > 1){
                echo '<a style="color:white;font-weight: bold;padding:0 7px;" href="index.php?page=search&keyword='.$keyword.'&page_pt='.($current_page-1).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<span style="color:red;font-weight: bold;padding:0 7px;">'.$i.'</span> | ';
                }
                else{
                    echo '<a style="color:#F7EBEB;font-weight: bold;padding:0 7px;" href="index.php?page=search&keyword='.$keyword.'&page_pt='.$i.'">'.$i.'</a> | ';
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
                echo '<a style="color:white;font-weight: bold;padding:0 7px;" href="index.php?page=search&keyword='.$keyword.'&page_pt='.($current_page+1).'">Next</a>  ';
            }
           ?>
           </div>

		<?php
 	}



  }
  
?>