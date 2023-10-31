<?php
    // SHORTHAND: DIRECTORY_SEPARATOR => DS
    define('DS', DIRECTORY_SEPARATOR);
    // SHORTHAND: RESOURCES PATH => DIR_RESOURCE
    define('DIR_RESOURCE', $_SERVER['DOCUMENT_ROOT'] . DS . 'maithuy' . DS . 'resources');
    // INCLUDE: CONFIG
    include_once(DIR_RESOURCE . DS . 'config' . DS . 'config.php');
    // INCLUDE: DATABASE FUNCTIONS
    include_once(DIR_RESOURCE . DS . 'database' . DS . 'connect.php');
    include_once(DIR_RESOURCE . DS . 'database' . DS . 'query.php');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAITHUY COFFEE</title>

    <!-- LINK: STYLES.CSS -->
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <!-- LINK: BOXICONS CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' type="text/css">
    <!-- LINK: SWIPER CSS -->
    <link href="./../vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- INCLUDE: MENU.PHP -->

    <!-- CONTROLLER: NAVIGATION -->
    <?php 
        if (isset($_GET["page"])) {
            $page = $_GET["page"];

            if ($page != 5 && $page != 6) {
                include_once(realpath(dirname(__FILE__)) . DS . 'layout/navigation.php');
            }

            switch($page) {
                case 3:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/product.php');
                    break;

                case 4:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/contact.php');
                    break;

                case 5:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/login.php');
                    break;

                case 6:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/register.php');
                    break;
                default:
            }

            // INCLUDE: FOOTER.PHP
            if ($page != 5 && $page != 6) {
                // include_once(realpath(dirname(__FILE__)) . DS . 'layout/footer.php');
            }
        }
        else {
            include_once(realpath(dirname(__FILE__)) . DS . 'pages/homepage.php');
        }

    ?>

    <!-- SCRIPT: FONTAWESOME-->
    <script src="https://kit.fontawesome.com/7c9a6eab84.js" crossorigin="anonymous"></script>

    <!-- SCRIPT: BOXICONS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- SCRIPT: SWIPER -->
    <script src="./../vendor/swiper/swiper-bundle.min.js"></script>

    <!-- SCRIPT: SCROLL REVEAL -->
    <script src="./../vendor/scrollreveal/scrollreveal.js"></script>
    
    <!-- SCRIPT: JQUERY -->
    <script src="./../vendor/jquery/jquery-3.7.1.min.js"></script>

    <!-- SCRIPT: GENERAL -->
    <script src="./js/scripts.js"></script>

</body>

</html>