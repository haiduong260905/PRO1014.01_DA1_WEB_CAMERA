<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
    $xoatk = "index.php?act=xoatk&id=" . $id;
    $suatk = "index.php?act=suatk&id=" . $id;
}
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)) {
    $hinh = "<img src='" . $hinhpath . "' height='200'>";
} else {
    $hinh = "Không có hình ảnh";
}

?>
<div class="box-right">
    <div class="title-page">
        <p>Chi tiết tài khoản</p>
    </div>

    <div class="btn-form-detail">
        <?php
        echo '
        <div>
            <a href="' . $suatk . '" class="btn-update">Sửa</a>
        </div>
        <div>
            <a href="' . $xoatk . '" class="btn-delete deleteLink" data-id="' . $id . '">Xóa</a>
        </div>';
        ?>
    </div>

    <div class="row infor">
        <div class="statistics-order">
            <div class="row text-center">
                <div class="tb_detail_title">
                    <p>Ảnh tài khoản</p>
                </div>
                <div class="img-sp">
                    <?= $hinh ?>
                </div>
            </div>
        </div>


        <div class="infor-items">
            <div class="row">
                <div class="statistics-title2">
                    <p>Thông tin tài khoản</p>
                </div>
                <table class="tb_detail">
                    <?php
                    echo '<tr>
                      <th>ID Tài khoản</th>
                      <td>' . $id . '</td>
                </tr>
                <tr>
                    <th>Tên đăng nhập</th>
                    <td>' . $tendn . '</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>' . $email . '</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>' . $dc . '</td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td>' . $sdt . '</td>
                </tr>
                <tr>
                    <th>Vai trò</th>
                    <td class="mota">' . $vaitro . '</td>
                </tr>';
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row form-content form-cmt">
        <div class="statistics-title2">
            <p>Đơn mua</p>
        </div>
        <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Người đặt hàng</th>
                <th>Số điẹn thoại</th>
                <th>Giá trị đơn</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php
            $id = $_GET['id'];
            $listdonmua = listdonmua($id);
            foreach ($listdonmua as $donmua){
                extract($donmua);
                $xoabill = "index.php?act=xoabill&id=" . $id;
                $suabill = "index.php?act=suabill&id=" . $id;
                $chitietbill = "index.php?act=chitietbill&id=" . $id;
                $ttdh = get_ttdh($trangthai_dh);
                echo '<tr>
                <td>DH-' . $id . '</td>
                <td>' . $tenkh . '</td>
                <td>' . $sdt_dh . '</td>
                <td>' . number_format($tong, 0, ",", ".") . ' <u>đ</u></td>
                <td>' . $ttdh . '</td>
                <td>' . $ngaydathang . '</td>
                <td class="text-center">
                <a href="'.$suabill.'"><input type="button" value="Sửa" class="btn-update"></a>
                <a href="'.$xoabill.'" class="deleteDh" data-id="' . $id . '"><input type="button" value="Xóa" class="btn-delete"></a>
                <a href="'.$chitietbill.'"><input type="button" value="Chi tiết" class="btn-detail"></a>
                </td>
                </tr>';
            }
            ?>
        </table>
    </div>
</div>
<script>
    const deleteLinksAccount = document.querySelectorAll('.deleteLink');
    deleteLinksAccount.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const id = this.getAtribute('data-id');
            const xoatk = "index.php?act=xoatk&id=" + id;

            Swal.fire({
                title: "Xác nhận xóa?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
            }).then((result) => {
                if (result.isConfirmed){
                    Swal.fire({
                        title: "Đã xóa!",
                        icon: "success",
                    }).then(() => {
                        window.location.href = xoatk;
                    });
                }
            });
        });
    });

    const deleteLinksDh = document.querySelectorAll('.deleteDh');
    deleteLinksDh.forEach(link => {
        link.addEventListener('click', function (event) {
             event.preventDefault();
            const id = this.getAtribute('data-id');
            const xoabill = "index.php?act=xoabill&id=" + id;

            Swal.fire({
                title: "Xác nhận hủy đơn?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận",
            }).then((result) => {
                if (result.isConfirmed){
                    Swal.fire({
                        title: "Đã hủy đơn hàng!",
                        icon: "success",
                    }).then(() => {
                        window.location.href = xoabill;
                    });
                }
            });
        })
    })
</script>