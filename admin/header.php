<?php
//die(var_dump( $_SESSION['user_role'] ));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <!-- loading bar -->
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="css/flash.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="./css/roombook.css">
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BlueBird - Admin</title>
</head>

<body>
    <!-- mobile view -->

    <div class="nav-trai">
        <!-- Header -->
        <nav class="uppernav">
            <div class="logo">
                <img class="bluebirdlogo" src="../image/logo2.png" alt="logo">
                <p>KDH Hotel</p>
            </div>
            <div>
                <div class="text-home">
                    <div style="text-align: center;">
                        <img style="height: 30px;" src="../image/Profile.png" alt="">
                    </div>
                    <div class="chaomung" style="text-align: center; ">
                        <span>KDH Hotel</span>
                    </div>
                </div>
            </div>
            <div class="logout">
                <a href="dangnhap.php" class="btn btn-danger logout">
                    <?php
                    if (
                        isset($_SESSION['Emp_login_submit']) &&
                        !empty($_SESSION['Emp_login_submit'])
                    ) {
                        echo $_SESSION['Email'];
                    }else if (
                        isset($_SESSION['user_login_submit']) &&
                        !empty($_SESSION['user_login_submit'])
                    ){
                        echo "<script>
                                   alert('Bạn không có quyền trang này...');
                                  window.location.href = '../dangnhap.php'; 
                          </script>";
                        die();
                    } else {
                         header("Location: ../dangnhap.php");
                         die();
                     }
?>
                </a>
                <a href="../dangnhap.php" class="btn logout" onclick="logout()">
                    LogOut<i class="fa-solid fa-right-from-bracket"></i>
                </a>
                <!-- <a href="../logout.php"><button class="btn btn-primary">Logout</button></a> -->
            </div>
        </nav>
    </div>