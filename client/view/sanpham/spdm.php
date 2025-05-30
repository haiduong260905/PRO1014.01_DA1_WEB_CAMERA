<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li>Sản phẩm - Danh mục</li>
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
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>