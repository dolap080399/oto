 <?php 
    $sql="SELECT *FROM product";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
 ?>
<div class="right__content">
    <div class="right__title">Sản phẩm</div>
    <div class="right__table">
        <div class="right__tableWrapper">
            <table>
                <?php if ($row>0)
                    {
                 ?>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá SP</th>
                        <th>Số lượng</th>
                        <th>Status</th>
                        <th>Thời gian</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php 
                    $stt=0;
                        while ($arr=mysqli_fetch_array($result)) {
                     ?>
                    <tr>
                        <td data-label="STT"><?php echo $stt+=1; ?></td>
                        <td data-label="Tên sản phẩm"><?php echo $arr['name_product'];?></td>
                        <td data-label="Hình ảnh"><img src="../img_oto/<?php echo $arr['img_product']; ?>" alt=""></td>
                        <td data-label="Giá SP"><?php echo $arr['price'] ;?></td>
                        <td data-label="Số lượng"><?php echo $arr['quantity']; ?></td>
                        <td data-label="Status"><?php echo $arr['stt_product']; ?></td>
                        <td data-label="Thời gian"><?php echo $arr['time_input']; ?></td>
                        <td data-label="Sửa" class="right__iconTable"><a href="index.php?page=update_product&id=<?php echo $arr['id_product']; ?>"><img src="assets/icon-edit.svg" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable"><a href="index.php?page=delete_product&id=<?php echo $arr['id_product']; ?>"><img src="assets/icon-trash-black.svg" alt=""></a></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            <?php } 
            else
                header("Location:index.php?page=404");?>
            </table>
        </div>
    </div>
</div>