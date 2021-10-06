		<div class="login" style="margin:0px auto">
			<h1>Đăng nhập thông tin</h1>
				<hr >
				<form method="POST" onsubmit="return =validate_login()">
					<fieldset class="form-group">
						<label for="exampleInputEmail1">User name<span style="color: red;" id="error_user">*</span></label>
						<input type="text" name="txtname" id="user_name" onblur="check_user();" class="form-control" style="border-radius: 10px;" placeholder="Tên đăng nhập">
					</fieldset>
					<fieldset class="form-group">
						<label for="exampleInputPassword1">Password <span style="color: red;" id="error_pass">*</span></label>
						<input type="password" name ="pass" id="password" onblur="check_pass();"style="border-radius: 10px;" class="form-control" >
					</fieldset>
					<button type="submit" name="submit" class="btn " style="font-weight: bold;">Đăng nhập</button>
				</form>
				<?php 
					if(isset($_POST['submit']))
					{
						$name = $_POST["txtname"];
						$pass = $_POST["pass"];
						$rows = mysqli_query($conn,"SELECT*FROM admin WHERE username='$name' AND pass='$pass'");
						$arr = mysqli_fetch_array($rows);
						$count = mysqli_num_rows($rows);
						if($count==1)
						{
							$_SESSION['img'] = $arr['img'];
							$_SESSION['name'] = $name;
							echo "<script>alert('đăng nhập thành công');</script>";
							header('location:index.php?page=home');
						}
						else
						{
							echo "<script>alert('đăng nhập mật khẩu sai');</script>";
						}
					}
				 ?>
		</div>
