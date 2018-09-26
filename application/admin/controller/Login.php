<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 20:47
 */

namespace app\admin\controller;


use app\admin\model\AdminUser;
use think\Controller;
use think\Session;

class Login extends Controller
{
    /**
     * 登录页面
     */
    public function index()
    {
        if (request()->isPost()) {//登录成功
            //接受数据
            $username = trim(request()->param('username'));
            $password = trim(request()->param('password'));
            //处理数据
            $admin = new AdminUser();
            $user = $admin->where(['username' => $username])->find();
            if (empty($user)) {
                return json(['code' => 0, "msg" => "帐号不存在"]);
            }
            if (md5($password . $user['salt']) !== $user['password']) {
                return json(['code' => 0, "msg" => "密码错误"]);
            }
            if (empty($user['status'])){
                return json(['code'=>0,'msg'=>'此账号被禁用']);
            }
            //跳转页面
            session('adminuser',$user->toArray());
            return json(['code' => 1, "msg" => "登陆成功"]);
        }
        return view();
    }
    /**
     * 退出登录
     */
    public function logout()
    {
        Session::clear();
        $this->redirect('admin/login/index');
    }
}