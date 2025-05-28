<style>
    .box-right {
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        margin: 0 auto;
    }

    .title-page p {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .form-input, select, textarea {
        width: 100%;
        padding: 6px 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
    }

    .form-group-price {
        display: flex;
        align-items: center;
    }

    .form-group-price span.input-group-text {
        padding: 5px 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-right: none;
        border-radius: 8px 0 0 8px;
    }

    .form-group-price input {
        border-left: none;
        border-radius: 0 8px 8px 0;
        flex: 1;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .thongbao {
        margin-top: 15px;
        color: green;
        font-weight: 600;
    }
</style>

<div class="box-right">
    <div class="title-page">
        <p>Thêm sản phẩm</p>
    </div>

    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Ảnh sản phẩm</label>
            <input type="file" name="hinh">
        </div>

        <div class="form-group">
            <label>Tên sản phẩm:</label>
            <input type="text" name="tensp" class="form-input" placeholder="Nhập tên sản phẩm">
        </div>

        <div class="form-group">
            <label>Danh mục:</label>
            <select name="iddm" id="" class="form-input">
                <?php
                foreach ($listdm as $danhmuc) {
                    extract($danhmuc);
                    echo "<option value='" . $id . "'>$tendm</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Giá sản phẩm:</label>
            <div class="form-group-price">
                <span class="input-group-text">$</span>
                <input type="text" name="giasp" class="form-input" placeholder="Nhập giá sản phẩm">
            </div>
        </div>

        <div class="form-group">
            <label>Số lượng:</label>
            <input type="text" name="soluong" class="form-input" placeholder="Nhập số lượng sản phẩm">
        </div>

        <div class="form-group">
            <label>Mô tả sản phẩm:</label>
            <textarea name="mota" class="form-input" rows="4" placeholder="Mô tả chi tiết sản phẩm"></textarea>
        </div>

        <div class="form-group">
            <label>Đơn vị:</label>
            <input type="text" name="donvi" class="form-input" placeholder="Nhập đơn vị tính">
        </div>

        <div class="form-group">
            <label>Ngày nhập:</label>
            <input type="date" name="ngaynhap" class="form-input">
        </div>

        <div>
            <input type="submit" class="btn-submit" name="themmoi" value="Submit">
        </div>

        <div class="thongbao">
            <?php
            if (isset($thongbao) && $thongbao != "")
                echo $thongbao;
            ?>
        </div>
    </form>
</div>
