<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Liên hệ ngay với chúng tôi qua các trang mạng xã hội :</span>

    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i></a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i></a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i></a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i></a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i></a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i></a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <img src="./image/logo2.png" style="width:80px;" alt=""></i>KDH Hotel
          </h6>
          <p>
            Với các tiện nghi hiện đại, không gian thoải mái và đội ngũ nhân viên chuyên nghiệp, chúng tôi sẽ làm hài lòng bạn trong suốt thời gian lưu trú tại đây.

          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->

          <h6 class="text-uppercase fw-bold mb-4">QUY ĐỊNH - CHÍNH SÁCH</h6>
          <p>
            <a href="index.php?act=dieukhoan" style="text-decoration: none;" class="text-reset">Điều khoản và Điều kiện</a>

          </p>
          <p>
            <a href="index.php?act=quydinh" style="text-decoration: none;" class="text-reset">Quy định về thanh toán </a>
          </p>
          <p>

            <a href="index.php?act=chinhsach" style="text-decoration: none;" class="text-reset">Chính sách hủy và hoàn tiền</a>
          </p>
          <p>
            <a href="index.php?act=khieunai" style="text-decoration: none;" class="text-reset">Giải quyết tranh chấp khiếu nại</a>
          </p>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Về chúng tôi</h6>
          <p>

            <a href="index.php?act=hddatphong" style="text-decoration: none;" class="text-reset">Hướng dẫn thanh toán</a>
          </p>
          <p>
            <a href="index.php?act=gioithieu" style="text-decoration: none;" class="text-reset">Giới thiệu</a>
          </p>
          <p>
            <a href="index.php?act=hangtv" style="text-decoration: none;" class="text-reset">Chương trình Hạng Thành Viên</a>

          </p>
          <p>
            <a href="index.php?act=lienhe" style="text-decoration: none;" class="text-reset">Liên hệ</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->

          <h6 class="text-uppercase fw-bold mb-4">Thông tin liên hệ </h6>
          <p><i class="fas fa-home me-3"></i> Số 1 Thăng Long , Hà Nội</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            kdh.hotel@gmail.com
          </p>

          <p><i class="fas fa-phone me-3"></i> + 84 364 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 02 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <section id="contactus">
    <div class="social">
      <i class="fa-brands fa-instagram"></i>
      <i class="fa-brands fa-facebook"></i>
      <i class="fa-solid fa-envelope"></i>
    </div>
    <div class="createdby">
      <h5>Created by KDH</h5>
    </div>
  </section>
  <!-- Copyright -->
</footer>
</body>

<script>
  function detailRoom() {
    window.location.href = 'roomDetail.php';
  }
  var bookbox = document.getElementById("guestdetailpanel");

  openbookbox = () => {
    bookbox.style.display = "flex";
  }
  closebox = () => {
    bookbox.style.display = "none";
  }



  // Đợi cho trang web hoàn tất tải
  document.addEventListener("DOMContentLoaded", function() {
    // Cuộn xuống footer
    function scrollToFooter() {
      var checkoutRoom = document.getElementById('checkoutRoom'); // Thay 'footer' bằng ID của phần footer của trang web
      checkoutRoom.scrollIntoView({
        behavior: 'smooth'
      }); // Cuộn đến footer với hiệu ứng mượt
    }

    // Gọi hàm scrollToFooter khi chuyển trang
    window.onload = scrollToFooter;
  });



  function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var sdt = document.getElementById('sdt').value;
    var selectBox = document.getElementById('selectBox').value;
    var nhanphong = document.getElementById('checkin').value;
  var traphong = document.getElementById('checkout').value;

    if (name === "" || email === "" || sdt === "" || selectBox === "") {
      alert("Vui lòng điền đủ thông tin trong form");
      return false; // Ngăn chặn form được submit khi không hợp lệ
    }
  }


</script>

</html>