<?php
if(empty($_SESSION['user'])) {
    echo '<script>alert("Vui lý đăng nhập");</script>';
    echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
}
?>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chu</a></li>
                        <li>Thong tin mua hang</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <form action="index.php?act=xacnhan" method="post">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box checkout-form">
                        <!-- checkout - form -->
                        <div class="box-head">
                            <h2 class="head-title">Thông tin của bạn</h2>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <form action="index.php?act=xacnhan" method="post">
                                    <?php
                                    if (isset($_SESSION['user'])) { // Kiểm tra xem người dùng đã đăng nhập hay chưa
                                        $user = $_SESSION['user']['tendn']; // Lấy tên đăng nhập của người dùng từ session
                                        $address = $_SESSION['user']['dc'];
                                        $email = $_SESSION['user']['email'];
                                        $tel = $_SESSION['user']['sdt'];
                                    } else {
                                        $user = "";
                                        $address = "";
                                        $email = "";
                                        $tel = "";
                                    }
                                    ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="name"></label>
                                            <input id="name" name="tendn" type="text" class="form-control" placeholder="Tên" value="<?= $tendn ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="email">Email</label>
                                            <input id="email" name="email" type="text" class="form-control" placeholder="Email address" value="<?= $email ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only" for="phone"></label>
                                            <input id="phone" name="sdt" type="text" class="form-control" placeholder="Phone" value="<?= $sdt ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label sr-only"></label>
                                            <input name="dc" type="text" class="form-control" placeholder="Địa chỉ" value="<?= $dc ?>" required>
                                        </div>
                                    </div>



                                    <!-- /.checkout-form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product total -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box mb30">
                        <div class="box-head">
                            <h3 class="head-title">Đơn hàng của bạn</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <!-- product total -->

                                <div class="pay-amount ">
                                    <div class="order-review">
                                        <div class="table-responsive">
                                            <table class="table mb40">
                                                <thead class="" style="border-bottom: 1px solid #e8ecf0;  text-transform: uppercase;">
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
                                                foreach ($_SESSION['mycart'] as $cart) { //duyệt qua từng sp
                                                    $hinh = $img_path . $cart[2];
                                                    $ttien = $cart[3] * $cart[4]; //Tính thành tiền cho sản phẩm: giá * số lượng
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
                                                                        <p>$' . number_format($ttien, 0, ",", ".") . ' <u>đ</u></p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                            ';
                                                }
                                                ?>
                                                <?php
                                                echo '<tbody>
                                                            <tr>
                                                                <td colspan="3">Tổng tiền</td>
                                                                <td colspan="1">' . number_format($tong, 0, ",", ".") . ' <u>đ</u></td>
                                                            </tr>
                                                        </tbody>';
                                                ?>

                                            </table>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.product total -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="checkbox alignright mt20">
                                        <label>
                                            <a href="index.php?act=giohang">CHỈNH SỬA GIỎ HÀNG</a>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="submit" value="XÁC NHẬN ĐẶT HÀNG" name="dongydathang" class="btn btn-primary">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

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