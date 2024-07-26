<!-- $sql = "SELECT phong.*, loaiphong.tenLoaiPhong
        FROM phong
        INNER JOIN loaiphong ON phong.maLoaiPhong = loaiphong.maLoaiPhong where 1";
    if ($kyw != "") { -->
<section id="secondsection">
  <div class="" id="checkoutRoom">
    <h2 class="request_search">Kết quả tìm kiếm :</h2>
    <div class="ourroom">
      <?php
      foreach ($listloaiphong as $loaiphong) {
        extract($loaiphong);
        $book = "index.php?act=datphong&maLoaiPhong=" . $maLoaiPhong ;
      $view = "index.php?act=view_room&maLoaiPhong=" . $maLoaiPhong ;
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
                <h4 style="color:red;">' . $donGia . 'VND</h4>
            
                <div class="services">
                </div>
                <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="'. $book .'">Book</a></button>
                <button class="btn btn-primary bookbtn"><a href="' . $view .'" class="view_room">View</a>
                </button>
            </div>
      </div>
    </div>';
      }
      ?>
    </div>
  </div>
</section>
<section id="thirdsection">
  <h1 class="head">≼ Facilities ≽</h1>
  <div class="facility">
    <div class="box">
      <h2><a class="btn btn-primary bookbtn" href="index.php?act=facilities_detail">Swiming pool</a></h2>
    </div>
    <div class="box">
      <h2><a class="btn btn-primary bookbtn" href="index.php?act=facilities_detail">Spa</a></h2>
    </div>
    <div class="box">
      <h2><a class="btn btn-primary bookbtn" href="index.php?act=facilities_detail">24*7 Restaurants</a></h2>
    </div>
    <div class="box">
      <h2><a class="btn btn-primary bookbtn" href="index.php?act=facilities_detail">24*7 Gym</a></h2>
    </div>
    <div class="box">
      <h2><a class="btn btn-primary bookbtn" href="index.php?act=facilities_detail">Heli service</a></h2>
    </div>
  </div>
</section>