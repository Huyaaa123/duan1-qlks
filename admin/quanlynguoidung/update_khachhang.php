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
        padding: 20px;
        height: 820px;
    }

    .aside-content {
        margin-bottom: 1px;
    }

    .aside-content p {
        font-weight: bold;
    }

    .row2 {
        margin-bottom: 10px;
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

    .ngayDangKi {
        display: flex;
        flex-direction: row;
    }

</style>
<div class="nav-right add_khachhang">
    <div class="aside-content">
        <p><i class="fa-solid fa-hotel"></i> Đặt phòng <span>[ KDH Hotel ]</span></hp>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=update_khachhang" method="POST" enctype="multipart/form-data">

            <div class="row2 mb10 form_content_container">
                <label>Mã hóa đơn</label> <br>
                <input type="text" name="maHoaDon"  value="<?= isset($maHoaDon) ? $maHoaDon : '' ?>">
            </div>

            <div class="row2 mb10">
                <label> Tên khách hàng</label> <br>
                <input type="text" name="tenKhachHang" value="<?= isset($tenKhachHang) ? $tenKhachHang : '' ?>">
            </div>

            <div class="row2 mb10 ngayDangKi">
                <div class="col">
                    <label> Số điện thoại</label> 
                    <input type="text" name="sdt" value="<?= isset($sdt) ? $sdt : '' ?> ">
                </div>
                <div class="col">
                    <label> Loại phòng</label>
                    <select name="loaiPhong" id="" value="<?= isset($loaiPhong) ? $loaiPhong : '' ?> ">
                        <option value="7">Superior Room</option>
                        <option value="8">Delux Room</option>
                        <!-- <option value="3">Guest Room</option> -->
                    </select> <br>
                </div>
            </div>

            <div class="row2 mb10 ngayDangKi">
                <div class="col">
                    <label>Ngày đăng kí vào</label> <br>
                    <input type="date" name="ngayDangKi" value="<?= isset($ngayDatPhong) ? $ngayDatPhong : '' ?> ">
                </div>
                <div class="col">
                    <label>Ngày thanh toán</label> <br>
                    <input type="date" name="ngayThanhToan" value="<?= isset($ngayThanhToan) ? $ngayThanhToan : '' ?> ">
                </div>
            </div>
            <div class="row2 mb10">
                <label> Dịch vụ :</label> <br>
                Dịch vụ phòng
                <input type="checkbox" name="dichvu" id="" value="dichVuPhong">
                Spa
                <input type="checkbox" name="dichvu" id="" value="spa">
                Nhà hàng
                <input type="checkbox" name="dichvu" id="" value="nhaHang">

            </div>
         
            <div class="row2 mb10 ngayDangKi">
                <div class="col">
                    <label>Email </label> <br>
                    <input type="text" name="email" value="<?= isset($taikhoan) ? $taikhoan : '' ?> ">
                </div>
                <div class="col">
                <label> Trạng thái</label> <br>
                <select name="trangThai" id="">
                    <option value="xac_nhan">Xác nhận</option>
                    <option value="chua_xac_nhan">Chưa xác nhận</option>
                </select>
                </div>
            </div>
            <div class="row2 mb10">
                <label> Thành tiền</label> <br>
                <input type="text" name="thanhTien" value="<?= isset($thanhTien) ? $thanhTien : '' ?> ">
            </div>
            <div class="row mb10 ">
                <input style="width:300px; position: relative; left:3%;" class="mr20" type="submit" name="capnhat" value="CẬP NHẬT">
                <input style="width:300px; position: relative; left:7%;" class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=list_khachhang"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
            </div>

            <div>
                <?php
                // if (isset($thongbao) && ($thongbao != ""))
                //     echo $thongbao;
                ?>
            </div>

        </form>
    </div>
</div>

<!-- END HEADER -->


</div>