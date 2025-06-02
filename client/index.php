<?php
session_start();
ob_start(); // Fix lỗi đăng nhập với admin chuyển hướng đến trang admin
include "view/header.php";
include "global.php";
include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/giohang.php";

if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];

$sphome = loadall_sanpham_home();
$spall = loadall_sanpham_shop();
$dmnew = loadall_danhmuc_home();
$listdonmua = loadall_bill(0);

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'lienhe' :
            include "view/lienhe.php";
            break;
             case 'baiviet' :
            include "view/baiviet.php";
            break;
            case 'baiviet-chitiet':
            include "view/baiviet-chitiet.php";
            break;
            case 'gioithieu':
            include "view/gioithieu.php";
            break;
            case 'thongtin' :
            include "view/thongtin.php";
            break;
        
        case "chitietsp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
                extract($sanpham); // extract để lấy id danh mục sau khi load sản phẩm chi tiết
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
            }
            include "view/sanpham/chitiet.php";
            break;

        case "spdm":
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
                $spdm = loadall_sanpham($kyw = "", $iddm);
            }
            include "view/sanpham/spdm.php";
            break;

        case "sanpham":
            include "view/sanpham.php";
            break;


        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
