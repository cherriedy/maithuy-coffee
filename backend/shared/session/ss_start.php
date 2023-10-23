<?php
    function session_begin() {
        if (session_id() == '') {
            session_start([
                'use_only_cookies' => 1,
                'cookie_lifetime' => 0,
                'cookie_secure' => 1,
                'cookie_httponly' => 1
            ]);
        } 

        if (isset($_SESSION['count'])) {
            $_SESSION['count'] += 1;
        }
        else {
            $_SESSION['count'] = 1;
        }
    }
?>