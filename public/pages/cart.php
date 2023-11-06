<?php
include_once realpath(dirname(__FILE__) . '/../../resources/config/config.php');
include_once realpath(dirname(__FILE__) . '/../../resources/database/connect.php');
include_once realpath(dirname(__FILE__) . '/../../resources/database/query.php');

session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}


$tb_sp = $TABLE['sp'];
$tb_lsp = $TABLE['lsp'];
$tb_nsp = $TABLE['nsp'];
$tb_hd = $TABLE['hd'];
$tb_cthd = $TABLE['cthd'];

$conn = db_connect();

function get_quantity($action = 'add') {
    if($action == 'add') {
        foreach($_POST['quantity'] as $id => $quantity) {
            // Get quantity for each product
            $_SESSION['cart'][$id] += $quantity;
            // Get total quanity
            $_SESSION['cart']['total'] += $quantity;
        }
    } elseif ($action == 'submit') {
        if (isset($_POST['updateBtn'])) {
            $var_temp = 0;
            foreach($_POST['quantity'] as $id => $quantity) {
                if ($quantity == 0) {
                    // If quantity equals to 0 ==> delete old quantity in total
                    $_SESSION['cart']['total'] -= $_SESSION['cart'][$id];
                    // Unset to delete from cart
                    unset($_SESSION['cart'][$id]);
                }
                else {
                    $_SESSION['cart'][$id] = $quantity;
                    $var_temp += $quantity;
                }
            }
            // Update cart total quantity
            $_SESSION['cart']['total'] = $var_temp;
        }
    } elseif ($action = 'delete') {
        // If the product is deleted 
        // ==> delete its quantity from total
        $_SESSION['cart']['total'] -= $_SESSION['cart'][$_GET['id']];
    }
}

function get_implode($array_keys) {
    $array_keys = array_map(function($key) {return "\"$key\"";}, $array_keys);
    return implode(',', $array_keys);
}

