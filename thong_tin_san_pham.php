<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    body {
        background-color: #f4f4f9;
        font-family: 'Arial', sans-serif;
        color: #333;
        margin: 0;
    }
    </style>
</head>

<body>
    <div class="thongtinsanpham">
        <h1>THÔNG TIN SẢN PHẨM </h1>
        <table>
            <tr>
                <th>MÃ SẢN PHẨM</th>
                <th>TÊN SẢN PHẨM</th>
                <th>KÍCH CỠ</th>
                <th>LOẠI SẢN PHẨM</th>
                <th>TÌNH TRẠNG</th>
                <th>GIÁ</th>
                <th>ẢNH THỨ NHẤT</th>
                <th>ẢNH THỨ HAI</th>
                <th>CHỨC NĂNG</th>
            </tr>
            <tr>
                <?php
                $sql = "SELECT * FROM san_pham";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>

                <td>
                    <?php echo $row['ma_san_pham']; ?>
                </td>
                <td>
                    <?php echo $row['ten_san_pham']; ?>
                </td>
                <td>
                    <?php echo $row['kich_co']; ?>
                </td>
                <td>
                    <?php
                        if ($row['loai_san_pham'] == 1) {
                            echo( "Sản phẩm");
                        } elseif ($row['loai_san_pham'] == 2) {
                            echo ("Nguyên liệu");
                        } else {
                            echo( "Trang trí");
                        }
                        ?>
                </td>
                <td>
                    <?php
                        if ($row['tinh_trang'] == 1) {
                            echo "Sản phẩm";
                        } elseif ($row['tinh_trang'] == 2) {
                            echo "New";
                        } else {
                            echo "Sale off";
                        }
                        ?>
                </td>>
                <td>
                    <?php echo $row['gia'] . ' VNĐ'; ?>
                </td>
                <td>
                    <img src="<?php echo $row['anh_chinh']; ?>" alt="image_one">
                </td>
                <td>
                    <img src="<?php echo $row['anh_phu']; ?>" alt="image_two">
                </td>
                <td>
                    <a href="dashboard.php?page=cap_nhap_san_pham&ma_san_pham=<?php echo $row['ma_san_pham']; ?>"
                        class="update">Cập nhật</a>
                    <a href="dashboard.php?page=xu_li_xoa_san_pham&ma_san_pham=<?php echo $row['ma_san_pham']; ?>"
                        class="delete">Xóa</a>
                </td>
            </tr>
            <?php
                };
        ?>
        </table>
    </div>
</body>

</html>