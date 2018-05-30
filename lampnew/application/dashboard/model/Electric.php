<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/27
 * Time: 11:33
 */

namespace app\dashboard\model;
use think\Model;

class Electric extends Model
{
    protected function getCreateTimeAttr($create_time)
    {
        return date('Y-m-d', $create_time);
    }
}