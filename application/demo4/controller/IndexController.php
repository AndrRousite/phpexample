<?php

namespace app\demo4\controller;

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
}