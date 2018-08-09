<?php
namespace app\model;

/**
 *
 */
class CountModel extends \core\lib\Model
{
    function countUpdate()
    {
        if(empty($_SESSION['count'])){

            $this->where('id=1')->update('count=count+1');
            $_SESSION['count'] = 'count';
        }


    }
    function getCount()
    {
        $c = $this->where('id=1')->select();
        return $c[0]['count'];
    }
}