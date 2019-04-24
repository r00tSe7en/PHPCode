<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>整型注入</title>
</head>
<body>
<?php
    include_once("dbtools.inc.php");
    $id = $_GET['id'];
    //Int-Injection.php?id=1
    $link = create_connection();
    $sql = "SELECT * FROM user WHERE id = $id";
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