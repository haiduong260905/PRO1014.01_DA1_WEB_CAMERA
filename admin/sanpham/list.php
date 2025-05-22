<div class="box-right">
    <div class="title-page">
        <p>Sản phẩm</p>
    </div>

    <div class="form-search">
        <form action="index.php?act=listsp" method="post">
            <input type="text" name="kyw" placeholder="Nhập từ khóa"> 
            <select name="iddm" class="dm-sp">
                <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    echo "<option value='" . $id . "'>$tendm</option>";
                }
                ?>
            </select>
            <input type="submit" name="timkiemsp" value="Tìm kiếm">
        </form>
    </div>

    <div class="btn-form mr20">
        <a href="index.php?act=addsp" class="btn-adddm">Thêm sản phẩm</a>
    </div>

    <div class="row form-content">
        <table>
            <tr>
                <th>STT</th>
                <th>TÊN SẢN PHẨM</th>
                <th>HÌNH SẢN PHẨM</th>
                <th>GIÁ SẢN PHẨM</th>
                <th>SỐ LƯỢNG</th>
                <th>MÔ TẢ</th>
                <th class="text-center">THAO TÁC</th>
            </tr>

            <?php
            if (isset($listsanpham)) {
                foreach ($listsanpham as $key => $sanpham) {
                    extract($sanpham);

                    $xoasp = "index.php?act=xoasp&id=" . $id;
                    $suasp = "index.php?act=suasp&id=" . $id;
                    $chitietsp = "index.php?act=chitietsp&id=" . $id;

                    $hinhpath = "../upload/" . $hinh;
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='80'>";
                    } else {
                        $hinh = "Không có hình ảnh";
                    }

                    $stt = $key + 1;

                    echo '<tr>  
                        <td>' . $stt . '</td>
                        <td>' . $tensp . '</td>
                        <td>' . $hinh . '</td>
                        <td>' . number_format($giasp, 0, ",", ".") . ' <u>đ</u></td>
                        <td>' . $soluong . '</td>
                        <td><div class="table-description">' . $mota . '</div></td>
                        <td class="text-center">
                            <a href="' . $suasp . '"><input type="button" value="Sửa" class="btn-update"></a>
                            <a href="' . $xoasp . '" class="deleteLink" data-id="' . $id . '"><input type="button" value="Xóa" class="btn-delete"></a>
                            <a href="' . $chitietsp . '"><input type="button" value="Chi tiết" class="btn-detail"></a>
                        </td>
                    </tr>';
                }
            }
            ?>
        </table>
    </div>
</div>

<!-- Xác nhận xóa -->
<script>
    const deleteLinks = document.querySelectorAll('.deleteLink');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');
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
                    Swal.fire({
                        title: "Đã xóa!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = xoasp;
                    });
                }
            });
        });
    });
</script>

<!-- CSS cải thiện mô tả -->
<style>
.table-description {
    max-height: 120px;
    overflow-y: auto;
    padding: 5px;
    border: 1px solid #ccc;
    background: #f9f9f9;
    white-space: pre-line;
    font-size: 14px;
    line-height: 1.5;
    max-width: 400px;
}
</style>
