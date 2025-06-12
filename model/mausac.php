<?php
// function loadall_mausac(){
//     $sql = "SELECT * FROM tb_mausac ORDER BY id DESC";
//     // $listmausac = pdo_query($sql);
//     // return $listmausac;
//     return pdo_query($sql);
// }
function loadall_mausac(){
    $sql = "SELECT * FROM tb_mausac";
    $listms = pdo_query($sql);
    return $listms;
}

function loadone_mausac($idmausac){
    $sql = "SELECT * FROM tb_mausac WHERE id = $idmausac";
    return pdo_query_one($sql);
}
?>