<?php 
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/start.php'));
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/close.php'));
    session_begin();
    session_close();
    header('location: ../../../public/index.php');
?>
