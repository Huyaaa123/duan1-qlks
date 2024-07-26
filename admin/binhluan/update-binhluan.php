<?php
if (isset($_GET['id'])) {
    $selectedId = $_GET['id'];
    $selectedBinhLuan = null;

    foreach ($list_binhluan as $binhluan) {
        if ($binhluan['id'] == $selectedId) {
            $selectedBinhLuan = $binhluan;
            break;
        }
    }

    if ($selectedBinhLuan) {
        extract($selectedBinhLuan);
    }
} ?>

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
        position: relative;
        bottom: 5px;
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
    .ima{
        position: relative;
        bottom:35px;
        left:35%;
    }
    .ide{
        position: relative;
        bottom:25px;
    }
    .idm{
        position: relative;
        bottom:20px;
    }
</style>
<div class="nav-right">
    <div class="aside-content">
        <p><i class="fa-solid fa-hotel"></i> Cập nhật Bình luận <span>[ KDH Hotel ]</span></p>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=update-binhluan" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
            <label class="form-label">ID</label><br>
            <input type="text" name="id" value="<?= isset($id) ? $id : '' ?>" class="form-input" readonly>
            </div>

            <div class="row2 mb10">
    <label class="form-label">Người đăng </label><br>
    <select name="UserID" class="form-input">
        <?php
        // Lấy danh sách người dùng từ cơ sở dữ liệu
        $list_users = pdo_query("SELECT UserID, Username FROM signup");
        foreach ($list_users as $user) {
            $selected = '';
            if (isset($UserID) && $UserID == $user['UserID']) {
                $selected = 'selected';
            }
            echo "<option value='" . $user['UserID'] . "' $selected>" . $user['Username'] . "</option>";
        }
        ?>
    </select>
</div>

            </div>

            <div class="row2 mb10">
                <label class="form-label">Mô tả</label><br>
                <textarea name="noi_dung" id="mota" cols="30" rows="2" class="form-textarea"><?= isset(
                    $noi_dung
                )
                    ? $noi_dung
                    : '' ?></textarea>
            </div>
            <div class="row2 mb10">
                <label class="form-label">Ngày đăng</label><br>
                <input type="datetime-local" name="ngay_dang" class="form-textarea" value="<?= isset($ngay_dang) ? date('Y-m-d\TH:i', strtotime($ngay_dang)) : '' ?>" />
            </div>
            <div class="row2 mb10">
    <label class="form-label">Tên phòng</label><br>
    <select name="maLoaiPhong" class="form-input">
        <?php
        // Lấy danh sách phòng từ cơ sở dữ liệu
        $list_phong = pdo_query("SELECT maLoaiPhong, tenLoaiPhong FROM loaiphong");
        foreach ($list_phong as $phong) {
            $selected = '';
            if (isset($maLoaiPhong) && $maLoaiPhong == $phong['maLoaiPhong']) {
                $selected = 'selected';
            }
            echo "<option value='" . $phong['maLoaiPhong'] . "' $selected>" . $phong['tenLoaiPhong'] . "</option>";
        }
        ?>
    </select>
</div>

            <div style="padding:10px;" class="row mb10">
                
            <input style="width:300px; position: relative; left:3%;" class="btn-submit" type="submit" name="capnhat" value="CẬP NHẬT">
            <input style="width:300px; position: relative; left:7%;" class="btn-reset" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=list-binhluan" class="btn-list"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
            <div class="idm">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>

            </div>

            </div>

        </form>
    </div>
</div>