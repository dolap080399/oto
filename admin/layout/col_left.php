
<span class="left__icon">
    <span></span>
    <span></span>
    <span></span>
</span>
<div class="left__content">
    <div class="left__profile">
        <?php 
            if(isset($_SESSION['name']))
            {
                $session_name= $_SESSION['name'];
             
         ?>

        <div class="left__image"><img src="../img/admin/<?php echo  $_SESSION['img']; ?>" alt=""></div>
        <p class="left__name"><?php echo $session_name; ?></p>
        <?php
            }
       ?>
    </div>
    <ul class="left__menu">
        <li class="left__menuItem">
            <a href="index.php?page=home" class="left__title"><i class="fas fa-home">Home</i></a>
        </li>
        <li class="left__menuItem">
            <div class="left__title"><i class="fas fa-truck">Sản Phẩm</i><img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
            <div class="left__text">
                <a class="left__link" href="index.php?page=insert_product">Chèn Sản Phẩm</a>
                <a class="left__link" href="index.php?page=view_product">Xem Sản Phẩm</a>
            </div>
        </li>
        <li class="left__menuItem">
            <div class="left__title"><i class="fas fa-clipboard-list">Thương Hiệu</i><img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
            <div class="left__text">
                <a class="left__link" href="index.php?page=insert_category">Chèn Thể Loại</a>
                <a class="left__link" href="index.php?page=view_category">Xem Thể Loại</a>
            </div>
        </li>
        <li class="left__menuItem">
            <div class="left__title"><i class="fas fa-sliders-h" >Slide</i><img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
            <div class="left__text">
                <a class="left__link" href="?page=insert_slide">Chèn Slide</a>
                <a class="left__link" href="?page=view_slides">Xem Slide</a>
            </div>
        </li>
        <!-- <li class="left__menuItem">
            <div class="left__title"><img src="assets/icon-book.svg" alt="">Coupons<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
            <div class="left__text">
                <a class="left__link" href="?page=insert_coupon">Chèn Coupon</a>
                <a class="left__link" href="?page=view_coupons">Xem Coupons</a>
            </div>
        </li> -->
        <li class="left__menuItem">
            <a href="index.php?page=view_customers" class="left__title"><i class="fas fa-users">Khách Hàng</i></a>
        </li>
        <li class="left__menuItem">
            <a href="index.php?page=view_orders" class="left__title"><i class="fas fa-shopping-cart">Đơn Đặt Hàng</i></a>
        </li>
        <!-- <li class="left__menuItem">
            <a href="?page=edit_css" class="left__title"><img src="assets/icon-pencil.svg" alt="">Chỉnh CSS</a>
        </li> -->
        <li class="left__menuItem">
            <div class="left__title"><i class="fas fa-user-shield">Admin</i><img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
            <div class="left__text">
                <a class="left__link" href="index.php?page=insert_admin">Chèn Admin</a>
                <a class="left__link" href="index.php?page=view_admins">Xem Admins</a>
            </div>
        </li>
        <li class="left__menuItem">
            <a href="index.php?page=logout" class="left__title"><i class="fas fa-sign-out-alt"></i>Đăng Xuất</a>
        </li>
    </ul>
</div>