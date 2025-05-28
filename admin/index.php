<?php
include("header.php");
include("../model/pdo.php");
include("../model/danhmuc.php");
include("../model/sanpham.php");
include("../model/taikhoan.php");
include("../model/giohang.php");
include("../model/binhluan.php");
include("../model/mausac.php");

if (isset($_GET["act"]) && ($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'dangxuat':
            session_unset();
            header("location: ../client/index.php");
            break;
            // Danh mục
        case 'listdm':
            if (isset($_POST['timkiemdm']) && ($_POST['timkiemdm'])) {
                $kyw = $_POST['kyw'];
            } else { // Fix lỗi $kym k tồn tại khi chưa click
                $kyw = "";
            }
            $listdanhmuc = loadall_danhmuc($kyw);
            include('danhmuc/list.php');
            break;

        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/"; //Khai báo thư mục upload
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                insert_danhmuc($tenloai, $hinh);
                $thongbao = "Thêm thành công";
                header("location: index.php?act=listdm");
            }
            include('danhmuc/add.php');
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;

        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/"; //Khai báo thư mục upload
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    
                } else {
                    
                }
                update_danhmuc($id, $tenloai, $hinh);
                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listdm");
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/add.php";
            break;

            // Sản phẩm
        case 'listsp':
            if (isset($_POST['timkiemsp']) && ($_POST['timkiemsp'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else { // Fix lỗi $kym k tồn tại khi chưa click
                $kyw = "";
                $iddm = 0;
            }
            $listdm = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include('sanpham/list.php');
            break;

        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = trim($_POST['tensp']);
                $giasp = trim($_POST['giasp']);
                $soluong = trim($_POST['soluong']);
                $mota = trim($_POST['mota']);
                $donvi = trim($_POST['donvi']);
                $ngaynhap = $_POST['ngaynhap'];
                $idmausac = isset($_POST['idmausac']) ? $_POST['idmausac'] : 0; // Nếu có màu sắc

                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // Upload thành công
                }

                // ✅ Kiểm tra dữ liệu trước khi insert
                if ($tensp != "" && is_numeric($giasp) && $giasp > 0 && is_numeric($soluong)) {
                    insert_sanpham($tensp, $giasp, $soluong, $hinh, $mota, $donvi, $ngaynhap, $iddm, $idmausac);
                    $thongbao = "Thêm thành công";
                    header("location: index.php?act=listsp");
                    exit();
                } else {
                    $thongbao = "⚠️ Vui lòng nhập đầy đủ thông tin và đảm bảo giá/số lượng là số.";
                }
            }
            $listdm = loadall_danhmuc();
            include('sanpham/add.php');
            break;

        case 'xoasp':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_sanpham($_GET['id']);
                header("location: index.php?act=listsp");
            }
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdm = loadall_danhmuc();
            include "sanpham/update.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $soluong = $_POST['soluong'];
                $mota = $_POST['mota'];
                $donvi = $_POST['donvi'];
                $ngaynhap = $_POST['ngaynhap'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   
                } else {
                    
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $soluong, $mota, $donvi, $ngaynhap, $hinh);
                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listsp");
            }
            $listdm = loadall_danhmuc();
            break;

        case 'chitietsp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            include('sanpham/chitiet.php');
            break;

            // Tài khoản
        case 'listtk':
            if (isset($_POST['timkiemtk']) && ($_POST['timkiemtk'])) {
                $kyw = $_POST['kyw'];
            } else { // Fix lỗi $kym k tồn tại khi chưa click
                $kyw = "";
            }
            $listtaikhoan = loadall_taikhoan($kyw);
            include('taikhoan/list.php');
            break;

        case 'chitiettk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            include('taikhoan/chitiet.php');
            break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
                header("location: index.php?act=listtk");
            }
            break;

        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = loadone_taikhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;

        case 'updatetk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $tendn = $_POST['tendn'];
                $mk = $_POST['mk'];
                $email = $_POST['email'];
                $dc = $_POST['dc'];
                $sdt = $_POST['sdt'];
                $vaitro = $_POST['vaitro'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                   
                } else {
                   
                }
                update_taikhoan($id, $email, $dc, $sdt, $vaitro, $hinh);
                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listtk");
            }
            $listdm = loadall_danhmuc();
            break;

            // Đơn hàng
        case 'listbill':
            if (isset($_POST['timkiemdh']) && ($_POST['timkiemdh'])) {
                $kyw = $_POST['kyw'];
            } else { // Fix lỗi $kym k tồn tại khi chưa click
                $kyw = "";
            }
            $listbill = loadall_bill(0, $kyw);
            include "donhang/list.php";
            break;

        case 'xoabill':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_bill($_GET['id']);
                header("location: index.php?act=listbill");
            }

        case 'suabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_bill($_GET['id']);
            }
            include "donhang/update.php";
            break;

        case 'updatebill':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $dc_dh = $_POST['dc_dh'];
                $sdt_dh = $_POST['sdt_dh'];
                $email_dh = $_POST['email_dh'];

                update_bill($id, $dc_dh, $sdt_dh, $email_dh);
                $thongbao = "Cập nhật thành công";
                header("location: index.php?act=listbill");
            }
            $listdm = loadall_danhmuc();
            break;

        case 'chitietbill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_bill($_GET['id']);
                $billct = loadall_cart($_GET['id']);
            }
            include('donhang/chitiet.php');
            break;

        case 'xacnhandh':
            if (isset($_POST['id']) && ($_POST['id'] > 0)) {
                $id = $_POST['id'];
                xacnhan_dh($id);
                header("location: index.php?act=chitietbill&id=$id");
            }
            break;

        case 'xacnhangiaohang':
            if (isset($_POST['id']) && ($_POST['id'] > 0)) {
                $id = $_POST['id'];
                xacnhan_giaohang($id);
                header("location: index.php?act=listbill");
            }
            break;

        case 'xacnhanthanhtoan':
            if (isset($_POST['id']) && ($_POST['id'] > 0)) {
                $id = $_POST['id'];
                xacnhan_thanhtoan($id);
                header("location: index.php?act=listbill");
            }
            break;

            // Bình luận
        case 'listbl':
            if (isset($_POST['timkiembl']) && ($_POST['timkiembl'])) {
                $kyw = $_POST['kyw'];
            } else { // Fix lỗi $kym k tồn tại khi chưa click
                $kyw = "";
            }
            $listbinhluan = loadall_binhluan(0, $kyw);
            include('binhluan/list.php');
            break;

        case "xoabl":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
                header("location: index.php?act=listbl");
            }
            $listbinhluan = loadall_binhluan("", 0);
            include('binhluan/list.php');
            break;
        default:
            include("home.php");
            break;
    }
} else {
    include("home.php");
}
include("footer.php");
