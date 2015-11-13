<?php
// $pattern="/http[\s\S]*['\"]/iU";

// $filename = "/home/liubin/zhuangcan.txt";
// $subject = file_get_contents($filename);
// $out_filename = "/home/liubin/out_put.txt";
// if ($subject)
// {
// 	preg_match_all($pattern, $subject, $matches,PREG_PATTERN_ORDER);
// 	file_put_contents($out_filename, $matches);
// 	$res = array();
// 	foreach ($matches[0] as $value)
// 	{
// 		array_push($res,substr($value,0,-2));
// 	}
// 	var_dump($res);
// }
// else{
// 	exit('aaa');
// }

$filename = "/home/liubin/zhuangcan.txt";
$str = file_get_contents($filename);
$pattern="/src=\\\\['\"]http[\s\S]*['\"]/iU";
$pattern2="/http[\s\S]*['\"]/iU";
preg_match_all($pattern, $str, $matches,PREG_PATTERN_ORDER);
$res = array();
foreach($matches[0] as $value)
{
	preg_match_all($pattern2, $value, $matches2,PREG_PATTERN_ORDER);
	$res = array_merge($res,$matches2[0]);
}
var_dump($res);
