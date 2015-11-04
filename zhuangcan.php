<?php
// $pattern="/src=(\\)[\"][\s\S]*['\"]/iU";
$pattern="/http[\s\S]*['\"]/iU";
 // $pattern="/src=(\\\\)['\"]/iU";

$filename = "/home/liubin/zhuangcan.txt";
$subject = file_get_contents($filename);
$out_filename = "/home/liubin/out_put.txt";
if ($subject)
{
	preg_match_all($pattern, $subject, $matches,PREG_PATTERN_ORDER);
	file_put_contents($out_filename, $matches);
	$res = array();
	foreach ($matches[0] as $value)
	{
		array_push($res,substr($value,0,-2));
	}
	var_dump($res);
}
else{
	exit('aaa');
}


