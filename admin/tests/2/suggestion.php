<?php
    $existingNames = array("Huy", "Linh", "Bac", "Phuc", "Chi");

    if (isset($_POST['suggestion'])) {
        $Name = $_POST['suggestion'];

        if (!empty($Name)) {
            foreach ($existingNames as $existingName) {
                if (strpos($existingName, $Name) !== false) {
                    echo $existingName;
                    echo "<br>";
                }
            }
        }
    }
?>