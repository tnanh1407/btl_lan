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
        padding: 0;
    }
    </style>
</head>

<body>
    <div class="thongtinnguoidung">
        <h1>Thông tin người dùng</h1>
        <table>
            <tr>
                <th>Mã người dùng</th>
                <th>Họ và Tên</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Vai trò</th>
                <th>Địa chỉ</th>
                <th>Chức năng</th>
            </tr>
            <tr>
                <?php
                $sql = "SELECT * FROM user";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>

                <td>
                    <?php echo $row['ma_nguoi_dung']; ?>
                </td>
                <td>
                    <?php echo $row['ho_ten']; ?>
                </td>
                <td>
                    <?php echo $row['tai_khoan']; ?>
                </td>
                <td>
                    <?php echo $row['mat_khau']; ?>
                </td>
                <td>
                    <?php echo $row['role']; ?>
                </td>>
                <td>
                    <?php echo $row['dia_chi']; ?>
                </td>
                <td>
                    <a href="dashboard.php?page=cap_nhap_nguoi_dung&ma_nguoi_dung=<?php echo $row['ma_nguoi_dung']; ?>"
                        class="update">Cập nhật</a>
                    <a href="dashboard.php?page=xu_li_xoa_nguoi_dung&ma_nguoi_dung=<?php echo $row['ma_nguoi_dung']; ?>"
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