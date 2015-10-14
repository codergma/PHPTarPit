<?php
/* 浏览器禁用了cookie，session还能用吗?		
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


