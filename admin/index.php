<?php 
    include_once'../Myconfig/config.php';
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<?php include_once'layout/header.php' ?>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <!-- START COL-LEFT -->
                <?php 
                    if (isset($_GET['page'])) {
                        $page=$_GET['page'];
                        # code...
                    }
                    else
                    {
                        $page='login';
                    }
                     if (file_exists('view/'.$page.'.php')) {
                            include_once 'view/'.$page.'.php';
                        }
                        else{
                 ?>
                <div class="left">
                    <?php include_once'layout/col_left.php' ?>
                </div>
                <!-- END COL-LEFT -->
                <!-- START COL-RIGHT-SP -->
                <div class="right">
                    <?php   
                        if (file_exists('views/'.$page.'.php')) {
                            include_once 'views/'.$page.'.php';
                        }
                        else if (file_exists('views/xuly_add/'.$page.'.php')) {
                            include_once 'views/xuly_add/'.$page.'.php';
                        }
                        else if (file_exists('views/xuly_edit/'.$page.'.php')) {
                            include_once 'views/xuly_edit/'.$page.'.php';
                        }else if (file_exists('views/update/'.$page.'.php')) {
                            include_once 'views/update/'.$page.'.php';
                        }
                         else if (file_exists('views/delete/'.$page.'.php')) {
                            include_once 'views/delete/'.$page.'.php';
                        }else{
                            include_once 'views/404.php';
                        }
                    ?>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
    <script src="../bootstrap/js/main.js"></script>
</body>
</html>