<?php

namespace app\demo2\controller;

use app\common\controller\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        return $this->fetch();
    }

    public function upload()
    {
        $msg = "";
        $error = "";

        $path = SITE_PATH . '/public/static/demo2' . '/upload/';
        var_dump($path);
        if ($_FILES['file']['tmp_name']) {
            var_dump('HAHA');
            $ext = strtolower(pathinfo($_FILES['file']['name'])['extension']);
            var_dump($ext);
            if (!file_exists($path)) {
                mkdir($path, 0777);
            }
            $filename = time() . rand(100, 999) . '.' . $ext;
            $tmpfile = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmpfile, $path . $filename);

            $msg = $filename;
            @unlink($_FILES['file']);
        } else {
            $error = '上传文件失败';
        }
        echo json_encode(['msg' => $msg, 'error' => $error]);
    }
}