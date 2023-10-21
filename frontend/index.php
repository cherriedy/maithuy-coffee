<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MAITHUY COFFEE</title>

    <!-- || DEFAULT CONFIG || -->
    <?php include_once(__DIR__ . "/../config/config.php")?>
    <!-- || VENDOR CSS || -->
    <?php include_once(__DIR__ . "/../resources/share/styles.php")?>
    <!-- || GENERAL CSS || -->
    <link rel="stylesheet" href="./css/styles.css" type="text/css"/>
    <!-- || DATABASE CONFIG || -->
    <?php include_once(__DIR__ . "/../resources/share/database/db_connect.php")?>
    <?php include_once(__DIR__ . "/../resources/share/database/db_query.php")?>

</head>

<body>
    <!-- || MENU SECTION || -->
    <?php include_once(__DIR__ . "/../resources/public/frontend/view/menu.php") ?>
    <!-- || MENU CONTROLLER || -->
    <?php 
        if (isset($_GET["pid"])) {
            $pid = $_GET["pid"];
            switch($pid) {
                case 1: 
                    include_once(__DIR__ . "/../resources/public/frontend/view/home.php");
                    break;

                case 2:
                    include_once(__DIR__ . "/../resources/public/frontend/view/about.php");
                    break;

                case 3:
                    include_once(__DIR__ . "/../resources/public/frontend/view/product.php");
                    break;

                case 4:
                    include_once(__DIR__ . "/../resources/public/frontend/view/contact.php");
                    break;

                default:
            }
        }
    ?>

    <!-- || FOOTER SECTION || -->
    <?php include_once(__DIR__ . "/../resources/public/frontend/view/footer.php"); ?>

    <!-- || VENDOR JS || -->
    <?php include_once(__DIR__ . "/../resources/share/scripts.php") ?>
    <!-- || GENERAL JS || -->
    <script src="./js/scripts.js"></script>

</body>

</html>