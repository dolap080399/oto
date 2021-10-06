<div class="right__content">
    <div class="right__title">Thêm admin</div>
    <div class="right__formWrapper">
        <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate_admin()">
            <div class="right__inputWrapper">
                <label for="name">Tên admin<span style="color: red;" id="error_name">*</span></label>
                <input type="text" id="name" onblur="check_name();" placeholder="Tên admin" name="name">
            </div>
            <div class="right__inputWrapper">
                <label for="email">Phone<span style="color: red;" id="error_phone">*</span></label>
                <input type="number" id="phone" onblur="check_phone();" placeholder="Số điện thoại" name="phone">
            </div>
            <div class="right__inputWrapper">
                <label for="password">Địa chỉ<span style="color: red;" id="error_address">*</span></label>
                <input type="text" id="address" onblur="check_address();" placeholder="Mật khẩu" name="address">
            </div> 
            <div class="right__inputWrapper">
                <label for="password">Ngày sinh</label>
                <input type="date" name="date">
            </div> 
            <div class="right__inputWrapper">
                <label for="password">Username <span style="color: red;" id="error_user">*</span></label>
                <input type="text" id="user_name" onblur="check_user();" placeholder="Tên đăng nhập" name="username">
            </div> 
            <div class="right__inputWrapper">
                <label for="password">Mật khẩu <span style="color: red;" id="error_pass">*</span></label>
                <input type="password"  id="password" onblur="check_pass();" placeholder="Mật khẩu" name = "pass">
            </div>
            <div class="right__inputWrapper">
                <label for="image">Hình ảnh<span style="color: red;" id="error_file">*</span></label>
                <input type="file" name="img" id="file" onchange ="check_file();">
            </div>
            <button class="btn" type="submit" name = "submit">Thêm</button>
        </form>
    </div>
</div>
<?php 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    //$img = $_POST['img'];
    $upload_image="../img/admin/";
        $file_tmp= isset($_FILES['img']['tmp_name']) ?$_FILES['img']['tmp_name'] :"";
       // print_r($file_tmp);
        $file_name=isset($_FILES['img']['name']) ?$_FILES['img']['name'] :"";
        $file_type=isset($_FILES['img']['type']) ?$_FILES['img']['type'] :"";
        $file_size=isset($_FILES['img']['size']) ?$_FILES['img']['size'] :"";
        $file_error=isset($_FILES['img']['error']) ?$_FILES['img']['error'] :"";
        $file__name__=$file_name;
        move_uploaded_file($file_tmp,$upload_image.$file__name__);

    $date = $_POST['date'];
    $username =trim( $_POST['username']);
    $pass = trim($_POST['pass']);
   $sql = "INSERT INTO admin(name,phone,address,date, username,pass,stt,img)VALUES('$name','$phone','$address','$date','$username','$pass',0,'$file__name__')";
   $result=mysqli_query($conn,$sql);
   if(!$result)
   {
    echo "Thất bại";
   }
   else
   {
   echo"<script>alert('Thêm thông tin thành công');</script>";
   }

}
else
{
    //header("Location:views/404.php");
}
 ?>
