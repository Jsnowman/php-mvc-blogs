<?php
namespace core\lib;

class Factory
{
    protected static $conf;

    /**
     * @param $objname 需要创建的对象在配置文件中的名字
     * @return mixed 返回的是该对象
     */
    static function getObj($objname)
    {
        if(empty(self::$conf)) {
            $conf = \core\lib\Register::get('config')['factory'];
           // var_dump($conf);
            self::$conf = $conf;
        }
        //var_dump($objname);
        $objname = self::$conf[$objname];
        return new $objname();

    }



}
