<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/9
 * Time: 14:52
 */
if (isset($_FILES['file'])) {
    if ($_FILES['file']['error'] > 0) {
        echo "上传文件失败：" . $_FILES['file']['error'];
    } else {
        echo "上传的文件名：" . $_FILES['file']['name'] . '<br/>';
        echo "上传的文件类型：" . $_FILES['file']['type'] . '<br/>';
        echo "上传的文件大小：" . ($_FILES['file']['size'] / 1024) . 'kb<br/>';
        echo "上传的文件临时存储位置：" . $_FILES['file']['tmp_name'] . '<br/>';

        if (file_exists('../upload/' . $_FILES['file']['name'])) {
            echo $_FILES['file']['name'] . '文件已经存在了';
        } else {
            move_uploaded_file($_FILES['file']['tmp_name'], '../upload/' . iconv('utf-8', 'gbk', $_FILES['file']['name']));
            echo $_FILES['file']['name'] . '文件保存成功';
        }
    }
} else {


    ?>

    <form action="uploadfile.php" method="post" enctype="multipart/form-data">
        <label for="file">文件名：</label>
        <input type="file" name="file"/><br>
        <input type="submit" value="上传">
    </form>


    <?php
}