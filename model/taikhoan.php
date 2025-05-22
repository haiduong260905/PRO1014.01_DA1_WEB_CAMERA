<?php
function tong_taikhoan()
{
    $sql = "SELECT * FROM tb_taikhoan WHERE 1";
    $tongdh = pdo_query($sql);
    return sizeof($tongdh);
}
function insert_taikhoan($user, $pass, $email) //Đăng ký
{
    $sql = "INSERT INTO tb_taikhoan(tendn, mk, email) VALUES ('$user', '$pass', '$email')";
    pdo_execute($sql);
}

function checkuser($user, $pass) // Check thông tin để đăng nhập
{
    $sql = "SELECT * FROM tb_taikhoan WHERE tendn ='" . $user . "' AND mk = '" . $pass . "'";
    $tk = pdo_query_one($sql);
    return $tk;
}

function loadall_taikhoan($kyw = "")
{
    $sql = "SELECT * FROM tb_taikhoan WHERE 1";
    //Các tài khoản có chứa kí tự trong kyw sẽ hiển thị ra
    if ($kyw != "") {
        $sql.= " and tendn like '%".$kyw."%' ";
    }
    $sql.= " ORDER BY id DESC";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

function delete_taikhoan($id)
{
    $sql = "DELETE FROM tb_taikhoan WHERE id =" . $id;
    pdo_execute($sql);
}

function loadone_taikhoan($id)
{
    $sql = "SELECT * FROM tb_taikhoan WHERE id=" . $id;
    $tk = pdo_query_one($sql);
    return $tk;
}

function update_taikhoan($id, $email, $dc, $sdt, $vaitro, $hinh)
{
    if($hinh != "")
    $sql = "UPDATE tb_taikhoan SET email= '" . $email . "', dc= '" . $dc . "' , sdt = '" . $sdt . "', vaitro = '" . $vaitro . "', hinh = '" . $hinh . "' WHERE id=" . $id;
    else
    $sql = "UPDATE tb_taikhoan SET email= '" . $email . "', dc= '" . $dc . "' , sdt = '" . $sdt . "', vaitro = '" . $vaitro . "' WHERE id=" . $id;
    pdo_execute($sql);
}

function update_taikhoan_kh($id, $tendn, $email, $dc, $sdt, $hinh)
{
    if($hinh != "")
    $sql = "UPDATE tb_taikhoan SET tendn= '" . $tendn . "',  email= '" . $email . "', dc= '" . $dc . "' , sdt = '" . $sdt . "', hinh = '" . $hinh . "' WHERE id=" . $id;
    else
    $sql = "UPDATE tb_taikhoan SET tendn= '" . $tendn . "',  email= '" . $email . "', dc= '" . $dc . "' , sdt = '" . $sdt . "' WHERE id=" . $id;
    pdo_execute($sql);
}

function update_matkhau($id, $newpass)
{
    $sql = "UPDATE tb_taikhoan SET mk= '" . $newpass . "' WHERE id=" . $id;
    pdo_execute($sql);
}

function checkemail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email ='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}


?>