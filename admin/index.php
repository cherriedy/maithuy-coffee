<?php
include_once(__DIR__ . "./../resources/config/config.php");
include_once(__DIR__ . "./../resources/database/connect.php");
include_once(__DIR__ . "./../resources/database/query.php");
include_once(__DIR__ . "./../resources/session/start.php");
// include_once(__DIR__ . "./../resources/session/");

session_begin();

if (!isset($_SESSION['email_logged'])) {
    header('location: ./../public/index.php?page=5');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>

    <!-- <script>
        $.urlParam = function(name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results == null) {
                return null;
            }
            return decodeURI(results[1]) || 0;
        }


        $(document).on('click','a.active',function(e) {
            e.preventDefault();
            /**
             * Document a.active click function
             *  
             * pageURL: get url gor href atrribute
             * history.pushState: push pageURl into navigation URL bar
             * pageID: get real path by ID
             * navigationLink: real path to navigate
             * 
            */
            let pageURL = $(this).attr('href');
            history.pushState(null, '', pageURL);
            let pageID = $.urlParam('page');
            let navLink;

            switch(pageID) {
                case 2:
                    navLink = 'pages/prod.php';
                    break;
            }

            $.ajax({
                url: navLink,
                type: 'get',
                dataType: 'html',
                success: function(respond) {
                    $('#content-wrapper').html(respond);
                },
            });
        });
    </script> -->
</head>

<body>
    <?php include_once(realpath(dirname(__FILE__) . '/layout/sidebar-topbar.php')) ?>

    <section id="content-wrapper">
        <?php 
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch($page) {
                case 1: 
                    include_once(__DIR__ . '/pages/dash.php');
                    break;

                case 2: 
                    include_once(__DIR__ . '/functions/sanpham/index.php');
                    break;

                case 3: 
                    include_once(__DIR__ . '/functions/sanpham/create.php');
                    break;

                case 4: 
                    include_once(__DIR__ . '/functions/sanpham/edit.php');
                    break;

                case 5: 
                    include_once(__DIR__ . '/functions/sanpham/delete.php');
                    break;

                case 6: 
                    include_once(__DIR__ . '/functions/loai_sanpham/index.php');
                    break;

                case 7: 
                    include_once(__DIR__ . '/functions/loai_sanpham/create.php');
                    break;

                case 8: 
                    include_once(__DIR__ . '/functions/loai_sanpham/edit.php');
                    break;

                case 9: 
                    include_once(__DIR__ . '/functions/loai_sanpham/delete.php');
                    break;

                case 10: 
                    include_once(__DIR__ . '/functions/nhom_sanpham/index.php');
                    break;

                case 11: 
                    include_once(__DIR__ . '/functions/nhom_sanpham/create.php');
                    break;

                case 12: 
                    include_once(__DIR__ . '/functions/nhom_sanpham/edit.php');
                    break;

                case 13: 
                    include_once(__DIR__ . '/functions/nhom_sanpham/delete.php');
                    break;
            }
        }
        ?>
    </section>

    <script src="./js/script.js"></script>
</body>

</html>