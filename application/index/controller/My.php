<?php
namespace app\index\controller;

use app\admin\model\About;

class My extends Common
{
    public function index()
    {
        $About = new About();
        $lists = $About->order('orderby desc')->select();
        return view('',[
            'list'=>$lists
        ]);
    }
}
