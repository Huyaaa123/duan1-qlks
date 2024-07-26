<div class="home-admin">
    <nav class="sidenav">
        <ul>
            <li class="pagebtn active">
                << </li>
                    <!-- khach san -->
            <?php
            if ($_SESSION['user_role'] == 1){
            ?>
            <li class="pagebtn">Khách sạn</li>
            <ul class="subMenu ">
                <li><a href="index.php?act=listdmp">Quản lý danh mục phòng</a></li>
                <li><a href="index.php?act=listp">Quản lý phòng</a></li>
            </ul>

            <!-- dich vu kho  -->
            <li class="pagebtn"><a style="color:black;" href="index.php?act=list-dv">Dịch vụ</a></li>
            <ul class="subMenu ">
               
                <!-- <li><a href="index.php?act=thongke-dv">Thống kê DV đã bán </a></li> -->
            </ul>

            <!-- tien chi va phieu thu  -->
            <!-- <li class="pagebtn">Tiền chi $ Tiền thu</li>
            <ul class="subMenu ">
                <li><a href="">Quản lý phiếu thu</a></li>
                <li><a href="">Quản lý phiếu chi </a></li>
            </ul> -->


                <!-- binh luan  -->
                <li class="pagebtn" ><a style="color:black ;" href="index.php?act=list-binhluan">Bình luận</a></li>

           <!-- nhan vien -->
                    <li class="pagebtn">Nhân viên</li>
                    <ul class="subMenu ">
                        <li><a href="index.php?act=listnhanvien">Quản lý nhân viên</a></li>
                        <li><a href="index.php?act=chucvu">Quản lý chức vụ</a></li>
                    </ul>


            <!-- thong ke  -->
            <li class="pagebtn" ><a style="color:black;" href="index.php?act=list-hoadon">Thống kê</a></li>
            <ul class="subMenu ">
                
                <!-- <li><a href="">Kết quả kinh doanh </a></li> -->
                <!-- <li><a href="">Báo cáo</a></li> -->
            </ul>
                    <?php
                }
           ?>
            <!-- khach hang -->
            <li class="pagebtn"><a href="index.php?act=list_khachhang" style="color: black;">Khách hàng & Đơn đặt </a> </li>
            <!-- <ul class="subMenu ">
                <li><a href="">Khách hàng đang ở</a></li>
                <li><a href="">Khách hàng đặt phòng </a></li>
                <li><a href="">Khách hàng theo ngày </a></li>
                <li><a href="">Danh sách khách hàng</a></li>
            </ul> -->


            <!-- ho tro -->
            <li class="pagebtn">Hỗ trợ</li>
            <ul class="subMenu ">
                <li><a href="index.php?act=hdsd">Hướng dẫn sử dụng</a></li>
                <li><a href="index.php?act=sendsp">Gửi hỗ trợ</a></li>
            </ul>
        </ul>
    </nav>