function generateID($conn, $table, $column, $id) {
    $sql = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
    $result = db_fetch_assoc(db_query($conn, $sql))[$column];
    $lastID = (int)filter_var($result, FILTER_SANITIZE_NUMBER_INT);

    $newID = $lastID + 1;

    if ($newID >= 0 && $newID < 10) {
        return $id . '00' . $newID;
    }

    if ($newID >= 10 && $newID < 100) {
        return $id . '0' . $newID;
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            get_quantity($_GET['action']);
            header('location: cart.php');
            break;

        case 'delete':
            get_quantity($_GET['action']);
            if(isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            header('location: cart.php');
            break;
        
        case 'submit':
            // If user click checkout button
            if (isset($_POST['checkoutBtn'])) {
                // Variable to store error message
                $error = "";

                if ($_SESSION['cart']['total'] == 0) {
                    $error .= "Giỏ hàng rỗng"; 
                } else {
                    if (empty($_POST['name'])) {
                        $error .= "Vui lòng nhập họ và tên\\n";
                    }
                    if (empty($_POST['email'])) {
                        $error .= "Vui lòng email liên hệ\\n";
                    }
                    if (empty($_POST['phone'])) {
                        $error .= "Vui lòng số điện thoại\\n";
                    } 
                    if (empty($_POST['address'])) {
                        $error .= "Vui lòng địa chỉ nhận hàng\\n";
                    } 
                }
               
                // Proccesing cart
                if ($error == "" && $_SESSION['cart']['total'] > 0) {
                    $result = db_query($conn, "SELECT * FROM $tb_sp WHERE `MA_SP` IN (".get_implode(array_keys($_SESSION['cart'])).")");
                    // Variable to store total money to insert into database
                    $total_money = 0;
                    // Order's ID
                    $orderID = generateID($conn, $tb_hd, 'MA_HD', 'HD');

                    // Calculate total money
                    // Get all rows of query statement 
                    while ($row = db_fetch_assoc($result)) {
                        $total_money += $row['GIA_SP'] * $_POST['quantity'][$row['MA_SP']];
                        $orderProducts[] = $row;
                    }

                    // Variable to store each orderProduct insert statement 
                    $insertProductString = "";
                    foreach ($orderProducts as $key => $orderProduct) {
                        $productID = $orderProduct['MA_SP'];
                        $productQuantity = $_POST['quantity'][$productID];
                        $productPrice = $productQuantity * $orderProduct['GIA_SP'];

                        $insertProductString .= "(NULL, '$orderID', '$productID' , $productQuantity, $productPrice)";
                        if ($key != count($orderProducts) - 1) {
                            $insertProductString .= ', ';
                        }
                    }

                    // Customer's name
                    $name = $_POST['name'];
                    // Customer's email
                    $email = $_POST['email'];
                    // Customer's phone
                    $phone  = $_POST['phone'];
                    // Customer's address
                    $address = $_POST['address'];

                    // Insert order into danhsach_hoadon
                    $insertOrder = db_query($conn, "INSERT INTO $tb_hd VALUES('$orderID', '$name', '$email', '$phone', '$address', '$total_money', ' ')");
                    // Insert product(s) into chitiet_hoadon
                    $insertDetailOrder = db_query($conn, "INSERT INTO $tb_cthd VALUES $insertProductString");
                    // If insert successfuly ==> delete product in cart
                    if ($insertOrder && $insertDetailOrder) {
                        foreach (array_keys($_POST['quantity']) as $id) {
                            unset($_SESSION['cart'][$id]);
                            $_SESSION['cart']['total'] = 0;
                        }
                        echo "<script>
                                alert('Đặt hàng thành công');
                                window.location.href = 'cart.php';
                              </script>";
                        // header('location: cart.php');
                    }
            } 
            
        } else {
            // If user click update button
            get_quantity($_GET['action']);
        }
        break;
    }
}

$sql = "SELECT * FROM $tb_sp WHERE `MA_SP` IN (".get_implode(array_keys($_SESSION['cart'])).")";
        // WHERE `MA_SP` IN (".implode(',', $keys_with_quotes).")";
$result = db_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./../css/style.css">
    
</head>

<body>
    <div class="cart-checkout">
        <form action="cart.php?action=submit" method="post" id="basic-info" autocomplete="on">
            <div class="m-wrapper">
                <div class="cc-body">
                    <div class="cart-side">
                        <div class="cart-header">
                            <a href="./../index.php?page=3">
                                <i class='bx bx-arrow-back'></i>
                                <span>Tiếp tục mua hàng</span>
                            </a>
                            <button type="submit" name="updateBtn" class="btn">Cập nhật</button>
                        </div>
                        
                        <div class="horizontal-line"></div>

                        <div class="cart-content">
                            <div class="product-items">
                                <?php 
                                // Initialize total money with 0
                                $total_money = 0;
                                if (!empty($result)) {
                                    while ($row = db_fetch_assoc($result)) 
                                    {
                                        $ma_sp = $row['MA_SP'];
                                        $ma_lsp = $row['MA_LOAISP'];
                                        $ma_nsp = $row['MA_NHOMSP'];
                                        $ten_sp = $row['TEN_SP'];
                                        $gia_sp = $row['GIA_SP'];
                                        $hinh_sp = $row['TEN_HINHSP'];

                                        $sql_select_ten_nsp = "SELECT TEN_NHOMSP FROM $tb_nsp WHERE MA_NHOMSP = '$ma_nsp'";
                                        $sql_select_ten_lsp = "SELECT TEN_LOAISP FROM $tb_lsp WHERE MA_LOAISP = '$ma_lsp'";

                                        $ten_nsp = db_fetch_assoc(db_query($conn, $sql_select_ten_nsp))['TEN_NHOMSP'];
                                        $ten_lsp = db_fetch_assoc(db_query($conn, $sql_select_ten_lsp))['TEN_LOAISP'];
                                ?>
                                <div class="item-card">
                                    <div class="img-wrapper">
                                        <img src="./../../upload/img/<?php echo $hinh_sp ?>" alt="prod-img">
                                    </div>

                                    <div class="detail-info">
                                        <div class="attr">
                                            <span class="type"><?php echo $ten_lsp; ?></span>
                                            <span class="group"><?php echo $ten_nsp; ?></span>
                                        </div>
                                        <span class="name"><?php echo $ten_sp ; ?></span>
                                    </div>

                                    <div class="quantity">
                                        <input type="number" name="quantity[<?php echo $ma_sp; ?>]"
                                            class="input-box quantity" min="0" value="<?php echo $_SESSION['cart'][$ma_sp];?>">
                                    </div>

                                    <div class="price">
                                        <span class="price">
                                            <?php echo number_format($gia_sp * $_SESSION['cart'][$ma_sp], 0, '', ','); ?> đ
                                        </span>
                                    </div>

                                    <div class="action">
                                        <div class="remove">
                                            <a href="cart.php?action=delete&&id=<?php echo $ma_sp ; ?>"><i class='bx bx-trash'></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="horizontal-line"></div>
                            <?php
                                    // Calculate total money in cart
                                    $total_money += $gia_sp * $_SESSION['cart'][$ma_sp];
                                }
                            }
                            ?>
                            </div>
                        </div>

                    </div>

                    <div class="checkout-side">
                        <div class="checkout-header">
                            <h2>Thông tin thanh toán</h2>
                        </div>

                        <div class="horizontal-line white"></div>

                        <div class="info-form">
                            <div class="input-form">
                                <label for="name">Tên khách hàng</label>
                                <input type="text" name="name" placeholder="Tên khách hàng" class="input-box text" >
                            </div>

                            <div class="input-form">
                                <label for="email">Email liên hệ</label>
                                <input type="email" name="email" placeholder="Email liên hệ" class="input-box text">
                            </div>

                            <div class="input-form">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" name="phone" placeholder="Số điện thoại" class="input-box text" value="">
                            </div>

                            <div class="input-form">
                                <label for="address">Địa chỉ nhận hàng</label>
                                <input type="text" name="address" placeholder="Địa chỉ nhận hàng" class="input-box text">
                            </div>

                        </div>

                        <div class="horizontal-line white"></div>

                        <div class="info-form">
                            <div class="price-box">
                                <span class="title">Đơn giá</span>
                                <span class="price"><?php echo number_format($total_money, 0, '', ','); ?> đ</span>
                            </div>

                            <div class="price-box">
                                <span class="title">Vận chuyển</span>
                                <?php
                                if ($_SESSION['cart']['total'] >= 10 || $_SESSION['cart']['total'] == 0) {
                                    $shipping_fee = 0;
                                } else {
                                    $shipping_fee = $total_money * .05;
                                }
                                ?>
                                <span class="price"><?php echo number_format($shipping_fee, 0, '', ','); ?> đ</span>
                            </div>

                            <div class="price-box">
                                <span class="title">Tổng cộng</span>
                                <span class="price"><?php echo number_format($total_money + $shipping_fee, 0, '', ','); ?> đ</span>
                            </div>
                        </div>

                        <div class="horizontal-line transparent"></div>

                        <div class="checkout-btn">
                            <button type="submit" name="checkoutBtn">
                                <span class="total-price"><?php echo number_format($total_money + $shipping_fee, 0, '', ','); ?> đ</span>
                                <span class="btn">Thanh toán <i class='bx bx-right-arrow-alt'></i></span>
                            </button>
                            <span class="error-msg" style="color:'#fff';">
                                <?php 
                                if (isset($error) && $error != "") { 
                                    echo  "<script>alert('" . $error . "')</script>" ;
                                    echo "<script>window.location.href = 'cart.php'</script>";
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
