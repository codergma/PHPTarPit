#!/usr/bin/php
<?php
/**
* get_dir
* 获取目录文件列表
*
* @param string $dir 路径 
* @return array
*/
function get_dir($dir)
{
	$files = NULL;
	if (is_dir($dir))
	{
		if (FALSE !== ($dh= opendir($dir)))
		{
			while (FALSE !== ($file = readdir($dh)))
			{
				if ($file != "." && $file != "..")
				{
					$files[] = $file;
				}
			}
			closedir($dh);
			return $files;
		}
	}
	return FALSE;
}
/**
* get_pdf
* 获取后缀为.pdf的文件 
* 
* @param array $files
* @return array
*/
function get_pdf($files)
{
	$pdf_files = NULL;
	$pattern = "/[\s\S]*.pdf/i";
	foreach ($files as $value)
	{
        $a = preg_match($pattern, $value);
		if(1 == $a)
		{
			$pdf_files[] = $value;
		}
	}
    return $pdf_files;
}

$dir_path = '/var/www/dev/media/k2/attachments/';
$files = get_dir($dir_path);
$pdf_files = get_pdf($files);
foreach ($pdf_files as $pdf_name)
{
	$swf_name = substr($pdf_name, 0,-3);
	$swf_name = $dir_path.'pdf_swf/'.$swf_name.'swf';
	$pdf_name = $dir_path.$pdf_name;
	echo $pdf_name;
	echo PHP_EOL;
	exec('sudo pdf2swf '.$pdf_name.' -o '.$swf_name);
}
?>
