<?php
namespace app\index\controller;

use app\admin\model\BannerModel;

class Index extends Common
{
    public function index()
    {
        $BannerModel = new BannerModel();
        $banner = $BannerModel->where(['position'=>1,"status"=>1])->order('createtime desc')->select();
        return view('',[
            'banner'=>$banner
        ]);
    }
}
