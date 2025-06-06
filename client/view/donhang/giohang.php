<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Giỏ hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="cart-content mt30 mb30">
        <div class="title-header mb20">
            <h2 class="title">Giỏ hàng</h2>
        </div>
        <form action="#">
            <div class="table-content table-responsive">
                <table class="table">
                    <!-- <thead class="thead-light">
                        <tr>
                            <th>Hinh anh</th>
                            <th>Ten san pham</th>
                            <th>Gia don vi</th>
                            <th>So luong</th>
                            <th>Thanh tien</th>
                            <th>Thao tac</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        <!-- <tr>
                            <td class="product-thumbnail">
                                <a href="#"><img src="assets/img/cart/cart-3.jpg" alt=""></a>
                            </td>
                            <td class="product-name"><a href="#">Tên sản phẩm</a></td>
                            <td class="product-price-cart"><span class="amount">$260.00</span></td>
                            <td class="product-quantity">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                </div>
                            </td>
                            <td class="product-subtotal">$110.00</td>
                            <td class="product-remove">
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
                            </td>
                        </tr> -->
                        <?php
                        viewcart(1);
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
        <div class="prices-summary">
            <div class="left-content">
                <a href="index.php?act=sanpham" class="derection-product text-blue">
                    <i class="fas fa-long-arrow-alt-left"></i> Tiếp tục mua hàng
                </a>
            </div>
            <div class="right-con">
                <a href="index.php?act=donhang" class="btn-default btn-checkout">Mua hàng</a>
            </div>
        </div>
    </div>
</div>

<!-- /.cart-total -->



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