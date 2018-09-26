<?php
namespace app\index\controller;

use app\admin\model\BannerModel;
use app\admin\model\Honor;

class Kehu extends Common
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $banner = $BannerModel->where(['position'=>4,"status"=>1])->order('createtime desc')->select();
        $Honor = new Honor();
        $lists = $Honor->order('orderby desc')->paginate(10);
        return view('',[
            'banner'=>$banner,
            'lists'=>$lists
        ]);
    }
}
