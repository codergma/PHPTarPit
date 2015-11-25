<!--
header()函数作用是发送自定义的http报文;
header()的使用有三点需要注意
1.header前不能有任何输出
2.location和:之间不能有空格
3.header之后的代码继续执行。

这几点很简单，我也深信不疑，但是有次看公司代码，header之前有输出，但程序并没有出错，经过求证，发现是由于服务器缓存了HTTP内容，虽然你echo或者print了，但是服务器还没有讲这些内容作为HTTP报文输出。

看下面代码验证
-->
<?php
//先看正确的用法
//(1)HTTP/开头的报文，用来计算将要发送的HTTP状态码;
 // header('HTTP/1.0 404 Not Found');
//(2)Location:开头的报文，不仅把报文发送给浏览器，还返回给浏览器一个重定向的状态码302;
 // header('Location:http://www.baidu.com');

//错误的用法
//(1)
//输出大量内容，导致服务器不能缓存,php配置中display_errors=On
//页面报错　Warning:Cannot modify header information -headers already sent by ..... 
// ob_start();
for($i=0;$i<1e5;$i++)
{
	echo $i;
}
header("location:http://www.smaryun.com");
// ob_end_flush();

//(2)
//刷新缓冲区，强制输出内容，同样报错，可以确认是服务器缓存没有输出的问题了
// echo 'abc';
// ob_flush();//刷新php的缓冲区
// flush();//刷新apache的缓冲区
// header('location:http://www.smaryun.com');

//(3)
//通过输出缓冲函数延迟脚本输出,知道设置好了cookie和　http头
// ob_start();
// ...
// header();
// ob_end_flush();

