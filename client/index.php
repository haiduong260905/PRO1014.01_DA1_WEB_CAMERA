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
        case 'dangnhap':
            if (isset ($_POST['dangnhap']) && ($_POST['dangnhap'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)){
                    $_SESSION['user'] = $checkuser;
                    $thongbao = "Đăng nhập thành công !";
                    header("location: index.php");
                    if (isset($_SESSION['user'])){
                        extract($_SESSION['user']);
                        if ($vaitro == "admin") {
                            header("location: ../admin/index.php");
                        }
                    }
                }else{
                    // echo "<script>alert('Tài khoản không tồn tại !');</script>";
                    $thongbao = "Tài khoản không tồn tại !";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'dangky':
            if (isset ($_POST['dangky']) && ($_POST['dangky'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                insert_taikhoan($user, $pass, $email);
                $thongbao = "Đăng ký thành công !";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangxuat':
            session_unset();
            header("location: index.php");
            break;
        case 'doimk':
            if (isset ($_POST['doimk']) && ($_POST['doimk'])){
                $id = $_POST['id'];
                $pass = $_POST['pass'];
                $newpass = $_POST['newpass'];
                $repass = $_POST['repass'];
                
                if ($pass == "" || $newpass == "" || $repass == ""){
                    $thongbao = "Vui lòng nhập đầy đủ thông tin !";
                }elseif (isset($_SESSION['user'])){
                   $user = $_SESSION['user'];
                    if ($pass !== $user['mk']){
                        $thongbao = "Mật khẩu không chính xác !";
                    }elseif ($newpass !== $repass){
                        $thongbao = "Xác nhận mật khẩu không chính xác !";
                    }else {
                        update_matkhau($id, $newpass);
                        echo '<script>alert("Đổi mật khẩu thành công. Vui lòng đăng nhập lại để tiếp tục !");</script>';
                        echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
                        session_unset();
                    }
                }else {
                    $thongbao = "Người dùng không hợp lệ!";
                }
            }
            include "view/taikhoan/doimk.php";
            break;
        case 'taikhoan':
            include "view/taikhoan/taikhoan.php";
            break;
        case 'updatetk':
            if (isset($_POST['updatetk']) && ($_POST['updatetk'])){
                $id = $_POST['id'];
                $tendn = $_POST['tendn'];
                $email = $_POST['email'];
                $dc = $_POST['dc'];
                $sdt = $_POST['sdt'];

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)){
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                }else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_taikhoan_kh($id, $tendn, $email, $dc, $sdt, $hinh);
                echo '<script>Swal.file({
                    title: "Đổi thông tin thành công!",
                    text: "Vui lòng đăng nhập lại",
                    icon: "success"
                });</script>';
                
                echo "<script>window.location.href = 'index.php?act=dangnhap';</script>";
                session_unset();
            }
            $listdm = loadall_danhmuc();
            break;
        
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
