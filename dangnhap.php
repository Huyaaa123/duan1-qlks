<?php
session_start();
include 'model/pdo.php';
include 'model/taikhoan.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- aos animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/flash.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Hotel </title>
</head>

<body>
    <!--  carousel -->
    <section id="carouselExampleControls" class="carousel slide carousel_section" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-image" src="./image/hotel1.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel2.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel3.jpg">
            </div>
            <div class="carousel-item">
                <img class="carousel-image" src="./image/hotel4.jpg">
            </div>
        </div>
    </section>
    <!-- <a href="index.php">
        << Quay lại trang chủ </a> -->
    <!-- main section -->
    <section id="auth_section">

        <div class="logo">
            <img class="bluebirdlogo" src="./image/logo2.png" alt="logo">
            <p>KDH Hotel</p>
        </div>

        <div class="auth_container">
            <!--============ login =============-->

            <div id="Log_in">
                <h2>Log In</h2>
                <div class="role_btn">
                    <div class="btns active">User</div>
                    <div class="btns">Staff</div>
                </div>

                <div class="auth_container">
                    <!--============ login =============-->

                    <div id="Log_in">
                        <h2>Log In</h2>
                        <div class="role_btn">
                            <div class="btns active">User</div>
                            <div class="btns">Staff</div>
                        </div>

                        <!-- // ==userlogin== -->

                        <?php
//                         if (isset($_POST['user_login_submit'])) {
//                             $Email = $_POST['Email'];
//                             $Username = $_POST['Username'] ;
//                             $Password = $_POST['Password'];
                            
