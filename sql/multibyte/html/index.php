Source Code : SELECT flag FROM a WHERE id = '2$id'
<br><br>
Can u get the flag where id = 1 ?
<br><br>
<form method="post">
id = <input type = "text" name = "id">
<input type="submit">
<br>
</form>

<?php
    $servername = "127.0.0.1";
    $username = "hydewww";
    $password = "hydewww";
    $dbname = "sql_injection";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $id = iconv("GBK", "UTF-8", addslashes(@$_POST["id"]));
    $sql = "SELECT flag FROM a WHERE id = '2$id'";
    echo "Execute : " . $sql . "<br><br>";
    echo "Result : ";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['flag'];
    }
    $conn->close();
?>
