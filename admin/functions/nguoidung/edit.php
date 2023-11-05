<?php
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nd = $TABLE['nd'];
$tb_cv = $TABLE['cv'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$result = db_query($conn, "SELECT * FROM $tb_nd WHERE MA_ND = '$id'");
$row = db_fetch_assoc($result);

$userID = $row['MA_ND'];
$userName =  $row['TEN_ND'];
$userPhone = $row['SDT'];
$userEmail = $row['EMAIL'];

?>
<section id="create-form">
    <form action="" method="post" id="create-prod" enctype="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Sửa thông tin người dùng</h5>
                    <div class="card-body__items">
                        <div class="item-element">
                            <label for="id">Mã người dùng</label>
                            <input class="item-input text" type="text" name="id" value="<?php echo $userID; ?>" readonly>
                        </div>

                        <div class="item-element">
                            <label for="type">Chức vụ</label>
                            <select class="item-input select" name="type" id="">
                                <?php
                                $sql = "SELECT DISTINCT TEN_CV , $tb_nd.MA_CV
                                        FROM $tb_nd INNER JOIN $tb_cv ON $tb_nd.MA_CV = $tb_cv.MA_CV";
                                $result = db_query($conn, $sql);
                                while ($row = db_fetch_assoc($result)) {
                                    $ma_cv = $row['MA_CV'];
                                    $ten_cv = $row['TEN_CV'];
                                ?>
                                    <option value="<?php echo $ma_cv; ?>"><?php echo $ten_cv; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="item-element">
                            <label for="username">Tên người dùng</label>
                            <input class="item-input text" type="text" name="username" value="<?php echo $userName; ?>">
                        </div>

                        <div class="item-element">
                            <label for="phone">Số điện thoại</label>
                            <input class="item-input text" type="tel" name="phone" value="<?php echo $userPhone; ?>">
                        </div>

                        <div class="item-element">
                            <label for="email">Email</label>
                            <input class="item-input text" type="email" name="email" value="<?php echo $userEmail; ?>">
                        </div>

                        <!-- <div class="item-element">
                            <label for="password">Password</label>
                            <input class="item-input text" type="text" name="password" placeholder="Nhập password">
                        </div> -->
                    </div>
                </div>

                <button type="submit" name="submit-btn" class="submit-btn">Xác nhận</button>
            </div>
        </div>
    </form>
</section>

<?php
if (isset($_POST['submit-btn'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "UPDATE $tb_nd 
            SET TEN_ND  = '$username',
                MA_CV   = '$type',
                EMAIL   = '$email',
                SDT     = '$phone'
            WHERE MA_ND = '$id' ";


    if (db_query($conn, $sql)) {
        // echo "<script>alert('success')</script>";
        echo "<script>window.location.href = 'index.php?page=14'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
    }

    db_close($conn);
}
?>