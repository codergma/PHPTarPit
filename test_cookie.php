<!--
setcookie()发送一个cookie给客户端
注意：
setcookie()之前不能有任何实际的输出
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
echo $_COOKIE[$name];//setcookie()函数调用之后，并不能立即生效，所以并没有输出值
										//所以最好在setcookie()函数之后接着执行 $_COOKIE[$name]=$value;





