<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    session_start();
    include('connect.php');
    ?>
    <div class="dashboard">
        <div class="header">
            <ul>
                <div>
                    <li><a href="dashboard.php?page=thong_tin_nguoi_dung">Thông Tin Người Dùng</a></li>
                    <li><a href="dashboard.php?page=them_nguoi_dung ">Thêm Người Dùng</a></li>
                    <li><a href="dashboard.php?page=thong_tin_san_pham">Thông Tin Sản Phẩm</a></li>
                    <li><a href="dashboard.php?page=them_san_pham">Thêm sản phẩm</a></li>
                    <li><a href="dashboard.php?page=thong_tin_don_hang">Thông tin đơn hàng</a></li>
                </div>
                <div>
                    <li><a href="dashboard.php?page=dang_xuat">Đăng xuất</a></li>
                </div>
            </ul>
        </div>
    </div>
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "thong_tin_nguoi_dung":
                include('thong_tin_nguoi_dung.php');
                break;
            case "them_nguoi_dung":
                include('them_nguoi_dung.php');
                break;
            case "them_san_pham":
                include('them_san_pham.php');
                break;
            case "thong_tin_san_pham":
                include('thong_tin_san_pham.php');
                break;
            case "xu_li_them_nguoi_dung":
                include('xu_li_them_nguoi_dung.php');
                break;
            case "cap_nhap_nguoi_dung":
                include('cap_nhap_nguoi_dung.php');
                break;
            case "cap_nhap_san_pham":
                include('cap_nhap_san_pham.php');
                break;
            case "xu_li_cap_nhat_nguoi_dung":
                include('xu_li_cap_nhat_nguoi_dung.php');
                break;
            case "xu_li_cap_nhat_san_pham":
                include('xu_li_cap_nhat_san_pham.php');
                break;
            case "xu_li_them_san_pham":
                include('xu_li_them_san_pham.php');
                break;
            case "xu_li_xoa_san_pham":
                include('xu_li_xoa_san_pham.php');
                break;
            case "xu_li_xoa_nguoi_dung":
                include('xu_li_xoa_nguoi_dung.php');
                break;
            case "xu_li_cap_nhap_san_pham":
                include('xu_li_cap_nhap_san_pham.php');
                break;
            case "dang_xuat":
                session_destroy();
                session_unset();
                header('location: login.php');
                break;
        }
    }
    ?>
</body>

</html>