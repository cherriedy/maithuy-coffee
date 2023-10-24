<?php

    // SHORTHAND: DIRECTORY_SEPARATOR => DS
    define('DS', DIRECTORY_SEPARATOR);

    // SHORTHAND: INDEX.PHP ===> DIR_INDEX
    define('DIR_INDEX', realpath(dirname(__FILE__)) . DS . '..' . DS . '..' . DS . '..' . DS);

    /* SHORTHAND: BACKEND FOLDER
    *** /backend               ===> DIR_BACKEND
    *** /backend/admin         ===> DIR_BACKEND_ADMIN
    *** /backend/public        ===> DIR_BACKEND_PUBLIC 
    *** /backend/shared        ===> DIR_SHARED
    */
    define('DIR_BACKEND', realpath(dirname(__FILE__)) . '/../../../' . 'backend' . DS);
    define('DIR_BACKEND_ADMIN', DIR_BACKEND . 'admin'. DS);
    define('DIR_BACKEND_PUBLIC', DIR_BACKEND . 'public'. DS);
    define('DIR_SHARED', DIR_BACKEND . 'shared'. DS);

    // INCLUDE: CONFIG FILE
    include_once(DIR_INDEX . 'config' . DS .'config.php');

    // INCLUDE: DATABASE FILES
    include_once(DIR_SHARED . 'database' . DS . 'db_connect.php');
    include_once(DIR_SHARED . 'database' . DS . 'db_query.php');

    // INCLUDE: SESSION FILES
    include_once(DIR_SHARED . DS . 'session' . DS . 'ss_start.php');
    include_once(DIR_SHARED . DS . 'session' . DS . 'ss_close.php');


    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // POST: GET EMAIL AND PASSWORD
        $email = $_POST['email'];
        // $password = md5($_POST['password']);
        $password = $_POST['password'];

        if (isset($_POST['sign-in-btn'])) {
            // CHECK: SESSION IS STARTED ?
            if (session_id() == '') {
                session_start();
            } 
            // elseif (isset($_SESSION['email_logged'])) {
            //     echo "<script>alert('Đã đăng nhập' !);</script>";
            //     header('location: ../../../index.php');
            //     exit();
            // }


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
            if ($sql_query_result->num_rows == 1) {
                // SAVE USER'S EMAIL INTO SESSION
                $_SESSION['email_logged'] = $email;
                // NOTIFICATION: SUCCEEED (FOR DEBUG)
                // echo "<script>alert('Đăng nhập thành công !')</script>";
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