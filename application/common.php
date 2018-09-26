<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//用于生产随机字符串
function random($length = 10, $type = 0)
{
    if ($type == 0) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    } else {
        $chars = '0123456789';
    }
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

//用于获取广告分类或广告名称
function getBanner($id = 0){
    $data = array(
        1=>'首页',
        2=>'广告联盟',
        3=>'码主联盟',
        4=>'客户案例',
        5=>"联盟轮播"
    );
    if (empty($id)){
        return $data;
    }
    return $data[$id];
}

//获取新闻类型名称
function getTypeName($id){
    $Newstype = new \app\admin\model\Newstype();
    $res = $Newstype->where('id',intval($id))->field('name')->find();
    if (empty($res)){
        return "";
    }
    return $res['name'];
}