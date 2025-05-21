<?php
function tong_binhluan()
{
    $sql = "SELECT * FROM tb_binhluan WHERE 1";
    $tongbl = pdo_query($sql);
    return sizeof($tongbl);
}
function insert_binhluan($noidung,$tendn, $idsp,$tensp,$ngaybinhluan)
{
    $sql = "insert into tb_binhluan(noidung,tendn,idsp,tensp,ngaybinhluan) values ('$noidung','$tendn','$idsp','$tensp','$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idsp, $kyw="")
{
    $sql = "SELECT * FROM tb_binhluan WHERE 1";
    //Các bình luận có chứa kí tự trong kyw sẽ hiển thị ra
    if ($kyw != "") {
        $sql .= " AND (tendn LIKE '%" . $kyw . "%' OR id = '" . $kyw . "') ";
    }
    if ($idsp > 0)
        $sql .= " AND idsp =" . $idsp;
    $sql.= " ORDER BY id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id)
{
    $sql = "delete from tb_binhluan where id=" . $id;
    pdo_execute($sql);
}
