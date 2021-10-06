<h1 style="color:white">Đăng ký thông tin</h1>
		<hr >
		<form method="post" enctype="multipart/form-data" onsubmit="return validate_member()">
			<fieldset class="form-group">
				<label style="color:white">Họ tên<span style="color: red;" id="error_name">*</span></label>
				<input type="text" name="name" id="name" onblur="check_name();" class="form-control" placeholder="Họ tên">
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Tên đăng nhập<span style="color: red;" id="error_user">*</span></label>
				<input type="text" name="user" id="user_name" onblur="check_user();" class="form-control" placeholder="Tên đăng nhập">
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Địa chỉ<span style="color: red;" id="error_address">*</span></label>
				<input type="text" name="address" id="address" onblur="check_address();" class="form-control" placeholder="Địa chỉ">
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Số điện thoại<span style="color: red;" id="error_phone">*</span></label>
				<input type="number" name= "phone" id="phone" onblur="check_phone();" class="form-control" placeholder="Số điện thoại">
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Hình ảnh<span style="color: red;" id="error_file">*</span></label>
				<input type="file" name= "img" id="file" onchange ="check_file();" class="form-control" >
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Mật khẩu<span style="color: red;" id="error_pass">*</span></label>
				<input type="password" name="password" id="password" onblur="check_pass();" class="form-control" placeholder="Mật khẩu">
			</fieldset>
			<fieldset class="form-group">
				<label style="color:white">Nhập lại mật khẩu<span style="color: red;" id="error_continue_pass">*</span></label>
				<input type="password" name ="retype_pass" id="continue_pass" onblur="check_continue_pass();" class="form-control" placeholder="Nhập lại mật khẩu">
			</fieldset>

			<button type="submit" name="registration" class="btn btn-primary" style="font-weight: bold;">Đăng ký</button>
			<span style="color:white">Bạn đã có tài khoản ?<a href="index.php?page=login" style="color: red">Đăng nhập</a></span>
		</form>
		<?php 
		if(isset($_POST['registration']))
		{
			$name = $_POST['name'];
			$user = $_POST['user'];
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$pass = $_POST['password'];
			$retype_pass = $_POST['retype_pass'];
			//upload ảnh
			 $upload_image="img/user/";
        $file_tmp= isset($_FILES['img']['tmp_name']) ?$_FILES['img']['tmp_name'] :"";
        $file_name=isset($_FILES['img']['name']) ?$_FILES['img']['name'] :"";
        $file_type=isset($_FILES['img']['type']) ?$_FILES['img']['type'] :"";
        $file_size=isset($_FILES['img']['size']) ?$_FILES['img']['size'] :"";
        $file_error=isset($_FILES['img']['error']) ?$_FILES['img']['error'] :"";
        $file__name__=$file_name;
        move_uploaded_file($file_tmp,$upload_image.$file__name__);
			if ($pass==$retype_pass) {
				$sql = "INSERT INTO user (name,phone,username,pass,address,img) VALUES ('$name','$phone','$user','$pass','$address','$file__name__')";
				$query = mysqli_query($conn,$sql);
				if(!$query)
				{
					echo "<script>alert('Số điện thoại này đã tồn tại!');</script>";
				}
				else
				{
					echo "<script>alert('đăng ký thành công');</script>";

				}
			}
			else
			{
				echo "<script>alert('Mật khẩu nhập lại chưa trùng');</script>";
			}
		}
	 ?>