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

    <div class="themsanpham">
        <h1>THÊM SẢN PHẨM</h1>
        <form action="xu_li_them_san_pham.php" enctype="multipart/form-data" method="post">

            <!-- Tên sản phẩm -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ten_san_pham" id="ten_san_pham"
                    placeholder="Tên sản phẩm">
                <label for="ten_san_pham">Tên sản phẩm</label>
            </div>

            <!-- Kích cỡ sản phẩm -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="kich_co" id="kich_co" placeholder="Kích cỡ sản phẩm">
                <label for="kich_co">Kích cỡ</label>
            </div>

            <!-- Loại sản phẩm -->
            <label for="loai_san_pham">Loại sản phẩm:</label>
            <select class="form-select mb-3" name="loai_san_pham" id="loai_san_pham">
                <option value="1">Sản phẩm</option>
                <option value="2">Nguyên liệu</option>
                <option value="3">Phụ kiện</option>
            </select>

            <!-- Trạng thái sản phẩm -->
            <label for="tinh_trang">Trạng thái sản phẩm:</label>
            <select class="form-select mb-3" name="tinh_trang" id="tinh_trang">
                <option value="1">Bình thường</option>
                <option value="2">New</option>
                <option value="3">Sale off</option>
            </select>

            <!-- Giá sản phẩm -->
            <div class="form-floating mb-3">
                <input type="number" class="form-control" name="gia" id="gia" placeholder="Giá sản phẩm">
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
            <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
        </form>
    </div>
</body>

</html>