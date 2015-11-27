<?php
function classic_curl($urls, $delay) {
	// 创建curl批处理句柄
    $queue = curl_multi_init();
    $map = array();
 
    foreach ($urls as $url) {
        // 创建curl句柄
        $ch = curl_init();
 
        // 设置option
        curl_setopt($ch, CURLOPT_URL, $url);
 
 		// 发起连接前等待的时间
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        //　启用时，将curl_exex()获取的信息以文本流的形式返回，而不是直接输出
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 启用时，将文件头信息作为数据流输出
        curl_setopt($ch, CURLOPT_HEADER, 0);
        // 启用时，忽略所有的curl传递给php的信号
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
 
        // add handle
        curl_multi_add_handle($queue, $ch);
        $map[$url] = $ch;
    }
 
 	//　用来判断操作是否扔在执行
    $active = null;
 
    // execute the handles
    do
    {
        $mrc = curl_multi_exec($queue, $active);
    }
    while ($mrc == CURLM_CALL_MULTI_PERFORM);//仍有一些工作要做
 
    while ($active > 0 && $mrc == CURLM_OK)
    {
        if (curl_multi_select($queue, 0.5) != -1)
        {
            do
            {
                $mrc = curl_multi_exec($queue, $active);
            }
            while ($mrc == CURLM_CALL_MULTI_PERFORM);
        }
    }
 
    $responses = array();
    foreach ($map as $url=>$ch) {
        $responses[$url] = callback(curl_multi_getcontent($ch), $delay);
        curl_multi_remove_handle($queue, $ch);
        curl_close($ch);
    }
 
    curl_multi_close($queue);
    return $responses;
}

function rolling_curl($urls, $delay) {
    $queue = curl_multi_init();
    $map = array();
 
    foreach ($urls as $url) {
        $ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);
 
        curl_multi_add_handle($queue, $ch);
        $map[(string) $ch] = $url;
    }
 
    $responses = array();
    do {
        while (($code = curl_multi_exec($queue, $active)) == CURLM_CALL_MULTI_PERFORM) ;
 
        if ($code != CURLM_OK)
        { 
	        break; 
        }
 
        // a request was just completed -- find out which one
        while ($done = curl_multi_info_read($queue)) 
        {
            // get the info and content returned on the request
            $info = curl_getinfo($done['handle']);
            $error = curl_error($done['handle']);
            $results = callback(curl_multi_getcontent($done['handle']), $delay);
            $responses[$map[(string) $done['handle']]] = compact('info', 'error', 'results');
 
            // remove the curl handle that just completed
            curl_multi_remove_handle($queue, $done['handle']);
            curl_close($done['handle']);
        }
 
        // Block for data in / output; error handling is done by curl_multi_exec
        if ($active > 0) {
            curl_multi_select($queue, 0.5);
        }
 
    } while ($active);
 
    curl_multi_close($queue);
    return $responses;
}
function callback()
{
	
}
