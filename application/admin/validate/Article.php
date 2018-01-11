<?php

namespace app\admin\validate;

use think\Validate;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/11
 * Time: 13:34
 */
class Article extends Validate
{
    protected $rule = [
        'title' => 'require|max:25',
        'cateid' => 'require',
    ];

    protected $message = [
        'title:require' => '文章标题不能为空',
        'title:max' => '文章标题不能超过25个字符',
        'cateid:require' => '请选择文章所属栏目'
    ];

    protected $scene = [
        'add' => ['title', 'cateid'],
        'edit' => ['title', 'cateid']
    ];
}