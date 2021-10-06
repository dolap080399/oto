<?php 
    $sql = mysqli_query($conn,"SELECT *FROM user");
    $row = mysqli_num_rows($sql);
 ?>
<div class="right__content">
    <div class="right__title">Thông tin khách hàng</div>
    
    <div class="right__table">
        <div class="right__tableWrapper">
            <table>
                <thead>
                    <?php if ($row>0)
                    {
                        ?>
                        
                    <tr>
                        <th>STT</th>
                        <th style="text-align: center;">Hình ảnh</th>
                        <th>Tên</th>
                        <th>Phone</th>
                        <th>Địa chỉ</th>
                        <th>Xoá</th>
                    </tr>
                <?php } ?>
                </thead>
        
                <tbody>

                    <?php 
                    $stt = 0;
                    while ($arr = mysqli_fetch_array($sql)) {
                        # code...
                     ?>
                    <tr>
                        <td data-label="STT"><?php echo $stt+=1; ?></td>
                        <td data-label="Hình ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;" src="../img/user/<?php echo $arr['img']; ?>" alt=""></td>
                        <td data-label="Tên"><?php echo $arr['name']; ?></td>
                        <td data-label="Phone"><?php echo $arr['phone']; ?></td>
                        <td data-label="Địa chỉ"><?php echo $arr['address']; ?></td>
                        <td data-label="Xoá" class="right__iconTable"><a href="index.php?page=delete_user&id=<?php echo $arr['id']; ?>"><img src="assets/icon-trash-black.svg" alt=""></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>