<?php
$arr = array(
	'username'=>'codergma',
	'info_uptime'=>111111,
	'headimg'=>'http://adfa',
	'gender'=>1,
	'followees'=>2,
	'followed'=>3,
	'asks'=>4,
	'answers'=>5,
	'collections'=>10 );

// 数组中是否存在某个值
in_array(needle, haystack);
// 是否存在某个键
array_key_exists(key, search);
// 取数组的键
array_keys(input);
$keys = array_keys($arr);
echo implode($keys,',');
echo '<br/>';
// 取数组的值
array_values(input);
$vals = array_values($arr);
echo implode($vals,',');
echo '<br/>';
// 合并数组,如果只给了一个数组(或者另一个是空)并且该数组是数字索引的，则键名会以连续方式重新索引
array_merge();
$arr1 = array(2=>'x',3=>'y');
$arr2 = array();
$arr3 = array_merge($arr1,$arr2);
var_dump($arr3);
// 移除数组第一个元素 
array_shift();
