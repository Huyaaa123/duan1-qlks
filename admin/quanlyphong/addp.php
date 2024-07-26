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
        <p><i class="fa-solid fa-hotel"></i> Thêm phòng <span>[ KDH Hotel ]</span></hp>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addp" method="POST" enctype="multipart/form-data">

            <div class="row2 mb10 form_content_container">
                <label>Mã phòng</label> <br>
                <input type="text" name="maPhong" disabled>
            </div>

            <div class="row2 mb10">
                <label> Tên phòng</label> <br>
                <input type="text" name="tenPhong">
            </div>

            <div class="row2 mb10 ngayDangKi">
                <div class="col">
                    <label> Loại phòng</label>
                    <select name="maLoaiPhong" id="">
                        <option value="3" >Guest Room</option>
                        <option value="2">Delux Room</option>
                        <option value="5">Superior Room</option>
                        <option value="6">Single Room</option>
                    </select>
                  
                </div>
               
            </div>
            <div class="row2 mb10">
                <label> Mô tả :</label> <br>
              <textarea name="ghiChu" id="" cols="5" rows="5"></textarea>

            </div>

            <div class="row2 mb10 ngayDangKi">
                <div class="col">
                    <label>Tình trạng </label> <br>
                    <select name="tinhTrang" id="">
                        <option value="1" >Còn phòng</option>
                        <option value="2">Hết Phòng</option>
                    </select>
                </div>
            </div>
        
            <div class="row mb10 ">
                
                <input style="width:300px; position: relative; left:3%;" class="mr20" type="submit" name="themmoi" value="THÊM MỚI" >
                <input style="width:300px; position: relative; left:7%;" class="mr20" type="reset" value="NHẬP LẠI">

                <a href="index.php?act=listp"><input style="width:300px; position: relative; left:70%; bottom:27px;" class="mr20" type="button" value="DANH SÁCH"></a>
            </div>

            <div>
                <?php
                if (isset($thongbao) && ($thongbao != "")){
                    echo "<script>swal({
                        title: 'Vui lòng nhập lại mật khẩu',
                        icon: 'error',
                    });
                    </script>";
                }
                ?>
    
            </div>

        </form>
    </div>
</div>

<!-- END HEADER -->


</div>