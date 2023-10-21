<?php
    // include_once(realpath(dirname(__FILE__) . '/../config/config.php'));

    define('db_host', $DATABASE['host']);
    define('db_user', $DATABASE['username']);
    define('db_pw', $DATABASE['password']);
    define('db_name', $DATABASE['dbname']);

    function db_connect() {
        $conn = new mysqli(db_host, db_user, db_pw, db_name);
        if ($conn->connect_error) {
            echo "Database error: " . $conn->connect_error;
        }
        return $conn;
    }

    function db_close($conn) {
        $conn->close();
    }
?>