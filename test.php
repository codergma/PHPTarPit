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
	echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'].'<br/>';

/*
	在一个函数中(没有return),改变全局变量的值，两种方法实现

*/
	function modify_global()
	{
		$GLOBALS['global_param'] = 2;
	}
	function modify_global2()
	{
		global $global_param;
		$global_param = 3;
	}
	$global_param = 1;
	modify_global();
	echo "first  method:".$global_param.'<br/>';
	modify_global2();
	echo "second method:".$global_param.'<br/>';

/*
	从数据表中随机取10条数据。
		1.通过数学函数RAND(),其实这个语句有很大的性能问题,对于大表的效率是非常低下的。；
		SELECT * FROM user ORDER BY RAND() LIMIT 10;
		2.这样查询可以提高性能,因为MAX()MIN()函数几乎不耗时。
		SELECT mem.uid FROM gisuc_members as mem  JOIN ( SELECT ROUND((RAND()* (MAX(uid)-MIN(uid)))) AS uid  FROM gisuc_members ) as mem2 WHERE mem.uid >mem2.uid LIMIT 10;
	提高性能的思路:http://shiningray.cn/order-by-rand.html
		将任务放到应用程序，事先计算出uid;
		优化SQL语句;
*/

/*
	写出php的构造函数和析构函数，如果存在与类名相同的函数，执行哪一个?
	__construct()
	__destruct();
	与类名相同的函数是旧版本的构造函数，为了兼容以前的版本，当__construct()
	不存在的时候，才会尝试调用同名函数，所以先执行__construct();但是从5.3.3	起，
	命名空间中，与类名相同的函数不在作为构造函数。
*/

/*	
	优化MYSQL数据库的方法。
*/
/*
	自动加载类
*/