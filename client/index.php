<?php
session_start();
ob_start();
include "view/header.php";
include "global.php";
include "../model/pdo.php";
include "../model/taikhoan.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/giohang.php";

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];

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
            if (isset($_POST['addtocart'])) {
                $id = $_POST['id'];
                $tensp = $_POST['tensp'];
                $hinh = $_POST['hinh'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'] ?? 1;
                $thanhtien = $soluong * $giasp;

                $found = false;
                foreach ($_SESSION['mycart'] as $i => $item) {
                    if ($item[1] === $tensp) {
                        $_SESSION['mycart'][$i][4] += $soluong;
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $spadd = [$id, $tensp, $hinh, $giasp, $soluong, $thanhtien];
                    $_SESSION['mycart'][] = $spadd;
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
            if (isset($_POST['dongydathang'])) {
                $makh = $_SESSION['user']['id'] ?? 0;
                $user = $_POST['tendn'];
                $email = $_POST['email'];
                $dc = $_POST['dc'];
                $sdt = $_POST['sdt'];
                $ngaydathang = date('d/m/Y');
                $tongdonhang = tongdonhang();

                $iddonhang = insert_bill($makh, $user, $email, $dc, $sdt, $ngaydathang, $tongdonhang);

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($makh, $cart[0], $cart[2], $cart[1], $cart[3], $cart[4], $cart[5], $iddonhang);
                }

                $bill = loadone_bill($iddonhang);
                $billct = loadall_cart($iddonhang);
            }
            include "view/donhang/xacnhan.php";
            break;

        // Đơn mua
        case 'donmua':
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user']['id'];
                $donmua = loadone_donmua($id);
                $listdonmua = listdonmua($id);
            }
            include "view/donhang/donmua.php";
            break;

        case 'chitietdonmua':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $billct = loadall_cart($_GET['id']);
                $donhang = loadone_bill($_GET['id']);
            }
            include "view/donhang/chitiet.php";
            break;

        case 'danhan':
            if (isset($_POST['xacnhan']) && isset($_POST['id'])) {
                da_nhan_hang($_POST['id']);
                header("location: index.php?act=donmua");
            }
            break;

        // Các trang tĩnh
        case 'lienhe':
            include "view/lienhe.php";
            break;

        case 'baiviet':
            include "view/baiviet.php";
            break;

        case 'baiviet-chitiet':
            include "view/baiviet-chitiet.php";
            break;

        case 'gioithieu':
            include "view/gioithieu.php";
            break;

        case 'thongtin':
            include "view/thongtin.php";
            break;

        // Sản phẩm
        case "chitietsp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $sanpham = loadone_sanpham($_GET['id']);
                extract($sanpham);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
            }
            include "view/sanpham/chitiet.php";
            break;

        case "spdm":
            if (isset($_GET['iddm']) && $_GET['iddm'] > 0) {
                $spdm = loadall_sanpham("", $_GET['iddm']);
            }
            include "view/sanpham/spdm.php";
            break;

        case "sanpham":
            include "view/sanpham.php";
            break;

        // Tài khoản
        case 'dangnhap':
            if (isset($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    if ($checkuser['vaitro'] == "admin") {
                        header("location: ../admin/index.php");
                        exit;
                    }
                    header("location: index.php");
                    exit;
                } else {
                    $thongbao = "Tài khoản không tồn tại !";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky'])) {
                insert_taikhoan($_POST['user'], $_POST['pass'], $_POST['email']);
                $thongbao = "Đăng ký thành công !";
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'dangxuat':
            session_unset();
            header("location: index.php");
            break;

        case 'doimk':
            if (isset($_POST['doimk'])) {
                $id = $_POST['id'];
                $pass = $_POST['pass'];
                $newpass = $_POST['newpass'];
                $repass = $_POST['repass'];

                if ($pass == "" || $newpass == "" || $repass == "") {
                    $thongbao = "Vui lòng nhập đầy đủ thông tin !";
                } elseif ($_SESSION['user']) {
                    if ($pass !== $_SESSION['user']['mk']) {
                        $thongbao = "Mật khẩu không chính xác !";
                    } elseif ($newpass !== $repass) {
                        $thongbao = "Xác nhận mật khẩu không chính xác !";
                    } else {
                        update_matkhau($id, $newpass);
                        echo '<script>alert("Đổi mật khẩu thành công. Vui lòng đăng nhập lại để tiếp tục !");</script>';
                        echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
                        session_unset();
                        exit;
                    }
                } else {
                    $thongbao = "Người dùng không hợp lệ!";
                }
            }
            include "view/taikhoan/doimk.php";
            break;

        case 'taikhoan':
            include "view/taikhoan/taikhoan.php";
            break;

        case 'updatetk':
            if (isset($_POST['updatetk'])) {
                $id = $_POST['id'];
                $tendn = $_POST['tendn'];
                $email = $_POST['email'];
                $dc = $_POST['dc'];
                $sdt = $_POST['sdt'];

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($hinh);

                if ($hinh != "") {
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                }

                update_taikhoan_kh($id, $tendn, $email, $dc, $sdt, $hinh);
                echo '<script>alert("Cập nhật thành công. Vui lòng đăng nhập lại.");</script>';
                echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
                session_unset();
                exit;
            }
            break;

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
