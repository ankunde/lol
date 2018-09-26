<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26
 * Time: 9:50
 */

namespace app\admin\controller;


class Aa
{
    /**
     * 单图片上传测试
     * @return \think\response\Json|\think\response\View
     */
    public function index()
    {
        if(request()->isPost()){
            $logo = request()->file('logo');
            if(!empty($logo)){
                $logo->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'toplogo');
                return json(['code'=>1,'msg'=>'上传文件成功']);
            }else{
                return json(['code'=>0,'msg'=>'上传文件失败']);
            }
        }
        return view();
    }
    /**
     * 多图片上传测试
     */
    public function add()
    {
        if(request()->isPost()){

        }
        return view();
    }
    /**
     *  jquery.form插件测试
     */
    public function love(){
        return view();
    }
    public function love1(){
        if (request()->post()){
            $strName = request()->param('name');
            $strAge = request()->param('age');
            $strCountry = request()->param('country');
            $data = [$strName,$strAge,$strCountry];
            return json(['code'=>1,'msg'=>$data]);
        }
        return view();
    }
}