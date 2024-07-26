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
</style>
<div class="nav-right">
    <div class="aside-content">
        <p><i class="fa-solid fa-hotel"></i> Thêm mới bình luận <span>[ KDH Hotel ]</span></hp>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=add-binhluan" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <!-- Remove the ID field -->
            </div>
            <label> Người đăng </label> <br>
            <select name="UserID">
                <?php
                // Lấy danh sách người dùng từ cơ sở dữ liệu
                $list_users = pdo_query("SELECT UserID, Username FROM signup");
                foreach ($list_users as $user) {
                echo "<option value='" . $user['UserID'] . "'>" . $user['Username'] . "</option>";
                }
                ?>
   
            <div class="row2 mb10">
                <div class="row2 mb10">
                    <label>Nội dung</label> <br>
                    <textarea name="noi_dung" id="" cols="30" rows="2"></textarea>
                </div>
                <div class="row2 mb10">
                    <label>Ngày đăng </label> <br>
                    <input type="datetime-local" name="ngay_dang">
                </div>
                <div class="row2 mb10">
                    <label>Tên phòng </label> <br>
                    <select name="maLoaiPhong">
                        <?php
                        // Lấy danh sách phòng từ cơ sở dữ liệu
                        $list_phong = pdo_query("SELECT maLoaiPhong, tenLoaiPhong FROM loaiphong");
                    foreach ($list_phong as $phong) {
                        echo "<option value='" . $phong['maLoaiPhong'] . "'>" . $phong['tenLoaiPhong'] . "</option>";
                        }
                        ?>
                    </select>

                </div>
                <div style="" class="row mb10 ">
                    <input style="width:300px; position: relative; left:3%;" class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
                    <input style="width:300px; position: relative; left:6%;" class="mr20" type="reset" value="NHẬP LẠI">
                    <a href="index.php?act=list-binhluan"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
                <div>
                    <?php
                    if(isset($thongbao)&&($thongbao!=""))
                    echo $thongbao; 
                    ?>
                </div>
            </form>
        </div>
 
</div>