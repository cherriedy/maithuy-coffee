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
                <p class="side-big-heading">Đã là thành viên ?</p>
                <p class="side-small-pragraph">Để đặt xe hãy nhanh chóng đăng nhập vào tài khoản cá nhân của bạn</p>
                <a href="login.html" # class="login-btn">Đăng nhập</a>
            </div>

            <!-- Form section for sign up -->
            <form action="" method="post" class="signup-form-wrapper">
                <p class="big-heading">Đăng kí tài khoản</p>
                <div class="social-link-btn">
                    <a href="#"><i class="bx bxl-facebook facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter twitter"></i></a>
                    <a href="#"><i class="bx bxl-github github"></i></a>
                </div>

                <!-- Progres bar section -->
                <div class="progress-bar">
                    <!-- Stage 1: Personal information stage -->
                    <div class="stage">
                        <p class="tool-tip">Cá nhân</p>
                        <p class="stage-no stage-no-1">1</p>
                    </div>

                    <!-- Stage 2: Contact information stage -->
                    <div class="stage">
                        <p class="tool-tip">Liên lạc</p>
                        <p class="stage-no stage-no-2">2</p>
                    </div>

                    <!-- Stage 3: Final stage -->
                    <div class="stage">
                        <p class="tool-tip">Địa chỉ</p>
                        <p class="stage-no stage-no-3">3</p>
                    </div>
                </div>

                <!-- Signup form content section -->
                <div class="signup-form-content">
                    <!-- Stage 1 -->
                    <div class="stage-no-1-content">
                        <div class="button-wrapper">
                            <div class="text-fields fname">
                                <label for="fname"><i class='bx bx-user'></i></label>
                                <input type="text" name="fname" id="fname" placeholder="Nguyễn" required>
                            </div>

                            <div class="text-fields lname">
                                <label for="lname"><i class='bx bx-user'></i></label>
                                <input type="text" name="lname" id="lname" placeholder="Lê Thuỳ Linh" required>
                            </div>
                        </div>

                        <!--  -->
                        <div class="button-wrapper">
                            <!-- Date of birthdate -->
                            <div class="text-fields dob">
                                <label for="dob"><i class='bx bx-cake'></i></label>
                                <input type="date" name="dob" id="dob" placeholder="''" required>
                            </div>
                            <!-- Gender -->
                            <div class="gender-selection">
                                <p class="field-heading">Gender: </p>
                                <label for="male"><input type="radio" name="gender" id="male" value="0"
                                        required>Nam</label>
                                <label for="famale"><input type="radio" name="gender" id="female" value="1"
                                        required>Nữ</label>
                                <label for="other"><input type="radio" name="gender" id="other" value="2"
                                        required>Khác</label>
                            </div>
                        </div>

                        <!-- pagination button section -->
                        <div class="pagination-btn">
                            <!-- <input type="button" value="Trước" class="previousPage stagebtn1a" onclick=""> -->
                            <input type="button" value="Tiếp theo" class="nextPage stagebtn1b" onclick="stage1to2()">
                        </div>
                    </div>

                    <!-- Stage 2: -->
                    <div class="stage-no-2-content">
                        <div class="button-wrapper">
                            <div class="text-fields phone">
                                <label for="phone"><i class='bx bx-phone'></i></label>
                                <input type="tel" name="phone" id="phone" placeholder="0823458321" required>
                            </div>

                            <div class="text-fields email">
                                <label for="email"><i class='bx bx-envelope'></i></label>
                                <input type="email" name="email" id="email" placeholder="abc@carrental.com" required>
                            </div>
                        </div>

                        <div class="button-wrapper">
                            <div class="text-fields password">
                                <label for="password"><i class='bx bx-lock-alt'></i></label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu"
                                    required>
                            </div>

                            <div class="text-fields confirm-password">
                                <label for="confirm-password"><i class='bx bx-lock-alt'></i></label>
                                <input type="password" name="password" id="confirm-password" placeholder="Nhập mật khẩu"
                                    required>
                            </div>
                        </div>
                        <div class="pagination-btn">
                            <input type="button" value="Quay lại" class="previousPage stagebtn2a" onclick="stage2to1()">
                            <input type="button" value="Tiếp theo" class="nextPage stagebtn2b" onclick="stage2to3()">
                        </div>
                    </div>

                    <!-- Stage 3: -->
                    <div class="stage-no-3-content">
                        <div class="button-wrapper">
                            <div class="text-fields address">
                                <label for="address"><i class='bx bx-globe'></i></label>
                                <input type="text" name="address" id="address" placeholder="1 Đ.Cộng Hòa, Tân Bình"
                                    required autocomplete="on">
                            </div>

                            <div class="text-fields city">
                                <label for="city"><i class='bx bx-globe'></i></label>
                                <input type="text" name="city" id="city" placeholder="Thành phố Hồ Chí Minh" required
                                    autocomplete="on">
                            </div>
                        </div>

                        <div class="button-wrapper">
                            <div class="text-fields country">
                                <label for="country"><i class='bx bx-globe'></i></label>
                                <input type="text" name="country" id="country" placeholder="Việt Nam" required
                                    autocomplete="country">
                            </div>
                        </div>

                        <div class="pagination-btn">
                            <input type="button" value="Quay lại" class="previousPage stagebtn3a" onclick="stage3to2()">
                            <!-- Submit button -->
                            <input type="submit" value="Đăng kí" class="nextPage stagebtn3b" name="sign-up-btn">
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        let signupContent = document.querySelector(".signup-form-wrapper"),
            stagebtn1b = document.querySelector(".stagebtn1b"),
            stagebtn2a = document.querySelector(".stagebtn2a"),
            stagebtn2b = document.querySelector(".stagebtn2b"),
            stagebtn3a = document.querySelector(".stagebtn3a"),
            signupContent1 = document.querySelector(".stage-no-1-content"),
            signupContent2 = document.querySelector(".stage-no-2-content"),
            signupContent3 = document.querySelector(".stage-no-3-content");

        signupContent2.style.display = "none";
        signupContent3.style.display = "none";

        function stage1to2() {
            signupContent2.style.display = "block";
            signupContent1.style.display = "none";
            signupContent3.style.display = "none";
            document.querySelector(".stage-no-1").style.backgroundColor = "#56957e";
            document.querySelector(".stage-no-1").style.color = "#fff";
        }

        function stage2to1() {
            signupContent1.style.display = "block";
            signupContent2.style.display = "none";
            signupContent3.style.display = "none";
            document.querySelector(".stage-no-1").style.backgroundColor = "#fff";
            document.querySelector(".stage-no-1").style.color = "#56957e";
        }

        function stage2to3() {
            signupContent3.style.display = "block";
            signupContent1.style.display = "none";
            signupContent2.style.display = "none";
            document.querySelector(".stage-no-2").style.backgroundColor = "#56957e";
            document.querySelector(".stage-no-2").style.color = "#fff";
        }

        function stage3to2() {
            signupContent2.style.display = "block";
            signupContent1.style.display = "none";
            signupContent3.style.display = "none";
            document.querySelector(".stage-no-2").style.backgroundColor = "#fff";
            document.querySelector(".stage-no-2").style.color = "#56957e";
        }
    </script>

    <!-- <script>
        var input = document.getElementById('username'),
            form = document.getElementById('form'),
            elem = document.createElement('div');

            elem.id = 'notify',
            elem.style.display = 'none';
            form.appendChild(elem);
    </script> -->
</body>

</html>