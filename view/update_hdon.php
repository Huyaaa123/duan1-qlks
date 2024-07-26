<?php
if (isset($_GET['maHoaDon'])) {
    $selectedId = $_GET['maHoaDon'];
    $selectedHoaDon = null;

    foreach ($list_hoadon as $hdon) {
        if ($hdon['maHoaDon'] == $selectedId) {
            $selectedHoaDon = $hdon;
            break;
        }
    }

    if ($selectedHoaDon) {
        extract($selectedHoaDon);
    }
} ?>

<div class="checkout-room" id="checkoutRoom">
    <h1>≼ Booked Room ≽</h1>
    <form action="">
        <table>
            <tr>
                <th>Mã hoá đơn</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày thanh toán</th>
                <th>Đặt cọc</th>
                <th>Mã phòng</th>
                <th>Thao tác</th>
            </tr>

            <input type="text" value="<?= isset($tenKhachHang)
                ? $tenKhachHang
                : '' ?>" name="tenKhachHang" placeholder="Họ tên">
            <input type="text" value="<?= isset($emailKhachHang)
                ? $emailKhachHang
                : '' ?>" name="emailKhachHang" placeholder="Email">
            <input type="text" value="<?= isset($diaChiKhachHang)
                ? $diaChiKhachHang
                : '' ?>" name="diaChiKhachHang" placeholder="Địa chỉ">
            <input type="text" value="<?= isset($ngayThanhToan)
                ? $ngayThanhToan
                : '' ?>" name="ngayThanhToan" placeholder="Ngày thanh toán">
            <input type="text" value="<?= isset($datCoc)
                ? $datCoc
                : '' ?>" name="datCoc" placeholder="Đặt cọc">
            <input type="text" value="<?= isset($maPhong)
                ? $maPhong
                : '' ?>" name="maPhong" placeholder="Phòng">

            <input style="width:300px; position: relative; left:3%;" class="btn-submit" type="submit" name="capnhat"
                value="CẬP NHẬT">
            <input style="width:300px; position: relative; left:7%;" class="btn-reset" type="reset" value="NHẬP LẠI">

            <a href="index.php?act=list-dv" class="btn-list"><input
                    style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button"
                    value="DANH SÁCH"></a>

        </table>
    </form>
</div>