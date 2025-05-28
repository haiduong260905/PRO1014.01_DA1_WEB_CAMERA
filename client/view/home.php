<style>
    .product-block {
        height: 520px;
    }

    .background-div {
        background-image: url('https://asset.fujifilm.com/www/vn/files/styles/1120x400/public/2019-08/e529ca538b291d59b4fd21776be3a222/pic_digitalcameras_01.jpg?itok=L4NN6cyJ');
        background-size: cover;
        width: 100%;
        height: 700px;
        /* Điều chỉnh chiều cao theo nhu cầu của bạn */
    }

    .content {
        padding-top: 10%;
        text-align: left;
        margin-left: 20%;
        color: white;
        /* Màu chữ của bạn */
    }

    .content h1,
    .content h3 {
        color: white;
    }


    .slider-btn a {
        /* Tùy chỉnh kiểu dáng nút */
        color: white;
        background-color: #3498db;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
    }

    .slider-btn a:hover {
        background-color: #2980b9;
    }
</style>

<!-- slider -->
<div class="slider">
    <div class="owl-carousel owl-one owl-theme">
        <div class="item">
            <div class="slider-img">
                <img src="../imgs/h4-slide.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="slider-img">
                <img src="../imgs/h4-slide2.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="slider-img">
                <img src="../imgs/h4-slide3.png" alt="">
            </div>
        </div>
        <div class="item">
            <div class="slider-img">
                <img src="../imgs/h4-slide4.png" alt="">
            </div>
        </div>
    </div>
</div>
<!-- /.slider -->
<!-- mobile showcase -->
<div class="space-medium">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#"><img src="../imgs/canon1.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#"><img src="../imgs/nikon.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#"><img src="../imgs/sony.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="showcase-block">
                    <div class="display-logo ">
                        <a href="#"><img src="../imgs/fuji.png" alt=""></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.mobile showcase -->
<!-- latest products -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Sản phẩm mới nhất</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <!-- product -->
                        <?php
                        foreach ($sphome as $sp) {
                            extract($sp);
                            $chitietsp = "index.php?act=chitietsp&id=" . $id;
                            $hinh = $img_path . $hinh;
                            echo '<div class="custom-col-5">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="product-block">
                                        <div class="product-img">
                                            <a href="' . $chitietsp . '"> <img src="' . $hinh . '" alt=""></a>
                                        </div>
                                        <div class="product-content">
                                            <h4>
                                                <a class="product-title" href="' . $chitietsp . '">' . $tensp . '</a>
                                            </h4>
                                            <div class="product-price-wrapper">
                                                <span class="product-price">' . number_format($giasp, 0, ",", ".") . ' <u></u>VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="product-action">
                                            <div class="pro-action-left w100">
                                                <form action="index.php?act=addtocart" method="post" class="form-addtocart">
                                                    <input type="hidden" name="id" value="' . $id . '">
                                                    <input  type="hidden" name="tensp" value="' . $tensp . '">
                                                    <input type="hidden" name="hinh" value="' . $hinh . '">
                                                    <input type="hidden" name="giasp" value="' . $giasp . '">
                                                    <div class="addtocart-btn">
                                                        <div class="product-content">
                                                            <div class="shopping-btn">
                                                                <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                                                <input type="submit" class="product-btn btn-cart" value="S" name="addtocart">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                        <!-- /.product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="item">
    <div class="slider-img">
        <div class="background-div">
            <div class="content">
                <h1 class="animated">Máy Ảnh Tốt</h1>
                <h3 class="animated">Đảm bảo về chất lượng và giá thành.</h3>
                <div class="slider-btn mt-90">
                    <a class="animated" href="index.php?act=sanpham">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.latest products -->
<!-- seller products -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-head">
                    <h3 class="head-title">Tất Cả Sản Phẩm</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="product-carousel">
        <div class="box-body">
            <div class="row">
                <div class="owl-carousel owl-two owl-theme">
                    <!-- product -->

                    <!-- <?php
                    foreach ($spall as $sp) {
                        extract($sp);
                        $chitietsp = "index.php?act=chitietsp&id=" . $id;
                        $hinh = $img_path . $hinh;
                        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="product-block">
                                <div class="product-img">
                                    <a href="' . $chitietsp . '"><img src="' . $hinh . '" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a class="product-title" href="' . $chitietsp . '">' . $tensp . '</a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span class="product-price">' . number_format($giasp, 0, ",", ".") . ' <u></u>VNĐ</span>
                                    </div>
                                </div>
                                <form action="index.php?act=addtocart" method="post" class="form-addtocart">
                                    <input type="hidden" name="id" value="' . $id . '">
                                    <input type="hidden" name="tensp" value="' . $tensp . '">
                                    <input type="hidden" name="hinh" value="' . $hinh . '">
                                    <input type="hidden" name="giasp" value="' . $giasp . '">
                                    <div class="addtocart-btn">
                                        <div class="product-content">
                                            <div class="shopping-btn">
                                                <a href="#" class="product-btn btn-like"><i class="fa fa-heart"></i></a>
                                                <input type="submit" class="product-btn btn-cart" value="S" name="addtocart">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
                    }
                    ?> -->





                    <!-- product -->

                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.seller products -->

<!-- featured products -->

<!-- /.featured products -->
<!-- cta -->
<!-- /.cta -->
<!-- features -->
<div class="bg-default pdt40 pdb40">
    <div class="container">
        <div class="row">
            <!-- features -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="feature-left">
                    <div class="feature-outline-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="text-white">Thanh toán an toàn</h3>
                        <p>Mang đến dịch vụ trải nghiệm thoải mái nhất, an toàn, tiện dụng! </p>
                    </div>
                </div>
            </div>
            <!-- features -->
            <!-- features -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="feature-left">
                    <div class="feature-outline-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="text-white">Phản hồi 24/7</h3>
                        <p>Trợ giúp liên lạc, tham khảo , tra cứu 24/7!</p>
                    </div>
                </div>
            </div>
            <!-- features -->
            <!-- features -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="feature-left feature-circle">
                    <div class="feature-outline-icon">
                        <i class="fa fa-rotate-left "></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="text-white">Đổi trả miễn phí</h3>
                        <p>Miễn phí bảo hành đổi trả lên đến 30 ngày!</p>
                    </div>
                </div>
            </div>
            <!-- features -->
            <!-- features -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="feature-left">
                    <div class="feature-outline-icon">
                        <i class="fa fa-dollar"></i>
                </div>
                    <div class="feature-content">
                        <h3 class="text-white">Giá tốt nhất</h3>
                        <p>Giá thành tốt nhất trong thị trường. Cập nhật sản phẩm 24/7!</p>
                    </div>
                </div>
            </div>
            <!-- features -->
        </div>
    </div>
</div>
<!-- /.features -->