<?php

namespace app\demo5\controller;

use app\common\controller\BaseController;
use app\demo5\model\File;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }

    public function create()
    {
        $data = input('post.');
        $result = $this->validate($data, [
            'name' => 'require|max:12',
        ]);
        if (true !== $result) {
            return json(['code' => 100, 'msg' => "文件名称必填且小于12个字符"]);
        }
        $file = new File();

        $dir = FILE_PATH . $file->pregDir($data['dir']);
        if (!file_exists($dir)) {
            return json(['code' => 101, 'msg' => "文件夹不存在"]);
        }
        /*
                 * 名字不能含有 ?*\/<>:"|
                 * 去除左右的空白格
                 */
        $name = preg_replace("/[\?\*\\\/<>:\"|]/", "", trim($data['name']));
        if (empty($name)) {
            return json(['code' => 102, 'msg' => '文件夹名称错误']);
        }

        $dir .= $name . DS;
        $dir = $file->convert($dir);

        if (file_exists($dir)) {
            return json(['code' => 103, 'msg' => '文件夹已存在']);
        }
        mkdir($dir, 0777);
        return json(['code' => 1, 'msg' => '']);
    }
}