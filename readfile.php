<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset='utf-8'>
</head>
<body>

<?php

$filename = '/home/liubin/weixin_page.2015-10-13/weixin_page.2015-10-13';
function readBigFile($filename, $count = 20) {
    $content = '';//最终内容
    $_current = '';//当前读取内容寄存
    $step= 1024;//每次走多少字符
    $start = 0;//起始位置
    $i = 0;//计数器
    $handle = fopen($filename,'r+');//读写模式打开文件，指针指向文件头
    $j =1;
    while (!feof($handle)) {
	    while($i < $count && !feof($handle)) {    //文件没有到结尾和小鱼需要读取得行数时
	        fseek($handle, $start, SEEK_SET);//指针设置在文件开头

	        $_current = fread($handle,$step);//读取文件

	        $content .= $_current;//组合字符串

	        $start += $step;//依据步长向前移动
	        $i++;
	    }
	    $dest_name = 'trash/'.time().rand(0,100).'.txt';
		file_put_contents($dest_name,$content);
		$content = '';
        $i = 0;
    }
    //关闭文件
    fclose($handle);
}

$count = 1024*50;//读取行数
$data = readBigFile($filename,$count);
?>
</body>
</html>
