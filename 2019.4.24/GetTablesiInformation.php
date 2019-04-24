<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>GetTablesiInformation</title>
</head>
<body>
<?php
    require_once("dbtools.inc.php");
    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "使用<h3>mysqli_fetch_field_direct</h3>获取字段信息:"."<br>";
    echo "<table width='400' border='1'><tr align='center'>";
    echo "<th>字段名</th><th>数据类型</th><th>最大长度</th></tr>";
    $i = 0;
    while ($i < mysqli_num_fields($result)) {
        $meta = mysqli_fetch_field_direct($result,$i);
        //mysqli_fetch_field_direct函数获取字段信息，返回值为object类型。
        echo "<tr>";
        echo "<td>$meta->name</td>";
        echo "<td>$meta->type</td>";
        echo "<td>$meta->max_length</td>";
        echo "</tr>";
        $i++;
    }
    echo "</table>";

    echo "<hr>";

    echo "使用<h3>mysqli_fetch_field</h3>获取字段信息:"."<br>";
    echo "<table width='400' border='1'><tr align='center'>";
    echo "<th>字段名</th><th>数据类型</th><th>最大长度</th></tr>";
    while ($meta = mysqli_fetch_field($result)) {
        echo "<tr>";
        echo "<td>$meta->name</td>";
        echo "<td>$meta->type</td>";
        echo "<td>$meta->max_length</td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($link);
 ?>

</body>
</html>