<div class="box-right">
    <div class="title-page">
        <p>Bình luận</p> <!-- // Tiêu đề trang quản lý bình luận -->
    </div>

    <div class="form-search">
        <form action="index.php?act=listbl" method="post"> <!-- // Gửi dữ liệu tìm kiếm đến trang listbl -->
            <input type="text" name="kyw" placeholder="Nhập từ khóa"> <!-- // Ô nhập từ khóa tìm kiếm -->
            <input type="submit" name="timkiembl" value="Tìm kiếm"> <!-- // Nút gửi form tìm kiếm -->
        </form>
    </div>

    <div class="row form-content">
        <table>
            <tr>
                <th>Mã bình luận</th>
                <th>Nội dung</th>
                <th>Khách hàng</th>
                <th>Sản phẩm</th>
                <th>Ngày bình luận</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php
            foreach ($listbinhluan as $binhluan) { // // Duyệt qua danh sách bình luận
                extract($binhluan); // // Tách các phần tử mảng thành biến riêng lẻ
                $xoabl = "index.php?act=xoabl&id=" . $id; // // Tạo URL để xóa bình luận theo ID

                echo '<tr>
                        <td>BL-' . $id . '</td> <!-- // Hiển thị mã bình luận -->
                        <td class="noidungbl">' . $noidung . '</td> <!-- // Hiển thị nội dung bình luận -->
                        <td>' . $tendn . '</td> <!-- // Hiển thị tên khách hàng -->
                        <td>' . $tensp . '</td> <!-- // Hiển thị tên sản phẩm -->
                        <td>' . $ngaybinhluan . '</td> <!-- // Hiển thị ngày bình luận -->
                        <td class="text-center">
                            <a href="' . $xoabl . '" class="deleteLink" data-id="' . $id . '"><input type="button" value="Xóa" class="btn-delete"></a> <!-- // Nút xóa, gắn data-id để dùng với JS -->
                        </td>
                    </tr>';
            }
            ?>
        </table>
    </div>
</div>

<script>
    // Gắn sự kiện lắng nghe cho tất cả các phần tử có class deleteLink
    const deleteLinks = document.querySelectorAll('.deleteLink'); // // Lấy tất cả các phần tử có class deleteLink

    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) { // // Gắn sự kiện click cho từng link
            event.preventDefault(); // // Ngăn chặn hành động mặc định (chuyển trang)

            const id = this.getAttribute('data-id'); // // Lấy ID từ thuộc tính data-id
            const xoabl = "index.php?act=xoabl&id=" + id; // // Tạo URL xóa tương ứng

            Swal.fire({
                title: "Xác nhận xóa?", // // Tiêu đề hộp thoại xác nhận
                icon: "warning", // // Icon cảnh báo
                showCancelButton: true, // // Hiện nút hủy
                confirmButtonColor: "#3085d6", // // Màu nút xác nhận
                cancelButtonColor: "#d33", // // Màu nút hủy
                confirmButtonText: "Xác nhận" // // Nội dung nút xác nhận
            }).then((result) => {
                if (result.isConfirmed) { // // Nếu người dùng xác nhận xóa
                    Swal.fire({
                        title: "Đã xóa!", // // Hiển thị thông báo đã xóa
                        icon: "success" // // Icon thành công
                    }).then(() => {
                        window.location.href = xoabl; // // Điều hướng đến URL xóa bình luận
                    });
                }
            });
        });
    });
</script>
