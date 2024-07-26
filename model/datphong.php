<?php
function all_datphong()
{
    $sql = 'SELECT * FROM datphong';
    $list_dp = pdo_query($sql);
    return $list_dp;
}
function del_datphong($iddatphong)
{
    $sql = 'DELETE FROM datphong WHERE iddatphong =' . $iddatphong;
    pdo_execute($sql);
}
function insert_datphong(
    $iddatphong,
    $tenphong,
    $nhanphong,
    $traphong,
    $thanhtien
) {
    $sql = "INSERT INTO  datphong (iddatphong,tenphong,nhanphong,traphong,thanhtien) 
    values('$iddatphong','$tenphong','$nhanphong','$traphong','$thanhtien')";
    pdo_execute($sql);
}
function update_datphong(
    $iddatphong,
    $tenphong,
    $nhanphong,
    $traphong,
    $thanhtien
) {
    $sql =
        "UPDATE datphong SET iddatphong='" .
        $iddatphong .
        "', tenphong='" .
        $tenphong .
        "', nhanphong='" .
        $nhanphong .
        "', traphong='" .
        $traphong .
        "', thanhtien='" .
        $thanhtien .
        "' WHERE iddatphong=" .
        $iddatphong;

    pdo_execute($sql);
}
