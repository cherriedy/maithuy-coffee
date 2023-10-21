<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <div class="outer-wrapper">
        <div class="inner-wrapper">
            <!-- Wrapper section for login -->
            <div class="login-link">
                <!-- Logo section -->
                <div class="logo">
                    <i class="bx bx-pencil"></i>
                    <span class="text">Car rental</span>
                </div>
                <!-- Login text section -->
                <p class="side-big-heading">Tạo tài khoản</p>
                <p class="side-small-pragraph">Để trải nghiệm dịch vụ đặt xe nhanh chóng và tiện lợi ngay hôm nay !</p>
                <a href="index.html" # class="login-btn">Đăng kí ngay</a>
            </div>

            <!-- Form section for sign up -->
            <form action="" method="post" class="login-form-wrapper">
                <p class="big-heading">Đăng nhập tài khoản</p>
                <div class="social-link-btn">
                    <a href="#"><i class="bx bxl-facebook facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter twitter"></i></a>
                    <a href="#"><i class="bx bxl-github github"></i></a>
                </div>

                <div class="login-form-content">
                    <div class="text-fields email">
                        <label for="email"><i class='bx bx-envelope'></i></label>
                        <input type="email" name="email" id="email" placeholder="Email của bạn" required>
                    </div>

                    <div class="text-fields password">
                        <label for="password"><i class='bx bx-lock-alt'></i></label>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required>
                    </div>

                    <div class="login-function-buttons">
                        <div class="login-rememberMe-checkbox">
                            <input type="checkbox" name="rememberMe" id="rememberMe" checked>
                            <label for="rememberMe">Lưu tên đăng nhập</label>
                        </div>

                        <a href="#">Quên mật khẩu ?</a>
                    </div>

                    <input type="submit" name="sign-in-btn" value="Đăng nhập">
                </div>
            </form>
        </div>
</body>