<?php

// +----------------------------------------------------------------------
// | Project: KuShenZhiNeng Lamp version 1.0
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2117 http://www.hebeicool.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: ChengJiangHao <itcjh@sina.com>
// +----------------------------------------------------------------------
// | Date: 2018/5/18
// +----------------------------------------------------------------------
// | Time: 15:29
// +----------------------------------------------------------------------
// | Notice:
// +----------------------------------------------------------------------
namespace app\dashboard\controller;
use think\Controller;
use app\dashboard\model\StealProtection;
class alarm extends Controller
{
    /**
     *  报警设置数据
     *  @param array 县区域名称 county_name
     *  @param array 县区域id county_id
     *  @param array 区域id area_id
     *  @ return: json
     */
    public function data()
    {
        $arr = [
            ['area h','a.area_id = h.county_id'],
        ];
        $data = db('steal_protection')
            ->alias('a')
            ->join($arr)
            ->field('area_id,county_id,county_name')
            ->distinct(true)
            ->select();
        $join = [
            ['group w','a.area_id = w.area_id']
        ];
       $circuit = db('circuit')
           ->alias('a')
           ->join($join)
           ->select();
       return json_encode(array($data,$circuit));
    }
    /**
     *  报警设置更新
     *  @param array 区域ID area_id
     *  @param array 开启报警 is_alarm
     *  @param array 电缆防盗 is_cablesteal
     *  @param array 集中器防盗 is_centersteal
     *  @param array 短信通知 is_smsinfo
     *  @ return: json
     */
    public function inform()
    {
        $steal = new StealProtection();
        $arr = $steal->allowField(true)->save($_GET,['area_id'=>$_GET['area_id']]);
        if(true != $arr)
        {
            $arr = ['code' => 500,'msg' => '保存失败'];
            return json_encode($arr);
        } else {
            $arr = ['code' => 200,'msg' => '保存成功'];
            return json_encode($arr);
        }
    }

}