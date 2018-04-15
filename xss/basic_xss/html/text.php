<?php
    $id = @(string)$_GET["id"];
    require("./config.php");

    $select = "SELECT * FROM blog WHERE id = $id";
    $result = $conn->query($select);
    $row = $result->fetch_assoc();
    echo $row['text'];

    $delete = "DELETE FROM blog WHERE id = '$id'";
    if ($conn->query($delete) !== TRUE) {
        echo $conn->error;
    }

    $conn->close();
?>
