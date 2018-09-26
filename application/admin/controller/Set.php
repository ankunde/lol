<?php

namespace app\admin\controller;


use app\admin\model\BannerModel;
use app\admin\model\LinksModel;
use app\admin\model\SetModel;

class Set extends Common
{
    public function index()
    {
        $setModel = new SetModel();
        $item = $setModel->where('id', 1)->field('content')->find();
        if (request()->isPost()) {
            $param = request()->post();
            $thumb = request()->file('toplogo');
            if (!empty($thumb)) {
                $thumbInfo = $thumb->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'toplogo');
                if ($thumbInfo) {
                    $param['toplogo'] = '/public' . DS . 'uploads' . DS . 'toplogo/' . $thumbInfo->getSaveName();
                } else {
                    return json(['code' => 0, 'msg' => $thumb->getError()]);
                }
            }
            $thumb = request()->file('bottomlogo');
            if (!empty($thumb)) {
                $thumbInfo = $thumb->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'bottomlogo');
                if ($thumbInfo) {
                    $param['bottomlogo'] = '/public' . DS . 'uploads' . DS . 'bottomlogo/' . $thumbInfo->getSaveName();
                } else {
                    return json(['code' => 0, 'msg' => $thumb->getError()]);
                }
            }
            $thumb = request()->file('qrcode');
            if (!empty($thumb)) {
                $thumbInfo = $thumb->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'qrcode');
                if ($thumbInfo) {
                    $param['qrcode'] = '/public' . DS . 'uploads' . DS . 'qrcode/' . $thumbInfo->getSaveName();
                } else {
                    return json(['code' => 0, 'msg' => $thumb->getError()]);
                }
            }
            $item = unserialize($item['content']);
            if (!empty($item['toplogo'])) {
                !empty($param['toplogo']) ? '' : $param['toplogo'] = $item['toplogo'];
            }
            if (!empty($item['qrcode'])) {
                !empty($param['qrcode']) ? '' : $param['qrcode'] = $item['qrcode'];
            }
            if (!empty($item['bottomlogo'])) {
                !empty($param['bottomlogo']) ? '' : $param['bottomlogo'] = $item['bottomlogo'];
            }
            $param = serialize($param);
            if (empty($item)) {
                $setModel->save(['content' => $param]);
            } else {
                $setModel->save(['content' => $param], ['id' => 1]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (!empty($item)) {
            $item = unserialize($item['content']);
        } else {
            $item = array(
                'title' => '',
                'keywords' => '',
                'description' => '',
                'addresscn' => '',
                'addressen' => '',
                'shoplink' => '',
                'mobile' => '',
                'icp' => '',
                'tel' => '',
            );
        }
        !empty($item['toplogo']) ? '' : $item['toplogo'] = "/public/static/admin/img/add.jpg";
        !empty($item['bottomlogo']) ? '' : $item['bottomlogo'] = "/public/static/admin/img/add.jpg";
        !empty($item['qrcode']) ? '' : $item['qrcode'] = "/public/static/admin/img/add.jpg";
        return view('', [
            'item' => $item
        ]);
    }

    public function links()
    {
        $linksModel = new LinksModel();
        $lists = $linksModel->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function add()
    {
        $id = intval(request()->param('id'));
        $linksModel = new LinksModel();
        if (request()->isPost()) {
            $param['name'] = trim(request()->post('name'));
            $param['linkurl'] = trim(request()->post('linkurl'));
            if (empty($id)) {
                $param['createtime'] = time();
                $linksModel->save($param);
            } else {
                $linksModel->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'name' => '',
                'linkurl' => '',
                'createtime' => 0,
            );
        } else {
            $item = $linksModel->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function del()
    {
        $id = intval(request()->param('id'));
        $linksModel = new LinksModel();
        $linksModel->where('id', $id)->delete();
        $this->redirect('admin/set/links');
    }

    public function banner(){
        $BannerModel = new BannerModel();
        $lists = $BannerModel->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function banneradd(){
        $id = intval(request()->param('id'));
        $BannerModel = new BannerModel();
        if (request()->isPost()) {
            $param['name'] = trim(request()->post('name'));
            $param['linkurl'] = trim(request()->post('linkurl'));
            $param['position'] = intval(request()->post('position'));
            $param['content'] = request()->post('content');
            $thumb = request()->file('thumb');
            if (!empty($thumb)) {
                $thumbInfo = $thumb->move(ROOT_PATH . 'public' . DS . 'uploads' . DS . 'thumb');
                if ($thumbInfo) {
                    $param['thumb'] = '/public' . DS . 'uploads' . DS . 'thumb/' . $thumbInfo->getSaveName();
                } else {
                    return json(['code' => 0, 'msg' => $thumb->getError()]);
                }
            }

            if (empty($id)) {
                $param['createtime'] = time();
                $BannerModel->save($param);
            } else {
                $BannerModel->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'name' => '',
                'linkurl' => '',
                'thumb' => "/public/static/admin/img/add.jpg",
                'position' => 1,
                'content' => "",
            );
        } else {
            $item = $BannerModel->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function bannerdel(){
        $id = intval(request()->param('id'));
        $BannerModel = new BannerModel();
        $BannerModel->where('id', $id)->delete();
        $this->redirect('admin/set/banner');
    }

    public function changeStatus(){
        $id = intval(request()->param('id'));
        $status  = intval(request()->param('status'));
        $BannerModel = new BannerModel();
        $BannerModel->save(['status'=>$status],['id'=>$id]);
        return json(['code'=>1,'msg'=>"修改成功"]);
    }
}
