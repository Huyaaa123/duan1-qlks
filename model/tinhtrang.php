<?php
function layDanhSachPhongTheoTinhTrang($tinhtrang)
{
    $sql = "SELECT phong.*, tinhtrang.tentt
       FROM phong
       JOIN tinhtrang ON phong.tinhtrang = tinhtrang.id_tt
       WHERE tinhtrang.tentt = 'Còn phòng'";
    $list_tt = pdo_query($sql);

    return $list_tt;
}
?>
