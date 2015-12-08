<?php

function walk_callback($value,$key)
{
	echo $value.'--'.$key.PHP_EOL;
}
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
// 合并数组,如果是数字索引，键名将会重新索引
array_merge();
$arr1 = array(2=>'x',3=>'y');
$arr2 = array(5=>'z',8=>'w');
$arr3 = array_merge($arr1,$arr2);
var_dump($arr3);
$arr3 = $arr1 + $arr2;
var_dump($arr3);
// 移除数组第一个元素 
array_shift();
// array_walk
array_walk($arr, 'walk_callback');
// array_slice默认会重新排序并重置数组的数字索引。
// 你可以通过将 preserve_keys 设为 TRUE 来改变此行为。
$slice = array_slice($arr, 0,2,TRUE);
var_dump($slice);
var_dump($arr);
// 把数组中的一部分去掉并用其它值取代 
$splice = array_splice($arr, 0,2);
var_dump($splice);
var_dump($arr);