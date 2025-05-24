<div class="box-right">
    <div class="title-page">
        <p>Danh mục</p>
    </div>

    <div class="form-search">
        <form action="" method="post">
            <input type="text" name="kyw" placeholder="Nhập từ khóa">
            <!-- Keyword -->
            <input type="submit" name="timkiemdm" value="Tìm kiếm">
        </form>
    </div>

    <div class="btn-form mr20">
        <a href="index.php?act=adddm" class="btn-adddm">Thêm danh mục</a>
    </div>

    <div class="row form-content">
        <table>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Hình danh mục</th>
                <th class="text-center">Thao tác</th>
            </tr>

            <?php
            foreach ($listdanhmuc as $key => $danhmuc) {
                extract($danhmuc);
                $suadm = "index.php?act=suadm&id=" . $id;
                $xoadm = "index.php?act=xoadm&id=" . $id;
                $hinhpath = "../upload/" . $hinhdm;
                if (is_file($hinhpath)) {
                    $hinh = "<img src='" . $hinhpath . "' height = '80'>";
                } else {
                    $hinh = "Không có hình ảnh";
                }
                $stt = $key + 1;
                echo '
                <tr>
                    <td>' . $stt . '</td>
                    <td>' . $tendm . '</td>
                    <td>' . $hinh . '</td>
                    <td class="text-center">
                        <a href="' . $suadm . '"><input type="button" value="Sửa" class="btn-update"></input></a>
                        <a href="' . $xoadm . '" class="deleteLink" data-id="' . $id . '"><input type="button" value="Xóa" class="btn-delete"></a>
                    </td>
                </tr>
                ';
            }
            ?>
        </table>

    </div>
</div>