<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>GetColumnsNum</title>
</head>
<body>
<?php
    require_once ("dbtools.inc.php");
    $link = create_connection();
    $sql = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "name=zero 的记录有".mysqli_num_rows($result)."个";//返回被筛选出来的记录数
    echo "包含有".mysqli_num_fields($result)."个字段";//返回被筛选出来的字段数
    mysqli_close($link);
 ?>

</body>
</html>