<?php 
    // DATABASE: CONNECT
    $conn = db_connect();
    // DATABASE: GET TABLE
    $tb_sp = $TABLE['sp'];
    // DATABASE: SQL STATMENT
    $sql_select_all_product = "SELECT TEN_NHOMSP FROM $tb_sp";
    // DATABASE: SQL QUERY
    $sql_query_1 = db_query($conn, $sql_select_all_product);
?>

<section id="product-page" class="section-p2">
    <div class="top">
        <ul>
            <li><a href="index.php?page=3">Tất cả sản phẩm</a></li>
            <?php 
                $category = 0;
                while ($row = db_fetch_assoc($sql_query_1)) {
                    $ten_nsp = $row['TEN_NHOMSP']; 
            ?>
            <li><a href="index.php?page=3&&category=<?php echo ++$category; ?>"><?php echo $ten_nsp; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>

    <?php 
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            switch ($category) {
                case 1:
                    $sql_select_product = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N001' ";
                    break;
                case 2:
                    $sql_select_product = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N002' ";
                    break;
                case 3:
                    $sql_select_product = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N003' ";
                    break;
                case 4:
                    $sql_select_product = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N004' ";
                    break;
            }
        }
        else {
            $sql_select_product = $sql_select_all_product;
        }

        $sql_query_2 = db_query($conn, $sql_select_product);
    ?>

    <div class="product-container">

        <?php
        while ($row = db_fetch_assoc($sql_query_2)) {
            $hinhsp = $row["TEN_HINHSP"];
            $tensp = $row["TEN_SP"];
            $giasp = $row["GIA_SP"];
            $lsp = $row["MA_LOAISP"];
        ?>

        <div class="product">
            <img src="./img/content/product.png" alt="pro-img">
            <div class="product-des">
                <?php 
                if ($lsp === "L001") 
                    $ten_lsp = 'Cà Phê Bột';
                elseif ($lsp == "L002")
                    $ten_lsp = 'Cà Phê Hạt';
                else
                    $ten_lsp = 'Cà Phê Túi Lọc';
                ?>
                <span><?php echo $ten_lsp ?></span>
                <p><?php echo "MAITHUY: " . $tensp; ?></p>
                <h4><?php echo $giasp . " VNĐ"; ?></h4>
            </div>
        </div>
        <?php 
        }
            // DATABASE: CLOSE
            db_close($conn);
        ?>

    </div>
</section>