<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAITHUY COFFEE</title>

    <?php
        // SHORTHAND: DIRECTORY_SEPARATOR => DS
        define('DS', DIRECTORY_SEPARATOR);

        // SHORTHAND: INDEX.PHP ===> DIR_INDEX
        define('DIR_INDEX', realpath(dirname(__FILE__)) . DS);

        /* SHORTHAND: FRONTEND FOLDER
        *** /frontend/               ===> DIR_FRONTEND
        *** /frontend/admin/         ===> DIR_FRONTEND_ADMIN
        *** /frontend/public/        ===> DIR_FRONTEND_PUBLIC
        *** /frontend/admin/views/   ===> DIR_ADMIN_VIEWS 
        *** /frontend/public/views/  ===> DIR_PUBLIC_VIEWS  */
        define('DIR_FRONTEND', realpath(dirname(__FILE__)) . DS . 'frontend' . DS);
        define('DIR_FRONTEND_ADMIN', DIR_FRONTEND . 'admin'. DS);
        define('DIR_FRONTEND_PUBLIC', DIR_FRONTEND . 'public'. DS);
        define('DIR_ADMIN_VIEWS', DIR_FRONTEND_ADMIN . 'views' . DS);
        define('DIR_PUBLIC_VIEWS', DIR_FRONTEND_PUBLIC . 'views' . DS);

        /* SHORTHAND: BACKEND FOLDER
        *** /backend/               ===> DIR_BACKEND
        *** /backend/admin/         ===> DIR_BACKEND_ADMIN
        *** /backend/public/        ===> DIR_BACKEND_PUBLIC 
        *** /backend/shared/        ===> DIR_SHARED
        */
        define('DIR_BACKEND', realpath(dirname(__FILE__)) . DS . 'backend' . DS);
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

        // REQUIRE: COMPOSER
        require_once __DIR__ . '/vendor/autoload.php';

        // USING: SWIPER, JQUERY
        use nolimits4web\swiper;
        use components\jquery;

        // CHECK: SESSION
        session_begin();
    ?>

    <!-- LINK: STYLES.CSS -->
    <link rel='stylesheet' href='./frontend/public/css/styles.css' type='text/css'>

    <!-- LINK: BOXICONS CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' type='text/css'>

    <!-- LINK: FONTAWESOME -->
    <link href='./vendor/fortawesome/font-awesome/css/all.min.css' rel='stylesheet' type='text/css'>

    <!-- LINK: SWIPER -->
    <link href="./vendor/nolimits4web/swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <!-- INCLUDE: MENU.PHP -->
    <?php include_once(DIR_PUBLIC_VIEWS . 'menu.php')?>

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
                    include_once(DIR_PUBLIC_VIEWS . 'home.php');
                    break;

                case 2:
                    include_once(DIR_PUBLIC_VIEWS . 'about.php');
                    break;

                case 3:
                    include_once(DIR_PUBLIC_VIEWS . 'product.php');
                    break;

                case 4:
                    include_once(DIR_PUBLIC_VIEWS . 'contact.php');
                    break;

                default:
            }
        }
        else {
            include_once(DIR_PUBLIC_VIEWS . 'home.php');
        }
    ?>

    <!-- INCLUDE: FOOTER.PHP-->
    <?php include_once(DIR_PUBLIC_VIEWS . 'footer.php')?>

    <!-- SCRIPT: FONTAWESOME-->
    <script src="https://kit.fontawesome.com/7c9a6eab84.js" crossorigin="anonymous"></script>
    <!-- SCRIPT: BOXICONS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- SCRIPT: SWIPER -->
    <script src="./vendor/nolimits4web/swiper/dist/js/swiper.min.js"></script>
    <!-- SCRIPT: SCROLL REVEAL -->
    <script src="./vendor/packages/scrollreveal/scrollreveal.js"></script>
    <!-- SCRIPT: GENERAL -->
    <script src="./frontend/public/js/app.js"></script>

</body>

</html>