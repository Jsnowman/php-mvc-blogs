<?php
/**
 * 存到文件中
 */

namespace core\lib\drive\log;

use core\lib\Register;

class File
{
    private $path;
    public function __construct()
    {
        $this->path = Register::get('config')['log']['OPTION']['PATH'];//拿到配置文件中的日志文件的目录
    }
    public function log($message,$file='log')
    {
        /**
         * 文件是否存在
         * 写入日志
         */
        if(!is_dir($this->path)){
            mkdir($this->path,'0777',true);
        }
        $message = date('Y-m-d H:i:s').':'.$message;
       // var_dump($message);
        return file_put_contents($this->path.$file.'.php',$message.PHP_EOL,FILE_APPEND);
    }

}
