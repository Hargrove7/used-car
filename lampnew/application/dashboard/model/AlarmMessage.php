<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/19
 * Time: 10:39
 */

namespace app\dashboard\model;


class AlarmMessage extends \think\Model
{
    protected function scopeTime($query)
    {
        $query->field('count(upload_time) num,upload_time')->group('upload_time')->order('num desc');
    }

    protected function scopeCause($query)
    {
        $query->field('count(alarm_cause) num,alarm_cause')->group('alarm_cause')->order('num desc');
    }

    protected function scopeArea($query)
    {
        $join = [
            ['lights w','a.lights_id = w.lights_id'],
            ['group q','w.area_id = q.area_id'],
        ];
        $query->alias('a')->join($join)->group('a.lights_id')->order('num desc')->field('count(a.lights_id) num,a.lights_id,group_name');
    }
}