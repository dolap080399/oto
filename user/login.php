		<h1 style="color:white">Đăng nhập thông tin</h1>
		<hr >
		<form method="POST" onsubmit="return =validate_login();">
			<fieldset class="form-group">
				<label for="exampleInputEmail1"style="color:white">User name <span style="color: red;" id="error_user">*</span></label>
				<input type="text" name="txtname" class="form-control" placeholder="Tên đăng nhập"id="user_name" onblur="check_user();">
			</fieldset>
			<fieldset class="form-group">
				<label for="exampleInputPassword1"style="color:white">Password <span style="color: red;" id="error_pass">*</span></label>
				<input type="password" name ="pass" class="form-control" id="password" onblur="check_pass();" >
			</fieldset>
			<button type="submit" name="submit" class="btn btn-primary" style="font-weight: bold;">Đăng nhập</button>
			<span style="color:white">Bạn chưa có tài khoản <a href="index.php?page=registration" style="color: red">Đăng ký</a></span>
		</form>
		<?php 
			if(isset($_POST['submit']))
			{
				$name = $_POST["txtname"];
				$pass = $_POST["pass"];
				$rows = mysqli_query($conn,"SELECT*FROM user WHERE username='$name' AND pass='$pass'");
				$count = mysqli_num_rows($rows);
				if($count==1)
				{
					$_SESSION['name_user'] = $name;
					echo "<script>alert('đăng nhập thành công');</script>";
					header('location:index.php');
				}
				else
				{
					echo "<script>alert('đăng nhập mật khẩu sai');</script>";
				}
			}
		 ?>
