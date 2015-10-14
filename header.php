<!--
header()函数作用是给客户端发送头信息,什么是头信息？请自行研读http协议
header()的使用有三点需要注意
1.header前不能有任何输出
2.location和:之间不能有空格
3.header之后的代码继续执行。

这几点很简单，我也深信不疑，但是有次看公司代码，header之前有输出，但程序并没有出错，经过求证，发现是由于服务器缓存了HTTP内容，虽然你echo或者print了，但是服务器还没有讲这些内容作为HTTP报文输出。

看下面代码验证
-->
<?php
//(1)
//输出大量内容，导致服务器不能缓存,php配置中display_errors=On
//页面报错　Warning:Cannot modify header information -headers already sent by ..... 
/*
for($i=0;$i<1e5;$i++)
{
	echo $i;
}
header("location:www.smaryun.com");
*/
//(2)
//刷新缓冲区，强制输出内容，同样报错，可以确认是服务器缓存没有输出的问题了
echo 'abc';
ob_flush();//刷新php的缓冲区
flush();//刷新apache的缓冲区
header('location:http://www.smaryun.com');


