<?php
function all_binhluan()
{
    $sql = "SELECT * FROM binhluan"; // Chọn tất cả các trường từ bảng "binhluan"

    $list_binhluan = pdo_query($sql);
    return $list_binhluan;
}

function del_binhluan($id){
    $sql = "DELETE FROM binhluan WHERE id =" .$id;
    pdo_execute($sql);
}
function insert_binhluan($cmt, $formattedDate, $username, $maLoaiPhong)
{
    $sql = "INSERT INTO binhluan (id,noi_dung, ngay_dang, Username, maLoaiPhong) VALUES (NULL,'$cmt', '$formattedDate', '$username', '$maLoaiPhong')";
    pdo_execute($sql);
}
function update_binhluan($id, $noi_dung, $ngay_dang, $UserID, $maLoaiPhong)
{
    $sql = "UPDATE binhluan SET noi_dung = '".$noi_dung."', ngay_dang = '".$ngay_dang."', UserID = '".$UserID."', maLoaiPhong = '".$maLoaiPhong."' WHERE id = ".$id;
    pdo_execute($sql);
}

// Sử dụng truy vấn SQL trực tiếp trong hàm loadall_binhluan
function loadall_binhluan($maLoaiPhong) {
    $sql = "SELECT binhluan.id, binhluan.noi_dung,  binhluan.ngay_dang 
            FROM `binhluan` 
            LEFT JOIN loaiphong ON binhluan.maLoaiPhong = loaiphong.maLoaiPhong
            WHERE loaiphong.maLoaiPhong = '$maLoaiPhong'";

    // Thực thi truy vấn và trả về kết quả
    // Ở đây phải sử dụng các phương thức kết nối CSDL mà bạn đã thiết lập trước đó
    $result = pdo_query($sql);/* Code để thực thi truy vấn và lấy kết quả từ CSDL */;
    return $result;
}


function hut_binhluan($maLoaiPhong, $noi_dung,$userName){
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO `binhluan`(`noi_dung`, `userName`, `maLoaiPhong`, `ngay_dang`) 
        VALUES ('$noi_dung','$userName','$maLoaiPhong','$date');
    ";
    //echo $sql;
    //die;
    pdo_execute($sql);
}

?>

