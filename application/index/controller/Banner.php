<?php
namespace app\index\controller;

use app\admin\model\Advantage;
use app\admin\model\BannerModel;

class Banner extends Common
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $banner = $BannerModel->where(['position'=>2,"status"=>1])->order('createtime desc')->select();
        $banners = $BannerModel->where(['position'=>5,"status"=>1])->order('createtime desc')->select();

        $Advantage = new Advantage();
        $Lists = $Advantage->order('type desc')->select();
        return view('',[
            'banner'=>$banner,
            'banners'=>$banners,
            'lists'=>$Lists
        ]);
    }
}
