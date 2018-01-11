<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 14:11
 */

namespace app\admin\controller;


use app\admin\model\Tags;

class TagsController extends Super
{
    public function lst()
    {
        $tags = new Tags();
        $list = $tags->paginate(10);
        $this->assign('list', $list);
        return $this->fetch();
    }
}