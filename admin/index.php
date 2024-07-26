    <!-- nav bar -->
    <?php
    session_start();
    include '../model/pdo.php';
    include '../model/loaiphong.php';
    include '../model/phong.php';
    include '../model/dichvu.php';
    include('../model/binhluan.php');
    include '../model/nhanvien.php';
    include '../model/hoadon.php';
    include '../model/order.php';
    include 'header.php';
    include 'home.php';

    // if (
    //     isset($_SESSION['Emp_login_submit']) &&
    //     $_SESSION['Emp_login_submit'] === true
    // ) {

    //     //echo "Xin chào, " . $_SESSION['Email'];
    // } else {
    //     // Người dùng chưa đăng nhập
    //     session_unset();
    //     echo 'Vui lòng đăng nhập để truy cập trang này';
    // }

    $listloaiphong = loadall_loaiphong();
    $listphong = loadall_phong();
    $list_hoadon = all_hoadon();
    // $list_binhluan = all_binhluan();
    //controller
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {

                // danh muc phong
            case 'listdmp':
                include 'danhmucphong/listdmp.php';
                break;

            case 'adddmp':
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $tenloai = $_POST['tenloai'];
                    $dongia = $_POST['dongia'];
                    $ghichu = $_POST['ghichu'];
                    insert_loaiphong($tenloai, $dongia, $ghichu);
                }
                $listloaiphong = loadall_loaiphong();
                include "danhmucphong/adddmp.php";
                break;

            // case 'suadm':
            //     if (isset($_GET['maLoaiPhong']) && $_GET['maLoaiPhong'] > 0) {
            //         $dm = loadone_loaiphong($_GET['maLoaiPhong']);
            //     }
            //     include 'danhmucphong/updatedmp.php';
            //     break;
            case 'updatedmp':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $maLoaiPhong = $_POST['maLoaiPhong'];
                    $tenloai = $_POST['tenloai'];
                    $dongia = $_POST['dongia'];
                    $ghichu = $_POST['ghichu'];
                    update_loaiphong($maLoaiPhong, $tenloai, $dongia, $ghichu);
                }
                $listloaiphong = loadall_loaiphong();
                include 'danhmucphong/updatedmp.php';
                break;
            case 'xoadmp':
                if (isset($_GET['maLoaiPhong']) && $_GET['maLoaiPhong'] > 0) {
                    delete_loaiphong($_GET['maLoaiPhong']);
                }
                $listloaiphong = loadall_loaiphong('', 0);
                include 'danhmucphong/listdmp.php';
                break;
            case 'listsp':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listloaiphong = search_loaiphong($kyw);
                include "danhmucphong/listdmp.php";
                break;
                // case 'searchdmp':
                //     if (isset($_GET['maLoaiPhong']) && ($_GET['maLoaiPhong'] > 0)) {
                //         $id = $_GET['maLoaiPhong'];
                //         // search_loaiphong($id);
                //         // include "danhmucphong/listdmp.php";
                //     } else {
                //         echo "<script>swal({
                //             title: 'Không tìm thấy danh mục phòng',
                //             icon: 'error',
                //         });
                //         </script>";
                //     }
                //     $listloaiphong = loadall_loaiphong();
                //     include "danhmucphong/listdmp.php";
                //     break;

                // quan ly phong
            case 'listp':
                include "quanlyphong/listphong.php";;
                break;
            case 'addp':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $maPhong = $_POST['maPhong'];
                    $tenPhong = $_POST['tenPhong'];
                    $maLoaiPhong = $_POST['maLoaiPhong'];
                    $ghichu = $_POST['ghiChu'];
                    $tinhTrang = $_POST['tinhTrang'];
                    insert_phong($maPhong, $tenPhong, $maLoaiPhong, $ghichu, $tinhTrang);
                }
                $listloaiphong = loadall_phong();
                include "quanlyphong/addp.php";

                break;
            case 'updatep':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $maPhong = $_POST['maPhong'];
                    $tenPhong = $_POST['tenPhong'];
                    $maLoaiPhong = $_POST['maLoaiPhong'];
                    $ghiChu = $_POST['ghiChu'];
                    $tinhTrang = $_POST['tinhTrang'];
                    update_phong($maPhong, $tenPhong, $maLoaiPhong, $ghiChu, $tinhTrang);
                }
                $listloaiphong = loadall_loaiphong();
                include "quanlyphong/updatephong.php";
                break;

            case 'xoap':
                if (isset($_GET['maPhong']) & ($_GET['maPhong'] > 0)) {
                    delete_phong($_GET['maPhong']);
                }
                $listphong = loadall_phong('', 0);
                include 'quanlyphong/listphong.php';
                break;
            case 'searchPhong':
                if (isset($_POST['listok']) && ($_POST['listok'])) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                $listphong = search_phong($kyw);
                include "quanlyphong/listphong.php";
                break;


            case 'list-dv':
                $list_dv = all_dichvu();
                include "dichvu/list-dv.php";
                break;
            case 'delete-dv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {

                    del_dichvu($_GET['id']);
                }
                $list_dv = all_dichvu();
                include 'dichvu/list-dv.php';
                break;
            case 'add-dv':
                //kiểm tra ng dùng có click vào nút add hay k

                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $mota = $_POST['mota'];
                    $price = $_POST['price'];
                    $time = $_POST['time'];
                    $image = $_FILES['image']['name'];
                    $target_dir = "../image/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    insert_dichvu($id, $name, $mota, $image, $price, $time);
                    $thongbao = "Thêm thành công";
                }
                $list_dv = all_dichvu();
                include "dichvu/add-dv.php";
                break;
            case 'update-dv':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $mota = $_POST['mota'];
                    $price = $_POST['price'];
                    $time = $_POST['time'];
                    $image = $_FILES['image']['name'];
                    $target_dir = "../image/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $target_dir = '../image/';
                        $target_file =
                            $target_dir . basename($_FILES['image']['name']);
                        if (
                            move_uploaded_file(
                                $_FILES['image']['tmp_name'],
                                $target_file
                            )
                        ) {
                            //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                        } else {
                            //echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    update_dichvu($id, $name, $mota, $image, $price, $time);
                    $thongbao = "Cập nhật thành công";
                }
                $list_dv = all_dichvu();
                include "dichvu/update-dv.php";
                break;
                // // case 'thongke-dv':
                // //     break ;
                //     insert_dichvu($id, $name, $mota, $image, $price, $time);
                //     $thongbao = 'Thêm thành công';
                // }
                // $list_dv = all_dichvu();
                // include 'dichvu/add-dv.php';
                // break;
            case 'update-dv':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $mota = $_POST['mota'];
                    $price = $_POST['price'];
                    $time = $_POST['time'];
                    $image = $_FILES['image']['name'];
                    $target_dir = '../image/';
                    $target_file =
                        $target_dir . basename($_FILES['image']['name']);
                    if (
                        move_uploaded_file(
                            $_FILES['image']['tmp_name'],
                            $target_file
                        )
                    ) {
                        //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        //echo "Sorry, there was an error uploading your file.";
                    }
                    update_dichvu($id, $name, $mota, $image, $price, $time);
                    $thongbao = 'Cập nhật thành công';
                }
                $list_dv = all_dichvu();
                include 'dichvu/update-dv.php';
                break;
            case 'listnhanvien':
                $listnhanvien = all_nhanvien();
                include 'nhanvien/listnhanvien.php';
                break;
            case 'addnhanvien':
                //kiểm tra ng dùng có click vào nút add hay k
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $manv = $_POST['manv'];
                    $name = $_POST['name'];
                    $chucvu = $_POST['chucvu'];
                    $email = $_POST['email'];
                    $pass = $_POST['password'];
                    insert_nhanvien($manv, $name, $chucvu, $email, $pass);
                    $thongbao = 'Thêm thành công';
                }
                $list_dv = all_nhanvien();
                include 'nhanvien/addnhanvien.php';
                break;
                // case 'deletenhanvien':
                //     if (isset($_GET['manv']) && $_GET['manv'] > 0) {
                //         delete_nhanvien($_GET['manv']);
                //     }
                //     $listnhanvien = all_nhanvien();
                //     include 'nhanvien/listnhanvien.php';
                //     break;
            case 'deletenhanvien':
                if (isset($_GET['manv']) && $_GET['manv'] > 0) {
                    delete_nhanvien($_GET['manv']);
                }
                $listnhanvien = all_nhanvien();
                include 'nhanvien/listnhanvien.php';
                break;

            case 'chucvu':
                // $chucvu = $_POST['role'];
                // if ($chucvu == 1) {
                //     echo 'Bạn có quyền hành cao nhất';
                // } elseif ($chucvu == 2) {
                //     echo 'Bạn có quyền quản lý';
                // } else {
                //     echo 'Bạn chỉ là một thằng phế vật';
                // }
                include 'nhanvien/chucvu.php';
                break;
                // case 'thongke-dv':
                //     $list_thongke =thongke_dv();
                //     include "dichvu/thongke-dv.php";
                //     break;
            case 'hdsd':
                include 'hotro/hdsd.php';
                break;
                // case 'sendsp':
                //     include 'hotro/sendsp.php';

                //     $list_thongke = thongke_dv();
                //     include "dichvu/thongke-dv.php";
                //     break;
                // case 'list-hoadon':
                //     $list_hoadon = all_hoadon();
                //     include "thongke/list-hoadon.php";
                //     break;
                // case 'delete-hoadon':
                //     if (isset($_GET['maHoaDon']) && ($_GET['maHoaDon'] > 0)) {
                //         del_hoadon($_GET['maHoaDon']);
                //     }
                //     $list_hoadon = all_hoadon();
                //     include "thongke/list-hoadon.php";
                //     break;
                // case 'add-hoadon':
                //     //kiểm tra ng dùng có click vào nút add hay k
                //     if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                //         $maHoaDon = $_POST['maHoaDon'];
                //         $tenKhachHang = $_POST['tenKhachHang'];
                //         $diaChiKhachHang = $_POST['diaChiKhachHang'];
                //         $ngayThanhToan = $_POST['ngayThanhToan'];
                //         $thanhTien = $_POST['thanhTien'];
                //         $maPhong = $_POST['maPhong'];
                //         insert_hoadon($maHoaDon, $tenKhachHang, $diaChiKhachHang, $ngayThanhToan, $thanhTien, $maPhong);
                //         $thongbao = "Thêm thành công";
                //     }
                //     $list_hoadon = all_hoadon();
                //     include "thongke/add-hoadon.php";
                //     break;
                // case 'update-hoadon':
                //     if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                //         $maHoaDon = $_POST['maHoaDon'];
                //         $tenKhachHang = $_POST['tenKhachHang'];
                //         $diaChiKhachHang = $_POST['diaChiKhachHang'];
                //         $ngayThanhToan = $_POST['ngayThanhToan'];
                //         $thanhTien = $_POST['thanhTien'];
                //         $maPhong = $_POST['maPhong'];

                //         update_hoadon($maHoaDon, $tenKhachHang, $diaChiKhachHang, $ngayThanhToan, $thanhTien, $maPhong);
                //         $thongbao = "Cập nhật thành công";
                //     }
                //     $list_hoadon = all_hoadon();
                //     include "thongke/update-hoadon.php";
                //     break;
            case 'list-hoadon':
                $list_hoadon = all_hoadon();
                include 'thongke/list.php';
                break;
            case 'delete-hoadon':
                if (isset($_GET['maHoaDon']) && $_GET['maHoaDon'] > 0) {
                    del_hoadon($_GET['maHoaDon']);
                }
                $list_hoadon = all_hoadon();
                include 'thongke/list.php';
                break;
            case 'add-hoadon':
                //kiểm tra ng dùng có click vào nút add hay k
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    $maHoaDon = $_POST['maHoaDon'];
                    $tenKhachHang = $_POST['tenKhachHang'];
                    $diaChiKhachHang = $_POST['diaChiKhachHang'];
                    $ngayThanhToan = $_POST['ngayThanhToan'];
                    $thanhTien = $_POST['thanhTien'];
                    $maPhong = $_POST['maPhong'];
                    insert_hoadonn(
                        $maHoaDon,
                        $tenKhachHang,
                        $diaChiKhachHang,
                        $ngayThanhToan,
                        $thanhTien,
                        $maPhong
                    );
                    $thongbao = 'Thêm thành công';
                }
                $list_hoadon = all_hoadon();
                include 'thongke/add-hoadon.php';
                break;
            case 'update-hoadon':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $maHoaDon = $_POST['maHoaDon'];
                    $tenKhachHang = $_POST['tenKhachHang'];
                    $diaChiKhachHang = $_POST['diaChiKhachHang'];
                    $ngayThanhToan = $_POST['ngayThanhToan'];
                    $thanhTien = $_POST['thanhTien'];
                    $maPhong = $_POST['maPhong'];

                    update_hoadonn(
                        $maHoaDon,
                        $tenKhachHang,
                        $diaChiKhachHang,
                        $ngayThanhToan,
                        $thanhTien,
                        $maPhong
                    );
                    $thongbao = 'Cập nhật thành công';
                }
                $list_hoadon = all_hoadon();
                include 'thongke/update-hoadon.php';
                break;

            case 'thongke':
                include "thongke/list.php";
                break;
            case 'list-binhluan':
                $list_binhluan = all_binhluan();
                include "binhluan/list-binhluan.php";
                break;
            case 'delete-bl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    del_binhluan($_GET['id']);
                }
                $list_binhluan = all_binhluan();
                include "binhluan/list-binhluan.php";
                break;
            case 'hdsd':
                include 'hotro/hdsd.php';
                break;
            case 'sendsp':
                include 'hotro/sendsp.php';
                break;

                // quan ly nguoi dung 
            case 'list_khachhang':
                $list_datphong = all_orders();
                include "quanlynguoidung/list_khachhang.php";
                break;
                case 'confirm_booking':
                    $id = $_GET['id_customer'];
                    $value = $_GET['value'];
                    $tenPhong = $_GET['tenPhong'];

                    $query_update_booking = "UPDATE booking SET status = '$value' WHERE id_customer = $id"; // Sử dụng dấu nháy đơn để bao quanh giá trị 'value'
                    pdo_execute($query_update_booking);
                
                    if ($value === '1') { // Sử dụng dấu nháy đơn để so sánh giá trị với chuỗi '1'
                        $query_update_room_status = "UPDATE phong SET tinhTrang = '2' WHERE tenPhong = '$tenPhong'"; // Sử dụng dấu nháy đơn để bao quanh giá trị 'tenPhong'
                        pdo_execute($query_update_room_status);
                    }else{
                        $query_update_room_status = "UPDATE phong SET tinhTrang = '1' WHERE tenPhong = '$tenPhong'"; // Sử dụng dấu nháy đơn để bao quanh giá trị 'tenPhong'
                        pdo_execute($query_update_room_status);
                    }
                    $list_datphong = all_orders();
                    include "quanlynguoidung/list_khachhang.php";
                    break;
                
            case 'add_khachhang':
                include "quanlynguoidung/add_khachhang.php";
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    // $maHoaDon = $_POST['maHoaDon'];
                    $tenKhachHang = $_POST['tenKhachHang'];
                    $sdt = $_POST['sdt'];
                    $thanhTien = $_POST['thanhTien'];
                    $loaiPhong = $_POST['loaiPhong'];
                    $ngayDatPhong = $_POST['ngayDangKi'];
                    $ngayThanhToan = $_POST['ngayThanhToan'];
                    $trangThai = $_POST['trangThai'];
                    $taikhoan = $_POST['email'];
                    $dichvu = $_POST['dichvu'];
                    insert_hoadonn($tenKhachHang, $ngayDatPhong, $ngayThanhToan, $thanhTien, $loaiPhong, $sdt, $trangThai, $taikhoan, $dichvu);
                    $thongbao = "Cập nhật thành công";
                }
                $list_hoadon = all_hoadon();
                include "quanlynguoidung/list_khachhang.php";
                break;
            case 'update_khachhang':
                include "quanlynguoidung/update_khachhang.php";

                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $maHoaDon = $_POST['maHoaDon'];
                    $tenKhachHang = $_POST['tenKhachHang'];
                    $sdt = $_POST['sdt'];
                    $thanhTien = $_POST['thanhTien'];
                    $loaiPhong = $_POST['loaiPhong'];
                    $ngayDatPhong = $_POST['ngayDangKi'];
                    $ngayThanhToan = $_POST['ngayThanhToan'];
                    $trangThai = $_POST['trangThai'];
                    $taikhoan = $_POST['email'];
                    $dichvu = $_POST['dichvu'];
                    update_hoadon($maHoaDon, $tenKhachHang, $ngayDatPhong, $ngayThanhToan, $thanhTien, $loaiPhong, $sdt, $trangThai, $taikhoan, $dichvu);
                    $thongbao = "Cập nhật thành công";
                }
                $list_hoadon = all_hoadon();
                include "quanlynguoidung/update_khachhang.php";
                break;
            case 'delete_khachhang':
                if (isset($_GET['maHoaDon']) && ($_GET['maHoaDon'] > 0)) {
                    del_hoadon($_GET['maHoaDon']);
                }
                $list_hoadon = all_hoadon();
                include "quanlynguoidung/list_khachhang.php";
                break;
            case 'add-binhluan':
                //kiểm tra ng dùng có click vào nút add hay k
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $UserID = $_POST['UserID'];
                    $noi_dung = $_POST['noi_dung'];
                    $ngay_dang = $_POST['ngay_dang'];
                    $maLoaiPhong = $_POST['maLoaiPhong'];

                    insert_binhluan($noi_dung, $ngay_dang, $UserID, $maLoaiPhong);
                    $thongbao = "Thêm thành công";
                }
                $list_binhluan = all_binhluan();
                include "binhluan/add-binhluan.php";
                break;
            case 'update-binhluan':
                if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                    $id = $_POST['id'];
                    $noi_dung = $_POST['noi_dung'];
                    $ngay_dang = $_POST['ngay_dang'];
                    $UserID = $_POST['UserID'];
                    $maLoaiPhong = $_POST['maLoaiPhong'];

                    update_binhluan($id, $noi_dung, $ngay_dang, $UserID, $maLoaiPhong);
                    $thongbao = 'Cập nhật thành công';
                }
                $list_binhluan = all_binhluan();
                include "binhluan/update-binhluan.php";
                break;
            default:
                break;
        }
    }
    include 'footer.php';


    ?>