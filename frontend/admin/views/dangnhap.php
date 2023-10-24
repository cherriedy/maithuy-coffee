<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <?php
        include_once(__DIR__ . '/../../../config/config.php'); 
        include_once(__DIR__ . '/../../../backend/shared/database/db_connect.php'); 
        include_once(__DIR__ . '/../../../backend/shared/database/db_query.php'); 
    ?>

    <!-- LINK: STYLES.CSS -->
    <link href='./../css/styles.css' rel='stylesheet' type='text/css'>
    <!-- LINK: BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch($page) {
                case "login":
                    include_once(realpath(dirname(__FILE__) . '/login.php'));
                    break;

                case "register":
                    include_once(realpath(dirname(__FILE__) . '/register.php'));
                    break;
            }
        }
        else {
            include_once(realpath(dirname(__FILE__) . '/login.php'));
        }
    ?>

</body>

</html>