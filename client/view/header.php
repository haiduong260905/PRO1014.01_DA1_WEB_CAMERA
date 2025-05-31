<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="create ecommerce website template for your online store, responsive mobile templates">
    <meta name="keywords" content="ecommerce website templates, online store">
    <title>9-camera</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- owl-carousel -->
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.default.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">

</head>

<body>

    <!-- header-section-->
    <div class="header-wrapper">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-8">
                    <div class="logo">
                        <a href="index.php"><img src="../imgs/logo.png" alt=""></a>
                    </div>
                </div>
                <!-- /.logo -->
                <!-- search -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <form class="search-bg form-search" action="index.php?act=sanpham" method="post">
                        <input type="text" name="kyw" class="form-control" placeholder="Nhập sản phẩm cần tìm kiếm">
                        <button type="Submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- /.search -->
                <!-- account -->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="account-section">
                        <ul>
                            <?php
                            if (isset($_SESSION['user'])) {
                                extract($_SESSION['user']);
                                echo '<a href="">
                                        
                                    <li><a class="title hidden-xs" a href="index.php?act=taikhoan">' . $tendn . '</a></li>
                                    <li class="hidden-xs">|</li>
                                    <li><a class="title hidden-xs" href="index.php?act=dangxuat">Đăng xuất</a></li>
                                        
                                    </a>';
                            } else {
                                echo '<a href="index.php?act=login">
                                    <div class="lg-register">
                                        <li><a href="index.php?act=dangnhap" class="title hidden-xs" onclick="checkLoginAndRedirect()">Đăng nhập</a></li>
                                        <li class="hidden-xs">|</li>
                                        <li><a href="index.php?act=dangky" class="title hidden-xs">Đăng Kí</a></li>
                                    </div>
                        
                                    
                                    </a>';
                            }
                            ?>
                            

                            <li><a href="favorite-list.html"><i class="fa fa-heart"></i></a></li>
                            <!-- Use the checkLoginAndRedirect() function here as well -->
                            <li><a href="index.php?act=giohang" class="title" onclick="checkLoginAndRedirect()"><i class="fa fa-shopping-cart"></i> </a></li>
                        </ul>
                    </div>
                </div>
                <!-- search -->
            </div>
        </div>
        <!-- navigation -->
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <!-- navigations-->
                        <div id="navigation">
                            <ul>
                                <li class="active"><a href="index.php">Trang chủ</a></li>
                                <li><a href="index.php?act=sanpham">Sản Phẩm</a></li>
                                <li><a href="index.php?act=thongtin">Thông tin</a></li>
                                <li><a href="index.php?act=baiviet">Bài viết</a></li>
                                <li><a href="index.php?act=lienhe">Liên hệ, hỗ trợ</a></li>
                                <li><a href="index.php?act=donmua">Đơn Hàng của bạn</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.navigations-->
                </div>
            </div>
        </div>
    </div>
    <!-- /. header-section-->
    