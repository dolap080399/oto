
<div class="right__content">
    <div class="right__title">Chèn thương hiệu</div>
    <div class="right__formWrapper">
        <form action="" method="post">
            <div class="right__inputWrapper">
                <label for="title">Tên thương hiệu</label>
                <input type="text" placeholder="Thương hiệu" name="name">
            </div>
            <div class="right__inputWrapper">
                <label for="title">Trạng thái</label>
                <input type="number" value="1" name="tt" disabled>
            </div>
            <button class="btn" type="submit" name="submit">Chèn</button>
        </form>
    </div>
</div>
<?php 
    if (isset($_POST['submit'])) {
    $name = $_POST['name']; 
    $stt = $_POST['tt'];
   $sql = "INSERT INTO thuong_hieu(name_trademark,stt)VALUES( '$name','$stt')";
   $result=mysqli_query($conn,$sql);
}
else
{
    // header("Location:index.php/views/404.php");
}
 ?>