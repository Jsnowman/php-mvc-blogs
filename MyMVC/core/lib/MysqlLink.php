<?php
namespace core\lib;

class MysqlLink
{
    protected static $link;


    //把构造方法设置为私有
    private function __construct()
    {

    }

    /**
     * 获取数据库连接的单例
     * 从配置文件中 拿到数据库配置信息
     * 只连接一次数据库
     */


    static function getMysqlLink()
    {
        if(empty(self::$link)){
            $conf = \core\lib\Register::get('config')['mysql'];
            self::$link = self::connect($conf);
        }
        return self::$link;
    }

    protected static function connect($conf)
    {
        $link = mysqli_connect($conf['DB_HOST'], $conf['DB_USER'], $conf['DB_PWD']);
        if (!$link) {
            die('数据库连接失败');
        }
        mysqli_select_db($link, $conf['DB_NAME']);
        mysqli_set_charset($link, $conf['DB_CHARSET']);
        return $link;
    }
}