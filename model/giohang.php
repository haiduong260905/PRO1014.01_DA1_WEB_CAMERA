<?php
function tong_donhang()
{
    $sql = "SELECT * FROM tb_donhang WHERE 1";
    $tongdh = pdo_query($sql);
    return sizeof($tongdh);
}
//Tổng doanh thu 
function tong_doanhthu()
{
    $sql = "SELECT SUM(tong) FROM tb_donhang WHERE trangthai_dh = '4'";
    $tongdoanhthu = pdo_query($sql);
    return $tongdoanhthu;
}

function insert_cart($iduser, $idpro, $img, $name, $price, $soluong, $thanhtien, $iddonhang)
{
    $sql = "INSERT INTO tb_giohang (makh, masp, hinh, ten, gia, soluong, thanhtien, iddonhang) VALUES ('$iduser', '$idpro', '$img', '$name', '$price', '$soluong', '$thanhtien', '$iddonhang')";
    return pdo_execute($sql);
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien; //Tổng tiền và đơn hàng
    }
    return $tong;
}

function insert_bill($makh, $user, $email, $dc, $sdt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO tb_donhang (makh, tenkh, email_dh, dc_dh, sdt_dh, ngaydathang, tong) VALUES ('$makh', '$user', '$email', '$dc', '$sdt', '$ngaydathang', '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}

function loadone_bill($id)
{
    $sql = "SELECT * FROM tb_donhang WHERE id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadone_donmua($id) //Đơn mua 
{
    $sql = "SELECT * FROM tb_donhang WHERE makh=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function listdonmua($id) //Load all đơn mua theo $_session['user']['id']
{
    $sql = "SELECT * FROM tb_donhang WHERE makh=" . $id;
    $sql .= " ORDER BY id DESC";
    $bill = pdo_query($sql);
    return $bill;
}

function loadall_bill($makh, $kyw = "")
{
    $sql = "SELECT * FROM tb_donhang WHERE 1";
    //Các đơn hàng có chứa kí tự trong kyw sẽ hiển thị ra
    if ($kyw != "") {
        $sql .= " AND (tenkh LIKE '%" . $kyw . "%' OR id = '" . $kyw . "') ";
    }
    if ($makh > 0)
        $sql .= " AND makh =" . $makh;
    $sql .= " ORDER BY id DESC";
    $listbill = pdo_query($sql);
    return $listbill;
}

function delete_bill($id)
{
    $sql = "DELETE FROM tb_donhang WHERE id =" . $id;
    pdo_execute($sql);
}

function update_bill($id, $dc_dh, $sdt_dh, $email_dh, $trangthai_dh)
{
    $sql = "UPDATE tb_donhang
            SET dc_dh= '" . $dc_dh . "',
                sdt_dh= '" . $sdt_dh . "',
                email_dh= '" . $email_dh . "',
                trangthai_dh= '" . $trangthai_dh . "'
                WHERE id=" . $id;
    pdo_execute($sql);
}

// Trạng thái đơn hàng
function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "<span style='color: red; font-weight: bold;'>Chờ xác nhận</span>";
            break;
        case '1':
            $tt = "<span style='color: orange; font-weight: bold;'>Đã xác nhận</span>";
            break;
        case '2':
            $tt = "<span style='color: orange; font-weight: bold;'>Đang giao hàng</span>";
            break;
        case '3':
            $tt = "<span style='color: blue; font-weight: bold;'>Đã nhận được hàng</span>";
            break;
        case '4':
            $tt = "<span style='color: green; font-weight: bold;'>Đã thanh toán</span>";
            break;
        default:
            $tt = "<span style='color: red; font-weight: bold;'>Chờ xác nhận</span>";
            break;
    }
    return $tt;
}

function xacnhan_dh($id)
{
    $sql = "UPDATE tb_donhang SET trangthai_dh = '1' WHERE id=" . $id;
    pdo_execute($sql);
}

function xacnhan_giaohang($id)
{
    $sql = "UPDATE tb_donhang SET trangthai_dh = '2' WHERE id=" . $id;
    pdo_execute($sql);
}

function da_nhan_hang($id)
{
    $sql = "UPDATE `tb_donhang` SET `trangthai_dh` = '3' WHERE id=" . $id;
    pdo_execute($sql);
}

function xacnhan_thanhtoan($id)
{
    $sql = "UPDATE tb_donhang SET trangthai_dh = '4' WHERE id=" . $id;
    pdo_execute($sql);
}

function sp_banchay()
{
    $sql = "SELECT ten, COUNT(iddonhang) AS luot_mua
    FROM tb_giohang
    GROUP BY ten
    ORDER BY COUNT(iddonhang) DESC LIMIT 10";
    $tongdoanhthu = pdo_query($sql);
    return $tongdoanhthu;
}

function donhang_moi()
{
    $sql = "SELECT * FROM tb_donhang WHERE trangthai_dh = '0'";
    $donhang_moi = pdo_query($sql);
    return $donhang_moi;
}

function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0; //Tạo biến i để xác định vị trí idcart

    if ($del == 1) {
        $xoasp_th = '<th>Thao tác</th>';
        $xoasp_td2 = '<td></td>';
    } else {
        $xoasp_th = '';
        $xoasp_td2 = '';
    }
    echo '<tr>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                ' . $xoasp_th . '
            </tr>';
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien; //Tổng tiền và đơn hàng

        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa" class="w80"></a></td>';
        } else {
            $xoasp_td = '';
        }
        echo '
            <tr>
            <td><img src="' . $hinh . '" alt="" height="80px"</td>
            <td>' . $cart[1] . '</td>
            <td>' . number_format($cart[3], 0, ",", ".") . ' <u></u>VNĐ</td>
            <td>' . $cart[4] . '</td>
            <td>' . number_format($ttien, 0, ",", ".") . ' <u></u>VNĐ</td>
            ' . $xoasp_td . '
        </tr>';
        $i += 1;
    }
    echo '
    <tr>
    
        <td colspan = "3" ></td>
        <td>Tổng đơn hàng:</td>
        <td class="prices-value prices-final text-red">' . number_format($tong, 0, ",", ".") . ' <u></u>VNĐ</td>
        ' . $xoasp_td2 . '
    </tr>
    
    
    ';
}

function loadall_cart($iddonhang)
{
    $sql = "SELECT * FROM tb_giohang WHERE iddonhang =" . $iddonhang;
    $bill = pdo_query($sql);
    return $bill;
}
