<?php 
	$conn = mysqli_connect('localhost','root','','oto') or die("Can't connect database!");
	if($conn)
	{
		mysqli_set_charset($conn, "utf8");
	}
	else
	{
		echo "Can't connect database!";
	}

 ?>