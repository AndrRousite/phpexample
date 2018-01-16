<?php
/**
 * 图片验证码
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/15
 * Time: 14:32
 */
session_start();
$num = 4; // 验证码个数
$width = 60;
$height = 18;
$code = '';

for ($i = 0; $i < $num; $i++) {
    switch (rand(0, 2)) {
        case 0: // 数字
            $code[$i] = chr(rand(48, 57));
            break;
        case 1: // 大写字母
            $code[$i] = chr(rand(65, 90));
            break;
        case 2: // 小写字母
            $code[$i] = chr(rand(97, 122));
            break;
    }
}
// 登陆验证
$_SESSION['VerifyCode'] = $code;
// 创建画布
$image = imagecreate($width, $height);
imagecolorallocate($image, 255, 255, 255);
// 生成干扰线条
for ($i = 0; $i < 40; $i++) {
    $dis_color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagesetpixel($image, rand(1, $width), rand(1, $height), $dis_color);
}
// 打印验证码到图像上
for ($i = 0; $i < $num; $i++) {
    $char_color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
    imagechar($image, 30, ($width / $num) * $i + rand(0, 5), rand(0, 5), $code[$i], $char_color);
}
// 输出到浏览器
header("Content-Type:image/png");
imagepng($image);
// 销毁画布资源
imagedestroy($image);