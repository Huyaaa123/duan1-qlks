<nav class="nav-right quanly-user">
    <div class="aside-content">
        <div>
            <p><i class="fa-solid fa-hotel"></i> Quản lý khách hàng & Đơn đặt<span>[ KDH Hotel ]</span></p>
        </div>
        <div>
            <button name="themmoi"><i class="fa-solid fa-plus"></i><a href="index.php?act=add_khachhang">Booking</a> </button>
        </div>
    </div>
    <div class="display-floor">
        <div class="display-floor_left">
            <!-- <p>Hiển thị <select name="floor" id="display-floor">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                </select> tầng</p> -->
        </div>
        <div class="display-floor_right">
            <div class="input-group mb-3">
                <form action="index.php?act=searchdmp" method="post">
                    <input type="text" class="form-control" placeholder="Gõ từ khóa" name="maLoaiPhong">
                    <input class="btn btn-success" type="submit" value="Tìm kiếm">

                </form>
            </div>
        </div>


    </div>
    <div class="table-loaiphong">
        <table class="table table-striped">
            <thead>
                <tr>

                    <th>id_customer </th>
                    <th>Họ và Tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Tên phòng</th>
                    <th>Ngày đặt phòng</th>
                    <th>Ngày trả Phòng</th>
                    <th>Tổng hóa đơn</th>
                    <th>Trạng thái</th>


                </tr>
            <tbody>
                <?php
                foreach ($list_datphong as $datphong) {
                    extract($datphong);
                    echo '<tr>
                    <td>' . $id_customer . '</td>
                    <td>' . $customer_name . '</td>
                    <td>' . $customer_email . '</td>
                    <td>' . $customer_phone . '</td>
                    <td>' . $tenPhong . '</td>
                    <td>' . $ngayDatPhong . '</td>
                    <td>' . $ngayBatDauThue . '</td>
                    <td>' . $thanhtien . '</td>
                    <td> 
                         <select name="status" id="status" class="status" onchange="confirm_booking(this,\''.$id_customer.'\', \''.$tenPhong.'\')">
                            <option value="0">' . $ten_status . '</option>
                            <option value="1">Xác nhận</option>
                            <option value="2">Chưa xác nhận</option>
                        </select>
                     </td>
                  
            </tr>';
    
                    // $suaKh = "index.php?act=update_khachhang&maHoaDon=" . $maHoaDon;
                } ?>

             

            </tbody>
        </table>
    </div>

</nav>

</div>
<script>
    function confirm_booking(option, id_customer, tenPhong){
        if (option.value === '1' || option.value === '2') {
            var value = option.value; // Lấy giá trị của trạng thái được chọn
            window.location.href = 'index.php?act=confirm_booking&id_customer=' + id_customer + '&value=' + value + '&tenPhong=' + tenPhong; // Đưa biến tenPhong vào URL
        }
    }
    // document.getElementsByClassName('status').onchange = function() {
    //     alert("jh");
    //
    // };
</script>
