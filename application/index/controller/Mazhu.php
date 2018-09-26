<?php
namespace app\index\controller;

use app\admin\model\BannerModel;

class Mazhu extends Common
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $banner = $BannerModel->where(['position'=>3,"status"=>1])->order('createtime desc')->select();
        $Mazhu = new \app\admin\model\Mazhu();
        $lists = $Mazhu->order('orderby desc')->select();
        return view('',[
            'banner'=>$banner,
            'lists'=>$lists,
        ]);
    }
}
