<div class="right__content">
    <div class="right__title">Thêm sản phẩm</div>
    <div class="right__formWrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="right__inputWrapper">
                <label for="title">Tên sản phẩm</label>
                <input type="text" name="name" value="" placeholder="Tiêu đề">
            </div>
            <div class="right__inputWrapper">
                <label for="p_category">Thương hiệu</label>
                <select name="trademark">
                    <option disabled selected>Chọn thương hiệu</option>
                    <option value="5">Toyota</option>
                    <option value="6">Roll Royce</option>
                    <option value="7">Mercedes</option>
                    <option value="8">BMW</option>
                    <option value="9">Audi</option>
                    <option value="10">Lamborghini</option>
                    <option value="11">Vinfast</option>
                    <option value="12">Mazda</option>
                </select>
            </div>
            <div class="right__inputWrapper">
                <label for="p_category">Thể loại</label>
                <select name="design">
                    <option disabled selected>Thể loại</option>
                    <option value="0">Thể thao</option>
                    <option value="1">Gia đình</option>
                    <option value="2">Thể thao And Gia đình</option>
                </select>
            </div>

            <div class="right__inputWrapper" >
                <label>Số lượng</label>
                <input type="number" id="quantity" name="quantity" min="1">
            </div>
            <div class="right__inputWrapper">
                <label for="image">Hình ảnh</label>
                <input type="file" name="img" value="">
            </div>
            <div class="right__inputWrapper">
                <label for="title">Giá sản phẩm</label>
                <input type="text" placeholder="Giá sản phẩm" name="price" vlaue="">
            </div>
            <div class="right__inputWrapper">
                <label for="desc">Mô tả</label>
                <textarea name="info" id="" cols="30" rows="10" placeholder="Mô tả"></textarea>
            </div>
            <button class="btn" type="submit" name="submit">Thêm</button>
        </form>
    </div>
</div>
<?php 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $trademark = $_POST['trademark'];
    $design = $_POST['design'];
    //$img = $_POST['img'];
    $upload_image="../img_oto/";
        $file_tmp= isset($_FILES['img']['tmp_name']) ?$_FILES['img']['tmp_name'] :"";
        print_r($file_tmp);
        $file_name=isset($_FILES['img']['name']) ?$_FILES['img']['name'] :"";
        $file_type=isset($_FILES['img']['type']) ?$_FILES['img']['type'] :"";
        $file_size=isset($_FILES['img']['size']) ?$_FILES['img']['size'] :"";
        $file_error=isset($_FILES['img']['error']) ?$_FILES['img']['error'] :"";
        $file__name__=$file_name;
        move_uploaded_file($file_tmp,$upload_image.$file__name__);

    $info = $_POST['info'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
   $sql = "INSERT INTO product(id_trademark,name_product,info,quantity, price,in_design,img_product)VALUES( $trademark,'$name','$info','$quantity','$price','$design','$file__name__')";
   $result=mysqli_query($conn,$sql);
   if (!$result) {
       # code...
    echo"<script>alert('Thất bại');</script>";
   }
   else
   {
    echo"<script>alert('Thêm thông tin sản phẩm thành công');</script>";
   }
}
else
{
    //header("Location:views/404.php");
}
    
 ?>