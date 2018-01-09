<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/9
 * Time: 14:33
 */
$arr = array(
    array("name" => '刘枫', 'pwd' => md5('123456')),
    array("name" => '张三', 'pwd' => md5('123456')),
    array("name" => '李四', 'pwd' => md5('123456')),
    array("name" => '王五', 'pwd' => md5('123456'))
);

echo json_encode($arr);

echo date('Y-m-d H:i:s');