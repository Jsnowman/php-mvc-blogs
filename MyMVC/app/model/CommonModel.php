<?php
namespace app\model;
use core\lib\Factory;
/**
 *
 */
class CommonModel
{
    //获取右边数据
    function getRight(){
        $essay = Factory::getObj('essay');
        $where = 'isdel = 0';
        $field = 'tid,title';
        //最新数据
        $data['news'] = $essay->table('essay')->field($field)->where($where)->order('addtime desc')->limit('0,5')->select();
        //最热数据
        $data['hots'] = $essay->table('essay')->field($field)->where($where)->order('lookcount desc')->limit('0,5')->select();
        return $data;
    }


}