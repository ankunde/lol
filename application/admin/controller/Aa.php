<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/26
 * Time: 9:50
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;

class Aa extends Controller
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
            return json(['code'=>1,'msg'=>'cas']);
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
    /**
     * layui测试
     */
    public function layui(){
        return view();
    }
    /**
     * layui上传图片测试
     */
    public function img(){
        return view();
    }
    /**
     * 页面布局测试
     */
    public function dwa()
    {
        return view();
    }
    /**
     * 下拉不停加载文本内容
     */
    public function select(){
        return view();
    }
    /**
     * 获取下拉加载内容
     * @return array
     */
    public function all(){
        $page = request()->param('page');
        $meiye = 3 ;
        $yema = ($page-1) * $meiye;
        $number = Db::query("select name from lol_selects limit {$yema},3");
        $count = Db::query("select count(*) as number from lol_selects ");
        $abc = ceil($count[0]['number']/3);
        $data =[];
        foreach ($number as $value){//img标签是加载图片,src方法会用到
            $data[]='<li>'.$value['name'].'</li>'.'<img lay-src="https://gw.alicdn.com/bao/uploaded/i2/701696736/TB2PNl5ahQa61Bjy0FhXXaalFXa_!!701696736.jpg_400x400q90.jpg?t=1538274111248">'
;
        }
//        return ['a'=>$abc,'b'=>$number];
        return ['a'=>$abc,'b'=>$data];
    }
    /**
     * 下拉不断加载图片以及内容
     * @return \think\response\View
     */
    public function src()
    {
        return view();
    }
    /**
     * 店铺样式
     */
    public function shop()
    {
        return view();
    }
}