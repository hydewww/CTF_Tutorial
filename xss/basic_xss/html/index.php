Try to get admin's cookie.<br>
Admin will view what u have posted after a while.
<br><br>

<form method="post">
payload : <input type = "text" name = "payload">
<input type="submit">
</form>
<br>

<?php
    if(isset($_POST["payload"])){
        $payload = @(string)$_POST["payload"];
        if ($payload === ""){
            die();
        }

        require("./config.php");
        $insert = "INSERT INTO blog (text) VALUES ('$payload')";
        if ($conn->query($insert) === TRUE) {
            echo "Submit success.";
        } else {
            echo $conn->error;
        }
        $conn->close();
    }
?>
