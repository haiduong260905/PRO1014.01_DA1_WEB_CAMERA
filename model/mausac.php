<?php
function loadall_mausac(){
    $sql = "SELECT * FROM tb_mausac ORDER BY id DESC";
    $listmausac = pdo_query($sql);
    return $listmausac;
    // return pdo_query($sql);
}
?>