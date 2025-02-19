<?php
    function insert_phong($tenPhong,$maLoaiPhong,$ghichu,$tinhTrang){
        $sql = "insert into phong(tenPhong,maLoaiPhong,ghichu,tinhTrang) values('$tenPhong','$maLoaiPhong','$ghichu','$tinhTrang')";
        pdo_execute($sql);
    }
    function delete_phong($maPhong){
        $sql = "delete from phong where maPhong=".$maPhong;
        pdo_execute($sql);
    }

    function loadall_phong(){
        $sql = "SELECT phong.*, tinhtrang.ten_tinhTrang 
        FROM phong 
        INNER JOIN tinhtrang ON phong.tinhTrang = tinhtrang.id_tinhTrang 
        ORDER BY phong.maPhong DESC 
        LIMIT 0, 9 ";
        $listphong = pdo_query($sql);
        return $listphong;
    }
   
    function loadallphong($kyw,$iddm){
        $sql = "select * from phong where 1";
        if($kyw != ""){
            $sql.=" and name like '%".$kyw."%'";
        }
        if($iddm > 0){
            $sql.=" and iddm = '".$iddm."'";
        }
        $sql.=" order by id desc";
        $listsanpham = pdo_query($sql);
        return $listsanpham;
    }
    
    function search_phong($kyw) {
        $sql = "SELECT phong.*, loaiphong.tenLoaiPhong ,tinhtrang.ten_tinhTrang
                FROM phong
                INNER JOIN loaiphong ON phong.maLoaiPhong = loaiphong.maLoaiPhong
                INNER JOIN tinhtrang ON phong.tinhTrang = tinhtrang.id_tinhTrang
                WHERE 1";
        if ($kyw != "") {
            $sql .= " AND tenPhong LIKE '%" . $kyw . "%'";
        }
        $sql .= " ORDER BY maPhong DESC";
        $listphong = pdo_query($sql);
        return $listphong;
    }
    
    // function load_ten_dm($iddm){
    //     if($iddm >0){
    //     $sql = "select * from danhmuc where id=".$iddm;
    //     $dm=pdo_query_one($sql);
    //     extract($dm);
    //     return $name;
    //     } else{
    //         return "";
    //     }
    // }
    
    function loadone_phong($maPhong){
        $sql = "select * from phong where maPhong=".$maPhong;
        $sp=pdo_query_one($sql);
        return $sp;

    }
    // function load_sanpham_cungloai($id,$iddm){
    //     $sql = "select * from sanpham where iddm=".$iddm." AND id <> ".$id;
    //     $listsanpham = pdo_query($sql);
    //     return $listsanpham;

    // }
    function update_phong($maPhong, $tenPhong, $maLoaiPhong, $ghiChu, $tinhTrang)
    {
        $sql = "UPDATE phong SET tenPhong=?, maLoaiPhong=?, ghiChu=?, tinhTrang=? WHERE maPhong=?";
        $params = array($tenPhong, $maLoaiPhong, $ghiChu, $tinhTrang, $maPhong);
        pdo_execute($sql, $params);
    }
    
// function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
//     $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
//     pdo_execute($sql);
// }
// function delete_phong($maPhong)
// {
//     $sql = 'delete from phong where maPhong=' . $maPhong;
//     pdo_execute($sql);
// }

// function loadall_phong()
// {
//     $sql = 'select * from phong where 1 order by maPhong desc limit 0,9';
//     $listphong = pdo_query($sql);
//     return $listphong;
// }
// function all_phong_tt()
// {
//     $sql = '';
// }

// function loadall_sanpham($kyw,$iddm){
//     $sql = "select * from phong where 1";
//     if($kyw != ""){
//         $sql.=" and name like '%".$kyw."%'";
//     }
//     if($iddm > 0){
//         $sql.=" and iddm = '".$iddm."'";
//     }
//     $sql.=" order by id desc";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }

// function load_ten_dm($iddm){
//     if($iddm >0){
//     $sql = "select * from danhmuc where id=".$iddm;
//     $dm=pdo_query_one($sql);
//     extract($dm);
//     return $name;
//     } else{
//         return "";
//     }
// }

// function loadone_sanpham($id){
//     $sql = "select * from sanpham where id=".$id;
//     $sp=pdo_query_one($sql);
//     return $sp;

// }
// function load_sanpham_cungloai($id,$iddm){
//     $sql = "select * from sanpham where iddm=".$iddm." AND id <> ".$id;
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;

// }
// function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
//     if($hinh != ""){
//         $sql = "update sanpham set iddm='".$iddm."', name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
//     }else
//         $sql = "update sanpham set iddm='".$iddm."', name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
//     pdo_execute($sql);

// }

?>
