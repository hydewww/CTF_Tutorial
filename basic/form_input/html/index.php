Give me a number larger than 999.<br><br>
<form method="POST">
    <input type="text" maxlength="3" name="num">
    <input type="submit">
</form>
<br>
<?php
    if(@$_POST["num"] > 999){
        echo "flag{InPu7}";
    }
?>
