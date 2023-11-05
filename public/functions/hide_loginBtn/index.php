<?php
include_once realpath(dirname(__FILE__) . '/../../../resources/session/start.php');
/**
 * Check if email_logged is initilized
 * TRUE ==> Hide login button
 * FALSE ==> Do nothing
 */

session_begin();
if (isset($_SESSION['email_logged'])) {
    echo "
        <script>
            $(document).ready(function() {
                $('.navigation-content ul li.loginBtn').hide();
            });
        </script>
    ";
}
?>