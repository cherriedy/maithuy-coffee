<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./../../../assets/frontend/css/cart.css" rel="stylesheet" type="text/css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

    <?php 
        // HANDSHORT: DIRECTORY_SEPARATOR ==> DS
        define('DS', DIRECTORY_SEPARATOR);
        // HANDSHORT: ASSETS PATH ==> DIR_ASSETES
        define('DIR_ASSETS', $_SERVER['DOCUMENT_ROOT'] . DS . 'maithuy' . DS . 'assets' . DS);
        // INCLUDE: CONFIG.PHP
        include_once(DIR_ASSETS . 'config' . DS . 'config.php');
        // INCLUDE: DB_CONNECT.PHP
        include_once(DIR_ASSETS . 'database' . DS . 'db_connect.php');
        // INCLUDE: DB_QUERY.PHP
        include_once(DIR_ASSETS . 'database' . DS . 'db_query.php');

        // GET: TABLE
        $tb_sp = $TABLE['sp'];
        $tb_nsp = $TABLE['nsp'];
        $tb_lsp = $TABLE['lsp'];

        // DATABASE: CONNECT
        $conn = db_connect();
        // DATABASE: SQL STATEMENT
        $sql_select_all_product = "SELECT * FROM $tb_sp";
        // DATABASE: SQL QUERY
        $sql_query_result = db_query($conn, $sql_select_all_product);
    ?>

    <section class="cart-wrapper section-p1">
        <div class="navbar">
            <h1>Danh sách sản phẩm</h1>
            <div class="cart-icon">
                <i class='bx bx-cart-alt'></i>
                <div class="total">0</div>
            </div>
        </div>

        <div class="product-list">
            <!-- <div id="message"></div> -->
            <?php
                while($row = db_fetch_assoc($sql_query_result))
                {
                    $mansp = $row['MA_NHOMSP'];
                    $malsp = $row['MA_LOAISP'];
                    $masp = $row['MA_SP'];
                    $tensp = $row['TEN_SP'];
                    $giasp = $row['GIA_SP'];
                    $xuatxu = $row['XUATXU'];
                    $hinh = $row['TEN_HINHSP'];

                    // DATABASE: SQL STATEMENT ==> TEN_NHOMSP
                    $sql_select_ten_nsp = "SELECT TEN_NHOMSP FROM $tb_nsp WHERE MA_NHOMSP = '$mansp'";
                    // DATABASE: SQL STATEMENT ==> TEN_LOAISP
                    $sql_select_ten_lsp = "SELECT TEN_LOAISP FROM $tb_lsp WHERE MA_LOAISP = '$malsp'";

                    // DATABASE: SQL QUERY
                    $sql_query_nsp_result = db_query($conn, $sql_select_ten_nsp);
                    $sql_query_lsp_result = db_query($conn, $sql_select_ten_lsp);

                    // GET<--DATABASE: TEN_LOAISP, TEN_NHOMSP
                    $tennsp = db_fetch_assoc($sql_query_nsp_result)['TEN_NHOMSP'];
                    $tenlsp = db_fetch_assoc($sql_query_lsp_result)['TEN_LOAISP'];
                ?>
            <div class="product-card">
                <div class="img-wrapper">
                    <img src="../../../assets/frontend/img/content/product.png" alt="">
                </div>

                <div class="product-des">
                    <div class="product-des-tag">
                        <span class="product-type"><?php echo $tennsp; ?></span>
                        <span class="product-group"><?php echo $tenlsp; ?></span>
                    </div>

                    <div class="product-des-brand">
                        <span>MAITHUY Coffee</span>
                    </div>

                    <div class="product-des-name">
                        <span><?php echo $tensp; ?></span>
                    </div>

                    <div class="product-des-add">
                        <i class='bx bx-current-location'></i>
                        <span><?php echo $xuatxu; ?></span>
                    </div>

                    <div class="horizontal-line"></div>

                    <div class="product-des-price-buy">
                        <div class="price">
                            <span class="original"><?php echo number_format($giasp, 0, '', ','); ?> VNĐ</span>
                            <p class="discount">Giảm giá: <span><?php echo number_format($giasp, 0, '', ','); ?>
                                    VNĐ</span></p>
                        </div>
                        <!-- SEND: PRODUCT'S DATA TO CART -->
                        <form action="" class="add-to-cart">
                            <input type="hidden" class="tensp" value="<?php echo$tensp; ?>">
                            <input type="hidden" class="tennsp" value="<?php echo$tennsp; ?>">
                            <input type="hidden" class="tenlsp" value="<?php echo$tenlsp; ?>">
                            <input type="hidden" class="gia" value="<?php echo$giasp; ?>">
                            <input type="hidden" class="hinh" value="<?php echo$hinhsp; ?>">
                            <!-- BUTTON: ADD TO CART -->
                            <button type="submit" class="addToCart"><i class='bx bx-shopping-bag'></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </section>

    <script>
        $(document).ready(function () {
            $(".addToCart").click(function (e) {
                e.preventDefault();
                var $form = $(this).closest(".add-to-cart");
                var masp = $form.find(".masp").val();
                var tensp = $form.find(".tensp").val();
                var tennsp = $form.find(".tennsp").val();
                var tenlsp = $form.find(".tenlsp").val();
                var gia = $form.find(".gia").val();

                $.ajax({
                    url: 'tcard-action.php',
                    method: 'post',
                    data: {masp:masp, tensp:tensp, tennsp:tennsp, tenlsp:tenlsp, gia:gia, hinh:hinh},
                    success:function(response) {
                        $("message").html(response);                         
                    }
                });
            });
        });
    </script>

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>