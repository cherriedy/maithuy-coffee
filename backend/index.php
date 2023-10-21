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
        // SHORTHAND: BACKEND FOLDER PATH => DIR_BACKEND
        define('DIR_BACKEND', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'backend');
        // SHORTHAND: FRONTEND FOLDER PATH => DIR_FRONTEND
        define('DIR_FRONTEND', $_SERVER['DOCUMENT_ROOT'] . DS . project . DS . 'frontend');
        // INCLUDE: CONFIG.PHP
        include_once(DIR_ASSETS . DS . 'config' . DS . 'config.php');
        // INCLUDE: DB_CONNECT.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_connect.php');
        // INCLUDE: DB_QUERY.PHP
        include_once($ASSETS['DIR_DATABASE'] . 'db_query.php');
        // INCLUDE: SS_START.PHP
        include_once($BACKEND['DIR_SESSION'] . 'ss_start.php');
        // INCLUDE: SS_CLOSE.PHP
        include_once($BACKEND['DIR_SESSION'] . 'ss_close.php');
        // CALL: SESSION_BEGIN() => CHECK SESSION IS CREATED AND START SESSION
        session_begin();
    ?>

    <!-- LINK: STYLES.CSS -->
    <link rel="stylesheet" href="./css/styles.css" type="text/css">
</head>

<body>
    
</body>

</html>