<?php
if (is_array($taikhoan)) {
    extract($taikhoan);
}
$hinhpath = "../upload/" . $hinh;
if (is_file($hinhpath)){
    $hinh = "<img src='" . $hinhpath . "' height='80'>";
}else{
    $hinh = "Không có hình ảnh";
}
?>

<div class="box-right">
    <div class="title-page">
        <p>Sửa tài khoản</p>
    </div>

    <form action="index.php?act=updatetk" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="title-form-group">Ảnh tài khoản</label><br>
            <input type="file" name="hinh" id="">
            <?= $hinh ?>
        </div>

        <!-- <div class="form-group">
            <label for="" class="title-form-group">Tên đăng nhập:</label><br>
            <input type="text" name="tendn" id="" class="form-input" value="<?= $tendn ?>">
        </div>
        <div class="form-group">
            <label for="" class="title-form-group">Mật khẩu:</label><br>
            <input type="password" name="mk" id="" class="form-input" value="<?= $mk ?>">
        </div> -->
        <div class="form-group">
            <label for="" class="title-form-group">Email:</label><br>
            <input type="email" name="email" id="" class="form-input" value="<?= $email ?>">
        </div>
        <div class="form-group">
            <label for="" class="title-form-group">Địa chỉ:</label><br>
            <input type="text" name="dc" id="" class="form-input" value="<?= $dc ?>">
        </div>
        <div class="form-group">
            <label for="" class="title-form-group">Số điện thoại:</label><br>
            <input type="text" name="sdt" id="" class="form-input" value="<?= $sdt ?>">
        </div>
        <div class="form-group">
            <label for="">Vai trò:</label><br>
            <div class="form-group-price">
                <input type="text" name="vaitro" id="" class="form-input" value="<?= $vaitro ?>">
            </div>
        </div>

        <div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" class="btn-submit" name="capnhat" value="Submit">
        </div>

        <div class="thongbao">
            <?php
            if (isset($thongbao) && $thongbao != "")
            echo $thongbao;
            ?>
        </div>
    </form>
</div>