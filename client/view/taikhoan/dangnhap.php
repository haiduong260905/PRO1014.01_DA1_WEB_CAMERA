<!-- /.header-section -->
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Đăng nhập tài khoản</h2>
                    
                    <form action="index.php?act=dangnhap" method="post" class="needs-validation" novalidate>
                        <div class="mb-4">
                            <label for="username" class="form-label">Tài khoản</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="user" placeholder="Nhập tài khoản" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="pass" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="form-text text-danger">
                                <?php
                                if (isset($thongbao) && $thongbao != "") {
                                    echo $thongbao;
                                }
                                ?>
                            </div>
                        </div>

                        <div class="mb-4">
                            <button type="submit" name="dangnhap" class="btn btn-primary w-100 mb-3">Đăng nhập</button>
                            <div class="text-center">
                                <a href="index.php?act=dangky" class="text-primary me-3">Đăng ký tài khoản</a>
                                <a href="index.php?act=doimk" class="text-primary">Quên mật khẩu?</a>
                            </div>
                        </div>

                        <div class="text-center">
                            <hr class="my-4">
                            <h5 class="mb-4">Hoặc đăng nhập với</h5>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-outline-primary"><i class="fa fa-facebook me-2"></i>Facebook</a>
                                <a href="#" class="btn btn-outline-danger"><i class="fa fa-google me-2"></i>Google</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Tại sao chọn chúng tôi?</h2>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fa fa-shield text-primary" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Bảo mật tuyệt đối</h5>
                                    <p class="mb-0">Hệ thống bảo mật tiên tiến, đảm bảo an toàn thông tin</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fa fa-credit-card text-success" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Thanh toán linh hoạt</h5>
                                    <p class="mb-0">Nhiều phương thức thanh toán tiện lợi</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fa fa-star text-warning" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Chất lượng đảm bảo</h5>
                                    <p class="mb-0">Sản phẩm chính hãng, chất lượng cao</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <i class="fa fa-truck text-info" style="font-size: 2rem"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1">Giao hàng nhanh</h5>
                                    <p class="mb-0">Giao hàng tận nơi, nhanh chóng</p>
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