<?php
$id = $_GET['id'];
if(is_array($donhang)){
    extract($donhang);
}
if(is_array($billct)){
    extract($billct);
}
?>

<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.php">Trang chu</a></li>
                <li class="active">Chi tiet don hang DH-<?= $id ?></li>
            </ul>
        </div>
    </div>
</div>

<!-- checkout-area start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><a data-bs-toggle="collapse" data-bs-target="#payment-2">Thông tin đơn hàng</a></h5>
                            </div>
                            <div id="payment-2" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Mã đơn hàng</label>
                                                    <input type="text" value="DH-<?= $id ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Email</label>
                                                    <input type="email" value="DH-<?= $email_dh ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Tên người đặt</label>
                                                    <input type="text" value="DH-<?= $tenkh ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" value="DH-<?= $dc_dh ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" value="DH-<?= $sdt_dh ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Ngày đặt hàng</label>
                                                    <input type="text" value="DH-<?= $ngaydathang ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Đơn giá</label>
                                                    <input type="text" value="DH-<?= number_format($tong, 0, ",", ".") ?> đ" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><a data-bs-toggle="collapse" data-bs-target="#payment-6">Thông tin giỏ hàng</a></h5>
                            </div>
                            <div id="payment-6" class="panel-collapse collapse show" data-bs-parent="#faq">
                                <div class="panel-body">
                                    <div class="order-review-wrapper">
                                        <div class="order-review">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="width-1">Tên sản phẩm</th>
                                                            <th class="width-2">Hình</th>
                                                            <th class="width-3">Giá</th>
                                                            <th class="width-4">Số lượng</th>
                                                            <th class="width-5">Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    foreach ($billct as $bill) { // Duyệt qua từng sản phẩm trong chi tiết đơn hàng
                                                        extract($bill); //lấy ra gtri
                                                        $hinhpath = "../upload/" . $hinh;
                                                        if (is_file($hinhpath)) {
                                                            $hinh = "<img src='" . $hinhpath . "' height='40'>";
                                                        } else {
                                                            $hinh = "Không có hình ảnh";
                                                        }
                                                        echo '<tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>' . $ten . '</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>' . $hinh . '</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>' . number_format($gia, 0, ",", ".") . ' <u>đ</u></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>' . $soluong . '</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>' . number_format($thanhtien, 0, ",", ".") . ' <u>đ</u></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>';
                                                    }
                                                    ?>
                                                </table>
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