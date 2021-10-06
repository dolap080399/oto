<?php 
	if (isset($_GET['id'])) {
		$id= $_GET['id'];
		$sql = mysqli_query($conn,"SELECT *FROM product WHERE id_product='$id'");
		$result  = mysqli_fetch_array($sql);
		if(isset($_POST['update']))
		{
			$name = $_POST['name'];
			//$img = $_POST['img'];
			 $upload_image="../img_oto/";
        $file_tmp= isset($_FILES['img']['tmp_name']) ?$_FILES['img']['tmp_name'] :"";
        $file_name=isset($_FILES['img']['name']) ?$_FILES['img']['name'] :"";
        $file_type=isset($_FILES['img']['type']) ?$_FILES['img']['type'] :"";
        $file_size=isset($_FILES['img']['size']) ?$_FILES['img']['size'] :"";
        $file_error=isset($_FILES['img']['error']) ?$_FILES['img']['error'] :"";
        $file__name__=$file_name;
        move_uploaded_file($file_tmp,$upload_image.$file__name__);
			$time = $_POST['time_input'];
			$price = $_POST['price'];
			$quantity = $_POST['quantity'];
			$stt = $_POST['stt'];
			$design = $_POST['design'];
			$row = mysqli_query($conn,"UPDATE product SET name_product='$name',stt_product='$stt',quantity='$quantity',price='$price' ,time_input='$time',in_design='$design',img_product='$file__name__' WHERE id_product='$id'");
								if(!$row)
							{
								echo "<script>alert('thất bại');</script>";
							}
							else
							{
								echo "<script>alert('update sản phẩm thành công');</script>";
								//header('location:index.php?page=view_product');
								
							}
		}

	}
 ?>
<div class="right__content">
    <div class="right__title">Sửa thông tin sản phẩm</div>
    
    <div class="right__table">
        <div class="right__tableWrapper">
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="name"
                  value="<?php echo $result['name_product'] ; ?>">
                </div>
            </div>
                <div class="form-group col-md-4">
				    <label for="exampleFormControlFile1">Hình ảnh</label>
				    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
				 </div>
				  <div class="form-group col-md-4"> 
				  	<label>Thời gian nhập</label> 
					<input type="date" name="time_input">
				  </div>           
              <div class="form-group col-md-4">
                <label for="inputAddress">Giá sản phẩm</label>
                <input type="number"value="<?php echo $result['price']; ?>" name="price" class="form-control" id="inputAddress" placeholder="price">
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress2">Số lượng</label>
                <input type="number"name="quantity"class="form-control" id="inputAddress2" value="<?php echo $result['quantity']; ?>" placeholder="quantity">
              </div>
              
                <div class="form-group col-md-4">
                 <label class="mr-sm-2" for="inlineFormCustomSelect">Trạng thái</label>
			      <select name ="stt" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
			        <option value="1">1</option>
			        <option value="0">0</option>
			      </select>
                </div>
                <div class="form-group col-md-4">
                 <label class="mr-sm-2" for="inlineFormCustomSelect">Thể loại</label>
			      <select name ="design" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
			        <option value="0">Thê thao</option>
			        <option value="1">Gia đình</option>
			        <option value="2">Gia đình And Thể thao</option>
			      </select>
                </div>
              <button type="submit" name="update"class="btn btn-primary|secondary|success|danger|warning|info|light|dark btn-sm|btn-lg">Sửa</button>
            </form>
        </div>
    </div>
</div>
