<style>
    .box_titleb {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .box_content2b {
        margin-bottom: 20px;
    }

    .box_searchb {
        margin-top: 10px;
    }

    .box_searchb input[type="text"],
    .box_searchb input[type="submit"] {
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .box_searchb input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    .comment-section {
        max-width: 600px;

    }

    .comment-input {
        margin-bottom: 15px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
    }

    .button-send {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }

    .button-send:hover {
        background-color: #45a049;
    }


    .comments {
        background-color: #f0f0f0;
        padding: 20px;
        margin-top: 20px;
    }

    .comment {
        background-color: #fff;
        padding: 10px;
        margin-bottom: 10px;
    }

    .comment .user {
        font-weight: bold;
    }

    .comment .user:after {
        content: ":";
    }

    .comment .message {
        margin-top: 5px;
    }
</style>
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
    $book = "index.php?act=datphong&maLoaiPhong=" . $maLoaiPhong;
    // $username = $_SESSION['Username'];
}
?>
<!-- our rooms -->
<div id="checkoutRoom">
    <h1 style="text-align: center; margin: 20px">≼ Our Room ≽</h1>
</div>

<div class="list-phong-room">
    <div class="row rooms">
        <div class="col col-rooms" style="display: flex;">
            <div class="col-rooms_img-room">
                <img class="image3" id="image3" src="<?php echo $imageHTML ?>" alt="" />
            </div>
            <div class="dachieu">
                <div class="dachieu1"><img src="image/hotel1photo.webp" alt=""></div>
                <div class="dachieu1"><img src="image/hotel2photo.jpg" alt=""></div>
                <div class="dachieu1"><img src="image/hotel4.jpg" alt=""></div>
                <div class="dachieu1"><img src="image/hotel1.jpg" alt=""></div>
            </div>

            <div class="detail-text3-room">
                <div class="text3 text3-rooms">
                    <h3><?php echo  $row['tenLoaiPhong'] ?></h3>
                    <div class="icon-room">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                        <i class="fa-solid fa-spa"></i>
                        <i class="fa-solid fa-dumbbell"></i>
                        <i class="fa-solid fa-person-swimming"></i>
                    </div>
                    <div class="price-room">
                        <span>
                            Đơn giá : <?php echo  $row['donGia'] ?>
                        </span>
                    </div>
                    <div class="text-chitiet">
                        <span>
                            Phòng khách sạn dành cho một người ở. Đây là loại phòng thường có một giường đơn hoặc một giường lớn phù hợp cho một người nghỉ ngơi. Phòng single room thường có các tiện nghi cơ bản bao gồm phòng tắm riêng,
                            đồ đạc cá nhân, bàn làm việc, và các tiện ích như truyền hình cáp, internet, điều hòa nhiệt độ, tủ lạnh mini và máy pha cà phê.
                        </span>
                    </div>
                    <?php echo ' <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="' . $book . '">Book</a></button> ' ?>
                </div>
            </div>
        </div>
    </div>

    <div class="comment-section">
        <h2>Bình luận</h2>
        <div class="comment-input">
            <div class="boxfooter binhluanform">
                <form action="" method="POST">
                    <input type="hidden" name="maLoaiPhong" value="<?= $maLoaiPhong ?>">
                    <input type="hidden" name="userName" value="<?= $username ?>">
                    <textarea placeholder="Nhận xét của bạn" name="cmt"></textarea>
                    <input type="submit" name="send_cmt" value="Gửi nhận xét" class="button-send">
                </form>
            </div>
            <?php
            if (isset($_POST['send_cmt']) && ($_POST['send_cmt'])) {
                $cmt = $_POST['cmt'];
                $maLoaiPhong = $_POST['maLoaiPhong'];
                $username = $_POST['userName'];
                $currentDate = new DateTime();
                $formattedDate = $currentDate->format('Y-m-d H:i:s');
                insert_binhluan($cmt, $formattedDate, $username, $maLoaiPhong);
            }
            
            ?>

        </div>
        <div class="comments">
            <ul>
                <table>
                    <?php
                    foreach ($binhluan as $bl) {
                        extract($bl);

                        echo '
                            <div class="comment">  
                                <h5 class="user">Tên người dùng : ' . $username . ' </h5>  
                                <p class="message"> cmt : ' . $noi_dung . ' </p>   
                                Thời gian : ' . $ngay_dang . '
                            </div> ';
                    }
                    ?>
                </table>
            </ul>
        </div>


    </div>


</div> <br>



<section id="secondsection">
    <h1 class="head">≼ Our room ≽</h1>
    <div class="ourroom">
        <?php
        foreach ($listloaiphong as $loaiphong) {
            extract($loaiphong);
            $book = "index.php?act=datphong&maLoaiPhong=" . $maLoaiPhong;
            $view = "index.php?act=view_room&maLoaiPhong=" . $maLoaiPhong;
            if (is_file("image/" . $image)) {
                $imageHTML = 'image/' . $image . '';
            } else {
                $imageHTML = "No photo";
            }

            echo '
    <div class="roomselect">
      <div class="roombox">
        <div class="hotelphoto " style="background-image: url(' . $imageHTML . ');"> </div>
            <div class="roomdata">
            <h2>' . $tenLoaiPhong . '</h2>
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="' . $book . '">Book</a></button>
            <button class="btn btn-primary bookbtn"><a href="' . $view . '" class="view_room">View</a>
            </button>
        </div>
        

      </div>
    </div>';
        }
        ?>
    </div>
</section>

<!-- end our room -->
<script>
    // Lấy tất cả các phần tử hình ảnh có lớp 'dachieu1'
    const images = document.querySelectorAll('.dachieu1 img');

    // Lấy phần tử hình ảnh lớn để chèn ảnh phóng to vào
    const bigImage = document.getElementById('image3');

    // Xử lý sự kiện khi hình ảnh nhỏ được nhấp chuột
    images.forEach(image => {
        image.addEventListener('click', function() {
            // Lấy đường dẫn của hình ảnh được nhấp chuột
            const imageUrl = this.getAttribute('src');

            // Chèn đường dẫn của hình ảnh vào hình ảnh lớn
            bigImage.setAttribute('src', imageUrl);

            // Phóng to hình ảnh lớn
            bigImage.style.width = '435px';
            bigImage.style.height = 'auto';
            bigImage.classList.add('zoomed');
        });
    });
</script>