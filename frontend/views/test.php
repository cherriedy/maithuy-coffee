<?php
    include_once(__DIR__ . "/../../resources/config.php");  
    include_once(__DIR__ . "/../../resources/backend/db_connect.php");  
    $table = $config["table"]["nsp"];
    $sql = "select * from $table";
    $query = $conn->query($sql);
?>

<form method="post" action="">
    <select name="nsp">
        <?php 
        while ($row = $query->fetch_assoc()) 
        {
            $ten_nsp = $row["TEN_NHOMSP"];
            $ma_nsp = $row["MA_NHOMSP"];
        ?>
        <option value="<?php echo $ten_nsp; ?>"><?php echo $ma_nsp; ?></option> 
        <?php 
        } 
        ?>
        <input type="submit" value="submit">
    </select> 
</form>

<?php 
    if (isset($_POST["nsp"]))
        echo $_POST["nsp"];
?>