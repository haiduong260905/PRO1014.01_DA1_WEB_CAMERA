<div class="box-right">
    <div class="title-page">
        <p>Đơn hàng</p>
    </div>

    <div class="form-search">
        <form action="" method="post">
            <input type="text" name="kyw" placeholder="Nhập từ khóa">
            <input type="Submit" name="timkiemdh" value="Tìm kiếm">
        </form>
    </div>

    <div class="row form-content">
        <table>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Số điện thoại</th>
                <th>Giá trị đơn hàng</th>
                <th>Tình trạng</th>
                <th>Ngày đặt hàng</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php
            foreach ($listbill as $bill) {
                extract($bill);
                $xoabill = "index.php?act=xoabill&id=" . $id;
                $suabill = "index.php?act=suabill&id=" . $id;
                $chitietbill = "index.php?act=chitietbill&id=" . $id;
                $ttdh = get_ttdh($bill["trangthai_dh"]);
                echo '
                    <tr>
                        <td>DH-' . $bill['id'] . '</td>
                        <td>' . $bill['tenkh'] . '</td>
                        <td>' . $bill['sdt_dh'] . '</td>
                        <td>' . number_format($bill["tong"], 0, ",", ".") . '<u>Đ</u></td>
                        <td>' . $ttdh . '</td>
                        <td>' . $bill['ngaydathang'] . '</td>
                        <td class="text-center">
                            <a href="' . $suabill . '"><input type="button" value="Sửa" class="btn-update"></a>
                            <a href="' . $xoabill . '" class="deleteLink" data-id="' . $id . '"><input type="button" value="Hủy" class="btn-delete"></a>
                            <a href="' . $chitietbill . '"><input type="button" value="Chi tiết" class="btn-detail"></a>
                        </td>
                    </tr>
                ';
            }
            ?>
        </table>
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