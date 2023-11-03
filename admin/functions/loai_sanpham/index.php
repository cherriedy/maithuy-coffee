<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_lsp = $TABLE['lsp'];
$sql = "SELECT * FROM $tb_lsp";
$result = db_query($conn, $sql);
?>
<div class="table-wrapper">
    <div class="table-header">
        <h2>Danh sách loại sản phẩm</h2>
        <a href="index.php?page=7" class="button">Thêm loại sản phẩm</a>
    </div>
    <div class="table-card">
        <table style="width: 100% !important;">
            <tr>
                <th>Product Type ID</th>
                <th>Product Name</th>
                <th>Options</th>
            </tr>
            <?php
            while ($row = db_fetch_assoc($result)) {
                $product_type_id = $row['MA_LOAISP'];
                $product_type_name = $row['TEN_LOAISP'];
            ?>
                <tr>
                    <td><?php echo $product_type_id; ?></td>
                    <td><?php echo $product_type_name; ?></td>
                    <td class="option">
                        <a href="index.php?page=8&&id=<?php echo $product_type_id; ?>"><i class='bx bxs-edit'></i></a>
                        <a href="index.php?page=9&&id=<?php echo $product_type_id; ?>"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>