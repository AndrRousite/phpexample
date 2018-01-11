<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 10:54
 */

namespace app\admin\model;


use think\Model;

class Article extends Model
{
    public function cates()
    {
        return $this->belongsTo('cates', 'id');
    }
}