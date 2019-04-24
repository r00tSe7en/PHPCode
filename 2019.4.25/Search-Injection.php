<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>搜索型注入</title>
</head>
<body>
<?php
    include_once("dbtools.inc.php");
    $name = $_GET['name'];
    //Search-Injection.php?name=zero
    $link = create_connection();
    $sql = "SELECT * FROM user WHERE name LIKE '%$name%'";
    $result = execute_sql($link,"test",$sql);
    while($row = mysqli_fetch_array($result))
    {
        echo "用户ID：".$row['id']."<br >";
        echo "用户名：".$row['name']."<br >";
        echo "用户密码：".$row['pass']."<br >";
        echo "用户电话：".$row['phone']."<br >";
    }
    mysqli_close($link);
    echo "<hr>";
    echo "你当前执行的sql语句为："."<br >";
    echo $sql;

 ?>
</body>
</html>