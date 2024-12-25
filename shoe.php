<?php
if ($_GET['page'] == 'shoe') {
    $sql = "SELECT * FROM san_pham WHERE loai_san_pham = 1";
}
if ($_GET['page'] == 'sanpham') {
    $sql = "SELECT * FROM san_pham ";
}
if ($_GET['page'] == 'phukien') {
    $sql = "SELECT * FROM san_pham WHERE loai_san_pham = 2";
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
    <style>
    .shoe .divider-- {
        background: url(assets/image/shoe/bg_divider.png) repeat-x 7px;
        height: 2px;
        margin: 4px 0px;
    }
    </style>
</head>

<body>
    <div class="shoe">
        <div class="container d-flex flex-nowrap wrap-item">
            <div class="navbar col-xl-3">
                <div class="navbar_list">
                    <div class="navbar_item_title">
                        <a href="">TẤT CẢ</a>
                        <a href="">SẢN PHẨM</a>
                        <a href="">NGUYÊN LIỆU</a>
                    </div>
                    <div class="divider"> </div>

                    <div class="navbar_item_type_product">
                        <li><a href="">Accessories | Phụ kiện</a></li>
                        <li><a href="">Football Equipment</a></li>
                        <li><a href="">Footwear | Lên chân</a></li>
                        <li><a href="">Top | Nửa trên</a></li>
                    </div>
                    <div class="divider"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_trangthai">TRẠNG
                            THÁI</label>
                        <div id="demo_trangthai" class="collapse item_down_js">
                            <a href="">Limited Edition</a>
                        </div>
                        <div id="demo_trangthai" class="collapse item_down_js">
                            <a href="">Sale-off</a>
                        </div>
                        <div id="demo_trangthai" class="collapse item_down_js">
                            <a href="">New Arrival</a>
                        </div>
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_kieudang">KIỂU DÁNG</label>
                        <div id="demo_kieudang" class="collapse item_down_js">
                            <a href="">Low Top</a>
                        </div>
                        <div id="demo_kieudang" class="collapse item_down_js">
                            <a href="">High Top</a>
                        </div>
                        <div id="demo_kieudang" class="collapse item_down_js">
                            <a href="">Slip-on</a>
                        </div>
                        <div id="demo_kieudang" class="collapse item_down_js">
                            <a href="">Mid Top</a>
                        </div>
                        <div id="demo_kieudang" class="collapse item_down_js">
                            <a href="">Mule</a>
                        </div>
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_dongsanpham">DÒNG SẢN PHẨM</label>
                        
                        </div>
                        <div id="demo_dongsanpham" class="collapse item_down_js">
                            <a href="">Cây thông Noel | Vớ</a>
                        </div>
                        <div id="demo_dongsanpham" class="collapse item_down_js">
                            <a href="">Nến thơm</a>
                        </div>
                        <div id="demo_dongsanpham" class="collapse item_down_js">
                            <a href="">Phụ kiện</a>
                        </div>
                       
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_gia">GIÁ</label>
                        <div id="demo_gia" class="collapse item_down_js">
                            <a href="">100K - 200k</a>
                        </div>
                        <div id="demo_gia" class="collapse item_down_js">
                            <a href="">> 50K - 100K</a>
                        </div>
                        <div id="demo_gia" class="collapse item_down_js">
                            <a href="">20K - 50K</a>
                        </div>
                       
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_bosuutap">BỘ SƯU TẬP</label>
                        <div id="demo_bosuutap" class="collapse item_down_js">
                            <a href="">Set quà giáng sinhsinh</a>
                        </div>
                        <div id="demo_bosuutap" class="collapse item_down_js">
                            <a href="">Quà lưu niệmniệm</a>
                        </div>
                      
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo_chatlieu">CHẤT LIỆU</label>
                        <div id="demo_chatlieu" class="collapse item_down_js">
                            <a href="">Kẽm nhung</a>
                        </div>
                        <div id="demo_chatlieu" class="collapse item_down_js">
                            <a href="">Sáp ong</a>
                        </div>
                        <div id="demo_chatlieu" class="collapse item_down_js">
                            <a href="">Sáp đậu nành</a>
                        </div>
                        <div id="demo_chatlieu" class="collapse item_down_js">
                            <a href="">Tinh dầu</a>
                        </div>
                    </div>
                    <div class="divider--"></div>
                    <div class="js_down"> <label type="button" class="btn wrap-item_js" data-bs-toggle="collapse"
                            data-bs-target="#demo">MÀU SẮC</label>
                        <div id="demo" class="collapse item_down_js" style="position: relative;">
                            <label for="" class="color" style="background-color: red;"></label>
                            <label for="" class="color" style="background-color: blue;"></label>
                            <label for="" class="color" style="background-color: green;"></label>
                            <label for="" class="color" style="background-color: yellow;"></label>
                            <label for="" class="color" style="background-color: pink;"></label>
                            <label for="" class="color" style="background-color: rgb(102, 0, 255);"></label>
                            <label for="" class="color" style="background-color: rgb(0, 255, 225);"></label>
                            <label for="" class="color" style="background-color: rgb(34, 255, 0);"></label>
                        </div>
                    </div>
                    <div class="divider--"></div>
                </div>
            </div>
            <div class="product col-xl-9">
                <img class="banner" src="assets/image/shoe/Desktop_Homepage_Banner.jpg" alt="">
                <div class="product_wrap d-flex ">
                    <?php
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = 'product_' . $row['ma_san_pham'];
                    ?>
                    <div class="card col-xl-4 product_item" id="<?php echo $product_id; ?>">
                        <img src="<?php echo $row['anh_chinh']; ?>" alt="image_two">
                        <div class="container">
                            <h3 class="trang-thai">
                                <?php
                                    if ($row['tinh_trang'] == 1) {
                                        echo "Sản phẩm";
                                    } elseif ($row['tinh_trang'] == 2) {
                                        echo "New Arrival";
                                    } else {
                                        echo "Sale off";
                                    }
                                    ?>
                            </h3>
                            <div class="divider--"></div>
                            <a class="ten_san_pham"
                                href="product_detail.php?ma_san_pham=<?php echo $row['ma_san_pham']; ?>">
                                <?php echo $row['ten_san_pham']; ?>
                            </a>
                            <div class="kieu_dang">
                                <?php
                                    if ($row['loai_san_pham'] == 1) {
                                        echo "Giày";
                                    } elseif ($row['loai_san_pham'] == 2) {
                                        echo "Phụ kiện";
                                    } else {
                                        echo "Áo";
                                    }
                                    ?>
                            </div>
                            <p class="gia">
                                <?php echo $row['gia'] . ' VNĐ'; ?>
                            </p>
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