<?php
namespace app\index\controller;

use app\admin\model\NewsModel;
use app\admin\model\Newstype;
use app\admin\model\SetModel;

class News extends Common
{
    public function index()
    {
        $pid = intval(request()->param('pid'));
        $Newstype = new Newstype();
        $type = $Newstype->order('orderby desc')->select();
        if (empty($pid)){
            $pid = $type[0]['id'];
        }
        $NewsModel = new NewsModel();
        $news = $NewsModel->where(['status'=>1,'type'=>$pid])->order('orderby desc,createtime desc')->select();
        $id = intval(request()->param('id'));

        if (empty($id)){
            $id = $news[0]['id'];
            $item = $news[0];
        }
        else{
            $item = $NewsModel->where(['status'=>1,'type'=>$pid,'id'=>$id])->find();
        }
        //取设置
        $setModel = new SetModel();
        $set = $setModel->where('id',1)->find();
        if (!empty($set)){
            $set = unserialize($set['content']);
        }
        else{
            $set = array(
                'title'=>'',
                'keywords'=>'',
                'description'=>'',
                'addresscn'=>'',
                'addressen'=>'',
                'shoplink'=>'',
                'mobile'=>'',
                'icp'=>'',
                'tel'=>'',
            );
        }
        !empty($set['toplogo'])?'':$set['toplogo'] = "";
        !empty($set['bottomlogo'])?'':$set['bottomlogo'] = "";
        !empty($set['qrcode'])?'':$set['qrcode'] = "";
        $set['title'] = $item['title'];
        $set['keywords'] = $item['keywords'];
        $set['description'] = $item['title'];
        $this->assign('set',$set);
        return view('',[
            'type'=>$type,
            'news'=>$news,
            'pid'=>$pid,
            'id'=>$id,
            'item'=>$item
        ]);
    }
}
