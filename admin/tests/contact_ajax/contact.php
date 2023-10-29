<?php
if (isset($_GET['submit-btn'])) {
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $content = $_GET['content'];

    $isEmpty = false;
    $isValidEmail = true;

    if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($content)) {
        echo "<p>Điền vào các ô trống !</p>";
        $isEmpty = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Điền email đúng định dạng !</p>";
        $isValidEmail = false;
    }
} else {
    echo "<p>Lỗi !</p>";
}
?>

<script>
    let isEmpty = <?php echo $isEmpty; ?>
    let isValidEmail = <?php echo $isValidEmail; ?>

    if (isEmpty == true) {
        $("#contact-name, #contact-phone, #contact-email, #contact-address, #contact-content").addClass("error-notification");
    }

    if (isValidEmail == false) {
        $("#contact-email").addClass("error-notification");
    }

    if (isEmpty == false && isValidEmail == true) {
        $("#contact-name, #contact-phone, #contact-email, #contact-address, #contact-content").val("");
    }
</script>