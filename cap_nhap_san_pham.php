<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    body {
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
    }
    </style>
</head>

<body>

    <?php
    $id = $_GET['ma_san_pham'];
    $sql = "select * from san_pham where ma_san_pham = '$id'";
    $result = mysqli_query($conn, $sql);
    $san_pham = mysqli_fetch_assoc($result);
    ?>
    <div class="capnhapsanpham">
        <h1>CẬP NHẬP SẢN PHẢM</h1>
        <form method="POST"
            action="dashboard.php?page=xu_li_cap_nhap_san_pham&ma_san_pham=<?php echo $san_pham['ma_san_pham']; ?>"
            enctype="multipart/form-data">

            <!--Tên sản phẩm -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham" placeholder="Tên sản phẩm"
                    value="<?php echo $san_pham['ten_san_pham']; ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
            </div>

            <!-- Kích cỡ sản phẩm -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="<?php echo $san_pham['kich_co']; ?>" name="kich_co"
                    id="kich_co" placeholder="Kích cỡ sản phẩm">
                <label for="kich_co">Kích cỡ</label>
            </div>

            <!-- Loại sản phẩm -->
            <label for="loai_san_pham">Loại sản phẩm:</label>
            <select class="form-select mb-3" name="loai_san_pham" id="loai_san_pham">
                <option value="1">Giày</option>
                <option value="2">Phụ kiện</option>
                <option value="3">Áo</option>
            </select>

            <!-- Trạng thái sản phẩm -->
            <label for="tinh_trang">Trạng thái sản phẩm:</label>
            <select class="form-select mb-3" name="tinh_trang" id="tinh_trang">
                <option value="1">Bình thường</option>
                <option value="2">New Arrival</option>
                <option value="3">Sale off</option>
            </select>

            <!-- Giá sản phẩm -->
            <div class="form-floating mb-3">
                <input type="number" value="<?php echo $san_pham['gia']; ?>" class="form-control" name="gia" id="gia"
                    placeholder="Giá sản phẩm">
                <label for="gia">Giá sản phẩm (VND)</label>
            </div>

            <!-- Ảnh chính sản phẩm -->
            <label for="anh_chinh">Ảnh chính sản phẩm</label>
            <div class="form-floating mb-3">
                <input type="file" name="anh_chinh" id="anh_chinh" class="form-control">

            </div>

            <!-- Ảnh phụ sản phẩm -->
            <label for="anh_phu">Ảnh phụ sản phẩm</label>
            <div class="form-floating mb-3">
                <input type="file" name="anh_phu" id="anh_phu" class="form-control">
            </div>

            <!-- Nút Thêm sản phẩm -->
            <button class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
    </div>
</body>

</html>