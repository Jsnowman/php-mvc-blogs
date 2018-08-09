<?php
/*
 * 配置自动加载类
 * $config = new \ss\Config(__DIR__.'/configs');
 * var_dump($config['database']);
 * 初始化该类后创建的对象会以数组的形式存储配置信息
 * */
/***
 * 配置自动加载类
 */
namespace core\lib;

class Config implements \ArrayAccess
{
    protected $path;
    protected $configs = array();

    function __construct($path)
    {
        $this->path = $path;
    }

    function offsetGet($key)
    {
        if (empty($this->configs[$key]))
        {
            $file_path = $this->path.'/'.$key.'.php';
            $config = require $file_path;
            $this->configs[$key] = $config;
        }
        return $this->configs[$key];
    }

    function offsetSet($key, $value)
    {
        throw new \Exception("cannot write config file.");
    }

    function offsetExists($key)
    {
        return isset($this->configs[$key]);
    }

    function offsetUnset($key)
    {
        unset($this->configs[$key]);
    }
}