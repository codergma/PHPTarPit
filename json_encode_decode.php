<?php
/*
* JSON--JavaScript Object Notation
* JSON的语法是JavaScript对象表示语法的子集

* 数据保存在键值对中
* 数据由逗号分隔
* {}保存对象
* []保存数组
* key必须用双引号引用
* 最后一个键值对后面不加逗号
*/

//json_decode　将json格式解码成php数据格式
//$arr是一个json数组形式的string，json_decode之后是php数组
$arr = '[{"id":138,"value":"<div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u7c7b\u578b\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u9700\u6c42\u5206\u6790\/\u7ade\u54c1\u5206\u6790\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u89e3\u51b3\u65b9\u6848\u8be6\u7ec6\u63cf\u8ff0\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5\u4e00\u4e0b<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4e0a\u4f20\u9644\u4ef6\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\"><div class=\"requrement_describe_upload_file\"><div class=\"upload_file_compress_title l\" style=\"display: none;\">\u538b\u7f29\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_compress l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_image_title l\" style=\"display: none;\">\u56fe\u7247\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_image l\" style=\"display: none;\" data-dismiss=\"upload_file_image\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_doc_title l\" style=\"display: none;\">\u6587\u672c\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_doc l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><\/div><p class=\"describe_content_upload_file_hint\"><\/p><\/div><div class=\"clear\"><\/div><\/div>"}]';
var_dump(json_decode($arr));
$arr2 = '[1,2,3]';
var_dump(json_decode($arr2));
//$obj是一个json对象形式的string，json_decode之后是php对象
$obj = '{"id":138,"value":"<div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u7c7b\u578b\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u9700\u6c42\u5206\u6790\/\u7ade\u54c1\u5206\u6790\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u89e3\u51b3\u65b9\u6848\u8be6\u7ec6\u63cf\u8ff0\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5\u4e00\u4e0b<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4e0a\u4f20\u9644\u4ef6\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\"><div class=\"requrement_describe_upload_file\"><div class=\"upload_file_compress_title l\" style=\"display: none;\">\u538b\u7f29\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_compress l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_image_title l\" style=\"display: none;\">\u56fe\u7247\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_image l\" style=\"display: none;\" data-dismiss=\"upload_file_image\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_doc_title l\" style=\"display: none;\">\u6587\u672c\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_doc l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><\/div><p class=\"describe_content_upload_file_hint\"><\/p><\/div><div class=\"clear\"><\/div><\/div>"}';
var_dump(json_decode($obj));
//$obj2是一个json对象形式的string，json_decode之后是php数组
$obj2 = '{"id":138,"value":"<div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u7c7b\u578b\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4ea7\u54c1\u9700\u6c42\u5206\u6790\/\u7ade\u54c1\u5206\u6790\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u89e3\u51b3\u65b9\u6848\u8be6\u7ec6\u63cf\u8ff0\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\">\u6d4b\u8bd5\u4e00\u4e0b<\/div><div class=\"clear\"><\/div><\/div><div style=\"color: rgb(89, 87, 87);\"><div class=\"requrement_describe_key l\" style=\"line-height: 20px;\"><span class=\"requrement_describe_key_nametitle\">\u3010\u4e0a\u4f20\u9644\u4ef6\u3011<\/span><\/div><div class=\"requrement_describe_value l\" style=\"color: rgb(136, 136, 137);\"><div class=\"requrement_describe_upload_file\"><div class=\"upload_file_compress_title l\" style=\"display: none;\">\u538b\u7f29\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_compress l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_image_title l\" style=\"display: none;\">\u56fe\u7247\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_image l\" style=\"display: none;\" data-dismiss=\"upload_file_image\"><\/div><div class=\"clear\"><\/div><div class=\"upload_file_doc_title l\" style=\"display: none;\">\u6587\u672c\u6587\u4ef6\uff1a<\/div><div class=\"upload_file_doc l\" style=\"display: none;\"><\/div><div class=\"clear\"><\/div><\/div><p class=\"describe_content_upload_file_hint\"><\/p><\/div><div class=\"clear\"><\/div><\/div>"}';
var_dump(json_decode($obj2,true));

//json_encode 将php数据格式解码成json格式
$arr = array(1=>1,2=>2,3=>3);
var_dump(json_encode($arr));
class obj{
	public $name = 'coder';
	private $age = 123;

	public function test()
	{
		echo 'this is a public function';
	}
	private function test2()
	{
		echo 'this is a private function';
	}

}
$the_obj = new obj();
var_dump(json_encode($the_obj));

