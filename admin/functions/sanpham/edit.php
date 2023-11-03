<?php 
    include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
    include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
    include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

    $conn = db_connect(); 

    $tb_sp = $TABLE['sp'];
    $tb_nsp = $TABLE['nsp'];
    $tb_lsp = $TABLE['lsp'];

    // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
    // } s

    $sql = "SELECT * FROM $tb_sp WHERE MA_SP = '$id'";
    $row = db_fetch_assoc(db_query($conn, $sql));

    $product_id = $row['MA_SP'];
    $product_type_id = $row['MA_LOAISP'];
    $product_group_id = $row['MA_NHOMSP'];
    $product_name = $row['TEN_SP'];
    $product_price = $row['GIA_SP'];
    $product_origin = $row['XUATXU'];
    $product_des = $row['GHICHU'];
    $product_img = $row['TEN_HINHSP'];
?>
<section id="create-form">
    <form action="" method="post" id="create-prod" enctype="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Sửa thông tin sản phẩm</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="id">Mã sản phẩm</label>
                            <input class="item-input text" type="text" name="id" value="<?php echo $product_id; ?>" readonly>
                        </div>

                        <div class="item-element">
                            <label for="name">Tên sản phẩm</label>
                            <input class="item-input text" type="text" name="name" value="<?php echo $product_name; ?>">
                        </div>

                        <div class="item-element">
                            <label for="group">Nhóm sản phẩm</label>
                            <select class="item-input select" name="group">
                            <?php 
                                $sql = "SELECT DISTINCT TEN_NHOMSP , $tb_sp.MA_NHOMSP
                                        FROM $tb_sp INNER JOIN $tb_nsp ON $tb_sp.MA_NHOMSP = $tb_nsp.MA_NHOMSP";
                                $result = db_query($conn, $sql);
                                while ($row = db_fetch_assoc($result))
                                {
                                    $ma_nsp = $row['MA_NHOMSP'];
                                    $ten_nsp = $row['TEN_NHOMSP'];
                            ?>
                                <option value="<?php echo $ma_nsp ; ?>"><?php echo $ten_nsp; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>

                        <div class="item-element">
                            <label for="type">Loại sản phẩm</label>
                            <select class="item-input select" name="type" id="">
                            <?php 
                                $sql = "SELECT DISTINCT TEN_LOAISP , $tb_sp.MA_LOAISP
                                        FROM $tb_sp INNER JOIN $tb_lsp ON $tb_sp.MA_LOAISP = $tb_lsp.MA_LOAISP";
                                $result = db_query($conn, $sql);
                                while ($row = db_fetch_assoc($result))
                                {
                                    $ma_lsp = $row['MA_LOAISP'];
                                    $ten_lsp = $row['TEN_LOAISP'];
                            ?>
                                <option value="<?php echo $ma_lsp ; ?>"><?php echo $ten_lsp; ?></option>
                            <?php
                            }
                            ?>
                            </select>
                        </div>

                        <div class="item-element">
                            <label for="brand">Thương hiệu</label>
                            <select class="item-input select" name="brand" id="">
                                <option>MAITHUY COFFEE</option>
                            </select>
                        </div>

                        <div class="item-element">
                            <label for="origin">Xuất xứ</label>
                            <input class="item-input text" type="text" name="origin" value="<?php echo $product_origin; ?>">
                        </div>

                        <div class="item-element">
                            <label for="price">Giá</label>
                            <input class="item-input text" type="text" name="price" value="<?php echo $product_price; ?>">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Mô tả</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="des">Mô tả sản phẩm</label>
                            <div class="text-wrap">
                                <div>
                                    <textarea id="tiny" name="des"><?php echo $product_des; ?></textarea>
                                </div>
                                <script>
                                    $('textarea#tiny').tinymce({
                                        height: 500,
                                        menubar: false,
                                        plugins: [
                                            'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink',
                                            'checklist', 'export',
                                            'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
                                            'searchreplace', 'visualblocks',
                                            'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime',
                                            'media', 'table', 'help', 'wordcount'
                                        ],
                                        toolbar: 'undo redo | a11ycheck casechange blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist checklist outdent indent | removeformat | code table help'
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <h5>Hình ảnh sản phẩm</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="img">Hình ảnh</label>
                            <input class="item-input file" type="file" name="image" value="<?php echo $product_img; ?>">
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit-btn" class="submit-btn">Xác nhận</button>
            </div>
        </div>
    </form>
</section>

<?php
    if (isset($_POST['submit-btn'])) {
        $img_folder_path = realpath(dirname(__FILE__) . '/../../../upload/img/');
        $img_name = $img_folder_path . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $img_name);

        $prodid = $_POST['id'];
        $name = $_POST['name'];
        $groupid = $_POST['group'];
        $typeid = $_POST['type'];
        $origin = $_POST['origin'];
        $price = $_POST['price'];
        $des = $_POST['des'];
        $img = $_FILES['image']['name'];

        $sql = "UPDATE $tb_sp 
                SET MA_LOAISP = '$typeid',
                    MA_NHOMSP = '$groupid',
                    TEN_SP = '$name',
                    GIA_SP = '$price',
                    XUATXU = '$origin',
                    GHICHU = '$des',
                    TEN_HINHSP = '$img'
                WHERE MA_SP = '$id'";

        if (db_query($conn, $sql)) {
            echo "<script>window.location.href = 'index.php?page=2'</script>";
        }
        else {
            // echo "<script>alert('fail !')</script>" ;
            echo $conn->error;
        }

        db_close($conn);
    }
?>