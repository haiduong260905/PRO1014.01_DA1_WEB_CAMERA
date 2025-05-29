<?php
if (is_array($donhang)) {
    extract($donhang);
    $xoabill = "index.php?act=xoabill&id=" . $id;
    $suabill = "index.php?act=suabill&id=" . $id;
}
$ttdh = get_ttdh($trangthai_dh);
?>

<div class="box-right">
    <div class="title-page">
        <p>Sửa đơn hàng</p>
    </div>

    <form action="index.php?act=updatebill" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="title-form-group">Địa chỉ giao hàng</label><br>
            <input type="text" name="dc_dh" id="" class="form-input" value="<?= $dc_dh ?>">
        </div>

        <div class="form-group">
            <label for="price">Số điện thoại:</label>
            <div class="form-group-price">
                <input type="text" name="sdt_dh" class="form-input" value="<?= $sdt_dh ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="price">Email:</label>
            <div class="form-group-price">
                <input type="email" name="email_dh" class="form-input" value="<?= $email_dh ?>">
            </div>
        </div>

        <div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" class="btn-submit" name="capnhat" value="Submit">
        </div>

        <div class="thongbao">
            <?php
            if (isset($thongbao) && ($thongbao != "")) // Kiểm tra nếu có thông báo (Ví dụ: Thêm thành công)
                echo $thongbao; // Hiển thị thông báo
            ?>
        </div>
    </form>
</div>