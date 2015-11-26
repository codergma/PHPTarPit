<?php
echo 'session.save_path:';
echo ini_get('session.save_path');
echo '<br/>';
echo 'session.name:';
echo ini_get('session.name');
echo '<br/>';
echo 'session.cookie_path:';
echo ini_get('session.cookie_path');
echo '<br/>';

/**
* session_cache_limiter
* 读取或设置缓存限制器,session_start()前调用
*/
/**
* session_cache_expire
* 获取或者当前缓存的到期时间
*/

/**
* 即使session已经过期，session文件并不一定被删除，
*　session文件被删除的概率受到垃圾回收策略的影响：
* session.gc_probability,session.gc_divisor,session.gc_maxlifetime
*/

/**
* session_start
* 创建会话或重用现有会话.
* 如果通过GET,POST,或cookie提交了会话ID，则重用现有回话，将
* session中保存的数据反序列化填充到$_SESSION超全局变量中．
*/
session_start();
if(!empty(session_id()))
{
	//获取当前回话id
	echo session_id();
	echo '<br/>';
	//获取当前回话名称
	echo session_name();
	echo '<br/>';
	//获取当前回话cookie参数
	echo session_get_cookie_params();
	echo '<br/>';
	$_SESSION['data'] = 'abc';
	session_destroy();//删除了文件
	echo $_SESSION['data'];//依然存在
}
/**
* session_destroy()
* 销毁一个会话中的全部数据,但是不重置当前回话所关联的全部数据,
* 也不重置回话cookie．
*/

/**
* 彻底删除回话
*/
session_start();
$_SESSION['data'] = 'abc';
session_destroy();
//清空SESSION全局变量
$_SESSION = array();
if(ini_get('session.use_cookie'))
{
	$params = session_get_cookie_params();
	//删除cookie
	setcookie(session_name(),'',time()-4200,
	$params['path'],$params['domain'],
	$params['secure'],$params['httponly']);
}
//删除文件
session_destroy();
echo $_SESSION['data'];//不存在

