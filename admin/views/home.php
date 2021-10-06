<div class="right__content">
<div class="right__title">Home</div>
<div class="right__cards">
    <a class="right__card" href="?page=view_product">
        <div class="right__cardTitle">Sản Phẩm</div>
        <div class="right__cardNumber">
            <?php 
              $query = mysqli_query($conn," SELECT count(id_product) as total from product") ;
              $row = mysqli_fetch_assoc($query);
                $total_records = $row['total'];
                echo $total_records; 
             ?>
        </div>
        <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
    </a>
    <a class="right__card" href="?page=view_customers">
        <div class="right__cardTitle">Khách Hàng</div>
        <div class="right__cardNumber"><?php 
            $query = mysqli_query($conn," SELECT count(id) as total from user") ;
              $row = mysqli_fetch_assoc($query);
                $total_records = $row['total'];
                echo $total_records;
         ?></div>
        <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
    </a>
    <a class="right__card" href="?page=view_orders">
        <div class="right__cardTitle">Đơn Hàng</div>
        <div class="right__cardNumber"><?php 
            $query = mysqli_query($conn," SELECT count(id_hoadon) as total from hoa_don") ;
              $row = mysqli_fetch_assoc($query);
                $total_records = $row['total'];
                echo $total_records;
         ?></div>
        <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
    </a>
</div>
<!-- <div class="right__table">
    <p class="right__tableTitle">Đơn hàng mới</p>
    <div class="right__tableWrapper">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th style="text-align: left;">Email</th>
                    <th>Số Hoá Đơn</th>
                    <th>ID Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Kích thước</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
    
            <tbody>
                <tr>
                    <td data-label="STT">1</td>
                    <td data-label="Email" style="text-align: left;">chibaosinger@gmail.com</td>
                    <td data-label="Số Hoá Đơn">6577544</td>
                    <td data-label="ID Sản Phẩm">2</td>
                    <td data-label="Số Lượng">1</td>
                    <td data-label="Kích thước">Trung Bình</td>
                    <td data-label="Trạng Thái"> 
                        Đã Thanh Toán
                    </td>
                </tr>
             
            </tbody>
        </table>
    </div> -->
    <!-- <a href="" class="right__tableMore"><p>Xem tất cả các đơn đặt hàng</p> <img src="assets/arrow-right-black.svg" alt=""></a> -->
</div>