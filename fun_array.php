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
$arr1 = array(2=>'x',3=>'y');
$arr2 = array(5=>'z',8=>'w');
$arr4 = array(1,2,3);


$variable = 'list';
switch ($variable)
{
	case 'array_slice':
		// array_slice默认会重新排序并重置数组的数字索引。
		// 你可以通过将 preserve_keys 设为 TRUE 来改变此行为。
		echo 'array_slice'.PHP_EOL;
		$slice = array_slice($arr, 0,2,TRUE);
		var_dump($slice);
		var_dump($arr);
		break;
	case 'array_splice':
		// 把数组中的一部分去掉并用其它值取代 
		echo 'array_splice'.PHP_EOL;
		$splice = array_splice($arr, 0,2);
		var_dump($splice);
		var_dump($arr);	
		break;
	case 'array_walk':
		echo 'array_walk'.PHP_EOL;
		array_walk($arr, 'walk_callback');
		break;
	case 'array_shift':
		// 移除数组第一个元素 
		echo 'array_shift'.PHP_EOL;
		$ele = array_shift($arr);
		var_dump($ele);
		var_dump($arr);
		break;
	case 'array_merge':
		// 合并数组,如果是数字索引，键名将会重新索引
		array_merge();
		$arr3 = array_merge($arr1,$arr2);
		var_dump($arr3);
		$arr3 = $arr1 + $arr2;
		var_dump($arr3);
		break;
	case 'in_array':
		//　值是否在数组中
		$res = in_array('username', $arr);
		var_dump($res);
		break;
	case 'array_key_exists':
		// 键是否在数组中
		$res = array_key_exists('codergma', $arr);
		var_dump($res);
		break;
	case 'array_keys':
		// 取数组的键
		array_keys(input);
		$keys = array_keys($arr);
		echo implode($keys,',');
		echo '<br/>';
		break;
	case 'array_values':
		// 取数组的值
		array_values(input);
		$vals = array_values($arr);
		echo implode($vals,',');
		echo '<br/>';
		break;
	case 'list':
		list($one,$two,$three) = $arr4;
		var_dump($one);
		var_dump($two);
		// var_dump($three);
	default:
		break;
}
