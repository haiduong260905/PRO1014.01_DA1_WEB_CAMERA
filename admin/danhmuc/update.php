<div class="box-right">
    <div class="title-page">
        <p>Sửa danh mục</p> <!-- Tiêu đề trang danh mục -->
    </div>

    <form action="index.php?act=adddm" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="title-form-group">ID danh mục</label><br>
            <input type="text" name="maloai" id="" class="form-input" placeholder="ID tự động tăng" disabled>
        </div>

        <div class="form-group">
            <label for="" class="title-form-group">Tên danh mục:</label><br>
            <input type="text" name="tenloai" id="" class="form-input" placeholder="Nhập tên danh mục">
        </div>

        <div class="form-group">
            <label for="" class="title-form-group">Ảnh danh mục</label><br>
            <input type="file" name="hinh" id="">
        </div>

        <div>
            <input type="submit" class="btn-submit" name="themmoi" value="Submit">
        </div>

        <div class="thongbao">
            <?php
            if (isset($thongbao) && ($thongbao != "")) // Kiểm tra nếu có thông báo (Ví dụ: Thêm thành công)
                echo $thongbao; // Hiển thị thông báo
            ?>
        </div>
    </form>
</div>