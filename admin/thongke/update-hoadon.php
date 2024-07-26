<?php
if (isset($_GET['maHoaDon'])) {
    $selectedmaHoaDon = $_GET['maHoaDon'];
    $selectedHoaDon = null;

    foreach ($list_hoadon as $hoadon) {
        if ($hoadon['maHoaDon'] == $selectedmaHoaDon) {
            $selectedHoaDon = $hoadon;
            break;
        }
    }

    if ($selectedHoaDon) {
        extract($selectedHoaDon);
    }
}
?>

<style>
    .nav-right {
        background-color: #f2f2f2;
        padding: 10px;
    }

    .aside-content {
        margin-bottom: 1px;
    }

    .aside-content p {
        font-weight: bold;
    }

    .row2 {
        margin-bottom: 1px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 2px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .row {
        margin-bottom: 5px;
    }

    .mr20 {
        margin-right: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        border: 1px solid #ccc;
    }
</style>
<div class="nav-right">
    <div class="aside-content">
        <p><i class="fa-solid fa-hotel"></i> Cập nhật hóa đơn <span>[ KDH Hotel ]</span></p>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=update-hoadon" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">


            </div>

            <div class="row2 mb10">
                <label class="form-label">Mã hóa đơn</label><br>
                <input type="text" name="maHoaDon" value="<?= isset($maHoaDon) ? $maHoaDon : '' ?>" class="form-input">
            </div>
            <div class="row2 mb10">
                <label class="form-label">Tên khách hàng</label><br>
                <input type="text" name="tenKhachHang" value="<?= isset($tenKhachHang) ? $tenKhachHang : '' ?>" class="form-input">
            </div>

            <!-- <div class="row2 mb10">
                <label class="form-label">Địa chỉ</label><br>
                <input name="diaChiKhachHang" type="text" class="form-input" value="<?= isset($diaChiKhachHang) ? $diaChiKhachHang : '' ?>">
            </div> -->
            <div class="row2 mb10">
                <label class="form-label">Ngày thanh toán</label><br>
                <input type="date" name="ngayThanhToan" class="form-textarea"><?= isset($ngayThanhToan) ? $ngayThanhToan : '' ?>
            </div>
            <div class="row2 mb10">
                <label class="form-label">Tổng tiền</label><br>
                <input type="text" name="thanhTien" value="<?= isset($thanhTien) ? $thanhTien : '' ?>" class="form-input">
            </div>
            <div class="row2 mb10">
                <label class="form-label">Mã phòng</label><br>
                <input type="text" name="maPhong" value="<?= isset($maPhong) ? $maPhong : '' ?>" class="form-input">
            </div>

            <div style="padding:10px;" class="row mb10">
                
            <input style="width:300px; position: relative; left:3%;" class="btn-submit" type="submit" name="capnhat" value="CẬP NHẬT">
                <input style="width:300px; position: relative; left:7%;" class="btn-reset" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=list-hoadon" class="btn-list"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
                <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
            </div>

        </form>
    </div>
</div>