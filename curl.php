<?php
// 创建一个新cURL资源
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com/");
// curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HEADER,0);
// 抓取URL并把它传递给浏览器
$file = curl_exec($ch);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);
// echo $file;
echo CURLM_CALL_MULTI_PERFORM;
echo '<br/>';
echo CURLM_OK;