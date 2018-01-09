<html>
<head>
    <title>demo</title>
</head>
<body>
<?php
echo 'hello world';
echo("<br/>hello php<br/>");
echo 'i\'m ', 'a ', 'php er';

echo <<<EOF
<h1>这个是我的第一个标题</h1>
<p>这个是我的第一个段落</p>
EOF;

$x = 1.0;
var_dump($x);

$arr = array('x', 'y', 'z');

var_dump($arr);

define('PI', 3.141592653, true);

print_r(PI);

echo strlen($arr[0]);

echo '<br/>';
echo 5 === '5';
echo '<br/>';

foreach ($arr as $k => $v) {
    echo "$k=>$v";
}

echo __LINE__;
echo __FILE__;

?>
</body>
</html>