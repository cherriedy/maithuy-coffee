<?php
    include_once(__DIR__ . '/../../../../share/database/db_connect.php');
    include_once(__DIR__ . '/../../../../share/database/db_query.php');
    include_once(__DIR__ . '/../../../../../config/config.php');

    $table_sp = $config['table']['sp'];

    if (isset($_POST['btn'])) {
        $ten_lsp = $_POST['lsp'];
        $ten_nsp = $_POST['nsp'];
        $masp = $_POST['masp'];
        $ten_sp = $_POST['name'];
        $gia_sp = $_POST['price'];
        $xuat_xu = $_POST['madein'];
        $ghi_chu = $_POST['note'];

        // Default upload image path
        $upload_img_path = '../../../../upload/img/';
        $hinh_anh = $_FILES['img']['name'];
        // Upload img into upload/img folder
        move_uploaded_file($_FILES['img']['name'], $upload_img_path);

        $sql_update = " UPDATE $table_sp 
                        SET MA_LOAISP = '$ten_lsp',
                            MA_NHOMSP = '$ten_nsp',
                            TEN_SP = '$ten_sp',
                            GIA_SP = '$gia_sp',
                            XUATXU = '$xuat_xu',
                            GHICHU = '$ghi_chu',
                            TEN_HINHSP = '$hinh_anh'
                        WHERE MA_SP = '$masp' ";

        if (db_query($conn, $sql_update)) {
            db_close($conn);
            header('location: index.php?pid=1');
        }
    } 
    else
        echo "isset error"
?>