<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 9:53
 */

namespace app\admin\controller;


use app\admin\model\Admin;
use think\Loader;

class AdminController extends Super
{
    /**
     * 获取管理员列表
     */
    public function lst()
    {
        $admin = new Admin();
        $list = $admin->paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function test(){

    }
}