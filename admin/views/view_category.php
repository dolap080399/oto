<?php 
    $sql = mysqli_query($conn,"SELECT *FROM thuong_hieu")
 ?>
<div class="right__content">
    <div class="right__title">Thương hiệu</div>
    <div class="right__table">
        <div class="right__tableWrapper">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên thương hiệu</th>
                        <th>Trạng thái </th>
                    </tr>
                </thead>
        
                <tbody>
                    <?php 
                    $stt=1;
                        while ($result= mysqli_fetch_array($sql)) {
                            # code...
                        
                     ?>
                    <tr>
                        <td data-label="STT"><?php echo $stt++; ?></td>
                        <td data-label="Tiêu đề"><?php echo $result['name_trademark']; ?></td>
                        <td data-label="Mô tả"><?php echo $result['stt']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>