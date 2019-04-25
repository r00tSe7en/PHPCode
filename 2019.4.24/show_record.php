<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>分页浏览</title>
</head>
<body>
<?php
    require_once("dbtools.inc.php");
    //设置每页显示几条记录
    $records_per_page = 3;
    //获取要显示的页数
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    else
        $page = 1;
    //建立数据连接
    $link = create_connection();
    //执行sql命令
    $sql="SELECT id,name,pass,phone FROM user";
    $result = execute_sql($link,"test2",$sql);
    //获取字段数目
    $total_fields = mysqli_num_fields($result);
    //获取记录数目
    $total_records = mysqli_num_rows($result);
    //计算总页数
    $total_pages = ceil($total_records/$records_per_page);
    //计算本页第一个记录的序号
    $started_record = $records_per_page*($page-1);
    //将指针移到本页的第一个记录的序号
    mysqli_data_seek($result,$started_record);
    //显示字段数名
    echo "<table border='1' align='center' width='800'><tr align='center'>";
    for ($i=0; $i < $total_fields; $i++) {
        echo "<td>".mysqli_fetch_field_direct($result,$i)->name."</td>";
    }
    echo "</tr>";
    //显示记录
    $j=1;
    while ($row = mysqli_fetch_row($result) and $j <= $records_per_page) {
        echo "<tr>";
        for ($i=0; $i < $total_fields; $i++) {
            echo "<td>$row[$i]</td>";
        }
        $j++;
        echo "</tr>";
    }
    echo "</table>";
    //产生导航条
    echo "<p align='center'>";
    if ($page>1) {
        echo "<a href='show_record.php?page=".($page-1)."'>上一页</a>";
    }
    for ($i=1; $i <= $total_pages; $i++) {
        if($i==$page){
            echo "$i";
        }
        else
            echo "<a href='show_record.php?page=$i'>$i</a>";
    }
    if ($page<$total_pages) {
        echo "<a href='show_record.php?page=".($page+1)."'>下一页</a>";
    }
    echo "</p>";
    //释放内存
    mysqli_free_result($result);
    //关闭数据库链接
  mysqli_close($link);
 ?>
</body>
</html>