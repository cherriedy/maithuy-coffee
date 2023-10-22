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
    // INCLUDE: SS_START.PHP
    include_once($BACKEND['DIR_SESSION'] . 'ss_start.php');
    // INCLUDE: SS_CLOSE.PHP
    include_once($BACKEND['DIR_SESSION'] . 'ss_close.php');
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['sign-in-btn'])) {
            // CHECK: SESSION IS STARTED ?
            if (session_id() == '') {
                session_start([
                    'use_only_cookies' => 1,
                    'cookie_lifetime' => 0,
                    'cookie_secure' => 1,
                    'cookie_httponly' => 1
                ]);
            } 
            else {
                echo "<script>alert('Đã đăng nhập' !);</script>";
                // header('location: ../../../index.php');
            }

            if (isset($_SESSION['count'])) {
                $_SESSION['count'] += 1;
            }
            else {
                $_SESSION['count'] = 1;
            }

            // POST: GET EMAIL AND PASSWORD
            $email = $_POST['email'];
            $password = $_POST['password'];

            // DATABASE: GET TABLE
            $tb_user = $TABLE['nd'];
            // DATABASE: CONNECT
            $conn = db_connect();
            // DATABASE: SQL STATEMENT
            $sql_select_all_user = "SELECT * 
                                    FROM $tb_user 
                                    WHERE EMAIL = '$email' AND MK_ND = '$password' ";
            // DATABASE: SQL QUERY
            $sql_query_result = db_query($conn, $sql_select_all_user);

            // CHECK: THE NUMBER OF ROWS
            if ($sql_query_result->num_rows > 0) {
                // SAVE USER'S EMAIL INTO SESSION
                $_SESSION['email_logged'] = $email;
                // NOTIFICATION: SUCCEEED (FOR DEBUG)
                // echo "<script>alert('Đăng nhập thành công !');</script>";

                // RETURN: PUBLIC INDEX.PHP
                header('location: ../../../index.php');
            }
            else {
                // NOTIFICATION: FAILED
                echo "<script>alert('Đăng nhập thất bại !');</script>";
                // RETURN: BACK TO LOGIN SECTION
                echo "<script>window.history.back()</script>";
            }
        }
    }
?>