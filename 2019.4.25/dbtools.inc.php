<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>dbtools.inc.php</title>
</head>
<body>
<?php
    function create_connection(){//定义数据库链接函数
        $link = mysqli_connect(localhost, root, root) or die("无法建立链接".mysqli_error());
        //建立数据库链接,失败则输出错误信息
        mysqli_query($link,"SET NAMES utf8");//防止数据库中文乱码
        return $link;
    }
    function execute_sql($link,$database,$sql){//定义执行sql命令函数
        mysqli_select_db($link,$database) or die("打开数据库失败".mysqli_error($link));
        $result = mysqli_query($link,$sql);
        return $result;
    }
    //函数调用：ececute_sql($link,"test","SELECT * FROM user WHERE name='zero'");
 ?>
</body>
</html>