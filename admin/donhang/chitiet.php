<?php
if (is_array($donhang)) {
    extract($donhang);
    $xoabill = "index.php?act=xoabill&id=" . $id;
    $suabill = "index.php?act=suabill&id=" . $id;
}

if (is_array($billct)) {
    extract($billct);
}

$ttdh = get_ttdh($trangthai_dh);
?>
<div class="box-right">
    <div class="title-page">
        <p>Chi tiết đơn hàng</p>
    </div>

    <div class="btn-form-detail mr10">
        <?php
        echo '
        <div>
            <a href="' . $suabill . '" class="btn-update">Sửa</a>
        </div>
        <div>
            <a href="' . $xoabill . '" class="btn-delete deleteLink" data-id="' . $id . '">Hủy</a>
        </div>
        '
        ?>
    </div>

    <div class="mt70 donhangct">
        <div class="row pd10">
            <div class="statistics-title2">
                <p>Thông tin khách hàng</p>
            </div>
            <table class="tb_detail">
                <?php
                echo '
                <tr>
                    <th>Mã đơn hàng</th>
                    <td>DH - ' . $id . '</td>
                </tr>
                <tr>
                    <th>Tên khách hàng</th>
                    <td>' . $tenkh . '</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>' . $email_dh . '</td>
                </tr>
                <tr>
                    <th>Địa chỉ giao hàng</th>
                    <td>' . $dc_dh . '</td>
                </tr>
                <tr>
                    <th>Số điện thoại</th>
                    <td>' . $sdt_dh . '</td>
                </tr>
                <tr>
                    <th>Ngày đặt hàng</th>
                    <td>' . $ngaydathang . '</td>
                </tr>
                <tr>
                    <th>Đơn giá</th>
                    <td>' . number_format($tong) . '<u>đ</u></td>
                </tr>
                <tr>
                    <th>Tình trạng</th>
                    <td>' . $ttdh . '</td>
                </tr>
                ';
                ?>
            </table>
        </div>
    </div>

    <?php
    if ($trangthai_dh == 0) {
        echo '
        <div class="form-confirm mr28">
            <form action="index.php?act=xacnhandh" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" name="xacnhan" value="Xác nhận đơn hàng">
            </form>
        </div>
        ';
    }
    if ($trangthai_dh == 1) {
        echo '
        <div class="form-confirm mr28">
            <form action="index.php?act=xacnhangiaohang" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" name="xacnhan" value="Giao hàng">
            </form>
        </div>
        ';
    }
    if ($trangthai_dh == 3) {
        echo '
        <div class="form-confirm mr28">
            <form action="index.php?act=xacnhanthanhtoan" method="post">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="submit" name="xacnhan" value="Thanh toán thành công">
            </form>
        </div>
        ';
    }
    ?>
    <div class="mt90 donhangct">
        <div class="statistic-title2 pd10" style="margin-top: 0;">
            <p>Thông tin đơn hàng</p>
        </div>
        <div class="row form-content pd10">
            <table>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php
                foreach ($billct as $bill) {
                    extract($bill);
                    $hinhpath = "../upload/" . $hinh;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "Không có hình ảnh";
                    }
                    echo '
                        <tr>
                            <td>' . $masp . '</td>
                            <td>' . $ten . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . number_format($gia, 0, ",", ".") . '<u>đ</u></td>
                            <td>' . $soluong . '</td>
                            <td>' . number_format($thanhtien, 0, ",", ".") . '<u>đ</u></td>
                        </tr>
                    ';
                }
                ?>
            </table>
        </div>
    </div>
</div>
<script>
    // Gắn sự kiện lắng nghe cho tất cả các phần tử có class deleteLink
    const deleteLinks = document.querySelectorAll('deleteLink');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            const id = this.getAttribute('data-id'); // Lấy id từ thuộc tính data
            const xoabill = "index.php?act=xoabill&id=" + $id;

            Swal.fire({
                title: "Xác nhận hủy đơn?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        // Thực hiện yêu cầu xóa
                        title: "Đã hủy đơn hàng!",
                        icon: "success"
                    }).then(() => {
                        // Chuyển hướng đến URL xóa
                        window.location.href = xoabill;
                    });
                }
            });
        });
    });
</script>