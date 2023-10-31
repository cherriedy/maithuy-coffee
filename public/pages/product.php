<?php 
    $tb_sp = $TABLE['sp'];
    $tb_lsp = $TABLE['lsp'];
    $tb_nsp = $TABLE['nsp'];

    $conn = db_connect();
    $sql_select_prod_type = "SELECT TEN_LOAISP FROM $tb_lsp";
    $sql_select_prod_group = "SELECT TEN_NHOMSP FROM $tb_nsp";

    $sql_query_result_1 = db_query($conn, $sql_select_prod_group);
?>

<section class="product-wrapper">
    <div class="product-header-wrapper">
        <h1>Danh sách sản phẩm</h1>

        <div class="product-type">
            <a class="active" href="index.php?page=3">Tất cả</a>
            <?php 
                $group = 1;
                while ($row = db_fetch_assoc($sql_query_result_1)) 
                {
            ?>
            <a href="index.php?page=3&&group=<?php echo $group++; ?>"><?php echo $row['TEN_NHOMSP']; ?></a>
            <?php 
                }
            ?>
        </div>
    </div>

    <div class="product-content">
        <?php 
        if (isset($_GET['group'])) {
            $group = $_GET['group'];

            switch ($group) {
                case 1: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N001'";
                    break;

                case 2: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N002'";
                    break;

                case 2: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N003'";
                    break;

                case 4: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N004'";
                    break;
            }
        }
        else {
            $sql_select_prod = "SELECT * FROM $tb_sp";
        }

        $sql_query_result_2 = db_query($conn, $sql_select_prod);
        while ($row = db_fetch_assoc($sql_query_result_2))
        {
            $ma_sp = $row['MA_SP'];
            $ma_lsp = $row['MA_LOAISP'];
            $ma_nsp = $row['MA_NHOMSP'];
            $ten_sp = $row['TEN_SP'];
            $gia_sp = $row['GIA_SP'];
            $xuat_xu = $row['XUATXU'];
            $hinh_sp = $row['TEN_HINHSP'];

            $sql_select_ten_nsp = "SELECT TEN_NHOMSP FROM $tb_nsp WHERE MA_NHOMSP = '$ma_nsp'";
            $sql_select_ten_lsp = "SELECT TEN_LOAISP FROM $tb_lsp WHERE MA_LOAISP = '$ma_lsp'";

            $ten_nsp = db_fetch_assoc(db_query($conn, $sql_select_ten_nsp))['TEN_NHOMSP'];
            $ten_lsp = db_fetch_assoc(db_query($conn, $sql_select_ten_lsp))['TEN_LOAISP'];
        ?>
        <div class="product-card">
            <div class="img-wrapper">
                <img src="./img/product.png" alt="prod-img">
            </div>

            <div class="product-des">
                <div class="product-des__tag">
                    <span class="group"><?php echo $ten_nsp; ?></span>
                    <span class="type"><?php echo $ten_lsp; ?></span>
                </div>

                <div class="product-des__brand">
                    <span>MAITHUY COFFEE</span>
                </div>

                <div class="product-des__name">
                    <span><?php echo $ten_sp; ?></span>
                </div>

                <div class="product-des__origin">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo $xuat_xu; ?></span>
                </div>

                <div class="horizontal-line"></div>

                <div class="prodcut-des__price-buy">
                    <div class="price">
                        <?php $discount = $gia_sp - $gia_sp * .50; ?>
                        <span class="discount"><?php echo number_format($discount, 0, '', ','); ?> VNĐ</span>
                        
                        <p class="original">GIÁ: <span><?php echo number_format($gia_sp, 0, '', ','); ?></span> VND</p>
                    </div>

                    <div class="buy">
                        <a href="#"><i class='bx bx-shopping-bag'></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</section>
