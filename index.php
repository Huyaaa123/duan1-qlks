<?php
session_start();
include 'model/pdo.php';
include 'model/taikhoan.php';
include 'model/datphong.php';
include 'model/tinhtrang.php';
include 'model/binhluan.php';
include 'model/order.php';
include 'view/header.php';
include 'model/phong.php';
include 'model/loaiphong.php';
// if (isset($_SESSION['user_login_submit']) && $_SESSION['user_login_submit'] === true) {
//     // Người dùng đã đăng nhập
//     // echo "Xin chào, " . $_SESSION['Username'];
// } else {
//     // Người dùng chưa đăng nhập
//     session_unset() ;
//     // echo "Vui lòng đăng nhập để truy cập trang này";
// }
//controller
// =======
$listloaiphong = loadall_loaiphong();
$list_datphong = all_orders();
if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
// if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];
    switch ($act) {
        case 'view_room':
            if (isset($_GET['maLoaiPhong']) && ($_GET['maLoaiPhong'] > 0)) {
                $maLoaiPhong = $_GET['maLoaiPhong'];
            } else {
                $maLoaiPhong = 0;
            }
            $viewlp = view_loaiphong($maLoaiPhong);
            //
            $noi_dung = "";
            $UserID = "";
            if (isset($_POST['guibinhluan'])) {
                hut_binhluan($maLoaiPhong, $noi_dung, $UserID);
            }

            if (isset($_GET['maLoaiPhong']) && $_GET['maLoaiPhong'] > 0) {
                $loaiphong = loadone_loaiphong($_GET['maLoaiPhong']);
                $binhluan = loadall_binhluan($_GET['maLoaiPhong']);
                // include "view/roomDetail.php";
            }
            include('view/roomDetail.php');

            break;

        case 'facilities_detail':
            include 'view/facilitiesDetail.php';
            break;
        case 'searchPhong':
            if (isset($_POST['listok']) && $_POST['listok']) {
                // Lấy giá trị từ form
                $checkin = $_POST['checkin'];
                $checkout = $_POST['checkout'];
                $checkinDate = new DateTime($checkin);
                $checkoutDate = new DateTime($checkout);
                $currentDate = new DateTime();
                // Kiểm tra xem ngày đã nhập có hợp lệ không
                if (
                    strtotime($checkin) === false ||
                    strtotime($checkout) === false
                ) {
                    // Ngày không hợp lệ
                    echo 'Vui lòng nhập ngày hợp lệ (Check Out phải sau Check In !)';
                    include 'view/main.php';
                } elseif (
                    $checkinDate < $currentDate ||
                    $checkoutDate < $currentDate
                ) {
                    echo 'Vui lòng chọn ngày sau ngày hiện tại';
                    include 'view/main.php';
                    // có thể thực hiện các hành động khác ở đây, như không cho phép tiếp tục xử lý form
                } else {
                    // So sánh ngày Check Out không nhỏ hơn ngày Check In
                    if (strtotime($checkout) <= strtotime($checkin)) {
                        echo 'Vui lòng nhập ngày hợp lệ (Check Out phải sau Check In !)';
                        include 'view/main.php';
                    } else {
                        include './view/search/searchPhong.php';
                    }
                }
            } else {
                $kyw = '';
            }
            break;
        case 'checkout_room':
            $list_datphong = all_orders();
            include 'view/checkoutRoom.php';
            break;
        case 'datphong':
            include 'view/thanhtoan/datphong.php';
            break;
        case 'thanhtoan':
            $name = $_POST['name'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $selectBox = $_POST['selectBox'];
            $nhanphong = $_POST['nhanphong'];
            $traphong = $_POST['traphong'];
            $thanhtien = $_POST['thanhtien'];
            include 'view/thanhtoan/thanhtoan.php';
            break;
        case 'chot_bill':
            // Xử lý khi form được submit
            if (isset($_POST['cn_orders']) && $_POST['cn_orders']) {
                // Lấy dữ liệu từ form
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $selectBox = $_POST['selectBox'];
                $nhanphong = $_POST['nhanphong'];
                $traphong = $_POST['traphong'];
                $thanhtien = $_POST['thanhtien'];
                $status = 2;
                // Lưu trữ dữ liệu đơn hàng vào bảng tạm thời trong cơ sở dữ liệu
                insert_orders($name, $email, $sdt, $selectBox, $nhanphong, $traphong, $thanhtien, $status);
//                 insert_orders(
//                     $name,
//                     $email,
//                     $sdt,
//                     $selectBox,
//                     $nhanphong,
//                     $traphong,
//                     $thanhtien,
//                     $status
//                 );

                // Thông báo đến bên admin về đơn hàng mới cần xác nhận (có thể thông qua email, tin nhắn, etc.)
                // Code gửi thông báo đến admin ở đây
            }

            include 'view/thanhtoan/chot_bill.php';
            break;

        case 'deletedatphong':
            if (isset($_GET['id_customer']) && $_GET['id_customer'] > 0) {
                $id_customer = del_datphong($_GET['id_customer']);
            }

            $list_datphong = del_orders($id_customer);
            include 'view/checkoutRoom.php';
            break;
        // case 'view_room':
        //     // if (isset($_POST['themmoi']) && $_POST['themmoi']) {
        //     //     $UserID = $_POST['UserID'];
        //     //     $noi_dung = $_POST['noi_dung'];

        //     //     view_binhluan($UserID, $noi_dung);
        //     // }

        //     include 'view/roomDetail.php';
        //     break;
//         case 'view_room':
//             include 'view/roomDetail.php';
//             break;
        case 'facilities_detail':
            include 'view/facilitiesDetail.php';
        case 'thanhtoan_online':
            include 'view/thanhtoan_online/checkout.php';
            break;
        case 'logout':
            session_unset();
            include 'view/main.php';
            // include('logout.php');
            // header('Location: logout.php') ;
            break;
        case "gioithieu":
            include 'view/content-footer/gioithieu.php';
            break;
        case "hddatphong":
            include 'view/content-footer/hddatphong.php';
            break;
        case "hangtv":
            include 'view/content-footer/hangtv.php';
            break;
        case "lienhe":
            include 'view/content-footer/lienhe.php';
            break;
        case "dieukhoan":
            include 'view/content-footer/dieukhoan.php';
            break;
        case "quydinh":
            include 'view/content-footer/quydinh.php';
            break;
        case "chinhsach":
            include 'view/content-footer/chinhsach.php';
            break;
        case "khieunai":
            include 'view/content-footer/khieunai.php';
            break;

        default:
            // include 'view/main.php';
            break;
    }
} else {
    include 'view/main.php';
}

include 'view/footer.php';
