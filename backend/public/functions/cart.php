<?php
    // INCLUDE: CONFIG.PHP
    include_once(realpath(dirname(__FILE__) . '../../assets/config/config.php'));
    // INCLUDE: DB_CONNECT.PHP
    include_once(realpath(dirname(__FILE__)). '/../../assets/database/db_connect.php');
    // INCLUDE: DB_QUERY.PHP
    include_once(realpath(dirname(__FILE__)). '/../../assets/database/db_query.php');

    // GET: TABLE
    $tb_sp = $TABLE['sp'];

    // DATABASE: CONNECT
    $conn = db_connect();
    // DATABASE: SQL STATEMENT
    $sql_select_all_product = "SELECT * FROM $tb_sp";
    // DATABASE: SQL QUERY
    $sql_query_result = db_query($conn, $sql_select_all_product);
?>