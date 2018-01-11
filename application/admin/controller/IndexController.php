<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 9:58
 */

namespace app\admin\controller;


class IndexController extends Super
{
    public function index()
    {
        return $this->fetch();
    }
}