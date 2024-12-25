<?php
if ($_GET['page'] == 'vatpham') {
    $sql = "SELECT * FROM san_pham WHERE loai_san_pham = 2";
}
if ($_GET['page'] == 'sanpham') {
    $sql = "SELECT * FROM san_pham ";
}
if ($_GET['page'] == 'phukien') {
    $sql = "SELECT * FROM san_pham WHERE loai_san_pham = 3";
}
if ($_GET['page'] == 'saleoff') {
    $sql = "SELECT * FROM san_pham WHERE tinh_trang = 3";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    .sanpham .divider-- {
        background: url(assets/image/shoe/bg_divider.png) repeat-x 7px;
        height: 2px;
        margin: 4px 0px;
    }
    </style>
</head>

<body>
    <div class="sanpham">
        <div class="container">
            <div class="banner">
                <img src="assets/image/Desktop_Homepage_Banner01.jpg" alt="">
                <div class="title">

                    <div style="margin-top: 20px;" class="divider"></div>
                    <h3>DANH SÁCH SẢN PHẨM</h3>
                </div>
            </div>
        </div>
        <div class="container wrap_all">

            <div class="row item_list">
                <?php
                $result =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    $product_id = 'product_' . $row['ma_san_pham'];
                ?>
                <div class="card col-xl-3 item" id="<?php echo $product_id ?>">
                    <div class="card-body">
                        <div class="img">
                            <img class="card-img-bottom" src="<?php echo $row['anh_chinh']; ?>" alt="Card image">
                            <i class="fa-regular fa-heart"></i>
                            <button class="btn">MUA SẢN PHẨM</button>
                        </div>
                        <p class="tinh_trang"><?php
                                                    if ($row['tinh_trang'] == 1) {
                                                        echo "Sản phẩm";
                                                    } elseif ($row['tinh_trang'] == 2) {
                                                        echo "New Arrival";
                                                    } else {
                                                        echo "Sale off";
                                                    }
                                                    ?></p>
                        <div style="margin: 0 10px;" class="divider--"></div>
                        <h4 class="card-title ten_san_pham"><?php echo $row['ten_san_pham'] ?></h4>
                        <p class="card-text loai_san_pham"> <?php
                                                                if ($row['loai_san_pham'] == 1) {
                                                                    echo "Giày";
                                                                } elseif ($row['loai_san_pham'] == 2) {
                                                                    echo "Phụ kiện";
                                                                } else {
                                                                    echo "Áo";
                                                                }
                                                                ?>
                        </p>
                        <p class="gia"><?php echo $row['gia'] . 'VNĐ' ?></p>
                    </div>
                </div>
                <script>
                // Lấy ID của sản phẩm hiện tại
                var cardElement = document.getElementById('<?php echo $product_id; ?>');

                cardElement.addEventListener('mouseover', function() {
                    // Thay đổi ảnh khi hover
                    var getImageElement = this.querySelector('img');
                    getImageElement.src = "<?php echo $row['anh_phu']; ?>";
                });

                cardElement.addEventListener('mouseout', function() {
                    // Trả lại ảnh gốc khi không hover
                    var getImageElement = this.querySelector('img');
                    getImageElement.src = "<?php echo $row['anh_chinh']; ?>";
                });
                </script>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>