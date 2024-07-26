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
.mb {
  width: 100%;
  border: 1px solid #e2e2e2;
  padding: 10px;
  margin-bottom: 20px;
  background-color: #f9f9f9;
}

.box_title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.box_content2 {
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}

.boxfooter {
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ccc;
}

.binhluanform input[type="text"] {
  width: 60%;
  padding: 10px;
  margin: 5px 0;
}

.binhluanform input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

.binhluanform input[type="submit"]:hover {
  background-color: #45a049;
}

</style>

<!-- our rooms -->
<div id="checkoutRoom">
    <h1 style="text-align: center; margin: 20px">≼ Our Room ≽</h1>
</div>

<div class="list-phong-room">
    <div class="row rooms">
        <div class="col col-rooms" style="display: flex;">
            <div class="col-rooms_img-room">
                <img class="image3" id="image3" src="image/hotel1photo.webp" alt="" />
            </div>
            <div class="dachieu">
                <div class="dachieu1"><img src="image/hotel1photo.webp" alt=""></div>
                <div class="dachieu1"><img src="image/hotel2photo.jpg" alt=""></div>
                <div class="dachieu1"><img src="image/hotel4.jpg" alt=""></div>
                <div class="dachieu1"><img src="image/hotel1.jpg" alt=""></div>
            </div>

            <?php
             extract($loaiphong);
            ?>
                <?php
                echo '
                <div class="detail-text3-room">
                <div class="text3 text3-rooms">
                    <h3>'.$tenLoaiPhong.'</h3>
                    <div class="icon-room">
                        <i class="fa-solid fa-wifi"></i>
                        <i class="fa-solid fa-burger"></i>
                        <i class="fa-solid fa-spa"></i>
                        <i class="fa-solid fa-dumbbell"></i>
                        <i class="fa-solid fa-person-swimming"></i>
                    </div>
                    <div class="price-room">
                     Giá thị trường : ' .$donGia . ' VNĐ. <br>
                    </div>
                    <div class="text-chitiet">
                        <span>
                        '.$ghiChu.'
                        </span>
                    </div>
                    <!-- <button class="book-room"
                     onclick="openbookbox()">
                     Book
                    </button> -->
                    <button class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;"
                            href="index.php?act=datphong">Book</a></button>
                </div>
            </div>
        </div>
    </div>

</div>';
                
                ?> <br>
<div class="mb">
              <div class="box_title">Đánh giá</div>
              <div class="box_content2 product_portfolio binhluan">
                <ul >
                    <table>
                    <?php
                    foreach($binhluan as $bl){
                        extract($bl);
                        echo ''.$noi_dung.'<br>';
                        echo ''.$Username.'<br>';
                        echo 'Thời gian : '.$ngay_dang.'<br>'.'<br>';
                    } 
                    ?>
                    </table>
                </ul>
              </div>
              <div class="boxfooter binhluanform">
                <form action="<?php $linksp ?>" method="POST">
                    <input type="hidden" name="maLoaiPhong" value="<?=$maLoaiPhong?>">
                    
                   <input type="text" name="noi_dung" >
                   <input type="submit" value="Gửi đánh giá" name="guibinhluan" >
                </form>
              </div>
              <?php
              if(isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])){
               $UserID=$_SESSION['UserID'];
               $noi_dung=$_POST['noi_dung'];
               $maLoaiPhong=$_POST['maLoaiPhong'];
               $ngay_dang=date('h:i:sa d/m/Y');
               insert_binhluan($noi_dung, $ngay_dang, $UserID, $maLoaiPhong);
            }
            
              ?>
           </div>
           <style>
  a{
    text-decoration: none;
  }
</style>
<section id="secondsection">
    <div class="ourroom">
        <h1 class="head">≼ Other rooms ≽</h1>
        <div class="roomselect">
            <?php
            if (isset($viewlp) && is_array($viewlp)) {
                $i = 0;
                foreach ($viewlp as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=main&maLoaiPhong=" . $maLoaiPhong;
                    if (($i % 3 == 2) || ($i % 3 == 1)) {
                        $mr = "";
                    } else {
                        $mr = "mr";
                    }
                    echo '<div class="roombox">
                            <div class="hotelphoto h1"></div>
                            <div class="roomdata">
                                <a href="'.$linksp.'">' . $tenLoaiPhong . '</a>
                                <div class="services">
                                    <i class="fa-solid fa-wifi"></i>
                                    <i class="fa-solid fa-burger"></i>
                                    <i class="fa-solid fa-spa"></i>
                                    <i class="fa-solid fa-dumbbell"></i>
                                    <i class="fa-solid fa-person-swimming"></i>
                                </div>
                                <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
                                <button class="btn btn-primary bookbtn"><a href="'.$linksp.'" class="view_room">View</a></button>
                            </div>
                        </div>';
                    $i++;
                }
              } else {
                echo "No items available.";
            }
            ?>
        </div>
    </div>
</section>