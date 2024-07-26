<?php
function insert_loaiphong($tenloai, $dongia, $ghichu)
{
    // $sql = "insert into loaiphong(tenLoaiPhong) values('$tenloai')";
    $sql = "insert into loaiphong(maLoaiPhong,tenLoaiPhong, donGia, ghiChu) VALUES ( NULL ,'$tenloai', '$dongia', '$ghichu')";
    pdo_execute($sql);
}
function delete_loaiphong($maLoaiPhong)
{
    $sql = "delete from loaiphong where maLoaiPhong=" . $maLoaiPhong;
    pdo_execute($sql);
}
function loadall_loaiphong()
{
    $sql = "select * from loaiphong order by maLoaiPhong desc";
    $listloaiphong = pdo_query($sql);
    return $listloaiphong;
}
function loadone_loaiphong($maLoaiPhong)
{
    $sql = "select * from loaiphong where maLoaiPhong=" . $maLoaiPhong;
    $lp = pdo_query_one($sql);
    return $lp;
}
function search_loaiphong($kyw){
    $sql = "select * from loaiphong where 1";
    if($kyw != ""){
        $sql.=" and tenLoaiPhong like '%".$kyw."%'";
    }
    $sql.=" order by maLoaiPhong desc";
    $listloaiphong = pdo_query($sql);
    return $listloaiphong;
}

function update_loaiphong($maLoaiPhong, $tenloai, $dongia, $ghichu)
{
    $sql = "UPDATE loaiphong SET tenLoaiPhong=:tenloai, donGia=:dongia, ghiChu=:ghichu WHERE maLoaiPhong=:maLoaiPhong";
    $params = array(':tenloai' => $tenloai, ':dongia' => $dongia, ':ghichu' => $ghichu, ':maLoaiPhong' => $maLoaiPhong);
    pdo_execute($sql, $params);
}

function view_loaiphong($maLoaiPhong=0){
    $sql="SELECT * from loaiphong where maLoaiPhong > 0";
    $viewlp=pdo_query($sql);
    return $viewlp;
}

function load_all_data_by_maLoaiPhong($maLoaiPhong) {
    $sql = "SELECT loaiphong.*, phong.*, tinhtrang.* 
            FROM loaiphong 
            INNER JOIN phong ON loaiphong.maLoaiPhong = phong.maLoaiPhong 
            INNER JOIN tinhtrang ON phong.tinhTrang = tinhtrang.id_tinhTrang 
            WHERE loaiphong.maLoaiPhong = :maLoaiPhong AND tinhtrang.ten_tinhTrang = 'Còn phòng'";  

    $stmt = pdo_prepare($sql);
    pdo_bindValue($stmt, ":maLoaiPhong", $maLoaiPhong, PDO::PARAM_INT);
    
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Lấy tất cả các bản ghi dưới dạng một mảng kết hợp
    
    return $result;
}


