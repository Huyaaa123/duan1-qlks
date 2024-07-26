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
        <p><i class="fa-solid fa-hotel"></i> Thêm mới dịch vụ <span>[ KDH Hotel ]</span></hp>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addnhanvien" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label>Mã nhân viên</label> <br>
                <input type="text" name="manv">
            </div>
            <div class="row2 mb10">
                <label>Tên nhân viên </label> <br>
                <input type="text" name="name">
            </div>
            <div class="row2 mb10">
                <label>Chức vụ</label> <br>
                <input type="text" name="chucvu">
            </div>
            <div class="row2 mb10">
                <label>Email</label> <br>
                <input type="text" name="email">
            </div>
            <div class="row2 mb10">
                <label>Mật khẩu đăng nhâp</label> <br>
                <input type="text" name="password">
            </div>
            <div class="row mb10 ">
                <input style="width:300px; position: relative; left:3%;" class="mr20" type="submit" name="themmoi"
                    value="THÊM MỚI">
                <input style="width:300px; position: relative; left:7%;" class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=list-dv"><input style="width:300px; position: relative; left:70%; bottom:27px;"
                        class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <div>
                <?php if (isset($thongbao) && $thongbao != '') {
                    echo $thongbao;
                } ?>
            </div>
        </form>
    </div>
</div>

<!-- END HEADER -->


</div>