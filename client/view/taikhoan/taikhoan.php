<?php
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh = "Không có hình ảnh";
}
?>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-ms-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Tài khoản</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- my account start -->
<div class="content">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12 mb20">
                                <h3 class="mb10">Sửa thông tin tài khoản</h3>
                            </div>
                            <!-- form -->

                            <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                                <div class="row" style="display: none;">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Tên đăng nhập</label>
                                            <input type="text" name="tendn" value="<?= $tendn ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info">
                                            <label>Ảnh đại diện</label>
                                            <input type="file" name="hinh">
                                            <?= $hinh ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>Địa chỉ</label>
                                            <input type="text" name="dc" value="<?= $dc ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>Email</label>
                                            <input type="email" name="email" value="<?= $email ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info">
                                            <label>Số điện thoại</label>
                                            <input type="text" name="sdt" value="<?= $sdt ?>">
                                        </div>
                                    </div>
                                    <div class="billing-back-btn" style="display: none;">
                                        <div class="billing-back">
                                            <a href="index.php"><i class="ion-arrow-up-c"></i>Trở lại</a>
                                        </div>
                                        <div class="btn-submit w80">
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="submit" name="capnhat" value="Sửa">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <div class="login-input">
                                                <input type="text" class="form-control" name="tendn" value="<?= $tendn ?>" placeholder="User mới">
                                                <div class="login-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <div class="login-input">
                                                <input type="text" class="form-control" name="dc" value="<?= $dc ?>" placeholder="Địa chỉ mới">
                                                <div class="login-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <div class="login-input">
                                                <input type="text" class="form-control" name="email" value="<?= $email ?>" placeholder="Email mới">
                                                <div class="login-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email"></label>
                                            <div class="login-input">
                                                <input type="text" class="form-control" name="sdt" value="<?= $sdt ?>" placeholder="Số điện thoại mới">
                                                <div class="login-icon"><i class="fa fa-user"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
                                        <input type="submit" class="btn btn-primary btn-block mb10" name="capnhat" value="Sửa">
                                        <div style="margin: 0 auto; width: 50%">
                                            <a href="index.php" style="margin-right: 40px;" class="text-blue">Trở lại</a>
                                            <a href="index.php?act=doimk" class="text-blue">Đổi mật khẩu</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- form -->
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

<div class="myaccount-area pb-80 pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-defautl">
                            <div class="panel-heading">
                                <h5 class="panel-title"><a data-bs-toggle="collapse" href="#my-account-1">Sửa thông tin tài khoản</a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="billing-infomation-wrapper">
                                        <div class="account-info-wrapper">
                                            <!-- <h4>My Account Infomation</h4> -->
                                            <h5>Thông tin tài khoản</h5>
                                        </div>
                                        <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Tên đăng nhập</label>
                                                        <input type="text" name="tendn" value="<?= $tendn ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label>Ảnh đại diện</label>
                                                        <input type="file" name="hinh">
                                                        <?= $hinh ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" name="dc" value="<?= $dc ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Email</label>
                                                        <input type="email" name="email" value="<?= $email ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" name="sdt" value="<?= $sdt ?>">
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="index.php"><i class="ion-arrow-up-c"></i>Trở lại</a>
                                                    </div>
                                                    <div class="btn-submit w80">
                                                        <input type="hidden" name="id" value="<?= $id ?>">
                                                        <input type="submit" name="capnhat" value="Sửa">
                                                    </div>
                                                </div>
                                        </form>
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