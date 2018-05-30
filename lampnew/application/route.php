<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
/*  故障分析模块路由
 *
 */
//故障发生时段接口
Route::get('period','dashboard/repair/period');
//故障原因百分比接口
Route::get('cause','dashboard/repair/cause');
//故障发生区域接口
Route::get('area','dashboard/repair/area');