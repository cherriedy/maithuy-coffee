<?php 
    // SHORTHAND: PROJECT NAME ==> maithuy
    define('project', 'maithuy');
    // SHORTHAND: DIRECTORY_SEPARETOR ==> DS
    define('DS', DIRECTORY_SEPARATOR);
    // SHORTHAND: ASSETS FOLDER PATH => DIR_ASSETS
    define('DIR_ASSETS', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'assets');
    // SHORTHAND: BACKEND FOLDER PATH => DIR_BACKEND
    define('DIR_BACKEND', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'backend');
    // SHORTHAND: FRONTEND FOLDER PATH => DIR_FRONTEND
    define('DIR_FRONTEND', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'frontend');
    // INCLUDE: CONFIG.PHP
    include_once(DIR_ASSETS . DS . 'config' . DS . 'config.php');
    // INCLUDE: DB_CONNECT.PHP
    include_once($ASSETS['DIR_DATABASE'] . 'db_connect.php');
    // INCLUDE: DB_QUERY.PHP
    include_once($ASSETS['DIR_DATABASE'] . 'db_query.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['sign-up-btn'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $name = $fname . ' ' . $lname;
            $birthdate = $_POST['dob'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];

            // CHECK: CONFIRM PASSWORD
            if (!($password == $confirm_password)) {
                echo "<script>alert('Mật khẩu không trùng khớp !')</script>";
                echo "<script>window.history.back()</script>";
            }

            // DEFINE: USER TYPE ==> KHACHHANG
            define('usertype', 'KHACHHANG');

            // DATABASE: GET TABLE
            $tb_user = $TABLE['nd'];
            // DATABASE: SQL STATEMENT
            $sql_insert_into_user = "INSERT INTO $tb_user VALUE('test', usertype, '$name', '$password', '')";
        }
    }
?>