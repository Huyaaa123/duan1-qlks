<?php
if (isset($_GET['id'])) {
    $selectedId = $_GET['id'];
    $selectedDichVu = null;

    foreach ($list_dv as $dichvu) {
        if ($dichvu['id'] == $selectedId) {
            $selectedDichVu = $dichvu;
            break;
        }
    }

    if ($selectedDichVu) {
        extract($selectedDichVu);
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
        <p><i class="fa-solid fa-hotel"></i> Cập nhật dịch vụ <span>[ KDH Hotel ]</span></p>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=update-dv" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
            <label class="form-label">ID</label><br>
            <input type="text" name="id" value="<?= isset($id) ? $id : '' ?>" class="form-input" readonly>
            </div>

            <div class="row2 mb10">
                <label class="form-label">Tên dịch vụ</label><br>
                <input type="text" name="name" value="<?= isset($name)
                    ? $name
                    : '' ?>" class="form-input">
            </div>
            <div class="row2 mb10">
                <label class="form-label">Ảnh</label><br>
                <input type="file" name="image" class="form-input">
                <div class="ima">
                <?php
                // Kiểm tra xem tệp tin hình ảnh có tồn tại hay không
                if (is_file('../image/' . $image)) {
                    $imageHTML =
                        '<img src="../image/' . $image . '" height="80">';
                } else {
                    $imageHTML = 'No photo';
                }
                echo $imageHTML; // Hiển thị chi tiết ảnh
                ?>
                </div>

            </div>
            <div class="ide">
            <div class="row2 mb10">
                <label class="form-label">Mô tả</label><br>
                <textarea name="mota" id="mota" cols="30" rows="2" class="form-textarea"><?= isset(
                    $mota
                )
                    ? $mota
                    : '' ?></textarea>
            </div>
            <div class="row2 mb10">
                <label class="form-label">Thời gian hoạt động</label><br>
                <textarea name="time" class="form-textarea"><?= isset($time)
                    ? $time
                    : '' ?></textarea>
            </div>
            <div class="row2 mb10">
                <label class="form-label">Giá tiền</label><br>
                <input type="text" name="price" value="<?= isset($price)
                    ? $price
                    : '' ?>" class="form-input">
            </div>

            <div style="padding:10px;" class="row mb10">
                
            <input style="width:300px; position: relative; left:3%;" class="btn-submit" type="submit" name="capnhat" value="CẬP NHẬT">
            <input style="width:300px; position: relative; left:7%;" class="btn-reset" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=list-dv" class="btn-list"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
            <div class="idm">
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>

            </div>
            </div>
            </div>

        </form>
    </div>
</div>