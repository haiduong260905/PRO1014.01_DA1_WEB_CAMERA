<?php
function tong_sanpham()
{
    $sql = "SELECT * FROM tb_sanpham WHERE 1";
    $tongsp = pdo_query($sql);
    return sizeof($tongsp);
}

function insert_sanpham($tensp, $giasp, $soluong, $hinh, $mota, $donvi, $ngaynhap, $iddm, $idmausac)
{
    $sql = "INSERT INTO tb_sanpham(tensp,giasp,soluong,hinh,mota,donvi,ngaynhap,iddm,idmausac) VALUES ('$tensp', '$giasp', '$soluong', '$hinh', '$mota', '$donvi', '$ngaynhap', '$iddm', '$idmausac')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "DELETE FROM tb_sanpham WHERE id =" . $id;
    pdo_execute($sql);
}

function update_sanpham($id, $iddm, $tensp, $giasp, $soluong, $mota, $donvi, $ngaynhap, $hinh)
{
    if($hinh != "")
        $sql = "UPDATE tb_sanpham SET iddm= '".$iddm."', tensp= '".$tensp."', giasp= '".$giasp."', soluong= '".$soluong."', mota= '".$mota."', donvi= '".$donvi."', ngaynhap= '".$ngaynhap."', hinh= '".$hinh."' WHERE id=" . $id;
    else
        $sql = "UPDATE tb_sanpham SET iddm= '".$iddm."', tensp= '".$tensp."',  giasp= '".$giasp."', soluong= '".$soluong."', mota= '".$mota."', donvi= '".$donvi."', ngaynhap= '".$ngaynhap."' WHERE id=" . $id;
    pdo_execute($sql);
}

function loadone_sanpham($id)
{
    $sql = "SELECT * FROM tb_sanpham WHERE id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM tb_sanpham WHERE 1 ORDER BY id DESC LIMIT 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


function loadall_sanpham_shop()
{
    $sql = "SELECT * FROM tb_sanpham WHERE 1";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

//Hàm Tìm kiếm sp và Lọc sản phẩm theo iddm
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, ms.tenmau 
            FROM tb_sanpham sp 
            LEFT JOIN tb_mausac ms ON sp.idmausac = ms.id 
            WHERE 1";
    
    if ($kyw != "") {
        $sql .= " AND sp.tensp LIKE '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " AND sp.iddm = '" . $iddm . "'";
    }

    $sql .= " ORDER BY sp.id DESC";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function load_sanpham_cungloai($id,$iddm)
{
    $sql = "SELECT * FROM tb_sanpham WHERE iddm = ".$iddm." AND id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


?>