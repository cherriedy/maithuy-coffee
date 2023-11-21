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
        <div class="left">
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

        <div class="right">
                <div class="search-box">
                    <form action="index.php?page=3&&search=true" method="post">
                            <i class="bx bx-search-alt-2"></i>
                            <input type="search" name="keyword" placeholder="Nhập thông tin tìm kiếm">
                    </form>
                </div>/
        </div>
    </div>

    <div class="product-content">
        <?php 
        /**
         * Document the pagination function
         * 
         * $limit_per_page: The number of prods per page
         * $num_of_products: The number of prods in databas
         * $num_of_pages: The number of pages
         */
        $limit_per_page = 4;
        $num_of_products = db_query($conn, "SELECT * FROM $tb_sp")->num_rows;
        $num_of_pages = ceil($num_of_products / $limit_per_page);

        /* Get current being visited */
        if (!isset($_GET['pagination'])) {
            $current_page = 1;
            $start_row = 0;
        } else {
            $current_page = $_GET['pagination'];
            $start_row = ($current_page - 1) * $limit_per_page;
        }

        /**
         * GET SQL STATEMENT TO SELECT PRODUCT
         * 
         * isset($_GET['pagination']) : get product by using pagination
         * isset($_GET['group']) : get product by using group
         */
        if (isset($_GET['search'])) {
            $keyword =$_POST['keyword'];
            $sql_select_prod = "SELECT * FROM $tb_sp WHERE TEN_SP LIKE '%$keyword%'";
        } elseif (isset($_GET['pagination'])) {
            $sql_select_prod = "SELECT * FROM $tb_sp LIMIT {$start_row}, {$limit_per_page}";
        } elseif (isset($_GET['group'])) {
            switch ($_GET['group']) {
                case 1: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N001'";
                    break;

                case 2: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N002'";
                    break;

                case 3: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N003'";
                    break;

                case 4: 
                    $sql_select_prod = "SELECT * FROM $tb_sp WHERE MA_NHOMSP = 'N004'";
                    break;
            }
        } else {
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

            // Img path
            // $IMG_PATH = dirname(__FILE__) . DS . 'public'. DS .'img' . DS . $hinh_sp;
        ?>
        <div class="product-card">
            <div class="img-wrapper">
                <a href="index.php?page=7&&id=<?php echo $ma_sp; ?>">
                    <img src="./../upload/img/<?php echo $hinh_sp; ?>" alt="prod-img">
                </a>
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
                        <!-- <?php $discount = $gia_sp - $gia_sp * .50; ?> -->
                        <?php $discount = $gia_sp ; ?>
                        <span class="discount"><?php echo number_format($discount, 0, '', ','); ?> VNĐ</span>

                        <p class="original">GIÁ: <span><?php echo number_format($gia_sp, 0, '', ','); ?></span> VNĐ</p>
                    </div>

                    <!-- <div class="buy">
                        <a href="index.php?page=7&&id=<?php echo $ma_sp; ?>&&action=add"><i class='bx bx-shopping-bag'></i></a>
                    </div> -->

                    <form action="./pages/cart.php?action=add" method="post">
                        <div class="buy">
                            <!-- <input type="hidden" name="price" value="<?php echo $discount; ?>"> -->
                            <input type="number" name="quantity[<?php echo $ma_sp;?>]" value="1" min="1" class="quantity-box">
                            <button type="submit"><i class='bx bx-shopping-bag'></i></button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>

    <div class="pagination">
        <a class="prev-next" href="index.php?page=3&&pagination=<?php echo $current_page - 1 ?>">prev</a>
        <?php
            for ($i = 1; $i <= $num_of_pages; $i++)
            {
        ?>
            <a href="index.php?page=3&&pagination=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php 
            }
        ?>
        <a class="prev-next" href="index.php?page=3&&pagination=<?php echo $current_page + 1 ?>">next</a>
    </div>
</section>