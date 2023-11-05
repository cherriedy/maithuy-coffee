<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_cv = $TABLE['cv'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "SELECT * FROM $tb_cv WHERE MA_CV = '$id'";
$row = db_fetch_assoc(db_query($conn, $sql));

$product_type_id = $row['MA_CV'];
$product_type_name = $row['TEN_CV'];
?>
<section id="create-form">
    <form action="" method="post" id="create-prod">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Sửa thông tin chức vụ</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="id">Mã chức vụ</label>
                            <input class="item-input text" type="text" name="id" value="<?php echo $product_type_id; ?>" readonly>
                        </div>

                        <div class="item-element">
                            <label for="name">Tên chức vụ</label>
                            <input class="item-input text" type="text" name="name" value="<?php echo $product_type_name; ?>">
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

    $sql = "UPDATE $tb_cv 
            SET TEN_CV = '$name'
            WHERE MA_CV = '$id' ";

    if (db_query($conn, $sql)) {
        echo "<script>window.location.href = 'index.php?page=18'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
        echo $conn->error;
    }

    db_close($conn);
}
?>