<?php
// Bắt đầu session
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM user WHERE tai_khoan = '$username' AND mat_khau = '$password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            session_start();
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user'] = $username;
            $_SESSION['role'] = $row['role'];

            if ($_SESSION['role'] == 'admin') {
                header('Location: dashboard.php');
            } else {
                header('Location: layout.php');
            }
            exit();
        } else {
            echo "<script>alert('Thông tin tài khoản mật khẩu không chính xác!');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/bootrap/bootstrap.min.css">

    <style>
    * {
        box-sizing: border-box;
    }

    body {
        display: flex;
        height: 100vh;
        background-color: #cccc;

    }

    .login {
        margin: auto;
        text-align: center;
    }


    .login .login__form {
        min-width: 460px;
        background-color: #ffff;
        border-radius: 8px;
        box-shadow: 12px 12px 0px;
        padding: 0px 12px
    }

    .login .login__form h3 {
        font-size: 1.8rem;
        padding: 24px 0 16px 0
    }

    .login .login__form .from_label {
        padding: 6px 0;
        border-radius: 8px;
    }


    .login .login__form .from_label .login .login__form .from_label-ps {
        position: relative;
    }

    .login .login__form .btn_login {
        width: 320px;
        margin: 12px 0;
        border-radius: 20px;
        font-weight: 600;
        font-size: 1.4rem;
    }

    .login .login__form .btn_register {
        margin: 8px;
        border-radius: 20px;
        font-size: 1.4rem;
        margin: 25px 0;
    }

    .login .login__form .forget a {
        margin: 8px 0;
        text-decoration: none;
        pointer-events: none;
    }

    .login .login__form .form__divider {
        display: flex;
        align-items: center;
    }

    .login .login__form .form__divider::before,
    .login .login__form .form__divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background-color: #ddd;
    }

    .login .login__form .form__divider span {
        margin: 0 10px;
        color: #888;
    }

    .login .login__form .form__divider {
        margin-top: 6px;
    }

    .eye-ps {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-130%);
        cursor: pointer;
    }

    .from_label span {
        display: block;
        height: 20px;
        margin-top: 4px;
        font-size: 1rem;
        text-align: center;
        margin-right: 5px;
    }

    .error {
        color: red;
    }

    .btn_register a {
        text-decoration: none;
        color: #fff;
        font-size: 1.2rem;
    }
    </style>
</head>

<body>

    <div class="login">
        <div class="login__form">
            <h3>Đăng nhập</h3>
            <form action="" method="post">
                <div class="from_label form-floating ">
                    <input type="text" class="form-control" name="username" id="username" placeholder="admin123">
                    <label for="floatingInput">Tài khoản</label>
                </div>
                <div class="from_label form-floating from_label-ps">
                    <input type="password" class="form-control" name="password" id="password" placeholder="admin123">
                    <label for="floatingInput">Mật khẩu</label>
                    <span class="eye-ps" onclick="showPassword()"><i class="fa-regular fa-eye"></i></span>
                    </span>
                </div>
                <button class="btn btn-primary btn-lg btn_login ">Đăng nhập</button>
                <div class="forget">
                    <a href="">Bạn quên mật khẩu ư ?</a>
                </div>

                <div class="form__divider"><span>hoặc</span></div>
                <button class="btn btn-success btn_register">
                    <a href="register.php"> Tạo mới tài khoản</a>
                </button>
            </form>
        </div>
    </div>




    <script>
    // Hàm hiển thị/ẩn mật khẩu
    function showPassword() {
        var getLocalPassword = document.getElementsByClassName("form-control")[1];
        var getLocalIcon = document.querySelector('.eye-ps i');
        if (getLocalPassword.type === "password") {
            getLocalPassword.type = "text";
            getLocalIcon.classList.remove("fa-regular", "fa-eye");
            getLocalIcon.classList.add("fa-regular", "fa-eye-slash");
        } else {
            getLocalPassword.type = "password";
            getLocalIcon.classList.remove("fa-regular", "fa-eye-slash");
            getLocalIcon.classList.add("fa-regular", "fa-eye");
        }
    };
    </script>

    <!-- <script src="assets/js/main.js"></script> -->
</body>

</html>