//                             $result = checkuser($Email, $Password);
//                             if (is_array($result)) {
//                                 $_SESSION['user'] = $result;
//                                 // sau khi xác thực đăng nhập thành công
//                                 $_SESSION['user_login_submit'] = true;
//                                 $_SESSION['Username'] = $Username; // Thay username bằng thông tin cần lưu trữ
//                                 header('location: index.php');
//                             } else {
//                                 echo "<script>swal({
                <!-- // ==userlogin== -->

                <?php if (isset($_POST['user_login_submit'])) {
                    $Email = $_POST['Email'];
                    $Username = $_POST['Username'];
                    $Password = $_POST['Password'];
                    $result = checkuser($Email, $Password);
                    if (is_array($result)) {
                        $_SESSION['user'] = $result; // sau khi xác thực đăng nhập thành công
                        $_SESSION['user_login_submit'] = true;
                        $_SESSION['Username'] = $Username; // Thay username bằng thông tin cần lưu trữ
                        $_SESSION['user_role'] = 3; // 1 -Admin, 2 - Nhan vien, 3 - Khach hang
                        header('location: index.php');
                    } elseif (
                        empty($Username) ||
                        empty($Email) ||
                        empty($Password)
                    ) {
                        echo "<script>swal({
                        title: 'Vui lòng điền đầy đủ thông tin',
                        icon: 'error'
                    });
                    </script>";
                    } else {
                        echo "<script>swal({
                            title: 'Vui lòng nhập lại tài khoản, mật khẩu !'
                            icon: 'error',
                        });
                        </script>";
                    }
                } ?>
                      
                <form class="user_login authsection active" id="userlogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input typuser_logine="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <button type="submit" name="user_login_submit" class="auth_btn">Log in</button>

                    <div class="footer_line">
                        <h6>Don't have an account? | <span class="page_move_btn" onclick="signuppage()"> Sign up </span>
                            |
                            <span class="page_move_btn" onclick="forgotPasswordPage()">Forgot password </span>
                        </h6>
                    </div>
                </form>


                <!-- == Emp Login Admin== -->
                <?php if (isset($_POST['Emp_login_submit'])) {
                    $Email = $_POST['Emp_Email'];
                    $Password = $_POST['Emp_Password'];
                    $result = emp_login($Email, $Password);
                    $_SESSION['user_role'] = 1; // 1 -Admin, 2 - Nhan vien, 3 - Khach hang

                    if (!is_array($result)) {
                        $result = nhanvien_login($Email, $Password);
                        $_SESSION['user_role'] = 2; // 1 -Admin, 2 - Nhan vien, 3 - Khach hang
                    }

                    if (is_array($result)) {
                        $_SESSION['user'] = $result;
                        $_SESSION['Emp_login_submit'] = true;
                        $_SESSION['Email'] = $Email;

                        header('location: admin/index.php');
                    } else {
                        echo "<script>swal({
                                title: 'Vui lòng nhập lại mật khẩu',
                                icon: 'error',
                            });
                            </script>";
                    }
                } ?>
                <form class="employee_login authsection" id="employeelogin" action="" method="POST">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Emp_Email" placeholder=" ">
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Emp_Password" placeholder=" ">
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" name="Emp_login_submit" class="auth_btn">Log in</button>
                </form>

            </div>

            <!--============ signup =============-->
            <?php if (isset($_POST['user_signup_submit'])) {
                $Username = $_POST['Username'];
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];
                $CPassword = $_POST['CPassword']; // Kiểm tra xem các trường thông tin người dùng có rỗng không
                if (empty($Username) || empty($Email) || empty($Password)) {
                    echo "<script>swal({
                    title: 'Vui lòng điền đầy đủ thông tin',
                    icon: 'error'
                });
                </script>";
                } else {
                    // Kiểm tra xem mật khẩu và mật khẩu xác nhận có giống nhau không
                    if ($Password == $CPassword) {
                        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
                        $resultEmail = checkemail($Email);
                        if ($resultEmail) {
                            echo "<script>swal({
                            title: 'Email đã tồn tại',
                            icon: 'error'
                        });
                        </script>";
                        } else {
                            // Thêm thông tin tài khoản vào cơ sở dữ liệu
                            $result = insert_taikhoan(
                                $Email,
                                $Username,
                                $Password
                            ); // Nếu thêm thành công, lưu thông tin người dùng vào session và chuyển hướng đến trang home.php
                            $_SESSION['user'] = $result;
                            echo "<script>swal({
                                title: 'Đăng kí tài khoản thành công',
                                icon: 'concect'
                            });
                            </script>";
                            header('location: dangnhap.php');
                            exit(); // Quan trọng để ngăn chặn việc thực thi đoạn mã tiếp theo
                        }
                    } else {
                        echo "<script>swal({
                        title: 'Mật khẩu không khớp',
                        icon: 'error'
                    });
                    </script>";
                    }
                }
            } ?>
            <div id="sign_up">
                <h2>Sign Up</h2>

                <form class="user_signup" id="usersignup" action="" method="POST">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="Username" placeholder=" ">
                        <label for="Username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" name="Email" placeholder=" ">
                        <label for="Email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="Password" placeholder=" ">
                        <label for="Password">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="CPassword" placeholder=" ">
                        <label for="CPassword">Confirm Password</label>
                    </div>

                    <button type="submit" name="user_signup_submit" class="auth_btn">Sign up</button>

                    <div class="footer_line">
                        <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span>
                        </h6>
                    </div>
                </form>
            </div>

            <!--============ forgotPassword =============-->
            <?php if (isset($_POST['nutguiyeucau']) == true) {
                // print_r($_POST);
                $Email = $_POST['Email'];

                $dburl =
                    'mysql:host=localhost;dbname=quanlykhachsan;charset=utf8';
                $username = 'root';
                $password = '';

                $conn = new PDO($dburl, $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = 'select * from signup where Email = ?';
                $stmt = $conn->prepare($sql);
                $stmt->execute([$Email]);
                $count = $stmt->rowCount();
                if ($count == 0) {
                    $loi = 'Email bạn nhập không tồn tại trong hệ thống!';
                } else {
                    try {
                        $matkhaumoi = substr(md5(rand(0, 99999)), 0, 8);
                        $sql = 'update signup set Password = ? where Email = ?';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$matkhaumoi, $Email]);

                        echo 'Đã cập nhập thành công';

                        // Call the function to send the email
                        $kq = GuiMatKhauMoi($Email, $matkhaumoi);

                        if ($kq) {
                            echo 'Email cập nhật mật khẩu mới đã được gửi thành công.';
                        } else {
                            echo 'Không thể gửi email. Vui lòng thử lại sau.';
                        }
                    } catch (PDOException $e) {
                        echo 'Có lỗi xảy ra: ' . $e->getMessage();
                    }
                }
            } ?>

            <?php function GuiMatKhauMoi($Email, $matkhaumoi)
            {
                require 'PHPMailer-master/src/PHPMailer.php';
                require 'PHPMailer-master/src/SMTP.php';
                require 'PHPMailer-master/src/Exception.php';
                $mail = new PHPMailer\PHPMailer\PHPMailer(true); // true: enables exceptions

                try {
                    $mail->SMTPDebug = 0; // 0,1,2: chế độ debug
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->Host = 'smtp.gmail.com'; //SMTP servers
                    $mail->SMTPAuth = true; // Enable authentication
                    $mail->Username = 'duongluong2k4@gmail.com'; // SMTP username
                    $mail->Password = 'ntda sfgm ncok hadp'; // SMTP password
                    $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL
                    $mail->Port = 465; // port to connect to
                    $mail->setFrom('duongluong2k4@gmail.com', 'Dương 17');
                    $mail->addAddress($Email);
                    $mail->isHTML(true); // Set email format to HTML
                    $mail->Subject = 'Cấp lại mật khẩu';
                    $noidungthu = "<p>Yêu cầu cấp lại mật khẩu của bạn đã thành công, Đây là mật khẩu mới của bạn {$matkhaumoi} </p>";
                    $mail->Body = $noidungthu;

                    $mail->smtpConnect([
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true,
                        ],
                    ]);

                    $mail->send();
                    return true;
                } catch (Exception $e) {
                    echo 'Có lỗi khi gửi email: ' . $mail->ErrorInfo;
                    return false;
                }
            } ?>


            <form class="user_signup" id="usersignup" action="" method="POST">
                <div class="form-floating">
                    <label for="Email" class="form-label"></label>
                    <input value="<?php if (isset($Email) == true) {
                        echo $Email;
                    } ?>" type="email" class="form-control" id="Email" name="Email" placeholder="Nhập Email">
                </div>
                <button type="submit" value="nutgui" name="nutguiyeucau" class="auth_btn">Submit</button>

                <div class="footer_line">
                    <h6>Already have an account? <span class="page_move_btn" onclick="loginpage()">Log in</span>
                    </h6>
                </div>
            </form>
        </div>


    </section>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- aos animation-->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="./javascript/index.js"></script>
<script>
AOS.init();
</script>

</html>