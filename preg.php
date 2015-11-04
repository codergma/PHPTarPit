<?php
// preg_match(pattern, subject)
// preg_match_all(pattern, subject, matches)
// preg_replace(pattern, replacement, subject)
// preg_filter(pattern, replacement, subject)

/** 正则表达式模式修饰符
* i
  大小写不敏感
* s
  .元字符，匹配所有字符,如果不设置次模式，可以通过[\s\S]匹配所有字符。
* U
  默认量词是贪婪的（量词后跟?，非贪婪）。U逆转量词的贪婪模式;
* m
  ^匹配字符串没一行的开头,$匹配没一行的结尾;
* E
  默认为次模式，$匹配字符串的末尾；
* D
  如果最后一个字符是换行符，$匹配换行符之前的字符；
* A
  相当于在模式前加了^,强制匹配字符串开头；
* x
  表达式中的空白符将被忽略，除非空白符被转义
**/


/* 
* preg_match_all(pattern, subject, matches)
* $maches参数说明
  手册上说:
  如果提供了参数matches，它将被填充为搜索结果。 $matches[0]将包含完整模式匹配到的文本，
  $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推。

  以$pattern3,PREG_PATTERN_ORDER)(默认参数)为例:
  完整匹配结果是
  '<b>example: 2</b>'
  '<div align=left>this is a test2</div>'

  (.*?)匹配结果是
  'example: ' 
  'this is a test'

  ([0-9])匹配结果是
  '2'
  '2'
  通俗的说，第一次是完整的正则表达式的匹配结果，后面是（）中正则表达式发挥的作用。
* 返回值是匹配次数
*/
header('content-type:text/html;charset=utf-8;');
$pattern = "/<[^>]+>.*?[0-9]<\/[^>]+>/i";
$pattern2 = "/<[^>]+>(.*?)[0-9]<\/[^>]+>/i";
$pattern3 = "/<[^>]+>(.*?)([0-9])<\/[^>]+>/i";
$arr = array($pattern,$pattern2,$pattern3);
$subject = "<b>example: 2</b><div align=left>this is a test2</div>";
foreach ($arr as $value)
{
	$num = preg_match_all($value, $subject, $matches,PREG_PATTERN_ORDER);
	echo $num.'<br>';
	var_dump($matches);
	echo '<hr/>';
}
foreach ($arr as $value)
{
	$num = preg_match_all($value, $subject, $matches,PREG_SET_ORDER);
	echo $num.'<br>';
	var_dump($matches);
	echo '<hr/>';
}
/* 
* preg_match(pattern, subject)
* 与preg_match_all相似，指示在匹配第一次之后停止搜索;
* 返回值是０或1;
*/

/*
* preg_replace和preg_filter除了返回值有一点差别，其余完全相同，
  参数可以是字符串，也可以是数组；
* 返回值的区别是　如果没有匹配项，preg_replace原样返回，preg_fiter返回空；
*/
//字符串
$pattern = '/[0]/';
$subject = '123abc456';
$replacement = 'x';
$res  = preg_replace($pattern, $replacement, $subject);
$res2 = preg_filter($pattern, $replacement, $subject);
var_dump($res);
echo '<hr/>';
var_dump($res2);
echo '<hr/>';

//数组
$pattern = array('/[01]/','/[23]/','/[45]/');
$subject = array('123','456','567','89');
$replacement = array('x','y','z');
$res  = preg_replace($pattern, $replacement, $subject);
$res2 = preg_filter($pattern, $replacement, $subject);
var_dump($res);
echo '<hr/>';
var_dump($res2);
echo '<hr/>';

/*
* preg_grep(pattern, input)
* pattern是字符串，input是数组
* 返回匹配的字符串,无法匹配的被过滤掉
*/
$pattern = '/[0-9]/';
$input = array('0abc','def','1ghi');
$res = preg_grep($pattern, $input);
var_dump($res);
echo '<hr/>';
/**
  在正则表达式中匹配反斜杠(\),需要这样"\\\\",一次是在字符串中转义,一次是在正则表达式中转义
**/

?> 
