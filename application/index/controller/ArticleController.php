<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 9:34
 */

namespace app\index\controller;


class ArticleController extends Super
{
    /**
     * 获取文章详情
     */
    public function index()
    {
        $id = input('arid');

        $articles = db('article')->find($id);

        $ralateres = $this->ralat($articles['keywords'], $articles['id']);

        db('article')->where('id', '=', $id)->setInc('click');

        $cates = db('cates')->find($articles['cateid']);
        $recres = db('article')->where(array('cateid' => $cates['id'], 'state' => 1))->limit(8)->select();
        $this->assign(array(
            'articles' => $articles,
            'cates' => $cates,
            'recres' => $recres,
            'ralateres' => $ralateres
        ));
        return $this->fetch('article');
    }

    public function ralat($keywords, $id)
    {
        $arr = explode(',', $keywords);
        static $ralateres = array();

        foreach ($arr as $k => $v) {
            $map['keywords'] = ['like', '%' . $v . '%'];
            $map['id'] = ['neq', $id];
            $artres = db('article')->where($map)->order('id desc')->limit(8)->select();
            $ralateres = array_merge($ralateres, $artres);
            if ($ralateres) {
                $ralateres = array_unique($ralateres);
                return $ralateres;
            }
        }
    }
}