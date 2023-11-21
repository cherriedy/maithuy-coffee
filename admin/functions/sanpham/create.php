<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_sp = $TABLE['sp'];
$tb_nsp = $TABLE['nsp'];
$tb_lsp = $TABLE['lsp'];

$sql = "SELECT MA_SP 
            FROM $tb_sp 
            ORDER BY MA_SP DESC
            LIMIT 1";

$result = db_fetch_assoc(db_query($conn, $sql))['MA_SP'];
$lastID = (int)filter_var($result, FILTER_SANITIZE_NUMBER_INT);

function generateID($lastID) {
    $newID = $lastID + 1;
    if ($newID >= 0 && $newID < 10) {
        return 'SP' . '00' . $newID;
    }

    if ($newID >= 10 && $newID < 100) {
        return 'SP' . '0' . $newID;
    }
}
?>
<section id="create-form">
    <form action="" method="post" id="create-prod" enctype="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Thông tin sản phẩm</h5>
                    <div class="card-body__items">
                        <input type="hidden" name="id" value="<?php echo generateID($lastID); ?>">

                        <div class="item-element">
                            <label for="name">Tên sản phẩm</label>
                            <input class="item-input text" type="text" name="name" placeholder="Tên sản phẩm">
                        </div>

                        <div class="item-element">
                            <label for="group">Nhóm sản phẩm</label>
                            <select class="item-input select" name="group">
                                <?php
                                $sql = "SELECT DISTINCT TEN_NHOMSP , $tb_sp.MA_NHOMSP
                                        FROM $tb_sp INNER JOIN $tb_nsp ON $tb_sp.MA_NHOMSP = $tb_nsp.MA_NHOMSP";
                                $result = db_query($conn, $sql);
                                while ($row = db_fetch_assoc($result)) {
                                    $ma_nsp = $row['MA_NHOMSP'];
                                    $ten_nsp = $row['TEN_NHOMSP'];
                                ?>
                                    <option value="<?php echo $ma_nsp; ?>"><?php echo $ten_nsp; ?></option>
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
                                while ($row = db_fetch_assoc($result)) {
                                    $ma_lsp = $row['MA_LOAISP'];
                                    $ten_lsp = $row['TEN_LOAISP'];
                                ?>
                                    <option value="<?php echo $ma_lsp; ?>"><?php echo $ten_lsp; ?></option>
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
                            <input class="item-input text" type="text" name="origin" placeholder="Xuất xứ">
                        </div>

                        <div class="item-element">
                            <label for="price">Giá</label>
                            <input class="item-input text" type="text" name="price" placeholder="Giá sản phẩm">
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
                                    <textarea id="tiny" name="des" placeholder="Nhập thông tin sản phẩm"></textarea>
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
                            <input class="item-input file" type="file" name="image">
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
    // $img_folder_path = "/../../../upload/img/";
    $img_folder_path = dirname(__FILE__) . '/../../../upload/img/';
    $img_upload_path = $img_folder_path . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $img_upload_path);

    // echo "<pre>";
    // var_dump($img_folder_path);
    // var_dump($img_upload_path);
    // echo "</pre>";exit;

    $prodid = $_POST['id'];
    $name = $_POST['name'];
    $groupid = $_POST['group'];
    $typeid = $_POST['type'];
    $origin = $_POST['origin'];
    $price = $_POST['price'];
    $des = $_POST['des'];
    $img = $_FILES['image']['name'];

    $sql = "INSERT INTO $tb_sp 
                VALUES('$prodid', '$typeid', '$groupid', '$name', '$price', '$origin', '$des', '$img')";

    if (db_query($conn, $sql)) {
        // echo "<script>alert('success')</script>";
        echo "<script>window.location.href = 'index.php?page=2'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
    }

    db_close($conn);
}
?>