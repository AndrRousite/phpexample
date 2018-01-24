<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/24
 * Time: 11:16
 * @param int $length
 * @return string
 */
function rand_string($length = 6)
{
    $base = 62;
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[mt_rand(1, $base) - 1];
    }
    return $str;
}

$arr = array();
for ($i = 0; $i < 20; $i++) {
    $arr[$i] = rand_string(6);
}
echo json_encode(["code" => 200, 'data' => $arr]);