<?php
// INLCUDE: CONFIG FILE
include_once realpath(dirname(__FILE__) . '/../../../resources/config/config.php');
// INLCUDE: DATABASE FUNCTIONS
include_once realpath(dirname(__FILE__) . '/../../../resources/database/connect.php');
include_once realpath(dirname(__FILE__) . '/../../../resources/database/query.php');
// INLCUDE: SESSION FUNCTIONS
include_once realpath(dirname(__FILE__) . '/../../../resources/session/start.php');
include_once realpath(dirname(__FILE__) . '/../../../resources/session/close.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sign-up-btn'])) {
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
        } else {
            // ENCRYPTION: PASSWORD
            $password = md5($password);
        }

        // VARIABLE: USER TYPE ==> KHACHHANG
        $usertype = 'KHACHHANG';

        // DATABASE: GET TABLE
        $tb_user = $TABLE['nd'];
        // DATABSE: CONNECT
        $conn = db_connect();
        // DATABASE: SQL STATEMENT
        $sql_insert_into_user = "INSERT INTO $tb_user VALUE('test', '$usertype', '$name', '$password', '$email', '$phone')";
        // DATABASE: SQL QUERY
        if (db_query($conn, $sql_insert_into_user)) {
            // NOTIFICATION: SUCCEEDED
            echo "<script>alert('Đăng kí thành công !');</script>";
            // RETURN: PUBLIC INDEX.PHP
            header('location: ../../index.php?page=5');
        } else {
            // NOTIFICATION: FAILED
            echo "<script>alert('Đăng kí tb !');</script>";
        }

    }
}
