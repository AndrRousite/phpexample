<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 10:53
 */

namespace app\admin\controller;


use app\admin\model\Article;
use think\Loader;

class ArticleController extends Super
{
    public function lst()
    {
        $article = new Article();
        $list = $article->paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = [
                'title' => input('title'),
                'author' => input('author'),
                'desc' => input('desc'),
                'keywords' => input('keywords'),
                'content' => input('content'),
                'cateid' => input('cateid'),
                'time' => time(),
            ];
            if (input('state') == 'on') {
                $data['state'] = 1;
            }
            if ($_FILES['pic']['tmp_name']) {
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic'] = '/uploads/' . $info->getSaveName();
            }
            $validate = Loader::validate('Article');
            if (!$validate->scene('add')->check($data)) {
                $this->error($validate->getError());
                die;
            }
            if (db('article')->insert($data)) {
                $this->success('发表文章成功', 'lst');
                die;
            } else {
                $this->error('发表文章失败');
                die;
            }
        }
        $cateres = db('cates')->select();
        $this->assign('cateres', $cateres);
        return $this->fetch();
    }
}