<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nsp = $TABLE['nsp'];

$sql = "SELECT MA_NHOMSP 
            FROM $tb_nsp 
            ORDER BY MA_NHOMSP DESC
            LIMIT 1";

$result = db_fetch_assoc(db_query($conn, $sql))['MA_NHOMSP'];
$lastID = (int)filter_var($result, FILTER_SANITIZE_NUMBER_INT);

function generateID($lastID)
{
    $newID = $lastID + 1;
    if ($newID >= 0 && $newID < 10) {
        return 'N' . '00' . $newID;
    }

    if ($newID >= 10 && $newID < 100) {
        return 'N' . '0' . $newID;
    }
}
?>
<section id="create-form">
    <form action="" method="post" id="create-prod" encgroup="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Thông tin nhóm sản phẩm</h5>
                    <div class="card-body__items">
                        <input type="hidden" name="id" value="<?php echo generateID($lastID); ?>">

                        <div class="item-element">
                            <label for="name">Tên nhóm sản phẩm</label>
                            <input class="item-input text" type="text" name="name" placeholder="Tên nhóm sản phẩm">
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

    $groupid = $_POST['id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO $tb_nsp 
                VALUES('$groupid', '$name')";

    if (db_query($conn, $sql)) {
        // echo "<script>alert('success')</script>";
        echo "<script>window.location.href = 'index.php?page=10'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
    }

    db_close($conn);
}
?>