<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 10:04
 */

namespace app\admin\controller;


use app\admin\model\Admin;
use app\common\controller\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        if (request()->isPost()) {
            $admin = new Admin();
            $data = input('post.');
            $code = $admin->login($data);
            switch ($code) {
                case 0:
                    $this->success('正在跳转，请稍后...', 'index/index');
                    break;
                case 1:
                case 2:
                    $this->error("用户名或者密码错误");
                    break;
                case 3:
                    $this->error('验证码错误');
                    break;

            }
        }
        return $this->fetch('login');
    }
}