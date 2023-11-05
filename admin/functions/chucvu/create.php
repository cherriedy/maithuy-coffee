<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_cv = $TABLE['cv'];

?>
<section id="create-form">
    <form action="" method="post" id="create-prod" enctype="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Thông tin chức vụ</h5>
                    <div class="card-body__items">

                    <div class="item-element">
                        <label for="id">Mã chức vụ</label>
                        <input class="item-input text" type="text" name="id" placeholder="Mã chức vụ">
                    </div>
                        <div class="item-element">
                            <label for="name">Tên chức vụ</label>
                            <input class="item-input text" type="text" name="name" placeholder="Tên chức vụ">
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

    $typeid = $_POST['id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO $tb_cv 
                VALUES('$typeid', '$name')";

    if (db_query($conn, $sql)) {
        // echo "<script>alert('success')</script>";
        echo "<script>window.location.href = 'index.php?page=18'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
    }

    db_close($conn);
}
?>