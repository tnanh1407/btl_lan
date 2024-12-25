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
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
    }

    .capnhatnguoidung h1 {
        text-align: center;
        margin-top: 20px;
        color: #007bff;
        font-size: 4.0rem;
    }

    .capnhatnguoidung form {
        max-width: 500px;
        margin: 30px auto;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .capnhatnguoidung .form-floating {
        margin-bottom: 20px;
    }

    .capnhatnguoidung label {
        font-size: 1.6rem;
        color: #6c757d;
    }

    .capnhatnguoidung input.form-control,
    .capnhatnguoidung select.form-select {
        height: 50px;
        font-size: 1.6rem;
        border-radius: 4px;
        border: 1px solid #ced4da;
    }

    .capnhatnguoidung input.form-control:focus,
    .capnhatnguoidung select.form-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .capnhatnguoidung select.form-select {
        padding: 10px;
        background-color: #fff;
    }

    .capnhatnguoidung button.btn-primary {
        width: 100%;
        padding: 12px;
        font-size: 2.0rem;
        border-radius: 4px;
        border: none;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .capnhatnguoidung button.btn-primary:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <?php
    $id = $_GET['ma_nguoi_dung'];
    $sql = "select * from user where ma_nguoi_dung = '$id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    ?>
    <div class="capnhatnguoidung">
        <h1>CẬP NHẬT NGƯỜI DÙNG</h1>
        <form action="dashboard.php?page=xu_li_cap_nhat_nguoi_dung&ma_nguoi_dung=<?php echo $user['ma_nguoi_dung']; ?>"
            method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="tai_khoan" id="username"
                    value="<?php echo $user['tai_khoan'] ?>" placeholder="Tài khoản của bạn ... ">
                <label for="username">Tài khoản</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="mat_khau" id="mat_khau"
                    value="<?php echo $user['mat_khau'] ?>" placeholder="Mật khẩu của bạn ...">
                <label for="mat_khau">Mật khẩu</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="nhap_lai_mat_khau" class="form-control" id="confirmPassword"
                    placeholder="Nhập lại mật khẩu của bạn ...">
                <label for="confirmPassword">Nhập lại mật khẩu </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="ho_ten" id="fullname" placeholder="Họ tên của bạn ..."
                    value="<?php echo $user['ho_ten'] ?>">
                <label for="fullname">Họ và Tên</label>
            </div>

            <label for="">Vai trò</label>
            <select class="form-select mb-3" name="vai_tro" id="floatingSelect"
                aria-label="Floating label select example">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <div class="form-floating mb-3">
                <input type="text" name="dia_chi" class="form-control" id="floatingPassword"
                    value="<?php echo $user['dia_chi'] ?>" placeholder="Địa chỉ của bạn">
                <label for="floatingPassword">Địa chỉ</label>
            </div>
            <button class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>

</html>