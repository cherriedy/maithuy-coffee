<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nsp = $TABLE['nsp'];
$sql = "SELECT * FROM $tb_nsp";
$result = db_query($conn, $sql);
?>
<div class="table-wrapper">
    <div class="table-header">
        <h2>Danh sách nhóm sản phẩm</h2>
        <a href="index.php?page=11" class="button">Thêm nhóm sản phẩm</a>
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
                $product_type_id = $row['MA_NHOMSP'];
                $product_type_name = $row['TEN_NHOMSP'];
            ?>
                <tr>
                    <td><?php echo $product_type_id; ?></td>
                    <td><?php echo $product_type_name; ?></td>
                    <td class="option">
                        <a href="index.php?page=12&&id=<?php echo $product_type_id; ?>"><i class='bx bxs-edit'></i></a>
                        <a href="index.php?page=13&&id=<?php echo $product_type_id; ?>"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>