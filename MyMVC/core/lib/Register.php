<?php
namespace core\lib;

class Register
{
    protected static $objects;
    static function set($alias,$object)
    {
        self::$objects[$alias] = $object;
    }
    static function get($name)
    {
        return self::$objects[$name];
    }
    static function _unset($name)
    {
        unset(self::$objects[$name]);
    }
}