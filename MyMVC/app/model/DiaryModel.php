<?php
namespace app\model;

/**
 *
 */
class DiaryModel extends \core\lib\Model
{
    function getDiary()
    {
        return $this->order('sequence')->select();
    }
}