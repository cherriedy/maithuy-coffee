<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nd = $TABLE['nd'];
$sql = "SELECT * FROM $tb_nd";
$result = db_query($conn, $sql);
?>
<div class="table-wrapper">
    <div class="table-header">
        <h2>Danh sách người dùng</h2>
        <a href="index.php?page=15" class="button">Thêm người dùng</a>
    </div>
    <div class="table-card">
        <table>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Options</th>
            </tr>
            <?php
            while ($row = db_fetch_assoc($result)) {
                $userID = $row['MA_ND'];
                $userName = $row['TEN_ND'];
                $userPhone = $row['SDT'];
                $userEmail = $row['EMAIL'];
                $password = $row['MK_ND'];
            ?>
                <tr>
                    <td><?php echo $userID; ?></td>
                    <td><?php echo $userName; ?></td>
                    <td><?php echo $userPhone; ?></td>
                    <td><?php echo $userEmail; ?></td>
                    <td><?php echo $password; ?></td>
                    <td class="option">
                        <a href="index.php?page=16&&id=<?php echo $userID; ?>"><i class='bx bxs-edit'></i></a>
                        <a href="index.php?page=17&&id=<?php echo $userID; ?>"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>