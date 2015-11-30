<?php
// 数组中是否存在某个值
in_array(needle, haystack);
// 是否存在某个键
array_key_exists(key, search);
// 取数组的键
array_keys(input);
// 取数组的值
array_values(input);

// array_shift();
$arr = array(
	'username'=>'codergma',
	'info_uptime'=>111111,
	'headimg'=>'http://adfa',
	'gender'=>1,
	'followees'=>2,
	'followed'=>3,
	'asks'=>4,
	'answers'=>5,
	'collections'=>10
	);
$keys = array_keys($arr);
$vals = array_values($arr);
echo implode($keys,',');
echo '<br/>';
echo implode($vals,',');
