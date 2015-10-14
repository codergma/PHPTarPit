<?php
/* 
	浏览器禁用了cookie，session还能用吗?		
	一般认为cookie和session是两个独立的东西，session保存在服务端，cookie保存在客户端； 
	默认session id是通过cookie保存的，所以禁用cookie的话session也会收到影响，但是
	php中可以通过设置(session.use_trans_sid,session.use_only_cookies)，
	使session id也可以通过http1.1协议的Query_String也就是url中?后面的参数传递。
*/

/* 
	求两个日期的差数，例如2015-08-05 12:00:00与2015-08-20差的天数。
*/
	$times = strtotime('2015-08-20 12:00:00')-strtotime('2015-08-05');
	var_dump($times/24/3600);
/*
	PHP中移除数组中重复元素的函数
*/
	$arr = array(1,2,3,4,3);
	var_dump(array_unique($arr));

/*
	HTTP协议中post和get有何区别?
*/

/*
	require和include有何区别？
	如果没找到文件,include发出警告继续运行，require发出致命错误,程序停止运行。
*/

/*
		如何获得地址栏中完整的URL?
		通过预定义变量$_SERVER[],该数组包含头信息，路径，脚本位置等信息。
*/
	echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];

