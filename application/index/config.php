<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/10
 * Time: 18:17
 */
return [
    'view_replace_str' => [
        '__PUBLIC__' => SITE_PATH . '/public/static/index',
        '__IMG__' => SITE_PATH . '/public/static',
    ],
    'template' => [
        'layout_on' => true,
        'layout_name' => 'layout',
        'layout_item' => '{__CONTENT__}'
    ]
];