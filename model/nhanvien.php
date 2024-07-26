<?php

// nhan vien
function all_nhanvien()
{
    $sql = 'SELECT * FROM nhanvien ';
    $listnhanvien = pdo_query($sql);
    return $listnhanvien;
}
function delete_nhanvien($manv)
{
    $sql = 'DELETE FROM nhanvien WHERE manv =' . $manv;
    pdo_execute($sql);
}
function insert_nhanvien($manv, $name, $chucvu, $email = null, $pass = null)
{
    $sql = "insert into  nhanvien (manv,name,chucvu, Email, Password) values('$manv','$name','$chucvu', '$email', '$pass')";
    pdo_execute($sql);
}
// function update_nhanvien($manv,$name,$chucvu){
//     if($image!="")
//     $sql="update nhanvien set  manv='".$manv."',name='".$name."',chucvu='".$chucvu."' where id=".$manv;
// else
// $sql="update nhanvien set  manv='".$manv."',name='".$name."',chucvu='".$chucvu."' where id=".$manv;;
//     pdo_execute($sql);
// }
function thongke_nhanvien()
{
    $sql = 'select * from nhanvien';
    $list_thongke = pdo_query($sql);
    return $list_thongke;
}
