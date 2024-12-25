<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
include('connect.php');

if (isset($_GET['page']) && $_GET['page'] === "dangxuat") {
    session_destroy();
    session_unset();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CDN fontware -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link css Bootraps -->
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="header">
        <div class="header-top">
            <div class="container-fluid">
                <ul class="menu">
                    <li><a class="d-flex align-items-center" href=""><i class="fa-solid fa-user-pen"></i> HỒ SƠ CÁ
                            NHÂN</a></li>
                    <li><a class="d-flex align-items-center" href=""><i class="fa-solid fa-cart-arrow-down"></i>GIỎ
                            HÀNG</a></li>
                    <li><a class="d-flex align-items-center" href="layout.php?page=dangxuat"><i
                                class="fa-solid fa-user"></i>ĐĂNG XUẤT</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-list row">
            <div class="nav-list-one item-box col-xl-3 ">
                <a href="layout.php?page=trangchu"> <img src="assets/image/header/ananas_logo.svg"
                        alt="ananas_logo"></a>
            </div>
            <div class="nav-list-two item-box col-xl-6 ">
                <div class="drop-down-list">
                    <a href="layout.php?page=sanpham" class="product">SẢN PHẨM <i
                            class="fa-solid fa-angle-down"></i></a>
                </div>
                <div class="drop-down-list">
                    <a href="layout.php?page=shoe" class=" product-shoe">NGUYÊN LIỆU <i class="fa-solid fa-angle-down"></i></a>
                </div>
                <div class="drop-down-list">
                    <a href="layout.php?page=phukien" class="product-female">PHỤ KIỆN <i
                            class="fa-solid fa-angle-down"></i></a>
                </div>
                <a href="layout.php?page=saleoff" class="product-saleOff">SALE OFFOFF</a>
                <a href="layout.php?page=discover" class="product-img"><img src="assets/image/header/DiscoverYOU.svg"
                        alt="loi_"></a>
            </div>
            <div class="nav-list-three item-box col-xl-3">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" class="header__input" placeholder="Tìm kiếm">
            </div>
        </div>
    </div>

    <!-- hot-news -->
    <div id="hot-news" class="hot-news carousel slide container-fluid" data-bs-ride="carousel">

        <!-- Indicators/dots -->


        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <i>FREE SHIPPING VỚI HÓA ĐƠN TỪ 400K !</i>
            </div>
            <div class="carousel-item">
                <i>BUY 2 GET 10% OFF - ÁP DỤNG VỚI TẤT CẢ SẢN PHẨM </i>
            </div>
            <div class="carousel-item">
                <i>LỖI 1 ĐỔI 1- HỘ TRỢ 24/77 </i>
            </div>
            <div class="carousel-item">
                <i>BUY MORE PAY LESS - ÁP DỤNG KHI MUA PHỤ KIỆN</i>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev hot-new--left" type="button" data-bs-target="#hot-news"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon gray"></span>
        </button>
        <button class="carousel-control-next hot-new--right" type="button" data-bs-target="#hot-news"
            data-bs-slide="next">
            <span class="carousel-control-next-icon gray"></span>
        </button>
    </div>
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "trangchu":
                include('trangchu.php');
                break;
            case "sanpham":
                include('sanpham.php');
                break;
            case "shoe":
                include('shoe.php');
                break;
            case "phukien":
                include('phukien.php');
                break;
            case "saleoff":
                include('saleoff.php');
                break;
        }
    } else {
        include('trangchu.php');
    }

    include('footer.php');
    ?>
    <!-- Link JS Bootraps -->
    <script src="assets/bootrap/bootstrap.min.js"></script>
    <script src="assets/js/main.js?v=<?php echo time() ?>"></script>


</body>

</html>