<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- || GENERAL CONFIG || -->
    <?php include_once(__DIR__ . "/../config/config.php") ?>
    <!-- || DATABASE CONFIG || -->
    <?php include_once(__DIR__ . '/../resources/share/database/db_connect.php') ?>
    <?php include_once(__DIR__ . '/../resources/share/database/db_query.php') ?>
    <!-- || GENERAL CSS || -->
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
</head>

<body>
    <!-- || HEADER SECTION || -->
    <?php include_once(__DIR__ . '/../resources/admin/frontend/view/header.php') ?>

    <?php 
        if (isset($_GET['pid'])) {
            $pid = $_GET['pid'];
            switch($pid) {
                case 1: // CRUD: PRODUCT - INDEX
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product/index.php');
                    break;

                case 2: // CRUD: PRODUCT GROUP - INDEX
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product_group/index.php');
                    break;
                
                case 3: // CRUD: PRODUCT TYPE
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product_type/index.php');
                    break;
                    
                case 4: // CRUD: PRODUCT - CREATE
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product/create.php');
                    break;

                case 5: // CRUD: PRODUCT - EDIT
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product/edit.php');
                    break;

                case 6: // CRUD: PRODUCT - DELETE
                    include_once(__DIR__ . '/../resources/admin/backend/functions/product/delete.php');
                    break;
                
                default:
            }
        }

    ?>
</body>

</html>