<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAITHUY COFFEE</title>

    <?php
        // SHORTHAND: PROJECT NAME == maithuy
        define('project', 'maithuy');
        // SHORTHAND: DIRECTORY_SEPARATOR => DS
        define('DS', DIRECTORY_SEPARATOR);
        // SHORTHAND: ASSETS FOLDER PATH => DIR_ASSETS
        define('DIR_ASSETS', realpath(dirname(__FILE__) . '/assets/'));
        // SHORTHAND: BACKEND FOLDER PATH => DIR_BACKEND
        define('DIR_BACKEND', realpath(dirname(__FILE__) . '/backend/'));
        // SHORTHAND: FRONTEND FOLDER PATH => DIR_FRONTEND
        define('DIR_FRONTEND', realpath(dirname(__FILE__) . '/frontend/'));
        // INCLUDE: CONFIG.PHP
        include_once(DIR_ASSETS . DS . 'config' . DS . 'config.php');
        // INCLUDE: DB_CONNECT.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_connect.php');
        // INCLUDE: DB_QUERY.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_query.php');
        // INCLUDE: SS_START.PHP
        include_once($ASSETS['DIR_BACKEND'] . 'session' . DS . 'ss_start.php');
        // INCLUDE: SS_CLOSE.PHP
        include_once($ASSETS['DIR_BACKEND'] . 'session' . DS . 'ss_close.php');
        // CALL: SESSION_BEGIN() => CHECK SESSION IS CREATED AND START SESSION
        session_begin();
    ?>

    <!-- LINK: STYLES.CSS -->
    <link rel="stylesheet" href="./assets/frontend/css/styles.css" type="text/css">
    <!-- LINK: BOXICONS CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' type="text/css">
    <!-- LINK: SWIPER CSS -->
    <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- INCLUDE: MENU.PHP -->
    <?php include_once($FRONTEND['DIR_VIEWS'] . 'menu.php')?>

    <!-- CONTROLLER: NAVIGATION -->
    <?php 
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
            // CASE 1: HOME.PHP
            // CASE 2: ABOUT.PHP
            // CASE 3: PRODUCT.PHP
            // CASE 4: CONTACT.PHP
            switch($page) {
                case 1: 
                    include_once($FRONTEND['DIR_VIEWS'] . 'home.php');
                    break;

                case 2:
                    include_once($FRONTEND['DIR_VIEWS'] . 'about.php');
                    break;

                case 3:
                    include_once($FRONTEND['DIR_VIEWS'] . 'product.php');
                    break;

                case 4:
                    include_once($FRONTEND['DIR_VIEWS'] . 'contact.php');
                    break;

                default:
            }
        }
    ?>

    <!-- INCLUDE: FOOTER.PHP-->
    <?php include_once($FRONTEND['DIR_VIEWS'] . 'footer.php')?>
    <!-- SCRIPT: FONTAWESOME-->
    <script src="https://kit.fontawesome.com/7c9a6eab84.js" crossorigin="anonymous"></script>
    <!-- SCRIPT: BOXICONS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- SCRIPT: SWIPER -->
    <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- SCRIPT: SCROLL REVEAL -->
    <script src="./assets/vendor/scrollreveal/scrollreveal.js"></script>
    <!-- SCRIPT: GENERAL -->
    <script src="./assets/frontend/js/scripts.js"></script>

</body>

</html>