<?php
    $path_info = @$_SERVER['PATH_INFO'];
    if($path_info == ""){
        echo('<a href="/index.php/1">通过RPO漏洞执行alert()</a>');
        echo('<script src="static/moment.min.js"></script>');
    }
    $value = @explode('/', $path_info)[1];
    if(intval($value) === 1){
        echo("alert('flag{Maybe_xss_code_here}');");
    }
?>
