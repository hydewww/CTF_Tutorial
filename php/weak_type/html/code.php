<?php
    $a = @$_GET["a"];
    if(!is_numeric($a) || intval($a) != "Aa")
        die("1");

    $b = @$_GET["b"];
    if(@md5($b) != "0e2")
        die("2");

    $c = @$_GET["c"];
    $x = "Cc";
    if($c === $x || @strcmp($c, $x) != 0)
        die("3");
?>
