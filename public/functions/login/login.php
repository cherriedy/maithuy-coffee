<?php
    // INLCUDE: CONFIG FILE
    include_once(realpath(dirname(__FILE__) . '/../../../resources/config/config.php'));
    // INLCUDE: DATABASE FUNCTIONS  
    include_once(realpath(dirname(__FILE__) . '/../../../resources/database/connect.php'));
    include_once(realpath(dirname(__FILE__) . '/../../../resources/database/query.php'));
    // INLCUDE: SESSION FUNCTIONS  
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/start.php'));
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/close.php'));

    session_begin();


    if (isset($_POST['sign-in-btn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $tb_nd = $TABLE['nd'];
        $conn = db_connect();
        $sql_check = "SELECT * FROM $tb_nd WHERE EMAIL = '$email' AND MK_ND = '$password'";

        if (db_query($conn, $sql_check)->num_rows == 1) {
            $_SESSION['email_logged'] = $email;
            // echo "<script>alert('THANH CONG');</script>";
            header('location: ../../../admin/index.php');
        }
        else {
            echo "<script>alert('THAT BAI');</script>";
        }
    }
?>