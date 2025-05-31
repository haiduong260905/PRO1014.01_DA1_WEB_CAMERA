<!-- /.header-section -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">

                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Đăng Nhập</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login-form -->

    <div class="content">
        <div class="container">
            <div class="box">
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                    <h3 class="mb10">Đăng nhập</h3>
                                </div>
                                <!-- form -->
                                    <form action="index.php?act=dangnhap" method="post">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label sr-only" for="email"></label>
                                                <div class="login-input">
                                                    <input name="user" type="text" class="form-control" placeholder="UserName" required>
                                                    <div class="login-icon"><i class="fa fa-user"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label sr-only"></label>
                                                <div class="login-input">
                                                    <input name="pass" type="password" class="form-control" placeholder="Mật khẩu" required>
                                                    <div class="login-icon"><i class="fa fa-lock"></i></div>
                                                    <!-- <div class="eye-icon"><i class="fa fa-eye"></i></div> -->
                                                </div>
                                                <div class="thongbao">
                                                    <?php
                                                    if (isset ($thongbao) && $thongbao != "") {
                                                        echo $thongbao;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                            <input name="dangnhap" type="submit" class="btn btn-primary btn-block mb10" value="Đăng nhập">
                                            <div style="margin: 0 auto; width: 50%">
                                                <a href="?action=register" style="margin-right: 40px;" class="text-blue">Đăng ký</a>
                                                <a href="./?action=forgotpassword" class="text-blue">Quên mật khẩu</a>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 class="mb20">Hoặc đăng nhập với</h4>
                                        <div class="social-media">
                                            <a href="#" class="btn-social-rectangle btn-facebook"><i class="fa fa-facebook"></i><span class="social-text">Facebook</span></a>
                                            <a href="#" class="btn-social-rectangle btn-googleplus"><i class="fa fa-google"></i><span class="social-text">Google</span></a>
                                        </div>
                                    </div>
                                <!-- /.form -->
                            </div>
                        </div>
                    </div>
                    <!-- features -->
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class=box-body>
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_1.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Mức độ uy tín!</h4>
                                    <p>Được đánh giá an toàn, tin cậy hàng đầu Việ Nam với nhiều chính sách hỗ trợ chăm sóc khách hàng</p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_2.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Thanh toán tức thì!</h4>
                                    <p>Thanh toán mọi nơi mọi lúc, giao dịch nhanh gọn, bảo đảm, an toàn, với liên kết 90% ngân hàng, ví tiền, VISA toàn quốc!</p>
                                </div>
                            </div>
                            <div class="feature-left">
                                <div class="feature-icon">
                                    <img src="images/feature_icon_3.png" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Ưu đãi hấp dẫn!</h4>
                                    <p>Với mong muốn làm hài lòng khách hàng, Mobistore luôn mang đến những ưu đãi cực kì tối với chất lượng cao</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.features -->
                </div>
            </div>
        </div>
    </div>
<!-- /.login-form -->

<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>