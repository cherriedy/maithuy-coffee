<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <?php
        // SHORTHAND: PROJECT NAME ==> maithuy
        define('project', 'maithuy');
        // SHORTHAND: DIRECTORY_SEPARETOR ==> DS
        define('DS', DIRECTORY_SEPARATOR);
        // SHORTHAND: ASSETS FOLDER PATH => DIR_ASSETS
        define('DIR_ASSETS', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'assets');
        // INCLUDE: CONFIG.PHP
        include_once(DIR_ASSETS . DS . 'config' . DS . 'config.php');
        // INCLUDE: DB_CONNECT.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_connect.php');
        // INCLUDE: DB_QUERY.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_query.php');
    ?>

    <!-- LINK: STYLES.CSS -->
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
</head>

<body>
    
</body>

</html>