<?php 
    if (isset($_GET['product_id'])) {
        $masp = $_GET['product_id'];
        $conn = db_connect();

        $table_sp = $config['table']['sp'];

        $sql_delete = "DELETE FROM $table_sp WHERE MA_SP = '$masp'";

        if (db_query($conn, $sql_delete)) {
            db_close($conn);
            header('location: index.php?pid=1');
        }

    }
?>