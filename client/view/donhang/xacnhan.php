<?php
if (isset($bill) && (is_array($bill))) {
    extract($bill);
}
?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="box">
            <div class="row-account">
                <div class="left-container">
                    <div class="user-info">
                        <?php
                        if(isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                            echo '<a href="your_destination_url_here">

                            <strong = class="text-red">' . $tendn . '</strong>
                            
                        </a>';
                        }
                        ?>
                    </div>

                    <div class="side-bar-content">
                        <ul>
                            <a href="index.php?act=taikhoan">
                                <li class="slide-bar "><i class="fa fa-edit"></i><span>Thông tin tài khoản</span></li>
                            </a>
                            <a href="index.php?act=doimk">
                                <li class="slide-bar "><i class="fas fa-lock"></i><span>Đổi mật khẩu</span></li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="right-container">
                    <h3 class="title-content">Đặt hàng thành công</h3>
                    <div class="receipt-infor-details">
                        <div class="title-receipt">
                            <div class="left-content content">
                                <h4>Đơn hàng</h4>
                                <p class="receipt-id">Mã đơn hàng: DH-<?= $bill['id']; ?></p>
                                <p class="receipt-time">Đặt hàng: DH-<?= $bill['ngaydathang']; ?></p>
                            </div>
                            <p></p>
                            <div class="right-content content">
                                <h4>Thông tin người nhận</h4>
                                <p><strong><?= $bill['tenkh']; ?></strong> - <?= $bill['sdt_dh']; ?></p>
                                <p class="address"><?= $bill['dc_dh']; ?></p>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="width-1">Tên sản phẩm</th>
                                    <th class="width-2">Đơn giá</th>
                                    <th class="width-3">Số lượng</th>
                                    <th class="width-4">Thành tiền</th>
                                </tr>
                            </thead>
                            <?php
                            global $img_path;
                            $tong = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $hinh = $img_path . $cart[2];
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien; //Tổng tiền và đơn hàng
                                echo '<tbody>
                                                                <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p>' . $cart[1] . '</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>' . number_format($cart[3], 0, ",", ".") . ' <u>đ</u></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>' . $cart[4] . '</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-subtotal">
                                                                        <p>' . number_format($ttien, 0, ",", ".") . ' <u>đ</u></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            ';
                            }
                            ?>
                            <?php
                            echo '<tfoot>
                                                            <!-- <tr>
                                                                <td colspan="3">Subtotal </td>
                                                                <td colspan="1">$4,001.00</td>
                                                            </tr>
                                                            <tr class="tr-f">
                                                                <td colspan="3">Shipping & Handling (Flat Rate - Fixed</td>
                                                                <td colspan="1">$45.00</td>
                                                            </tr>
                                                            <tr> -->
                                                                <td colspan="3">Tổng tiền:</td>
                                                                <td colspan="1">' . number_format($tong, 0, ",", ".") . ' <u>đ</u></td>
                                                            </tr>
                                                        </tfoot>';
                            ?>


                        </table>
                        <a href="index.php?act=donmua" class="redirect-to-receipt text-blue"><i class="fas fa-long-arrow-alt-left"></i>Đơn Hàng Của Bạn</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- /.login-form -->


<!-- JS -->

<script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>