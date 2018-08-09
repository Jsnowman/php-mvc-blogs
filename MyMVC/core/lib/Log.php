<?php
/**
 *
 */
namespace core\lib;

use core\lib\Register;

class Log
{
    /**
     * 1确定日志存储方式
     * 2写日志
     */
    static $class;
    //日志添加
    static public function init($message)
    {
        $drive = Register::get('config')['log']['DRIVE'];//拿到配置文件中的配置信息
        //var_dump($drive['log']);
        $class = '\core\lib\drive\log\\'.$drive;
        self::$class = new $class;
        //var_dump(self::$class);
        self::$class->log($message);
    }


}