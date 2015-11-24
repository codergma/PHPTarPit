<?php
header('Content-type:text/html;charset=utf-8');

/**
* 文件压缩类
*
* 解决类unix/windows平台解压文件名包含中文时文件名乱码和文件丢失问题, 
* 这个类继承ZipArchive类.
*
* @category Libraries
* @author codergma
*/

class CG_ZipArchive extends ZipArchive
{
  private $src_file = null;
    /**
     * 构造函数
     *
     * @return void
     */
  public function __construct() {}

  /**
   * open
   * 
   * @param string
   * @param int
   * @return mixed
   */
  public function open($filename,$flag=ZipArchive::CREATE)
  {
    $this->src_file = $filename;
    return parent::open($filename,$flag);
  }

  /**
  * addDir
  * 类unix平台，目录压缩函数，此函数与extractDir配对使用；
  *　ZipArchive::addFile压缩文件通过extractTo函数解压本身就存在中文乱码且丢失文件
  *　的问题.
  * 
  * @param  string  所要压缩的目录
  * @param  string  所要压缩文件的根目录
  * @return bool
  */
    public function addDir($src_dir,$base)
    {
      if (!is_dir($src_dir))
      {
        return FALSE;
      }
      if('/' !== substr($src_dir,-1))
      {
        $src_dir .= '/';
      }

      foreach (glob($src_dir.'*') as $file)
      {
        if (is_dir($file))
        {
                $new_file = str_replace($base, '', $file);
                $this->addEmptyDir($new_file);
          $this->addDir($file.'/',$base);
        }
        else
        {
          $new_file = str_replace($base, '', $file);
          $this->addFile($file,$new_file);
        }
      }
    }

    /**
    *
    * extractDir
    * 类unix平台,解压函数
    * 解决中文文件名丢失，中文乱码问题
    *
    * @param  string 带解压文件
    * @param  string 目录解压缩到的路径
    * @return void
    */
   function extractDir($dest_file)
   {
       if (!file_exists($dest_file))
       {
           @mkdir($dest_file, 0777);
       }

       //直接使用extractTo函数中文文件名乱码和丢失，
       //通过$this->numFiles查看文件个数是正确的，所以问题出现在复制上．
       for ($i = 0; $i < $this->numFiles; $i++)
       {
           $filename = $this->getNameIndex($i);
           if ('/' !== substr($filename, -1))
           {
               copy("zip://" . $this->src_file . "#" . $filename, $dest_file . $filename);
           } else {
               @mkdir($dest_file . $filename, 0777);
           }
       }

   }

   /**
  * addDirWindows
  * windows平台，目录压缩函数，次函数在压缩时文件名转码为gb2312,如此以来就可以在
  * windows平台解压使用了．
  * 
  * @param  string  所要压缩的目录
  * @param  string  所要压缩文件的根目录
  * @return bool
  */
    public function addDirWindows($src_dir,$base)
    {
      if (!is_dir($src_dir))
      {
        return FALSE;
      }
      if('/' !== substr($src_dir,-1))
      {
        $src_dir .= '/';
      }

      foreach (glob($src_dir.'*') as $file)
      {
        $new_file = str_replace($base, '', $file);
        $encode = mb_detect_encoding($new_file);
        if ($encode == 'UTF-8')
        {
           $new_file = iconv('UTF-8','gb2312',$new_file);
        }
          
        if (is_dir($file))
        {

          $this->addEmptyDir($new_file);
          $this->addDirWindows($file.'/',$base);
        }
        else
        {
          $this->addFile($file,$new_file);
        }
      }
    }


}

$src_file   ='./TestData/image/';
$zip_file   ='./TestData/image2.zip';
$unzip_file ='./TestData/image2/';

//测试
$zip = new CG_ZipArchive();
$zip->open($zip_file,ZipArchive::CREATE);
$zip->addDir($src_file,$src_file);
// $zip->addDirWindows($src_file,$src_file);
$zip->close();

$zip->open($zip_file);
$zip->extractDir($unzip_file);
$zip->close();

