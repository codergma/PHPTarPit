<?php
/* 

１》浏览器禁用了cookie，session还能用吗?		
	一般认为cookie和session是两个独立的东西，session保存在服务端，cookie保存在客户端； 
	默认session id是通过cookie保存的，所以禁用cookie的话session也会收到影响，但是
	php中可以通过设置(session.use_trans_sid,session.use_only_cookies)，
	使session id也可以通过http1.1协议的Query_String也就是url中?后面的参数传递。
2》HTTP协议中post和get有何区别?
	一般get用于发送获取信息的请求；post用于发送修改信息的请求；
	get请求的数据是放在HTTP包头中的，也就是url之后；post放在HTTP正文中；
	因为get请求是放在url中的，url长度受到不同环境的限制，所以发送数据量较小；
	post的安全性比get高，因为get是明文传输，而且容易遭受cross site request forgery攻击；
3》require和include有何区别？
	如果没找到文件,include发出警告继续运行，require发出致命错误,程序停止运行。
4》从数据表中随机取10条数据。
	1.通过数学函数RAND(),其实这个语句有很大的性能问题,对于大表的效率是非常低下的。；
	SELECT * FROM user ORDER BY RAND() LIMIT 10;
	2.这样查询可以提高性能,因为MAX()MIN()函数几乎不耗时。
	SELECT mem.uid FROM gisuc_members as mem  JOIN ( SELECT ROUND((RAND()* (MAX(uid)-MIN(uid)))) AS uid  FROM gisuc_members ) as mem2 WHERE mem.uid >mem2.uid LIMIT 10;
	提高性能的思路:http://shiningray.cn/order-by-rand.html
		将任务放到应用程序，事先计算出uid;
		优化SQL语句; 
5》写出php的构造函数和析构函数，如果存在与类名相同的函数，执行哪一个?
	__construct()
	__destruct();
	与类名相同的函数是旧版本的构造函数，为了兼容以前的版本，当__construct()
	不存在的时候，才会尝试调用同名函数，所以先执行__construct();但是从5.3.3	起，
	命名空间中，与类名相同的函数不在作为构造函数。
6》优化MYSQL数据库的方法。http://coolshell.cn/articles/1846.html
	1.为搜索字段建索引
	2.只要一行数据的时候　LIMIT 1;
	3.要什么就取什么,避免SELECT *;
	4.禁用ORDER BY RAND();
	5.EXPLAIN　你的SELECT查询；
	6.打开查询缓存，并且为查询缓存优化你的查询；
		当有很多相同的查询被执行了多次的时候，这些查询结果会被放到一个缓存中，
		这样，后续的相同的查询就不用操作表而直接访问缓存结果了。
		这里最主要的问题是，对于程序员来说，这个事情是很容易被忽略的。因为，
		我们某些查询语句会让MySQL不使用缓存。请看下面的示例：
		// 查询缓存不开启
		$r = mysql_query("SELECT username FROM user WHERE signup_date >= CURDATE()");
		// 开启查询缓存
		$today = date("Y-m-d");
		$r = mysql_query("SELECT username FROM user WHERE signup_date >= '$today'");
		上面两条SQL语句的差别就是 CURDATE() ，MySQL的查询缓存对这个函数不起作用。所以，像 NOW() 
		和 RAND()或是其它的诸如此类的SQL函数都不会开启查询缓存，因为这些函数的返回是会不定的易变的。 
		所以，你所需要的就是用一个变量来代替MySQL的函数，从而开启缓存。

		验证查询缓存有没有被打开SELECT @@query_cache_type;
	 7.永远为每张表设置一个ID ,并且设置为主键，类型为int (unsigned) ,设置AUTO_INCREMENT;
		有一个例外就是“关联表”的外键。
	 ８．JOIN表的时候使用相当类型的列
		 也就是两个列的类型最好一样，并且都建立了索引，如果两个列的类型不一样，即便有索引也不会被使用。
	 ９．使用ENUM,而不是VARCHAR;ENUM非常紧凑，内部保存的是TINYINT;
	 10.尽可能使用NOT NULL，除非你有特殊需求；
	 11.把ip地址存成UNSIGNINT  
	    SQL中的函数INET_ATON() INET_NTOA()　php中的函数iptolong(),longtoip();
	 12.固定长度的表会更快
	 13.垂直分割
	 14.拆分大的DELETE和INSERT语句
	 15.小心永久链接
7》自动加载类 spl_autoload_register();

*/

 
// 求两个日期的差数，例如2015-08-05 12:00:00与2015-08-20差的天数。

	$times = strtotime('2015-08-20 12:00:00')-strtotime('2015-08-05');
	var_dump($times/24/3600);

// PHP中移除数组中重复元素的函数

	$arr = array(1,2,3,4,3);
	var_dump(array_unique($arr));

// 如何获得地址栏中完整的URL?
// 通过预定义变量$_SERVER[],该数组包含头信息，路径，脚本位置等信息。

	echo $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'].'<br/>';


// 在一个函数中(没有return),改变全局变量的值，两种方法实现

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
