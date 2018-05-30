<?php

// +----------------------------------------------------------------------
// | Project: KuShenZhiNeng Lamp version 1.0
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2117 http://www.hebeicool.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: ChengJiangHao <itcjh@sina.com>
// +----------------------------------------------------------------------
// | Date: 2018/4/26
// +----------------------------------------------------------------------
// | Time: 15:29
// +----------------------------------------------------------------------
// | Notice:
// +----------------------------------------------------------------------
namespace app\dashboard\controller;
use think\Controller;
use app\dashboard\model\Area;
use app\dashboard\model\Electric;
class Data extends Controller
{
    /**

     */
    public function data()
    {
        $data = new Area;
        $list = $data->city();
    }
    public function arr()
    {
        $data = Electric::get(1);
        return $data->create_time;
    }
}