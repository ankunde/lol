<?php
namespace app\admin\controller;

use app\admin\model\About;
use app\admin\model\Advantage;
use app\admin\model\Honor;
use app\admin\model\Mazhu;
use app\admin\model\NewsModel;
use app\admin\model\Newstype;

class Content extends Common
{
    public function index()
    {
        $Advantage = new Advantage();
        $lists = $Advantage->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function add()
    {
        $id = intval(request()->param('id'));
        $Advantage = new Advantage();
        if (request()->isPost()) {
            $param['title'] = trim(request()->post('title'));
            $param['miss'] = trim(request()->post('miss'));
            $param['type'] = intval(request()->post('type'));
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
                $Advantage->save($param);
            } else {
                $Advantage->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'title' => '',
                'miss' => '',
                'thumb' => "/public/static/admin/img/add.jpg",
                'type'=>0,
            );
        } else {
            $item = $Advantage->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function del()
    {
        $id = intval(request()->param('id'));
        $Advantage = new Advantage();
        $Advantage->where('id', $id)->delete();
        $this->redirect('admin/content/index');
    }

    public function honor(){
        $Honor = new Honor();
        $lists = $Honor->order('orderby desc')->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function honoradd()
    {
        $id = intval(request()->param('id'));
        $Honor = new Honor();
        if (request()->isPost()) {
            $param['orderby'] = intval(request()->post('orderby'));
            $param['type'] = intval(request()->post('type'));
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
                $Honor->save($param);
            } else {
                $Honor->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'orderby' => 0,
                'thumb' => "/public/static/admin/img/add.jpg",
                'type'=>0,
            );
        } else {
            $item = $Honor->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function honordel()
    {
        $id = intval(request()->param('id'));
        $Honor = new Honor();
        $Honor->where('id', $id)->delete();
        $this->redirect('admin/content/honor');
    }

    public function mazhu(){
        $Mazhu = new Mazhu();
        $lists = $Mazhu->order('orderby desc')->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function mazhuadd()
    {
        $id = intval(request()->param('id'));
        $Mazhu = new Mazhu();
        if (request()->isPost()) {
            $param['orderby'] = intval(request()->post('orderby'));
            $param['type'] = intval(request()->post('type'));
            $param['title'] = trim(request()->post('title'));
            $param['miss'] = trim(request()->post('miss'));
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
                $Mazhu->save($param);
            } else {
                $Mazhu->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'orderby' => 0,
                'thumb' => "/public/static/admin/img/add.jpg",
                'type'=>1,
                'title'=>"",
                'miss'=>"",
            );
        } else {
            $item = $Mazhu->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function mazhudel()
    {
        $id = intval(request()->param('id'));
        $Mazhu = new Mazhu();
        $Mazhu->where('id', $id)->delete();
        $this->redirect('admin/content/mazhu');
    }

    public function about(){
        $About = new About();
        $lists = $About->order('orderby desc')->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function aboutadd()
    {
        $id = intval(request()->param('id'));
        $About = new About();
        if (request()->isPost()) {
            $param['orderby'] = intval(request()->post('orderby'));
            $param['type'] = intval(request()->post('type'));
            $param['title'] = trim(request()->post('title'));
            $param['miss'] = request()->post('miss');
            $param['time'] = request()->post('time');
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
                $About->save($param);
            } else {
                $About->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'orderby' => 0,
                'thumb' => "/public/static/admin/img/add.jpg",
                'type'=>1,
                'title'=>"",
                'miss'=>"",
                'time'=>date('Y-m-d'),
            );
        } else {
            $item = $About->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function aboutdel()
    {
        $id = intval(request()->param('id'));
        $About = new About();
        $About->where('id', $id)->delete();
        $this->redirect('admin/content/about');
    }

    public function newstype(){
        $Newstype = new Newstype();
        $lists = $Newstype->order('orderby desc')->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function newstypeadd()
    {
        $id = intval(request()->param('id'));
        $Newstype = new Newstype();
        if (request()->isPost()) {
            $param['orderby'] = intval(request()->post('orderby'));
            $param['name'] = trim(request()->post('name'));
            if (empty($id)) {
                $Newstype->save($param);
            } else {
                $Newstype->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'orderby' => 0,
                'name' => "",
            );
        } else {
            $item = $Newstype->where('id', $id)->find()->toArray();
        }
        return view('', [
            'item' => $item
        ]);
    }

    public function newstypedel()
    {
        $id = intval(request()->param('id'));
        $Newstype = new Newstype();
        $Newstype->where('id', $id)->delete();
        $this->redirect('admin/content/newstype');
    }

    public function news(){
        $NewsModel = new NewsModel();
        $lists = $NewsModel->order('orderby desc,createtime desc')->paginate(10);
        return view('', [
            'lists' => $lists,
            'pager' => $lists->render()
        ]);
    }

    public function newsadd()
    {
        $id = intval(request()->param('id'));
        $NewsModel = new NewsModel();
        if (request()->isPost()) {
            $param['orderby'] = intval(request()->post('orderby'));
            $param['title'] = trim(request()->post('title'));
            $param['miss'] = request()->post('miss');
            $param['keywords'] = request()->post('keywords');
            $param['description'] = request()->post('description');
            $param['createtime'] = strtotime(request()->post('createtime'));
            $param['type'] = intval(request()->post('type'));
            if (empty($id)) {
                $NewsModel->save($param);
            } else {
                $NewsModel->save($param, ['id' => $id]);
            }
            return json(['code' => 1, 'msg' => '保存成功']);
        }
        if (empty($id)) {
            $item = array(
                'id' => 0,
                'orderby' => 0,
                'title' => "",
                'miss' => "",
                'keywords' => "",
                'description' => "",
                'createtime' => date('Y-m-d'),
                'type' => 0,
            );
        } else {
            $item = $NewsModel->where('id', $id)->find()->toArray();
            $item['createtime'] = date('Y-m-d',$item['createtime']);
        }
        $Newstype = new Newstype();
        $lists = $Newstype->order('orderby desc')->select();
        return view('', [
            'item' => $item,
            'type' => $lists
        ]);
    }

    public function newsdel()
    {
        $id = intval(request()->param('id'));
        $NewsModel = new NewsModel();
        $NewsModel->where('id', $id)->delete();
        $this->redirect('admin/content/news');
    }

    public function changeStatus(){
        $id = intval(request()->param('id'));
        $status  = intval(request()->param('status'));
        $NewsModel = new NewsModel();
        $NewsModel->save(['status'=>$status],['id'=>$id]);
        return json(['code'=>1,'msg'=>"修改成功"]);
    }

}
