##### php example 

[github搜索技巧](github.md)  
[ThinkPHP](thinkphp.md)

###### 参考手册
```angular2html
1. Array
2. Calendar
3. cURL
4. Directory
5. Error
6. Filesystem
7. Filter
8. FTP
9. HTTP
10. LibXML
11. Mail
12. Math
13. Misc
14. MySQLi
15. SimpleXML
16. String
17. XML Parser
18. ZIP

```

###### 基础语法
```angular2html
1. 变量规则：
    - 必须以$符号开始
    - 变量名只能包含字母数字以及下划线
    - 区分大小写
2. 变量作用域：
    - local: 超级全局变量（PHP自带变量）
        $GLOBALS:
        $_SERVER: 包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组
        $_REQUEST: 用于收集HTML表单提交的数据
        $_POST: 用于收集表单数据，form标签的指定该属性："method="post"
        $_GET: 用于收集表单数据，form标签的指定该属性："method="get"
        $_FILES: 
        $_ENV: 
        $_COOKIE: 
        $_SESSION: 
    - global
    - static 
    - parameter
3. echo 和 print
    echo - 可以输出一个或者多个字符串，没有返回值（效率更高）
    print - 只允许输出一个字符串，返回值为1
4. EOF: 在命令行shell中定义字符串
    echo <<<EOF
        ...
    EOF;
    // 结束需要独立一行且前后不能空格
5. 数据类型
    - String 
        strlen: 返回字符串的字符数
            echo strlen("中文字符");   // 输出 12
            echo mb_strlen("中文字符",'utf-8');  // 输出 4
            
    - Integer: 111(十进制) 0x1(十六进制) 01(八进制)
    - Float
    - Boolean
    - Array : array()创建数组
        排序：sort()
    - Object 
    - NULL
6. 常量
   bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
       name：必选参数，常量名称，即标志符。
       value：必选参数，常量的值。
       case_insensitive ：可选参数，如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。
   预定义常量：
        __LINE__: 文件中的当前行号
        __FILE__: 文件的完整路径和文件名
        __DIR__: 文件所在的目录
        __FUNCTION__: 函数名称
        __CLASS__: 类的名称
        __TRAIT__: 实现了代码复用的一个方法，称为 traits
        __METHOD__: 类的方法名
        __NAMESPACE__: 命名空间的名称
7. 命名空间: namespace
8. 面向对象
    构造函数：__construct 
    析构函数：__destruct 
```

###### 表单
```angular2html

    
```

###### 进阶
```angular2html
1. 日期函数：date()
2. include和require的区别 ：处理错误的方式不同，include会生成一个警告warning继续执行，而require会生成error脚本停止执行
3. 文件处理：
    文件操作
    文件上传和下载
4. cookie: 
    创建：setcookie(name,value,path,domain) 
    获取：$_COOKIE["name"]
    删除：// 设置 cookie 过期时间为过去 1 小时 setcookie(name, "", time()-3600);
5. session: 
    创建：session_start(),
    赋值：$_SESSION['views']=value
    销毁：unset() 或 session_destroy()：失去所有已存储的 session
6. STMP: email
7. 错误和异常处理: 
8. 过滤器：对外部数据进行过滤处理
    - 来自表单的数据
    - Cookies
    - Web services data 
    - 服务器变量
    - 数据库查询结果
9. JSON和XML处理
```

###### PHP7新特性
```angular2html

```