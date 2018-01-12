<?php

namespace app\demo1\controller;

use app\common\controller\BaseController;
use think\Db;

class IndexController extends BaseController
{
    public function index()
    {
        $list = Db::name('demo1')->paginate(10);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function detail($id)
    {
        $detail = \db('demo1')->find(array('id' => $id));
        $this->assign('detail', $detail);
        return $this->fetch();
    }

    public function create()
    {
        if (request()->isPost()) {
            $data = [
                'title' => input('title'),
                'content' => input('content'),
                'time' => time()
            ];
            $validate = validate('Demo1');
            if (!$validate->check($data)) {
                $this->error('发表留言失败');
                die;
            }
            if (\db('demo1')->insert($data)) {
                $this->success('发表留言成功', 'index');
                die;
            } else {
                $this->error('发表留言失败');
                die;
            }
        }
        return $this->fetch();
    }

    public function update($id)
    {
        if (request()->isPost()) {
            $data = [
                'title' => input('title'),
                'content' => input('content'),
                'time' => time(),
            ];

            $validate = validate('Demo1');
            if (!$validate->check($data)) {
                $this->error('修改失败');
                die;
            }
            $result = \db('demo1')->where('id', '=', input('id'))->update($data);
            if ($result) {
                $this->success('修改成功', 'index');
                die;
            } else {
                $this->error('修改失败');
                die;
            }
        }
        $detail = \db('demo1')->where('id', $id)->find();
        $this->assign('detail', $detail);
        return $this->fetch();
    }

    public function delete($id)
    {
        if (\db('demo1')->delete(array('id' => $id))) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}
