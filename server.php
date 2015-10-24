<?php
header('content-type:text/html;charset=utf-8;');
//$_SERVER包含头信息，路径，脚本位置的数组
echo '服务器ip<br/>';
echo $_SERVER['SERVER_ADDR'].'<br/>';
echo '服务器端口<br/>';
echo $_SERVER['SERVER_PORT'].'<br/>';
echo '服务器主机名<br/>';
echo $_SERVER['SERVER_NAME'].'<br/>';

echo '当前脚本所在文档根目录<br/>';
echo $_SERVER['DOCUMENT_ROOT'].'<br/>';

echo '浏览当前页面的用户ip<br/>';
echo $_SERVER['REMOTE_ADDR'].'<br/>';
echo '浏览当前页面的用户主机名,设置apache2.conf HOstnameLookups On<br/>';
//echo $_SERVER['REMOTE_HOST'].'<br/>';

echo '当前执行脚本的绝对路径<br/>';
echo $_SERVER['SCRIPT_FILENAME'].'<br/>';
echo '文件的完整路径和文件名，如果文件被包含，则是被包含文件的文件路径和文件名<br/>';
echo __FILE__;
echo '当前脚本的路径<br/>';
echo $_SERVER['PHP_SELF'];
echo '包含当前脚本的路径<br/>';
echo $_SERVER['SCRIPT_NAME'].'<br/>';

echo '前一页地址，不可信<br/>';
echo $_SERVER['HTTP_REFERER'];
