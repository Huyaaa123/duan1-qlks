<?php
function all_hoadon()
{
    $sql = 'SELECT * FROM hoadon ';
    $list_hoadon = pdo_query($sql);
    return $list_hoadon;
}
function del_hoadon($maHoaDon)
{
    $sql = 'DELETE FROM hoadon WHERE maHoaDon =' . $maHoaDon;
    pdo_execute($sql);
}
function insert_hoadon($tenKhachHang, $ngayDatPhong, $ngayThanhToan, $thanhTien, $loaiPhong, $sdt, $trangThai, $taikhoan, $dichvu)
{
    $sql = "insert into  hoadon(tenKhachHang,ngayDatPhong , ngayThanhToan,thanhTien,maPhong , sdt, trangThai, taikhoan,dichvu) 
    values('$tenKhachHang','$ngayDatPhong' , '$ngayThanhToan','$thanhTien','$loaiPhong' , '$sdt', '$trangThai', '$taikhoan','$dichvu')";
    pdo_execute($sql);
}

function update_hoadon($maHoaDon, $tenKhachHang, $ngayDatPhong, $ngayThanhToan, $thanhTien, $loaiPhong, $sdt, $trangThai, $taikhoan, $dichvu)
{
    // Truy vấn cơ sở dữ liệu để cập nhật hóa đơn
    $sql = "UPDATE hoadon SET maHoaDon='" . $maHoaDon . "', tenKhachHang='" . $tenKhachHang . "',ngayDatPhong='" . $ngayDatPhong . "', ngayThanhToan='" . $ngayThanhToan . "', thanhTien='" . $thanhTien . "', maPhong='" . $loaiPhong . "',
    sdt ='" . $sdt . "',trangThai ='" . $trangThai . "',taikhoan ='" . $taikhoan . "',dichvu ='" . $dichvu . "' WHERE maHoaDon=" . $maHoaDon;
}
function insert_hoadonn(
    $maHoaDon,
    $tenKhachHang,
    $diaChiKhachHang,
    $ngayThanhToan,
    $thanhTien,
    $maPhong
) {
    $sql = "insert into  hoadon (maHoaDon,tenKhachHang,diaChiKhachHang,ngayThanhToan,thanhTien,maPhong) 
    values('$maHoaDon','$tenKhachHang','$diaChiKhachHang','$ngayThanhToan','$thanhTien','$maPhong')";
    pdo_execute($sql);
}
function update_hoadonn(
    $maHoaDon,
    $tenKhachHang,
    $diaChiKhachHang,
    $ngayThanhToan,
    $thanhTien,
    $maPhong
) {
    // Truy vấn cơ sở dữ liệu để cập nhật hóa đơn
    $sql =
        "UPDATE hoadon SET maHoaDon='" .
        $maHoaDon .
        "', tenKhachHang='" .
        $tenKhachHang .
        "', diaChiKhachHang='" .
        $diaChiKhachHang .
        "', ngayThanhToan='" .
        $ngayThanhToan .
        "', thanhTien='" .
        $thanhTien .
        "', maPhong='" .
        $maPhong .
        "' WHERE maHoaDon=" .
        $maHoaDon;

    pdo_execute($sql);
}
