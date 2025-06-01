<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <!-- Side bar -->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div id="cssmenu">
                    <ul>
                        <li class="has-sub"><a href="#">Danh mục</a>
                            <ul>
                                <li>
                                    <label>
                                        <input type="checkbox">
                                        <span class="checkbox-list">Tất cả</span>
                                    </label>
                                </li>
                                <?php
                                foreach ($dmnew as $dm) {
                                    extract($dm);
                                    $iddm = "index.php?act=spdm&iddm=" . $id;
                                    echo '<li><a href="' . $iddm . '">' . $tendm . '</a></li>';
                                }
                                ?>
                                <!-- Thêm mục khác nếu cần -->
                            </ul>
                        </li>
                        <li class="has-sub"><a href="#">Giá bán</a>
                            <ul>
                                <label>
                                    <input type="checkbox">
                                    <span class="checkbox-list">Trên 100 Triệu</span>
                                </label>
                                <label>
                                    <input type="checkbox">
                                    <span class="checkbox-list">Trên 50 Triệu</span>
                                </label>
                                <label>
                                    <input type="checkbox">
                                    <span class="checkbox-list">Trên 20 Triệu</span>
                                </label>
                                <label>
                                    <input type="checkbox">
                                    <span class="checkbox-list">Trên 10 Triệu</span>
                                </label>
                                <label>
                                    <input type="checkbox">
                                    <span class="checkbox-list">Trên 5 Triệu</span>
                                </label>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End side bar -->

            <!-- Main content -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb10 alignright">
                        <form>
                            <div class="select-option form-group">
                                <select name="select" class="form-control" placeholder="Sắp xếp theo">
                                    <option value="" disabled selected>Sắp xếp theo</option>
                                    <option value="best_selling">Bán Chạy</option>
                                    <option value="low_price">Giá Thấp</option>
                                    <option value="high_price">Giá Cao</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <?php
                    foreach ($spall as $sp) {
                        extract($sp);
                        $chitietsp = "index.php?act=chitietsp&id=" . $id;
                        $hinh = $img_path . $hinh;
                        echo '
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb30">
                            <div class="product-block">
                                <div class="product-img">
                                    <a href="' . $chitietsp . '"><img src="' . $hinh . '" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <h4>
                                        <a class="product-title" href="' . $chitietsp . '">' . $tensp . '</a>
                                    </h4>
                                    <div class="product-price-wrapper">
                                        <span class="product-price">' . number_format($giasp, 0, ",", ".") . '<u>VND</u></span>
                                    </div>
                                </div>
                                <form action="" method="post" class="form-addtocart">
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
                        </div>
                        ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>