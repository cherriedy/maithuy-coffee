<?php
    if (isset($_GET['product_id'])) {
        $masp = $_GET['product_id'];
        $conn = db_connect();

        $table_sp = $config['table']['sp'];
        $table_nsp = $config['table']['nsp'];
        $table_lsp = $config['table']['lsp'];

        $sql_select = "SELECT * FROM $table_sp WHERE MA_SP = '$masp' ";

        $query_sp = db_query($conn, $sql_select);
    }
?>

<section class="add-pro">
    <h3>Sửa sản phẩm</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        // Fetch data from db
        $row = db_fetch_assoc($query_sp);
        // 
        $ten_lsp = $row['MA_LOAISP'];
        $ten_nsp = $row['MA_NHOMSP'];
        $ten_sp = $row['TEN_SP'];
        $gia_sp = $row['GIA_SP'];
        $xuat_xu = $row['XUATXU'];
        $ghi_chu = $row['GHICHU'];
        $hinh_anh = $row['TEN_HINHSP'];
        ?>

            <div class="input-row">
                <label>Nhóm sản phẩm</label>
                <select name="nsp">
                    <option value="<?php echo $ten_lsp; ?>">123</option>
                </select>
            </div>

            <div class="select-row">
                <label>Loại sản phẩm</label>
                <select name="lsp">
                    <option value="<?php echo $ten_nsp; ?>">123</option>
                </select>
            </div>

            <div class="input-row">
                <label>Mã sản phẩm</label>
                <input type="text" name="masp" value="<?php echo $masp; ?>" >
            </div>

            <div class="input-row">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" value="<?php echo $ten_sp; ?>">
            </div>

            <div class="input-row">
                <label>Giá sản phẩm</label>
                <input type="text" name="price" value="<?php echo $gia_sp; ?>">
            </div>

            <div class="input-row">
                <label>Xuất xứ</label>
                <input type="text" name="madein" value="<?php echo $xuat_xu; ?>">
            </div>

            <div class="input-row">
                <label>Ghi chú</label>
                <textarea rows="5" name="note"><?php echo $ghi_chu; ?></textarea>
            </div>

            <div class="input-row">
                <label>Hình ảnh</label>
                <input type="file" name="img" value="<?php echo $hinh_anh; ?>">
            </div>

            <button type="submit" name="btn">Gửi</button>

    </form>
</section>
