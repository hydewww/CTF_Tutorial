<?php
    header('Content-type: text/json');

    require("./config.php");
    $sql = "SELECT id FROM blog LIMIT 15";
    $result = $conn->query($sql);
    $arr = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr, $row["id"]);
        }
    }
    $conn->close();

    echo json_encode($arr);
?>
