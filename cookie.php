<!--
setcookie()发送一个cookie给客户端
注意：
setcookie()之前不能有任何实际的输出
setcookie()可以删除cookie，设置过期时间为过去的时间点，
有两个坑需要注意
(1)删除的时候要设置path参数，否则会默认当前页面路径，
   如果删除路径与设置路径不一致，则删除不了。
(2)有时候不设置path,domain，虽然setcookie返回true,但是不能在浏览器创建cookie;
-->
<?php
//echo "不能有输出";
//ob_flush();
//flush();

$name  = 'userid';
$value = md5(strval(mt_rand())); 
$expire = time() + 30*60;
$path  = "/";
$domain = "";

$result = setcookie($name,$value,$expire,$path,$domain);
var_dump($result);
//setcookie()函数调用之后，并不能立即生效，所以并没有输出值
//所以最好在setcookie()函数之后接着执行 $_COOKIE[$name]=$value;
echo $_COOKIE[$name];





