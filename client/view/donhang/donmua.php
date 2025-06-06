<?php
if(empty($_SESSION['user'])) {
    echo '<script>alert("Vui lý đăng nhập");</script>';
    echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
}
?>

<?php
if(is_array($donmua)){
    extract($donmua);
}
?>

<!-- header-section -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang chu</a></li>
                        <li>Don hang cua ban</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- login-form -->
<div class="content">
    <div class="container">
        <div class="box">
            <div class="row-account">
                <div class="left-container">
                    <div class="user-infor">
                        <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                            echo '<a href="your_destination_url_here">

                            <strong = class="text-red">'. $tendn.'</strong>
                            
                        </a>';
                        }
                        ?>
                    </div>
                    <div class="side-bar-content">
                        <ul>
                            <a href="index.php?act=taikhoan">
                                <li class="slide-bar"><i class="fa fa-edit"></i><span>Thong tin tai khoan</span></li>
                            </a>
                            <a href="index.php?act=doimk">
                                <li class="slide-bar"><i class="fa fa-lock"></i><span>Doi mat khau"></li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="right-container">
                    <h3 class="title-content">Don hang cua ban</h3>
                    <div class="receipt-infor" style="height: 95%;">
                        <table class="table table-hover" style="height: 500px;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Ma don hang</th>
                                    <th>So dien thoai</th>
                                    <th>Dia chi</th>
                                    <th>Don gia</th>
                                    <th>Tinh trang</th>
                                    <th>Chi tiet</th>
                                    <th>Xac nhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($listdonmua as $donmua){
                                    extract($donmua);
                                    $chitietdonmua = "index.php?act=chitietdonmua&id=" . $id;

                                    $ttdh = get_ttdh($trangthai_dh); // Lay trang thai cua don hang
                                    if($trangthai_dh == 2){ // Kiem tra neu trang thai don hang la 2 (cho xac nhan)
                                        $da_nhan = '<input type="submit" name="xacnhan" value="Da nhan" class="w80">'; // Dung la 2 thi xac nhan
                                    }else{
                                        $da_nhan = '';
                                    }
                                    echo '<tr>
                                        <td class="product-name"><a href="' . $chitietdonmua . '">DH-' . $id . '</a></td>
                                        <td class="product-name"><a href="' . $chitietdonmua . '">' . $sdt_dh . '</a></td>
                                        <td class="product-name"><a href="' . $chitietdonmua . '">' . $dc_dh . '</a></td>
                                        <td class="product-price-cart"><span class="amount">' . number_format($tong, 0, ",", ".") . ' <u>đ</u></span></td>
                                        <td class="product-subtotal text-danger">' . $ttdh . '</td>
                                        <td class="product-subtotal"><a href="' . $chitietdonmua . '" class="icon-eye icons"></a></td>
                                        <td>      
                                            <form action="index.php?act=danhan" method="post">
                                                <input type="hidden" name="id" value="' . $id . '">
                                                ' . $da_nhan . '
                                                </form>
                                        </td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.login-form -->
<!-- shopping-cart-area start -->


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