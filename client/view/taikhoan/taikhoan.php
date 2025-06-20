<?php
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' class='rounded-circle' height='100'>";
} else {
    $hinh = "<img src='https://via.placeholder.com/100' class='rounded-circle' height='100'>";
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-4">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <?= $hinh ?>
                    </div>
                    <h4 class="card-title mb-0"><?= $tendn ?></h4>
                    <p class="text-muted mb-3">Thành viên từ: <?= date('Y') ?></p>
                    <div class="d-grid gap-2">
                        <a href="index.php?act=doimk" class="btn btn-outline-primary">Đổi mật khẩu</a>
                        <a href="index.php?act=dangxuat" class="btn btn-outline-danger">Đăng xuất</a>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Đơn hàng gần đây</h5>
                    <div class="list-group list-group-flush">
                        <?php
                        $donhang = loadall_bill($id, 5); // Lấy 5 đơn hàng gần nhất
                        foreach ($donhang as $dh) {
                            echo '<a href="index.php?act=chitietdonmua&id=' . $dh['id'] . '" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Đơn #' . $dh['id'] . '</h6>
                                    <small class="text-muted">' . date('d/m/Y', strtotime($dh['ngaydathang'])) . '</small>
                                </div>
                                <p class="mb-1">Tổng: ' . number_format($dh['tongdonhang'], 0, ',', '.') . 'đ</p>
                                <small class="text-' . ($dh['trangthai'] == 1 ? 'success' : 'warning') . '">' . ($dh['trangthai'] == 1 ? 'Đã giao hàng' : 'Đang giao hàng') . '</small>
                            </a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Chỉnh sửa thông tin</h4>
                    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tên đăng nhập</label>
                                <input type="text" class="form-control" name="tendn" value="<?= $tendn ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $email ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" name="sdt" value="<?= $sdt ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="hinh">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" name="dc" value="<?= $dc ?>" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="capnhat">Lưu thay đổi</button>
                                <a href="index.php" class="btn btn-outline-secondary ms-2">Hủy</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">Thống kê tài khoản</h4>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <div class="display-4 text-primary mb-2"><?= count(loadall_bill($id)) ?></div>
                                <p class="mb-0">Đơn hàng</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <div class="display-4 text-success mb-2"><?= count(loadall_bill($id, 1)) ?></div>
                                <p class="mb-0">Đã giao hàng</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="text-center">
                                <div class="display-4 text-info mb-2"><?= count(loadall_bill($id, 0)) ?></div>
                                <p class="mb-0">Đang giao hàng</p>
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