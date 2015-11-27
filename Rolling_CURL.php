<?php
require_once './rolling-curl/RollingCurl.php';
header('Content-type:text/html;charset=utf-8');
// Example 1
// an array of URL's to fetch
$urls = array("http://www.baidu.com",
              "http://www.smaryun.com",
              "http://www.sina.com");

// a function that will process the returned responses
function request_callback($response, $info)
{
	// parse the page title out of the returned HTML
	if (preg_match('/<title>(.*)<\/title>/i', $response, $out))
	{
		$title = $out[1];
	}
	var_dump($out);
	echo "<b>$title</b><br />";
	print_r($info);
	echo "<hr>";
}

// create a new RollingCurl object and pass it the name of your custom callback function
$rc = new RollingCurl("request_callback");
// the window size determines how many simultaneous requests to allow.  
$rc->window_size = 20;
foreach ($urls as $url) {
    // add each request to the RollingCurl object
    $request = new RollingCurlRequest($url);
    $rc->add($request);
}
$rc->execute();