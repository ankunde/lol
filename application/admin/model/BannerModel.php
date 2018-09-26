<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 21:19
 */

namespace app\admin\model;


use think\Model;

class BannerModel extends Model
{
    protected $name = 'banner';
    protected  $autoWriteTimestamp = false;
    protected $updateTime = false;
}