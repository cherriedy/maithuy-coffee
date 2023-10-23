<?php 
    
    // HANDSHORT: DIRECTORY_SEPARATOR ==> DS
    define('DS', DIRECTORY_SEPARATOR);
    // HANDSHORT: ASSETS PATH ==> DIR_ASSETES
    define('DIR_ASSETS', $_SERVER['DOCUMENT_ROOT'] . DS . 'maithuy' . DS . 'assets' . DS);
    // INCLUDE: CONFIG.PHP
    include_once(DIR_ASSETS . 'config' . DS . 'config.php');

    if(isset($_POST['addToCart'])) {
        $mansp  = $_POST['masp'];
        $malsp  = $_POST['malsp'];
        $masp   = $_POST['masp'];
        $tensp  = $_POST['tensp'];
        $giasp  = $_POST['giasp'];
        // $hinh   = 
    } 
?>