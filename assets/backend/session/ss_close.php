<?php
    // Xoá huỷ bỏ session có 2 cách
    // Sử dụng unset => xoá một biến giá trị trong $_SESSION
    // Sử dụng destroy => xoá toàn bộ $_SESSION
    // Để đăng xuất chỉ cần xoá $_SESSION['username_logged] với unset
    // Sau đó điều hướng về index.php
    function session_close() {
        if (isset($_SESSION['username_logged'])) {
            unset($_SESSION['username_logged']);
        }
        else {
            die('Chưa đăng nhập !');
        }
    }
?>