<!-- <section id="content-wrapper"> -->
    <div class="table-wrapper">
        <div class="table-header">
            <h2>Danh sách sản phẩm</h2>
            <a href="#" class="button">Thêm sản phẩm</a>
        </div>
        <div class="table-card">
            <?php 
        $conn = new mysqli('localhost', 'root', '', 'ban_hang_ca_phe_nhom_4_k16');
        $sql_select_all = "SELECT * FROM danhsach_sanpham";
        $sql_query_result = $conn->query($sql_select_all);
        ?>
            <table>
                <tr class="odd">
                    <th>Product ID</th>
                    <th>Product Type ID</th>
                    <th>Product Group ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Origin</th>
                    <th>Options</th>
                </tr>
                <?php
        // Get number to add class to tr
        $tr_nums = 0;
        // Get data from database
        while ($row = $sql_query_result->fetch_assoc())
        {
            $product_id = $row['MA_SP'];
            $product_type_id = $row['MA_LOAISP'];
            $product_group_id = $row['MA_NHOMSP'];
            $product_name = $row['TEN_SP'];
            $product_price = $row['GIA_SP'];
            $product_origin = $row['XUATXU'];

            $class = ($tr_nums % 2 == 0) ? 'even' : 'odd';
        ?>
                <tr class="<?php echo $class; ++$tr_nums; ?>">
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $product_type_id; ?></td>
                    <td><?php echo $product_group_id; ?></td>
                    <td><?php echo $product_name; ?></td>
                    <td style="font-weight: 700;"><?php echo number_format($product_price, 0, '', ',') . ' VNĐ'; ?></td>
                    <td><?php echo $product_origin; ?></td>
                    <td class="option">
                        <a href="#"><i class='bx bxs-edit'></i></a>
                        <a href="#"><i class='bx bx-trash'></i></a>
                    </td>
                </tr>
                <?php
        }
        ?>
            </table>
        </div>
    </div>
<!-- </section> -->