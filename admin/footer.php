<footer class="text-center text-lg-start bg-light text-muted">
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
    // Lặp qua danh sách các đầu mục và thêm sự kiện click để hiển thị danh mục con tương ứng
    var pageBtns = document.querySelectorAll('.pagebtn');
    pageBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var subMenu = this.nextElementSibling;
            if (subMenu.classList.contains('show')) {
                subMenu.classList.remove('show');
            } else {
                // Ẩn tất cả danh mục con khác trước khi hiển thị danh mục con của đầu mục được nhấn
                var allSubMenus = document.querySelectorAll('.subMenu');
                allSubMenus.forEach(function(menu) {
                    menu.classList.remove('show');
                });
                subMenu.classList.add('show');
            }
        });
    });


    function detailRoom(){
    window.location.href = 'roomDetail.php';
  }
    var bookbox = document.getElementById("guestdetailpanel");
    // var bookbox1 = document.getElementById("guestdetailpanel1");

    openbookbox = () =>{
      bookbox.style.display = "flex";
    }
    // openbookbox1 = () =>{
    //   bookbox1.style.display = "flex";
    // }
    closebox = () =>{
      bookbox.style.display = "none";
    }
    closebox1 = () =>{
      bookbox.style.display = "none";
    }

    function logout(){
        sessionStorage.clear();
    }
</script>
<script src="./javascript/roombook.js"></script>
</html>