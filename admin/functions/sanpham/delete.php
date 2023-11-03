<?php
    include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
    include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
    include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

    $conn = db_connect(); 
    $tb_sp = $TABLE['sp'];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (db_query($conn, "DELETE FROM $tb_sp WHERE MA_SP = '$id'")) {
        echo "<script>window.location.href = 'index.php?page=2'</script>";
    }
    db_close($conn);
?>