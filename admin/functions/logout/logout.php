<?php 
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/start.php'));
    include_once(realpath(dirname(__FILE__) . '/../../../resources/session/close.php'));
    session_begin();
    session_close();
    echo "<script>window.location.href = 'index.php'</script>";
?>
