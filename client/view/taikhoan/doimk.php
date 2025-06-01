<!-- /.header-section -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Đổi Mật Khẩu</li>
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
                                <h3 class="mb10">Đổi Mật Khẩu</h3>
                            </div>
                            <!-- form -->
                             <form action="index.php?act=doimk" method="post">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only"></label>
                                        <div class="login-input">
                                            <input name="pass" type="password" class="form-control" placeholder="Mật Khẩu Hiện Tại" required>
                                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                                            <!-- <div class="eye-icon"><i class="fa fa-eye"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only"></label>
                                        <div class="login-input">
                                            <input name="newpass" type="password" class="form-control" placeholder="Mật Khẩu Mới" required>
                                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                                            <!-- <div class="eye-icon"><i class="fa fa-eye"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only"></label>
                                        <div class="login-input">
                                            <input name="repass" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                                            <div class="login-icon"><i class="fa fa-lock"></i></div>
                                            <!-- <div class="eye-icon"><i class="fa fa-eye"></i></div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="button-box">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="submit" name="doimk" value="Đổi Mật Khẩu" class="btn btn-primary btn-block mb10">
                                </div>
                             </form>
                             <div class="thongbao">
                                <?php
                                if (isset($thongbao) && ($thongbao != "")) {
                                    echo $thongbao;
                                }
                                ?>
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
                                <p>Với mong muốn làm hài lòng khách hàng, 9-Camera luôn mang đến những ưu đãi cực kì tối với chất lượng cao</p>
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
<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Đổi mật khẩu</li>
            </ul>
        </div>
    </div>
</div>
<div class="login-register-area pt-95 pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> Đổi mật khẩu </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="index.php?act=doimk" method="post">
                                        <input type="password" name="pass" placeholder="Mật Khẩu Hiện Tại">
                                        <input type="password" name="newpass" placeholder="Mật Khẩu Mới">
                                        <input type="password" name="repass" placeholder="Nhập Lại Mật Khẩu Mới">
                                        <div class="button-box">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="submit" name="doimk" value="Đổi Mật Khẩu" class="btn-submit">
                                        </div>
                                    </form>
                                    <div class="thongbao">
                                        <?php
                                        if (isset($thongbao) && ($thongbao != "")){
                                            echo $thongbao;
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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