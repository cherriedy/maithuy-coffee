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

</head>

<body>
    <?php include_once(realpath(dirname(__FILE__) . '/layout/sidebar-topbar.php')) ?>
    <section id="content-wrapper">
        <script>
            $.urlParam = function(name){
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results == null) {
                    return null;
                }
                return decodeURI(results[1]) || 0;
            }

            // Loading the first page
            $("#content-wrapper").load("pages/dash.php");
            // Loading the other page
            $(document).on('click','a.active', function(e){
                e.preventDefault();
                var pageURL=$(this).attr('href');
                
                    history.pushState(null, '', pageURL);
                    
                    $.ajax({    
                        type: "GET",
                        url: "./pages/page-content.php", 
                        data:{page:pageURL},            
                        dataType: "html",        
                        success: function(data) { 
                            var page= $.urlParam('page');
                            if (page == 1) {
                                $("#content-wrapper").load("pages/dash.php");
                            }
                            else if (page == 2) {
                                $("#content-wrapper").load("pages/prod.php");
                            }
                            else if (page == 3) {
                                // $("#content-wrapper").load("pages/404.php");
                                window.location.href = "pages/404.php";
                            }
                        },
                });
            });
        </script>
    </section>

    <script src="./js/script.js"></script>
</body>

</html>