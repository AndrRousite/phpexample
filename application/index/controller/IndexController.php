<?php

namespace app\index\controller;

class IndexController extends Super
{
    public function index()
    {
        $articles = db('article')->order('id desc')->paginate(3);

        $this->assign('articles', $articles);

        return $this->fetch();
    }
}
