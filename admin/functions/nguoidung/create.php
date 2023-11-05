<?php 
include_once(realpath(dirname(__FILE__) . './../../../resources/config/config.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/connect.php'));
include_once(realpath(dirname(__FILE__) . './../../../resources/database/query.php'));

$conn = db_connect();

$tb_nd = $TABLE['nd'];
$tb_cv = $TABLE['cv'];

$sql = "SELECT MA_ND 
            FROM $tb_nd 
            ORDER BY MA_ND DESC
            LIMIT 1";

$result = db_fetch_assoc(db_query($conn, $sql))['MA_ND'];
$lastID = (int)filter_var($result, FILTER_SANITIZE_NUMBER_INT);

function generateID($lastID)
{
    $newID = $lastID + 1;
    if ($newID >= 0 && $newID < 10) {
        return 'QL' . '00' . $newID;
    }

    if ($newID >= 10 && $newID < 100) {
        return 'QL' . '0' . $newID;
    }
}
?>
<section id="create-form">
    <form action="" method="post" id="create-prod" enctype="multipart/form-data">
        <div class="main-wrapper">
            <div class="card-wrapper">
                <div class="card-body">
                    <h5>Thông tin người dùng</h5>
                    <div class="card-body__items">
                        <input type="hidden" name="id" value="<?php echo generateID($lastID); ?>">

                        <div class="item-element">
                            <label for="name">Tên người dùng</label>
                            <input class="item-input text" type="text" name="name" placeholder="Tên người dùng">
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
                            <input class="item-input text" type="text" name="username">
                        </div>

                        <div class="item-element">
                            <label for="phone">Số điện thoại</label>
                            <input class="item-input text" type="tel" name="phone" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="item-element">
                            <label for="email">Email</label>
                            <input class="item-input text" type="email" name="email" placeholder="Nhập email">
                        </div>

                        <div class="item-element">
                            <label for="password">Password</label>
                            <input class="item-input text" type="text" name="password" placeholder="Nhập password">
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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO $tb_nd 
                VALUES('$id', '$type', '$username', '$password', '$email', '$phone')";

    if (db_query($conn, $sql)) {
        // echo "<script>alert('success')</script>";
        echo "<script>window.location.href = 'index.php?page=14'</script>";
    } else {
        // echo "<script>alert('fail !')</script>" ;
    }

    db_close($conn);
}
?>