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
namespace app\dashboard\model;
use think\Model;
class Area extends Model
{
    /**
     *  获取全部省
     *  @param array|string province_name 省名称
     *  @param array|string province_id 省id
     *  @ return: json
     */
    public function province()
    {
        //返回前端获取点击的省ID
        $data = db('area')->field('province_name')
            ->distinct(true)
            ->field('province_name,province_id')
            ->select();
        $this->assign('data',json_encode($data));
    }
        /**
         *  获取全部市
         *  @param array|string $province_id 省id
         *  @ return: json
         */
    public function city()
    {
        $province_id = input('province_id');
        $arr['province_id'] = $province_id;
        $city = db('area')->where($arr)->field('city_id,city_name')->select();
        return json_encode($city);
    }
        /**
         *  获取全部区县
         *  @param array|string $city_id 市id
         *  @ return: json
         */
    public function county()
    {
        $city_id = input('city_id');
        $arr['city_id'] = $city_id;
        $county = db('area')->where($arr)->field('county_id,county_name')->select();
        return json_encode($county);
    }
        /**
         *  获取全部镇
         *  @param array|string $county_id 镇id
         *  @ return: json
         */
    public function town()
    {
        $county_id = input('county_id');
        $arr['county_id'] = $county_id;
        $town = db('area')->where($arr)->field('town_id,town_name')->select();
        return json_encode($town);
    }
        /**
         *  获取全部省
         *  @param array|string town_id 村id
         *  @ return: json
         */
    public function village()
    {
        $town_id = input('town_id');
        $arr['town_id'] = $town_id;
        $village = db('area')->where($arr)->field('village_id,village_name')->select();
        return json_encode($village);
    }
}