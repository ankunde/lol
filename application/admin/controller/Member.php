<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/19
 * Time: 23:01
 */

namespace app\admin\controller;


use app\admin\model\AdminUser;

class Member extends Common
{
    public function index()
    {
        $admin = AdminUser::all();
        return $this->fetch('index',compact('admin'));
    }

    public function save(){
        if(request()->isPost()){
            //接受数据
            $nickname = trim(request()->param('nickname'));
            $username = trim(request()->param('username'));
            $password = trim(request()->param('password'));
            //处理数据
            $mt_rand = random();
            $new_pwd = md5($password.$mt_rand);
            //保存数据
            $data =['nickname'=>$nickname,'username'=>$username,'password'=>$new_pwd,'salt'=>$mt_rand];
            AdminUser::create($data);
            //返回并提示
            return json(['code' => 1, "msg" => "注册成功"]);
        }
        return view();
    }

    public function edit(){
        $id = request()->param('id');
        $row = AdminUser::find($id);
        if(request()->isPost()){
            //接受数据
            $nickname = trim(request()->param('nickname'));
            $username = trim(request()->param('username'));
            $password = trim(request()->param('password'));
            $newpassword = trim(request()->param('newpassword'));
            $newpwd = trim(request()->param('newpwd'));
            //处理数据
            if($newpassword!==$newpwd){
                return json(['code' => 0, "msg" => "两次输入密码不一致"]);
            }
            //查询数据库密码
            $user = AdminUser::where(['id' => $id])->find();
            if (md5($password . $user['salt']) !== $user['password']) {
                return json(['code' => 0, "msg" => "密码错误"]);
            }
            //获取随机字符串
            $mt_rand = random();
            $new_pwd = md5($newpwd.$mt_rand);
            //拼接数组
            $data = ['nickname'=>$nickname,'username'=>$username,'password'=>$new_pwd,'salt'=>$mt_rand];
            $row->update($data,['id'=>$id]);
            //返回页面并提示
            return json(['code'=>1,'msg'=>'修改信息成功']);
        }
        return $this->fetch('edit',compact('row'));
    }

    public function del(){
        $id = request()->param('id');
        AdminUser::destroy(['id'=>$id]);
        $this->redirect('admin/member/index');
    }
}