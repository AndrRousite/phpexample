<?php

namespace app\demo1\validate;

use think\Validate;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/12
 * Time: 15:59
 */
class Demo1 extends Validate
{
    protected $rule = [
        'title' => 'require|max:25',
        'content' => 'require',
    ];

    protected $message = [
        'title:require' => '标题不能为空',
        'title:max' => '标题不能超过25个字符',
        'content:require' => '内容不能为空'
    ];
}