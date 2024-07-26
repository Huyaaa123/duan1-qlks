<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Hotel blue bird</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- sweet alert -->
    <link rel="stylesheet" href="./admin/css/roombook.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/flash.css">
    <style>
    #guestdetailpanel {
        display: none;
    }

    #guestdetailpanel .middle {
        height: 450px;
    }

    .guestinfo input {
        width: 700px;
    }

    /* .head h3 {
        margin-top: 100px;
    } */

    </style>
</head>

<body>
    <nav>
        <div class="logo">
            <a href="index.php" class="logo-nav">
                <img class="bluebirdlogo" src="./image/logo2.png" alt="logo">
                <p>KDH Hotel</p>

            </a>

        </div>
        <ul>
            <li><a href="../duan1_quanlykhachsan/index.php">Home</a></li>
            <li><a href="#secondsection">Rooms</a></li>
            <li><a href="#thirdsection">Facilites</a></li>
            <li><a href="#contactus">ContactUs</a></li>
            <li><a href="index.php?act=checkout_room">Checkout</a></li>
            <a href="dangnhap.php" class="btn btn-danger logout">
                <?php if (
                    isset($_SESSION['user_login_submit']) &&
                    !empty($_SESSION['user_login_submit'])
                ) {
                    echo $_SESSION['Username'];
                } else {
                    echo '<span> LogIn </span>';
                } ?>
            </a>
            <a href="index.php?act=logout" class="btn logout">
                LogOut<i class="fa-solid fa-right-from-bracket"></i>

            </a>
        </ul>
    </nav>

    <section id="firstsection" class="carousel slide carousel_section" data-bs-ride="carousel">
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

            <div class="welcomeline">
                <h1 class="welcometag">Welcome to KDH Hotel</h1>
            </div>

        </div>
        <div>

            <form action="index.php?act=searchPhong" method="post" style="margin: 16px;" class="title_searchphong">
                <h2 class="search_phong">Tìm kiếm phòng có sẵn</h2>
                <div class="row">
                    <div class="col">
                        <label for="checkin">Check In</label>
                        <input type="date" name="checkin" id="checkin" class="form-control">
                    </div>
                    <div class="col">
                        <label for="checkout">Check Out</label>
                        <input type="date" name="checkout" id="checkout" class="form-control">
                    </div>
                    <div class="col">
                        <input type="submit" name="listok" value="Tìm kiếm" class="btn btn-success timkiem">
                    </div>
                </div>
            </form>

        </div>


    </section>
    <div id="error"></div>