<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 21:19
 */

namespace app\admin\model;


use think\Model;

class Newstype extends Model
{
    protected $name = 'news_type';
    protected  $autoWriteTimestamp = false;
    protected $updateTime = false;
}