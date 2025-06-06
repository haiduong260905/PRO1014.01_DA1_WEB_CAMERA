<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">

            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li>Đăng ký</li>
                </ol>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="box sing-form">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                    <!-- form -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                    <h3 class="mb10">Tạo tài khoản</h3>
                                    <p>Vui lòng điền đầy đủ các thông tin biên dưới</p>
                                </div>
                                <form action="index.php?act=dangky" method="post">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input id="name" name="user" type="text" class="form-control" placeholder="UserName" required>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" name="tel" type="text" class="form-control" placeholder="Điện thoại" required>
                                    </div>
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="form-group">
                                        <label class="control-label sr-only" for="password"></label>
                                        <input id="password" name="pass" type="password" class="form-control" placeholder="Mật khẩu" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                     <div class="form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="repassword" name="repass" type="password" class="form-control" placeholder="Nhập lại mật khẩu" required>
                                    </div>
                                    <div class="thongbao">
                                        <?php
                                        if (isset($thongbao) && ($thongbao != "")) {
                                            echo $thongbao;
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="submit" class="btn btn-primary btn-block mb10" value="Đăng ký" name="dangky">
                                    <div>
                                        <p>Bạn đã có tài khoản?<a href="index.php?act=dangnhap"> Đăng nhập</a></p>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                    <!-- /.form -->
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
<!-- /.sign-up form -->

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