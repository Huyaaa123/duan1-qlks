<!-- <style>
  a{
    text-decoration: none;
  }
</style>
<section id="secondsection">
    <div class="ourroom">
        <h1 class="head">≼ Our room ≽</h1>
        <div class="roomselect">
            <?php
//             if (isset($viewlp) && is_array($viewlp)) {
//                 $i = 0;
//                 foreach ($viewlp as $sp) {
//                     extract($sp);
//                     $linksp = "index.php?act=main&maLoaiPhong=" . $maLoaiPhong;
//                     if (($i % 3 == 2) || ($i % 3 == 1)) {
//                         $mr = "";
//                     } else {
//                         $mr = "mr";
//                     }
//                     echo '<div class="roombox">
//                             <div class="hotelphoto h1"></div>
//                             <div class="roomdata">
//                                 <a href="'.$linksp.'">' . $tenLoaiPhong . '</a>
//                                 <div class="services">
//                                     <i class="fa-solid fa-wifi"></i>
//                                     <i class="fa-solid fa-burger"></i>
//                                     <i class="fa-solid fa-spa"></i>
//                                     <i class="fa-solid fa-dumbbell"></i>
//                                     <i class="fa-solid fa-person-swimming"></i>
//                                 </div>
//                                 <button class="btn btn-primary bookbtn" onclick="openbookbox()">Book</button>
//                                 <button class="btn btn-primary bookbtn"><a href="'.$linksp.'" class="view_room">View</a></button>
//                             </div>
//                         </div>';
//                     $i++;
//                 }
//               } else {
//                 echo "No items available.";
//             }
            ?>
        </div>
    </div> -->
<section id="secondsection">
  <h1 class="head">≼ Our room ≽</h1>
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
            <div class="services">
              <i class="fa-solid fa-wifi"></i>
              <i class="fa-solid fa-burger"></i>
              <i class="fa-solid fa-spa"></i>
              <i class="fa-solid fa-dumbbell"></i>
              <i class="fa-solid fa-person-swimming"></i>
            </div>
            <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="'. $book .'">Book</a></button>
            <button class="btn btn-primary bookbtn"><a href="' . $view .'" class="view_room">View</a>
            </button>
        </div>
        

      </div>
    </div>';
    }
    ?>
    <!-- <div class="roombox">
        <div class="hotelphoto h2"></div>
        <div class="roomdata">
          <h2>Delux Room</h2>
          <div class="services">
            <i class="fa-solid fa-wifi"></i>
            <i class="fa-solid fa-burger"></i>
            <i class="fa-solid fa-spa"></i>
            <i class="fa-solid fa-dumbbell"></i>
          </div>
          <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="index.php?act=datphong">Book</a></button>
          <button class="btn btn-primary bookbtn"><a href="index.php?act=view_room" class="view_room">View</a>
          </button>
        </div>
      </div>
      <div class="roombox">
        <div class="hotelphoto h3"></div>
        <div class="roomdata">
          <h2>Guest Room</h2>
          <div class="services">
            <i class="fa-solid fa-wifi"></i>
            <i class="fa-solid fa-burger"></i>
            <i class="fa-solid fa-spa"></i>
          </div>
          <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="index.php?act=datphong">Book</a></button>
          <button class="btn btn-primary bookbtn"><a href="index.php?act=view_room" class="view_room">View</a>
          </button>
        </div>
      </div>
      <div class="roombox">
        <div class="hotelphoto h4"></div>
        <div class="roomdata">
          <h2>Single Room</h2>
          <div class="services">
            <i class="fa-solid fa-wifi"></i>
            <i class="fa-solid fa-burger"></i>
          </div>
          <button name="book_hdon" class="btn btn-primary bookbtn"><a style="color: white; text-decoration: none;" href="index.php?act=datphong">Book</a></button>
          <button class="btn btn-primary bookbtn"><a href="index.php?act=view_room" class="view_room">View</a>
          </button>
        </div>
      </div>
     -->
    <!-- </div> -->
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