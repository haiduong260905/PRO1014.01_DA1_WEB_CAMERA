<?php
if (is_array($sanpham)) {
    extract($sanpham);
    $mausac = loadone_mausac($idmausac);
    $tenmau = $mausac['tenmau'] ?? 'Không rõ';
    $xoasp = "index.php?act=xoasp&id=" . $id;
    $suasp = "index.php?act=suasp&id=" . $id;
}
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='200'>";
} else {
    $hinh = "Không có hình ảnh";
}

$idsp = $_GET['id'];
$listbl_theoid = loadall_binhluan($idsp)

?>
<div class="box-right">
    <div class="title-page">
        <p>Chi tiết sản phẩm</p>
    </div>
    <div class="back-to-list" style="margin-bottom: 20px;">
        <a href="index.php?act=listsp" class="btn btn-secondary">← Quay lại danh sách sản phẩm</a>
    </div>

    <div class="btn-form-detail">
        <?php
        // echo '
        // <div >
        //     <a href="' . $suasp . '"  class="btn-update">Sửa</a>
        // </div>
        // <div >
        //     <a href="' . $xoasp . '"  class="btn-delete deleteLink" data-id="' . $id . '">Xóa</a>
        // </div>';
        ?>
    </div>

    <div class="row infor">
        <div class="statistics-order">
            <div class="row text-center">
                <div class="tb_detail_title">
                    <p>Ảnh sản phẩm</p>
                </div>
                <div class="img-sp">
                    <?= $hinh ?>
                </div>
            </div>
        </div>

        <div class="infor-items">
            <div class="row">
                <div class="statistics-title2">
                    <p>Thông tin sản phẩm</p>
                </div>
                <table class="tb_detail">
                    <?php
                    echo '<tr>
                        <th>ID Sản phẩm</th>
                        <td>' . $id . '</td>
                    </tr>

                    <tr>
                        <th>Tên sản phẩm</th>
                        <td>' . $tensp . '</td>
                    </tr>

                    <tr>
                        <th>Giá sản phẩm</th>
                        <td>' . number_format($giasp, 0, ",", ".") . ' <u>đ</u></td>
                    </tr>

                    <tr>
                        <th>Số lượng trong kho</th>
                        <td>' . $soluong . '</td>
                    </tr>

                    <tr>
                        <th>Đơn vị</th>
                        <td>' . $donvi . '</td>
                    </tr>

                    <tr>
                        <th>Màu sắc</th>
                        <td>' . $tenmau . '</td>
                    </tr>

                    <tr>
                        <th>Ngày nhập</th>
                        <td>' . $ngaynhap . '</td>
                    </tr>

                    <tr>
                        <th>Mô tả</th>
                        <td class="mota">' . $mota . '</td>
                    </tr>';
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="row form-content form-cmt">
        <div class="statistics-title2">
            <p>Bình luận</p>
        </div>
        <table>
            <tr>
                <th>STT</th>
                <th>Người bình luận</th>
                <th>Nội dung</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php
            foreach ($listbl_theoid as $key => $bl) {
                extract($bl);
                $xoabl = "index.php?act=xoabl&id=" . $id;
                $stt = $key + 1;
                echo '<tr>
                <td>' . $stt . '</td>
                <td>' . $tendn . '</td>
                <td class="noidungbl">' . $noidung . '</td>
                <td class="text-center">
                    <a href="' . $xoabl . '" class="deleteBl" data-id="' . $id . '"><input type="button" value="Xóa" class="btn-delete"></a>
                </td>
            </tr>';
            }
            ?>

        </table>
    </div>
</div>
</div>
<script>
    // Gắn sự kiện lắng nghe cho tất cả các phần tử có class deleteLink (xoasp - xóa sản phẩm)
    const deleteLinksProduct = document.querySelectorAll('.deleteLink');
    deleteLinksProduct.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            const id = this.getAttribute('data-id'); // Lấy ID từ thuộc tính data
            const xoasp = "index.php?act=xoasp&id=" + id;

            Swal.fire({
                title: "Xác nhận xóa?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Thực hiện yêu cầu xóa 
                    Swal.fire({
                        title: "Đã xóa!",
                        icon: "success"
                    }).then(() => {
                        // Chuyển hướng đến URL xóa sản phẩm
                        window.location.href = xoasp;
                    });
                }
            });
        });
    });

    // Gắn sự kiện lắng nghe cho tất cả các phần tử có class deleteBl (xoabl - xóa bình luận)
    const deleteLinksComment = document.querySelectorAll('.deleteBl');
    deleteLinksComment.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            const id = this.getAttribute('data-id'); // Lấy ID từ thuộc tính data
            const xoabl = "index.php?act=xoabl&id=" + id;

            Swal.fire({
                title: "Xác nhận xóa?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Thực hiện yêu cầu xóa 
                    Swal.fire({
                        title: "Đã xóa!",
                        icon: "success"
                    }).then(() => {
                        // Chuyển hướng đến URL xóa bình luận
                        window.location.href = xoabl;
                    });
                }
            });
        });
    });
</script>