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
        // Giỏ hàng
        case 'giohang':
            include "view/donhang/giohang.php";
            break;

        case 'addtocart':
            if(isset($_POST['addtocart']) && ($_POST['addtocart'])){
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $hinh = $_POST['hinh'];
                $giasp = $_POST['giasp'];
                if(isset($_POST['soluong'])){
                    $soluong = $_POST['soluong'];
                }else{
                    $soluong = 1;
                }
                $thanhtien = $soluong * $giasp;
                $temp = 0;
                $i = 0;
                foreach($_SESSION['mycart'] as $item){
                    if($item[1] === $tensp){
                        $slnew = $soluong + $item[4];
                        $_SESSION['mycart'][$i][4] = $slnew;
                        $temp = 1;
                        break;
                    }
                    $i++;
                }
                if($temp == 0){
                    $spadd = [$id, $tensp, $hinh, $giasp, $soluong, $thanhtien];
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            include "view/donhang/giohang.php";
            break;  

            case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=addtocart');
            break;

            case 'donhang':
            include "view/donhang/donhang.php";
            break;

        case 'xacnhan':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                if ($_SESSION['user'])
                    $makh = $_SESSION['user']['id'];
                else
                    $id = 0;
                $user = $_POST['tendn'];
                $email = $_POST['email'];
                $dc = $_POST['dc'];
                $sdt = $_POST['sdt'];
                // $pttt = $_POST['pttt'];
                $ngaydathang = date('d/m/Y');
                $tongdonhang = tongdonhang();

                //Tạo bill
                $iddonhang = insert_bill($makh, $user, $email, $dc, $sdt, $ngaydathang, $tongdonhang);

                //Insert Into cart: Lấy dữ liệu $session['mycart'] & iddonhang=
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $iddonhang);
                }

            }
            $bill = loadone_bill($iddonhang);
            $billct = loadall_cart($iddonhang);
            include "view/donhang/xacnhan.php";
            break;

        // Đơn mua
        case 'donmua':
            if (isset($_SESSION['user'])){
                extract($_SESSION['user']);
                $id = $_SESSION['user']['id'];
                $donmua = loadone_donmua($id);
                $listdonmua = listdonmua($id);
            }
            include "view/donhang/donmua.php";
            break;

        case 'chitietdonmua':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $billct = loadall_cart($_GET['id']);
                $donhang = loadone_bill($_GET['id']);
            }
            include "view/donhang/chitiet.php";
            break;

        case 'danhan':
            if (isset($_POST['xacnhan']) && ($_POST['xacnhan'])) {
                if (isset($_POST['id']) && ($_POST['id'] > 0)) {
                    $id = $_POST['id'];
                    da_nhan_hang($id);
                }
                header("location: index.php?act=donmua");
            }
            break;

        // Sản phẩm
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

        case 'dangnhap':
            include "view/taikhoan/dangnhap.php";
            break;
        case 'dangky':
            include "view/taikhoan/dangky.php";
            break;
        case 'dangxuat':
            unset($_SESSION['mycart']);
            unset($_SESSION['taikhoan']);
            include "view/taikhoan/dangnhap.php";
            break;
        case 'doimk':
            include "view/taikhoan/doimk.php";
            break;
        case 'taikhoan':
            include "view/taikhoan/taikhoan.php";
            break;
        
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
