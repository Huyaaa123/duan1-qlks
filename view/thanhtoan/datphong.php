    <?php
    if (isset($_GET['maLoaiPhong']) && ($_GET['maLoaiPhong'] > 0)) {
        $maLoaiPhong = $_GET['maLoaiPhong'];

        // Thực hiện truy vấn để lấy thông tin với ID tương ứng
        $dm = load_all_data_by_maLoaiPhong($maLoaiPhong);


        // Kiểm tra nếu dữ liệu được trả về là một mảng hợp lệ
        if (isset($dm) && is_array($dm)) {
            foreach ($dm as $row) {

                $image = $row['image'];
                // echo print_r($row) . '<br>';
                // Kiểm tra nếu file ảnh tồn tại
                if (is_file("image/" . $image)) {
                    $imageHTML = 'image/' . $image;
                } else {
                    $imageHTML = "No photo";
                }
            }
        }
        // Tạo một mảng kết quả
        $resultArray = [];

        // Duyệt qua mảng đầu tiên và lưu thông tin vào mảng kết quả theo khóa "tenphong"
        foreach ($dm as $item) {
            $resultArray[$item['tenPhong']][] = $item;
        }
    }

    ?>


    <div class="col-d main_booking">
        <div class="col-trai">
            <!-- <h5>Phòng <?php echo  $row['tenLoaiPhong'] ?></h5> -->
            <div><img src="<?php echo $imageHTML ?>" alt="" class="image_booking"></div>
            <div class="name-booking">
                <h5>Phòng <?php echo  $row['tenLoaiPhong'] ?><br></h5>
                <h5 style="color: red;">Giá <?php echo  $row['donGia'] ?><br></h5>
            </div>
            <div class="name-booking">
                <p>
                    1 x Phòng Standard giường đôi (Standard Double Room) <br>
                    Đổi <br>
                <ol>
                    <li>Sạch sẽ tuyệt vời </li>
                    <li> 1 phòng, 2 người lớn </li>
                    <li>Tối đa: 2 người lớn, 1 Trẻ em (0-6 tuổi) </li>
                    <li> Bãi đậu xe </li>
                    <li>Nhận phòng nhanh</li>
                    <li>WiFi miễn phí</li>
                    <li> Nước uống </li>
                </ol>

                </p>
            </div>
        </div>

        <div class="col-phai">
            <h5>Nhập thông tin chi tiết của bạn</h5>


            <form action="index.php?act=thanhtoan" method="post" class="form-floating form-booking" onsubmit="return validateForm()">
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="name" placeholder="Enter email" name="name">
                    <label for="name">Họ tên</label>
                </div>
                <div class="form-floating mb-3 mt-3">
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mt-3 mb-3">
                    <input type="text" class="form-control" id="sdt" placeholder="Enter sdt" name="sdt">
                    <label for="sdt">Số điện thoại</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <select name="selectBox" id="selectBox" class="form-select">
                        <option value="0" disabled selected>Phòng có sẵn</option>
                        <?php
                        foreach ($resultArray as $tenphong => $items) {
                            echo '<option value="' . $tenphong . '">' . $tenphong . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-floating mt-3 mb-3 date-booking">
                    <div class="col">
                        <label for="checkin">Ngày nhận phòng</label> <br>
                        <input type="date" name="nhanphong" id="checkin" class="form-control">
                    </div>
                    <div class="col">
                        <label for="checkout">Ngày trả phòng</label> <br>
                        <input type="date" name="traphong" id="checkout" class="form-control">
                    </div>
                </div>
                <!-- <p id="stayDuration">Số ngày ở là :</p> -->
                <div class="form-floating mt-3 mb-3 sotien">
                    <div>
                        <label for="thanhtoan">Thành tiền</label>
                        <input style="color: red;" type="text" name="thanhtien" value="<?php echo  $row['donGia'] ?> " >
                    </div>
                </div>
                <input type="submit" name="bookphong" value="Tiếp túc Đặt phòng" class="btn btn-primary bookbtn booking">
            </form>

        </div>
    </div>

    <div style="margin: 20px;">
        <h5>Bản đồ</h5>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881391!2d105.7445984141576!3d21.038132792835867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1667839440057!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    
