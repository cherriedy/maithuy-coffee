<?php
session_begin();
if(isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); 
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$tb_sp = $TABLE['sp'];

$conn = db_connect();
$sql = "SELECT * FROM $tb_sp";

$row = db_fetch_assoc(db_query($conn, $sql));

?>
<div class="cart-checkout">
    <form action="" method="post" id="basic-info">
        <div class="m-wrapper">
            <div class="cc-body">
                <div class="cart-side">
                    <div class="cart-header">
                        <a href="index.php?page=3">
                            <i class='bx bx-arrow-back'></i>
                            <span>Tiếp tục mua hàng</span>
                        </a>
                        <div class="horizontal-line"></div>
                    </div>

                    <div class="cart-content">
                        <div class="product-items">
                            <div class="item-card">
                                <div class="img-wrapper">
                                    <img src="./../../upload/img/product.png" alt="prod-img">
                                </div>

                                <div class="detail-info">
                                    <div class="attr">
                                        <span class="type">Arabica</span>
                                        <span class="group">Bột</span>
                                    </div>
                                    <span class="name">Cà phê Columbia Premium</span>
                                </div>

                                <div class="quantity">
                                    <input type="number" name="quantity[<?php echo $id; ?>]" class="input-box quantity" min="1" value="1">
                                </div>

                                <div class="price">
                                    <span class="price"><i class='bx bx-money'></i> 100.000đ</span>
                                </div>

                                <div class="action">
                                    <div class="remove">
                                        <i class='bx bx-trash'></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="horizontal-line"></div>

                    </div>
                </div>

                <div class="checkout-side">
                    <div class="checkout-header">
                        <h2>Thông tin thanh toán</h2>
                    </div>

                    <div class="horizontal-line white"></div>

                    <!-- <form action="" method="post" id="basic-info"> -->
                    <div class="info-form">
                        <div class="input-form">
                            <label for="name">Tên khách hàng</label>
                            <input type="text" name="name" placeholder="Tên khách hàng" class="input-box text">
                        </div>

                        <div class="input-form">
                            <label for="address">Địa chỉ nhận hàng</label>
                            <input type="text" name="address" placeholder="Địa chỉ nhận hàng" class="input-box text">
                        </div>

                        <div class="input-form">
                            <label for="note">Ghi chú</label>
                            <textarea name="note" rows="5" class="textarea-box" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <!-- </form> -->

                    <div class="horizontal-line white"></div>

                    <div class="info-form">
                        <div class="price-box">
                            <span class="title">Đơn giá</span>
                            <span class="price">$4798.00</span>
                        </div>

                        <div class="price-box">
                            <span class="title">Vận chuyển</span>
                            <span class="price">$4798.00</span>
                        </div>

                        <div class="price-box">
                            <span class="title">Tổng cộng</span>
                            <span class="price">$4798.00</span>
                        </div>
                    </div>

                    <div class="horizontal-line transparent"></div>

                    <div class="checkout-btn">
                        <button type="submit" name="submit-btn">
                            <span class="total-price">$4798.00</span>
                            <span class="btn">Thanh toán <i class='bx bx-right-arrow-alt'></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>