<?php
// +----------------------------------------------------------------------
// | Project: KuShenZhiNeng Lamp version 1.0
// +----------------------------------------------------------------------
// | Copyright (c) 2017~2117 http://www.hebeicool.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: ChengJiangHao <itcjh@sina.com>
// +----------------------------------------------------------------------
// | Date: 2018/5/19
// +----------------------------------------------------------------------
// | Time: 15:29
// +----------------------------------------------------------------------
// | Notice:
// +----------------------------------------------------------------------
namespace app\dashboard\controller;
use think\Db;
use app\dashboard\model\AlarmMessage;
class Repair extends \think\Controller
{
    /**
     *  显示故障发生时段接口
     *  @param array|string 上报时间
     *  @ return: json
     */
    public function period()
    {
        //调用查询范围并查询
        $time = AlarmMessage::scope('time')->select();
        //查询总数
        $num = db('alarm_message')->select();
        //获取个数
        $count = count($num);
        foreach ($time as $k => $v)
        {
            $arr[] = $v->toArray();
            if(is_array($arr)){
                //遍历进行百分比转换
                $list[$k]['percent'] = round($arr[$k]['num']/$count*100,2)."%";
                //遍历区域名
                $list[$k]['upload_time'] = $arr[$k]['upload_time'];
            }
        }
        return json_encode($list);
    }
    /**
     *  故障原因百分比接口
     *  @param array 故障原因 alarm_cause
     *  @param array 故障百分比 percent
     *  @ return: json
     */
    public function cause()
    {
        //调用查询范围并查询
        $cause = AlarmMessage::scope('cause')->select();
        //查询总数
        $num = db('alarm_message')->select();
        //获取个数
        $count = count($num);
        foreach ($cause as $k => $v)
        {
            //将对象转为数组
            $arr[] = $v->toArray();
            if(is_array($arr)){
                //遍历进行百分比转换
                $list[$k]['percent'] = round($arr[$k]['num']/$count*100,2)."%";
                //遍历区域名
                $list[$k]['alarm_cause'] = $arr[$k]['alarm_cause'];
            }
        }
        return json_encode($list);
    }
    /**
     *  故障区域百分比接口
     *  @param array 故障区域名称 group_name
     *  @param array 故障百分比 percent
     *  @ return: json
     */
    public function area()
    {
        //调用查询范围并查询
        $area = AlarmMessage::scope('area')->select();
        //查询总数
        $num = db('alarm_message')->select();
        //获取个数
        $count = count($num);
        foreach ($area as $k => $v)
        {
            //将对象转为数组
            $arr[] = $v->toArray();
            if(is_array($arr)){
                //遍历进行百分比转换
                $data[$k]['percent'] = round($arr[$k]['num']/$count*100,2)."%";
                //遍历区域名
                $data[$k]['group_name'] = $arr[$k]['group_name'];
            }
        }
        return json_encode($data);
    }
}