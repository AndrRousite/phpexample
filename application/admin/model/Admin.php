<?php

namespace app\admin\model;

use think\captcha\Captcha;
use think\Db;
use think\Model;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 10:11
 */
class Admin extends Model
{
    public function login($data)
    {
        $captcha = new Captcha();
        if (!$captcha->check($data['code'])) {
            return 3;// 验证码错误
        }
        $user = Db::name('admin')->where('username', '=', $data['username'])->find();
        if ($user) {
            if ($user['password'] == md5($data['password'])) {
                session('username', $user['username']);
                session('uid', $user['id']);
                return 0;
            } else {
                return 2; // 密码错误
            }
        } else {
            return 1; // 用户不存在
        }
    }
}