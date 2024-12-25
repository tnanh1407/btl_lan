<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">

    <style>
    /* Hiệu ứng */
    @keyframes zoomFadeIn {
        0% {
            opacity: 0;
            transform: scale(0.6) rotate(-10deg);
            /* Thu nhỏ và xoay nhẹ */
        }

        50% {
            opacity: 0.5;
            transform: scale(1.1) rotate(0deg);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    * {
        box-sizing: border-box;
    }

    body {
        display: flex;
        height: 100vh;
        background-color: #cccc;

    }

    .register {
        margin: auto;
        text-align: center;
    }

    .register .register__logo img {
        width: 240px;
        height: 80px;
    }

    .register .register__form {
        min-width: 460px;
        background-color: #ffff;
        border-radius: 8px;
        box-shadow: 12px 12px 0px;
        padding: 0px 12px;
        animation: zoomFadeIn 0.8s ease-out;
        /* Thời gian 0.8s */
    }

    .register .register__form h3 {
        font-size: 1.8rem;
        padding: 24px 0 16px 0
    }

    .register .register__form .from_label {
        padding: 6px 0;
        border-radius: 8px;
    }

    .register .register__form .from_label .register__form .from_label-ps {
        position: relative;
    }

    .register .register__form .btn_login {
        width: 320px;
        margin: 8px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 1.4rem;
    }

    .register .register__form .btn_register {
        margin: 8px;
        border-radius: 20px;
        font-size: 1.2rem;
        margin: 25px 0;
    }

    .register .register__form .forget a {
        margin: 8px 0;
        text-decoration: none;
        pointer-events: none;
    }

    .register .register__form .form__divider {
        display: flex;
        align-items: center;
    }

    .register .register__form .form__divider::before,
    .register .register__form .form__divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background-color: #ddd;
    }

    .register .register__form .form__divider span {
        margin: 0 10px;
        color: #888;
    }

    .register .register__form .form__divider {
        margin-top: 6px;
    }


    .from_label span {
        display: block;
        height: 20px;
        margin-top: 4px;
        margin-left: 20px;
        font-size: 0.9rem;
        text-align: start;
    }

    .eye-ps {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .eye-ps i {
        color: #000;
        font-size: 1.2rem;
    }

    .error {
        color: red;
    }

    .success {
        color: green;
    }

    .btn_register a {
        color: 1.2rem;
        text-decoration: none;
        color: #ffff;
    }
    </style>
</head>

<body>
    <?php
    include('connect.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];

        // kiểm tra nếu tài khoản còn tồn tại

        $sql_check = "SELECT * FROM user WHERE tai_khoan= '$username' ";
        $result = mysqli_query($conn, $sql_check);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Tài khoản này đã tồn tại!');</script>";
        } elseif ($password != $password_2) {
            echo "<script>alert('Mật khẩu không khớp nhau!');</script>";
        } else {
            $sql = "INSERT INTO user(tai_khoan , mat_khau , ho_ten) VALUES('$fullname' , '$password' , '$username')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>
                alert('Đăng ký thành công!');
                window.location.href = 'login.php';
              </script>";
            } else {
                echo "<script>alert('Đăng kí không thành công!');</script>";
            }
        }
    }
    ?>
    <div class="register">
        <div class="register__logo">
            <img src="assets/image/header/ananas_logo.svg" alt="">
        </div>
        <div class="register__form">
            <h3>Đăng kí Ananas</h3>
            <form action="" method="post">
                <div class="from_label form-floating ">
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Name of you ">
                    <label for="fullname">Họ và Tên</label>
                </div>
                <div class="from_label form-floating ">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                    <label for="username">Tài khoản</label>
                </div>
                <div class="from_label form-floating from_label-ps">
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Confirm Password">
                    <label for="password">Mật khẩu</label>
                    <span class="eye-ps" data="password" onclick="showPassword(this)"><i
                            class="fa-regular fa-eye"></i></span>
                </div>
                <div class="from_label form-floating from_label-ps">
                    <input type="password" class="form-control" name="password_2" id="password_2"
                        placeholder=" Password">
                    <label for=" floatingInput">Mật khẩu</label>
                    <span class="eye-ps" data="password_2" onclick="showPassword(this)"><i
                            class="fa-regular fa-eye"></i></span>
                </div>
                <button class="btn btn-info btn-lg btn_login" id="register">Xác nhận</button>

                <div class="form__divider"><span>Hay</span></div>
                <button class="btn btn-secondary btn_register">
                    <a href="login.php"> Bạn đã có tài khoản ?</a>
                </button>
            </form>
        </div>
    </div>

    <script>
    function showPassword(data_this) {
        // Lấy ID của input từ thuộc tính data
        const targetID = data_this.getAttribute('data');
        const inputField = document.getElementById(targetID);
        const icon = data_this.querySelector('i');

        if (inputField.type === "password") {
            inputField.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            inputField.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
    </script>
</body>

</html>