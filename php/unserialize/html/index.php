<?php
    highlight_file(__FILE__);
    #try to get "/tmp/flag.txt"
    class what {
        public $filename;
        var $text;
        function __toString() {
           return @file_get_contents($this->filename);
        }
    }
    $param = isset($_GET['param'])?stripslashes($_GET['param']):"";
    $param = @$_GET['param'];
    $a = @unserialize($param);
    if (!$a) {
        die("nice to meet you !");
    }
    if ($a->text !== "??!!@@$$5%%???"){
        die("Sorry about that...");
    }
    $hey = FALSE;
    if ($param[0] === 'O') {
        $hey = !(bool)preg_match("/^O:[0-9]+:/s", $param);
    }
    if (!$hey) {
        die("hey!try harder!");
    }
    echo $a->__toString();
?>
