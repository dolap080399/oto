<?php 
    $sql="SELECT *FROM admin";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_num_rows($result);
 ?>
<div class="right__content">
    <div class="right__title">Admin</div>
    <div class="right__table">
        <div class="right__tableWrapper">
            <table>
                <?php if ($row>0)
                    {
                 ?>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Phone</th>
                        <th>Ngày sinh</th>
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
                        <td data-label="Tên"><?php echo $arr['name'];?></td>
                        <td data-label="Hình ảnh" style="text-align: center;"><img style="width: 50px;height: 50px; border-radius: 100%; object-fit: cover;" src="../img/admin/<?php echo $arr['img']; ?>" alt=""></td>
                        <td data-label="Email"><?php echo $arr['phone'];?></td>
                        <td data-label="Email"><?php echo $arr['date'];?></td>
                        <td data-label="Email"><?php echo $arr['time_input'];?></td>
                        <td data-label="Sửa" class="right__iconTable"><a href="edit_admin.html"><img src="assets/icon-edit.svg" alt=""></a></td>
                        <td data-label="Xoá" class="right__iconTable"><a href=""><img src="assets/icon-trash-black.svg" alt=""></a></td>
                    </tr>
                     <?php  } ?>
                </tbody>
                  <?php } 
            else
                header("Location:index.php?page=404");?>
            </table>
            </table>
        </div>
    </div>
</div>