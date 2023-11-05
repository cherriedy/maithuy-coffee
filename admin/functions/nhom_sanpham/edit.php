<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nsp = $TABLE['nsp'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "SELECT * FROM $tb_nsp WHERE MA_NHOMSP = '$id'";
$row = db_fetch_assoc(db_query($conn, $sql));

$product_group_id = $row['MA_NHOMSP'];
$product_group_name = $row['TEN_NHOMSP'];
?>
<section id="create-form">
    <form action="" method="post" id="create-prod">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Sửa thông tin nhóm sản phẩm</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="id">Mã nhóm sản phẩm</label>
                            <input class="item-input text" type="text" name="id" value="<?php echo $product_group_id; ?>" readonly>
                        </div>

                        <div class="item-element">
                            <label for="name">Tên nhóm sản phẩm</label>
                            <input class="item-input text" type="text" name="name" value="<?php echo $product_group_name; ?>">
                        </div>

                        <button type="submit" name="submit-btn" class="submit-btn">Xác nhận</button>
                    </div>
                </div>
    </form>
</section>

<?php
if (isset($_POST['submit-btn'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];

    $sql = "UPDATE $tb_nsp 
            SET TEN_NHOMSP = '$name'
            WHERE MA_NHOMSP = '$id' ";

    if (db_query($conn, $sql)) {
        echo "<script>window.location.href = 'index.php?page=10'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
        echo $conn->error;
    }

    db_close($conn);
}
?>