<?php
    $conn = db_connect();

    $tb_nsp = $config['table']['nsp'];
    $tb_lsp = $config['table']['lsp'];

    $sql_nsp = "SELECT * FROM $tb_nsp";
    $sql_lsp = "SELECT * FROM $tb_lsp";

    $query_nsp = db_query($conn, $sql_nsp);
    $query_lsp = db_query($conn, $sql_lsp);
?>

<section class="add-pro">
    <h3>Thêm sản phẩm mới</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="select-row">
            <label>Nhóm sản phẩm</label>
            <select name="nsp">
                <?php while ($row = $query_nsp->fetch_assoc()) 
                {
                ?>
                    <option value="<?php echo $row['MA_NHOMSP']; ?>"><?php echo $row['MA_NHOMSP']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="select-row">
            <label>Loại sản phẩm</label>
            <select name="lsp">
                <?php while ($row = $query_lsp->fetch_assoc()) 
                {
                ?>
                    <option value="<?php echo $row['MA_LOAISP']; ?>"><?php echo $row['MA_LOAISP']; ?></option>
                <?php
                }
                ?>
            </select>
        </div>

        <div class="input-row">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" placeholder="MAITHUY1: Arabica Mật Ong">
        </div>

        <div class="input-row">
            <label>Giá sản phẩm</label>
            <input type="text" name="price" placeholder="100.000 (VNĐ)">
        </div>

        <div class="input-row">
            <label>Xuất xứ</label>
            <input type="text" name="madein" placeholder="Việt Nam">
        </div>

        <div class="input-row">
            <label>Ghi chú</label>
            <textarea rows="5" name="note" placeholder="Miêu tả sản phẩm,..."></textarea>
        </div>

        <div class="input-row">
            <label>Hình ảnh</label>
            <input type="file" name="img">
        </div>
        
        <button type="submit">Gửi</button>
    </form>
</section>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once(__DIR__ . '/../../generates/p_id.php');

        $tb_sp = $config['table']['sp'];
        // Select MA_SP of the last record 
        $select_prodID = "SELECT MA_SP FROM $tb_sp ORDER BY MA_SP DESC LIMIT 1";
        $query_prodID = db_query($conn, $select_prodID);
        // Filter number in MA_SP
        $number = (int)filter_var(db_fetch_assoc($query_prodID)['MA_SP'], FILTER_SANITIZE_NUMBER_INT);

        // Default upload image path
        $upload_img_path = '../../../../upload/img/';

        if (isset($_POST['name'])) {
            $msp = generate_prodID($number);
            $lsp = $_POST['lsp'];
            $nsp = $_POST['nsp'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $madein = $_POST['madein'];
            $note = $_POST['note'];
            $img = $_FILES['img']['name'];

            // Upload img into upload/img folder
            move_uploaded_file($_FILES['img']['name'], $upload_img_path);
            
            $table = $config['table']['sp'];
            $insert = "INSERT INTO $table
                       VALUES('$msp', '$lsp', '$nsp', '$name',
                             '$price', '$madein', '$no', '$img')";
            if (db_query($conn, $insert)) {
                db_close($conn);
                header('location: index.php?pid=1');
            }
        }
    }
?>