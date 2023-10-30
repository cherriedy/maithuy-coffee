<?php
    // SHORTHAND: PROJECT NAME ==> maithuy
    define('project', 'maithuy');
    // SHORTHAND: DIRECTORY_SEPARATOR => DS
    define('DS', DIRECTORY_SEPARATOR);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAITHUY COFFEE</title>

    <!-- LINK: STYLES.CSS -->
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
    <!-- LINK: BOXICONS CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' type="text/css">
    <!-- LINK: SWIPER CSS -->
    <link href="./assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- INCLUDE: MENU.PHP -->
    <?php include_once(realpath(dirname(__FILE__)) . DS . 'layout/navigation.php')?>

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
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/homepage.php');
                    break;

                case 2:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/about.php');
                    break;

                case 3:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/product.php');
                    break;

                case 4:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/contact.php');
                    break;
                
                case 5:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/register.php');
                    break;

                case 6:
                    include_once(realpath(dirname(__FILE__)) . DS . 'pages/login.php');
                    break;
                default:
            }
        }
        else {
            include_once(DIR_FRONTEND . DS . 'home.php');
        }
    ?>

    <!-- INCLUDE: FOOTER.PHP-->
    <?php include_once(DIR_FRONTEND . DS . 'new_footer.php')?>

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