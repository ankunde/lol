<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 21:19
 */

namespace app\admin\model;


use think\Model;

class AdminUser extends Model
{
    protected $name='admin_user';
    protected  $autoWriteTimestamp=false;
    protected $updateTime=false;
}