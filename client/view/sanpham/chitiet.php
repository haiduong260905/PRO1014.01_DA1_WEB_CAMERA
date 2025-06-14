<?php
if (is_array($sanpham)) {
    extract($sanpham);
}

$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='300'>";
} else {
    $hinh = "Không có hình ảnh";
}

$hinhpath2 = "../upload/" . $hinh2;
if (is_file($hinhpath2)) {
    $hinh2 = "<img src='" . $hinhpath2 . "' height='100'>";
} else {
    $hinh2 = "Không có hình ảnh";
}

$hinhpath3 = "../upload/" . $hinh3;
if (is_file($hinhpath3)) {
    $hinh3 = "<img src='" . $hinhpath3 . "' height='100'>";
} else {
    $hinh3 = "Không có hình ảnh";
}

$listdm = loadall_danhmuc();
?>

<style>
    .custom-button {
        background-color: #0cafe5;
        color: #fff;
    }

    .custom-button {
        font-family: "Roboto Condensed", sans-serif;
        font-size: 15px;
        text-transform: uppercase;
        font-weight: 700;
        padding: 14px 26px;
        border-radius: 4px;
        line-height: 2;
        letter-spacing: 2px;
        border: transparent;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        word-wrap: break-word;

    }

    .custom-button:hover {
        background-color: rgb(14, 155, 201);
        /* Màu xanh */
    }

    .container-rating-review .box-body .review-box {
        width: 100%;
        overflow: hidden;
        border: none;
    }
</style>

<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Chi tiết sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page-header -->
<!-- product-single -->
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box">
                    <!-- product-decription -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="product-img">
                                    <?= $hinh ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="product-single">
                                    <h2><?= $tensp ?></h2>

                                    <p class="product-price" style="font-size: 25px;">
                                        <?= number_format($giasp, 0, ",", ".",) ?> VND
                                    </p>

                                    <span class="rest-quantity">
                                        <p>Trạng thái: <span>Còn hàng</span></p>
                                    </span>
                                    <span class="rest-quantity">Loại: <?= $donvi ?></span> <br>
                                    <span class="rest-quantity"> Danh mục
                                        <?php
                                        foreach ($listdm as $danhmuc) {
                                            extract($danhmuc);
                                            if ($iddm == $danhmuc['id'])
                                                echo '' . $danhmuc['tendm'] . '';
                                        }
                                        ?>
                                    </span>
                                    <?php
                                    echo '
                                    <form action="index.php?act=addtocart" method="post">
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="tensp" value="' . $tensp . '">
                                        <input type="hidden" name="hinh" value="' . $hinh . '">
                                        <input type="hidden" name="giasp" value="' . $giasp . '">
                                        <div class="product-quantity">
                                            <h4>Số lượng</h4>
                                            <div class="quantity mb20">
                                                <input class="btn-quantity decrease-quantity" onclick="dcQuantity()" type="button" value="-">
                                                <input type="number" max="10" min="1" name="soluong" value="1" class="quantity-input" id="quantity-input">
                                                <input class="btn-quantity increase-quantity" onclick="icQuantity()" type="button" value="+">
                                            </div>
                                        </div>
                                        <div class="custom-container">
                                            <input type="submit" class="fa fa-shopping-cart custom-button" name="addtocart" value="Thêm vào giỏ hàng">
                                        </div>
                                    </form>
                                    ';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="box-head scroll-nav">
                    <div class="head-title">
                        <a class="page-scroll active" href="#product">Mô tả sản phẩm</a>
                        <a class="page-scroll" href="#rating">Đánh giá và nhận xét</a>
                        <a class="page-scroll" href="#review">Thêm nhận xét</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- highlights -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="description-detail">
                    <div class="description-left">
                        <h2 class="dgctpro">Đặc điểm nổi bật</h2>
                        <div class="mota">
                            <?= $mota ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rating reviews -->
        <div class="rating">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box container-rating-review">
                        <div class="box-head">
                            <h3 class="head-title">Đánh giá và nhận xét</h3>
                        </div>
                        <div class="box-body">
                            <div class="row review-box">
                                <div class="customer-reviews">
                                    <?php
                                    $idsp = $_GET['id'];
                                    $_SESSION['tensp'] = $tensp;
                                    ?>
                                    <iframe src="./view/binhluan/binhluan.php?idsp=<?= $idsp ?>" frameborder="0" width="100%" height="500px"></iframe>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="divider-line"></div>
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

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="box-head">
                <h3 class="head-title">Sản phẩm liên quan</h3>
            </div>
        </div>
    </div>
</div>

<script src="../js/jquery.min.js" type="text/javascript"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/jquery.desoslide.js"></script>

<script type="text/javascript">
    // Sử dụng jQuery để chọn phần tử có id 'slideshow' để áp dụng plugin desoSlide
    $('#slideshow').desoSlide({
        thumb: $('div.slideshow_thumbs div > a'),
        effect: {
            provider: 'animate', // Sử dụng nhà cung cấp hiệu ứng 'animate'
            name: 'fade' // Đặt hiệu ứng 'fade'
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="link_to_your_desoSlide_plugin.js"></script>



<script>
    function dcQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty > 1) {
            result.value--;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    }

    function icQuantity() {
        var result = document.getElementById('quantity-input');
        var qty = result.value;
        if (!isNaN(qty) && qty < 10) {
            result.value++;
            document.getElementById('quantity-input').innerHTML = qty;
        }
        return false;
    }
</script>