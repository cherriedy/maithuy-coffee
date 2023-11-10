<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // INLCUDE: CONFIG FILE
    include_once realpath(dirname(__FILE__) . '/../../../resources/config/config.php');
    // INLCUDE: DATABASE FUNCTIONS
    include_once realpath(dirname(__FILE__) . '/../../../resources/database/connect.php');
    include_once realpath(dirname(__FILE__) . '/../../../resources/database/query.php');

    function generateID($conn, $table, $column, $id)
    {
        $sql = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
        $result = db_fetch_assoc(db_query($conn, $sql))[$column];
        $lastID = (int) filter_var($result, FILTER_SANITIZE_NUMBER_INT);

        $newID = $lastID + 1;

        if ($newID >= 0 && $newID < 10) {
            return $id . '00' . $newID;
        }

        if ($newID >= 10 && $newID < 100) {
            return $id . '0' . $newID;
        }
    }

    $conn = db_connect();
    $tb_ph = $TABLE['ph'];

    if (isset($_POST['submit'])) {
        $maph = generateID($conn, $tb_ph, 'MA_PHANHOI', 'PH');
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $content = $_POST['content'];

        $sql_insert_into_ph = "INSERT INTO $tb_ph VALUES('$maph', '$name', '$phone', '$email', '$address', '$content')";

        $conn = db_connect();
        if (db_query($conn, $sql_insert_into_ph)) {
            header('location: ./../../index.php');
        }
        db_close($conn);
    }
}
