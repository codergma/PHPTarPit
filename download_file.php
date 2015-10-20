<?php
$url = 'http://images.china.cn/attachement/jpg/site1000/20151019/ac9e178530e1178e8ea519.jpg';
for ($i=0; $i < 10; $i++) { 
    downloadFile($url,'');
}

/*
* downloadFile()
* 第一种下载文件的方式是将远程文件读入内存，然后再写入到本地磁盘；
* fopen(),file_put_contents();
*
* downloadFile2()
* 第二种方法是直接给curl一个可写的文件流，让他自己解决这个问题。
*　设置CURLOPT_FILE选项；
*/
function downloadFile($url,$filename='')
{
    $source_handle = fopen($url,'r');
    if ($source_handle == false)
    {
        exit('file is not exists');
    }
    if ($filename=='')
    {
        $ext = strrchr($url,'.');
        $filename = time().rand(0,100).$ext;
    }

    $destination = file_put_contents($filename, $source_handle);
    if ($destination == false)
    {
        exit('file can not open');
        fclose($source_handle);
    }
}
function downloadFile2($url,$filename='')
{
    if ($filename == '')
    {
        $ext = strrchr($url,'.');
        $filename = time().rand(0,100).$ext;
    }

    $ch = curl_init($url);
    if ($ch == false)
    {
        exit("$url is illegal;");
    }
    $dest_handle = fopen($filename, 'w');
    if ($dest_handle == false)
    {
        exit('can not write to $filename;');
    }
    curl_setopt($ch, CURLOPT_FILE, $dest_handle);//设置输出文件位置
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);//发起连接前等待的时间
    curl_exec($ch);
    curl_close($ch);
}
