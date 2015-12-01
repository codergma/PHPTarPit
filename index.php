<?php
header('content-type:text/html;charset=utf-8;');
$url = 'http://'.$_SERVER['SERVER_ADDR'].':'.$_SERVER['SERVER_PORT'];

?>
<style type="text/css">
a{
	text-decoration: none;
}
table
{
border-collapse:collapse;
}
table,th, td
{
border: 1px solid black;
}
td{
	text-align: center;
	vertical-align: bottom;
}
</style>
<table  >
	<thead>
		<th>文件</th>
		<th>说明</th>
	</thead>
	<tr>
		<td><a href="<?php echo $url;?>/basic.php">basic.php</a></td>
		<td>基础知识学习</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/preg.php">preg.php</a></td>
		<td>php正则表达式用法，preg_match(),preg_match_all(),preg_replace(),preg_filter(),preg_grep()</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/server.php">server.php</a></td>
		<td>$_SERVER[]数组的用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/header.php">header.php</a></td>
		<td>header()函数用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/cookie.php">cookie.php</a></td>
		<td>cookie用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/session.php">session.php</a></td>
		<td>session用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/json_encode_decode.php">json_encode_decode.php</a></td>
		<td>json编码相关函数用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/curl.php">curl.php</a></td>
		<td>curl相关函数用法</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/download_file.php">download_file.php</a></td>
		<td>文件下载</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/readfile.php">readfile.php</a></td>
		<td>大文件读取</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/upload.php">upload.php</a></td>
		<td>文件上传</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/batch_file.php">batch_file.php</a></td>
		<td>CLI批处理文件</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/date_time.php">date_time.php</a></td>
		<td>日期时间</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/ZipArchive.php">ZipArchive.php</a></td>
		<td>unix/windows使用ZipArchive类压缩及解压文件乱码问题</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/Rolling_CURL.php">Rolling_CURL.php</a></td>
		<td>Rolling_CURL测试</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/pcntl_xxx.php">pcntl_xxx.php</a></td>
		<td>PHP多进程</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/phpspider.php">phpspider.php</a></td>
		<td>phpspider测试</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/Array.php">Array.php</a></td>
		<td>数组</td>
	</tr>
	<tr>
		<td><a href="<?php echo $url;?>/url.php">url.php</a></td>
		<td>url函数，encoding,decoding,parsing</td>
	</tr>
</table>