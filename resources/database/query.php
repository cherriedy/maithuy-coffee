<?php
    function db_query($conn, $sql) {
        $result_set = $conn->query($sql);
        // Check if the query statement starts with SELECT
        if (substr($sql, 0, 6) == 'SELECT ' || 
            substr($sql, 0, 6) == 'UPDATE ' || 
            substr($sql, 0, 11) == 'DELETE FROM ' ||
            substr($sql, 0, 11) == 'INSERT INTO ') 
        {
            confirm_query($result_set);
        }
        return $result_set;
    }

    function confirm_query($result_set) {
        if (!isset($result_set->num_rows) && $result_set->num_rows < 0) {
            exit("Database query failed !");
        }
    }

    function db_fetch_assoc($result_set) {
        return $result_set->fetch_assoc();
    }

    function db_free_result($result_set) {
        return $result_set->free_result();
    }
?>