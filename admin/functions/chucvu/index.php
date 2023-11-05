<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_cv = $TABLE['cv'];
$sql = "SELECT * FROM $tb_cv";
$result = db_query($conn, $sql);
?>
<div class="table-wrapper">
    <div class="table-header">
        <h2>Danh sách chức vụ</h2>
        <a href="index.php?page=19" class="button">Thêm chức vụ</a>
    </div>
    <div class="table-card">
        <table style="width: 100% !important;">
            <tr>
                <th>role Type ID</th>
                <th>role Name</th>
                <th>Options</th>
            </tr>
            <?php
            while ($row = db_fetch_assoc($result)) {
                $role_type_id = $row['MA_CV'];
                $role_type_name = $row['TEN_CV'];
            ?>
                <tr>
                    <td><?php echo $role_type_id; ?></td>
                    <td><?php echo $role_type_name; ?></td>
                    <td class="option">
                        <a href="index.php?page=20&&id=<?php echo $role_type_id; ?>"><i class='bx bxs-edit'></i></a>
                        <a href="index.php?page=21&&id=<?php echo $role_type_id; ?>"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>