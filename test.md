*	浏览器禁用了cookie，session还能用吗?		

>	一般认为cookie和session是两个独立的东西，session保存在服务端，cookie保存在客户端；		
但是默认session id是通过cookie保存的，所以禁用cookie的话session也会收到影响，但是		
php中可以通过设置(session.use_trans_sid,session.use_only_cookies)，使session id也可以		
通过http1.1协议的Query_String也就是url中?后面的参数传递。				

