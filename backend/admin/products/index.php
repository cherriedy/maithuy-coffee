<?php
    $conn = db_connect();
    // Get Product Database
    $tb_sp = $config['table']['sp'];
    $sql_sp = "SELECT * FROM $tb_sp";
    $query_sp = db_query($conn, $sql_sp);
?>

<section class="product">
    <table border="1" style="text-align: center; width: 100%; padding: 40px 80px;">
        <tr>
            <th>MA SP</th>
            <th>MA LOAISP</th>
            <th>MA NHOMSP</th>
            <th>TEN SP</th>
            <th>GIA SP</th>
            <th>XUAT XU</th>
            <th>HINH ANH</th>
            <th>Chức Năng</th>
        </tr>

        <?php 
        while ($row = db_fetch_assoc($query_sp)) {
        ?>
        <tr>
            <td><?php echo $row['MA_SP']; ?></td>
            <td><?php echo $row['MA_LOAISP']; ?></td>
            <td><?php echo $row['MA_NHOMSP']; ?></td>
            <td><?php echo $row['TEN_SP']; ?></td>
            <td><?php echo $row['GIA_SP']; ?></td>
            <td><?php echo $row['XUATXU']; ?></td>
            <td><?php echo $row['TEN_HINHSP']; ?></td>
            <td>
                <a href="index.php?pid=5&&product_id=<?php echo $row['MA_SP']; ?>">Sửa</a>
                <a href="index.php?pid=6&&product_id=<?php echo $row['MA_SP']; ?>">Xoá</a>
            </td>
        </tr>
        <?php 
        } 
        ?>

        <tr>
            <td colspan="8"><a href="index.php?pid=4">Thêm mới</a></td>
        </tr>
    </table>
</section>