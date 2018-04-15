<?php
session_start();
if(!isset($_SESSION["pass"])){
    $_SESSION["pass"] = 0;
}
?>

<form method="post">
param1: <input type = "text" name = "param1">
param2: <input type = "text" name = "param2">
<input type="submit">
</form>
<br>

<?php
    $str1 =<<<EOF
    First
    \$param1 = @(string)\$_POST["param1"];
    \$param2 = @(string)\$_POST["param2"];
    if(\$param1 !== \$param2 and @md5(\$param1) == @md5(\$param2)){
        pass
    }
EOF;
    $str2 =<<<EOF
    Second
    \$param1 = @\$_POST["param1"];
    \$param2 = @\$_POST["param2"];
    if(\$param1 !== \$param2 and @md5(\$param1) === @md5(\$param2)){
        pass
    }
EOF;
    $str3 =<<<EOF
    Last
    \$param1 = @(string)\$_POST["param1"];
    \$param2 = @(string)\$_POST["param2"];
    if(\$param1 !== \$param2 and @md5(\$param1) === @md5(\$param2)){
        echo \$flag;
    }
EOF;

    switch($_SESSION["pass"]){
        case 0:
            $param1 = @(string)$_POST["param1"];
            $param2 = @(string)$_POST["param2"];
            if($param1 !== $param2 and @md5($param1) == @md5($param2)){
                $_SESSION["pass"] = 1;
            }
            break;
        case 1:
            $param1 = @$_POST["param1"];
            $param2 = @$_POST["param2"];
            if($param1 !== $param2 and @md5($param1) === @md5($param2)){
                $_SESSION["pass"] = 2;
            }
            break;
        case 2:
            $param1 = @(string)$_POST["param1"];
            $param2 = @(string)$_POST["param2"];
            if($param1 !== $param2 and @md5($param1) === @md5($param2)){
                die("flag{mD5_c0l1ision}");
            }
            break;
    }

    switch($_SESSION["pass"]){
        case 0:
            highlight_string($str1);
            break;
        case 1:
            highlight_string($str2);
            break;
        case 2:
            highlight_string($str3);
            break;
    }
?>
