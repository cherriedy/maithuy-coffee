<?php 
    include_once(realpath(dirname(__FILE__) . '/../../resources/config/config.php'));
    include_once(realpath(dirname(__FILE__) . '/../../resources/database/connect.php'));
    include_once(realpath(dirname(__FILE__) . '/../../resources/database/query.php'));

    $conn = db_connect();
    $tb = $TABLE['sp'];
    $result = db_query($conn, "SELECT * FROM $tb");    
?>

<table>
    <tr>
        <th>MASP</th>
        <th>MASP</th>
        <th>MASP</th>
        <th>MASP</th>
    </tr>

    <?php while($row = db_fetch_assoc($result))
    {
        $product_id = $row['MA_SP'];
        $product_type_id = $row['MA_LOAISP'];
        $product_group_id = $row['MA_NHOMSP'];
        $product_name = $row['TEN_SP'];
        $product_price = $row['GIA_SP'];
        $product_origin = $row['XUATXU'];
    ?>
    <tr>
        <td><?php echo $product_group_id;?></td>
        <td><?php echo $product_type_id;?></td>
        <td><?php echo $product_id;?></td>
        <td><?php echo $product_group_id;?></td>
    </tr>
    <?php
    }
    ?>
</table>