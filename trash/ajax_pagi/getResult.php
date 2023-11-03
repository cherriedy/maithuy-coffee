<?php 
    include_once(realpath(dirname(__FILE__) . '/../../resources/config/config.php'));
    include_once(realpath(dirname(__FILE__) . '/../../resources/database/connect.php'));
    include_once(realpath(dirname(__FILE__) . '/../../resources/database/query.php'));
    include_once(realpath(dirname(__FILE__) . 'pagination.class.php'));

    $perPage = new PerPage();
    $tb_sp = $TABLE['sp'];
    $sql = "SELECT * FROM $tb_sp";
    $paginationLink = "getResult.php?page=";
    $page = 1;

    if (!isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    $start = ($page - 1) * $perPage->perpage;
    if ($start < 0) {
        $start = 0;
    }


    $conn = db_connect();
    $result = db_query($conn, $sql);
?>

<?php
    $perpageresult = $perPage->perpage($result->num_rows, $paginationLink);
?>

<?php
    $query = $sql . " limit " . $start . "," . $perPage->perpage;
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->get_result();
    $output = '';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $result->num_rows . '" />' . $row["question"] . '</div>';
        $output .= '<div class="answer">' . $row["answer"] . '</div>';
    }
    if (! empty($perpageresult)) {
        $output .= '<div id="pagelink">' . $perpageresult . '</div>';
    }
    print $output;
?>