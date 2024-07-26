<?php
  if (isset($_GET['maLoaiPhong']) && ($_GET['maLoaiPhong'] > 0)) {
            $dm = loadone_loaiphong($_GET['maLoaiPhong']);
        }

        if (isset($dm) && is_array($dm)) {
            extract($dm);
        } 
?>
<style>
    .nav-right {
        background-color: #f2f2f2;
        padding: 20px;
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
        <p><i class="fa-solid fa-hotel"></i> CẬP NHẬT DANH MỤC PHÒNG <span>[ KDH Hotel ]</span></hp>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updatedmp" method="POST" enctype="multipart/form-data">
            <div class="row mb10">
                Mã loại: <br>
                <input type="text" name="maLoaiPhong"  value="<?php if (isset($maLoaiPhong) && $maLoaiPhong != "") echo $maLoaiPhong; ?>">
            </div>
            <div class="row mb10">
                Tên loại Phòng: <br>
                <input type="text" name="tenloai" value="<?php if (isset($tenLoaiPhong) && $tenLoaiPhong != "") echo $tenLoaiPhong; ?>">
            </div>
            <div class="row mb10">
                Đơn giá: <br>
                <input type="text" name="dongia" value="<?php if (isset($donGia) && $donGia != "") echo $donGia; ?>">
            </div>
            <div class="row mb10">
                Ghi chú: <br>
                <input type="text" name="ghichu" value="<?php if (isset($ghiChu) && $ghiChu != "") echo $ghiChu; ?>">
            </div>
            <div class="row mb10 ">
                <input style="width:300px; position: relative; left:7%;" class="mr20" type="submit" value="CẬP NHẬT" name="capnhat">
                <input style="width:300px; position: relative; left:7%;" class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listdmp"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
            </div>

        </form>
    </div>
</div>

<!-- END HEADER -->


</div>