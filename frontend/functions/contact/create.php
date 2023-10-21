<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // SHORTHAND: PROJECT NAME == maithuy
        define('project', 'maithuy');
        // SHORTHAND: DIRECTORY_SEPARATOR ==> DS
        define('DS', DIRECTORY_SEPARATOR);
        // SHORTHAND: ASSETS PATH ==> DIR_ASSETS
        define('DIR_ASSETS', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'assets');
        // INCLUDE: DB_CONNECT.PHP
        include_once(DIR_ASSETS . DS . 'database' . DS . 'db_connect.php');
        // INCLUDE: DB_QUERY.PHP
        include_once(DIR_ASSETS . DS . 'database' . DS . 'db_connect.php');
        // INCLUDE: CONFIG.PHP
        include_once(DIR_ASSETS . DS . 'config' . DS . 'config.php');

        if (isset($_POST['submit'])){
            $maph = 'test';
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $content = $_POST['content'];

            $tb_ph = $TABLE['ph'];
            $insert = "INSERT INTO $tb_ph
                       VALUES('$maph',
                             '$name', 
                             '$phone', 
                             '$email', 
                             '$address', 
                             '$content') ";

            $conn = db_connect();
            $query = db_query($conn, $insert);
            $conn->close();
        }
    }  
?>