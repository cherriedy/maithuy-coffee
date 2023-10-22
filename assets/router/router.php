<?php 
    // INCLUDE: .htaccess
    // include_once (realpath(dirname(__FILE__) . '../../.htaccess'));

    class Router {
        private function getRequestURL() {
            return isset($_SERVER['REQUEST_URL']) ? $_SERVER['REQUEST_URL'] : '/';
        }
    }
?>