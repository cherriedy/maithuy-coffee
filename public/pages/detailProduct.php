<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$tb_sp = $TABLE['sp'];
$tb_lsp = $TABLE['lsp'];
$tb_nsp = $TABLE['nsp'];

$conn = db_connect();
$sql = "SELECT * FROM $tb_sp WHERE MA_SP = '$id'";
$result = db_query($conn, $sql);
$row = db_fetch_assoc($result);

// echo "<pre>";
// var_dump($row); exit;
// echo "</pre>";

$ma_sp = $row['MA_SP'];
$ma_lsp = $row['MA_LOAISP'];
$ma_nsp = $row['MA_NHOMSP'];
$ten_sp = $row['TEN_SP'];
$gia_sp = $row['GIA_SP'];
$xuat_xu = $row['XUATXU'];
$ghi_chu = $row['GHICHU'];
$hinh_sp = $row['TEN_HINHSP'];

$sql_select_ten_nsp = "SELECT TEN_NHOMSP FROM $tb_nsp WHERE MA_NHOMSP = '$ma_nsp'";
$sql_select_ten_lsp = "SELECT TEN_LOAISP FROM $tb_lsp WHERE MA_LOAISP = '$ma_lsp'";

$ten_nsp = db_fetch_assoc(db_query($conn, $sql_select_ten_nsp))['TEN_NHOMSP'];
$ten_lsp = db_fetch_assoc(db_query($conn, $sql_select_ten_lsp))['TEN_LOAISP'];

?>
<form action="./pages/cart.php?action=add" method="post">
    <div class="dProd-section">
        <div class="m-auto">
            <div class="dProd-card">
                <!--  -->
                <div class="img-wrapper">
                    <img src="./../upload/img/<?php echo $hinh_sp; ?>" alt="prod-img" class="lg-dProd">
                </div>
                <!--  -->
                <div class="dProd-detail">
                    <div class="dProd-detail__title">
                        <div class="dProd-detail__tags">
                            <span class="tag green"><?php echo $ten_nsp; ?></span>
                            <span class="tag blue"><?php echo $ten_lsp; ?></span>
                        </div>
                        <!--  -->
                        <div class="dProd-detail__brand">
                            <span>MAITHUY COFFEE</span>
                        </div>
                        <!--  -->
                        <h1><?php echo $ten_sp; ?></h1>
                        <!--  -->
                        <div class="dProd-detail__stars-reviews">
                            <span class="star-items" <p></p>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </span>
                            <!--  -->
                            <span class="reviews">
                                (120 reviews)
                            </span>
                        </div>
                    </div>
                    <!--  -->
                    <div class="dProd-detail__price">
                        <div class="price__original">
                            <span><?php echo number_format($gia_sp, 0, '', ','); ?> VNĐ</span>
                        </div>
                        <!--  -->
                        <div class="price__discount-off">
                            <span class="discount"><?php echo number_format($gia_sp, 0, '', ','); ?> VNĐ</span>
                            <span class="off">(0% Off)</span>
                        </div>
                    </div>
                    <!--  -->
                    <div class="dProd-detail__des">
                        <p>
                            <?php echo $ghi_chu; ?>
                        </p>
                    </div>
                    <!--  -->
                    <div class="dProd-detail__quantity">
                        <span class="title">Số Lượng</span>
                        <!--  -->
                        <div class="input-box">
                            <input type="number" name="quantity[<?php echo $ma_sp; ?>]" min="1" value="1" step="1">
                        </div>
                    </div>
                    <!--  -->
                    <div class="dProd-detail__buy">
                        <button type="submit" name="buyClick" class="btn">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>