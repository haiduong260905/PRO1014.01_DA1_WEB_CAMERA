<?php
function insert_danhmuc($tenloai, $hinh)
{
    $sql = "INSERT INTO tb_danhmuc(tendm,hinhdm) VALUES ('$tenloai', '$hinh')";
    pdo_execute($sql);
}
function delete_danhmuc($id)
{
    $sql = "delete from tb_danhmuc where id=" . $id;
    pdo_execute($sql);
}
function loadall_danhmuc($kyw="")
{
    $sql = "SELECT * FROM tb_danhmuc WHERE 1";
    //Các tài khoản có chứa kí tự trong kyw sẽ hiển thị ra
    if ($kyw != "") {
        $sql.= " and tendm like '%".$kyw."%' ";
    }
    $sql.= " ORDER BY id DESC";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadall_danhmuc_home()
{
    $sql = "SELECT * FROM tb_danhmuc WHERE 1 ORDER BY id DESC LIMIT 0,5";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id)
{
    $sql = "select * from tb_danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id, $tenloai, $hinh)
{
    if($hinh != "")
        $sql = "UPDATE tb_danhmuc SET tendm= '".$tenloai."', hinhdm= '".$hinh."' WHERE id=" . $id;
    else
        $sql = "UPDATE tb_danhmuc SET tendm= '".$tenloai."' WHERE id=" . $id;
    pdo_execute($sql);
}
?>