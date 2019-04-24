<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>GetTablesContent</title>
</head>
<body>
<?php
    require_once("dbtools.inc.php");

    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "1. 使用<h3>mysqli_fetch_row</h3>获取字段内容（只能通过字段序号）：<br>";
    echo "<table border='1' align='center'><tr align='center'>";
    for ($i=0; $i < mysqli_num_fields($result); $i++) {
        echo "<th>".mysqli_fetch_field_direct($result,$i)->name."</th>";//遍历字段名
    }
    echo "</tr>";
    while ($row1 = mysqli_fetch_row($result)) {
    //mysqli_fetch_row函数用来读取一个记录，然后将记录指针移到下一个，读不到记录则返回false
        //print_r($row1);
        //Array ( [0] => 0 [1] => zero [2] => zero0000 [3] => 110 )
        echo "<tr>";
        for ($i=0; $i < mysqli_num_fields($result); $i++) {
            echo "<td>$row1[$i]</td>";//遍历字段内容
        }
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    mysqli_close($link);

    echo "<hr>";

    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "2. 使用<h3>mysqli_fetch_array</h3>获取字段内容（既可通过字段序号）：<br>";
    echo "<table border='1' align='center'><tr align='center'>";
    for ($i = 0; $i < mysqli_num_fields($result); $i++){
        echo "<th>" . mysqli_fetch_field_direct($result, $i)->name. "</th>";
    }
    echo "</tr>";
    while ($row2 = mysqli_fetch_array($result, MYSQLI_NUM))
    //可以使用序号，也可以使用字段名
    {
        //print_r($row2);
        //Array ( [0] => 0 [1] => zero [2] => zero0000 [3] => 110 )
        echo "<tr>";
        for($i = 0; $i < mysqli_num_fields($result); $i++){
            echo "<td>$row2[$i]</td>";
        }
        echo "</tr>";
    }
    echo "</table>" ;
    mysqli_free_result($result);
    mysqli_close($link);


    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "使用<h3>mysqli_fetch_array</h3>获取字段内容（又可通过字段名称）：<br>";
    echo "<table border='1' align='center'><tr align='center'>";
    for ($i = 0; $i < mysqli_num_fields($result); $i++){
        echo "<th>" . mysqli_fetch_field_direct($result, $i)->name. "</th>";
    }
    echo "</tr>";
    while($row3 = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        //print_r($row3);
        //Array ( [id] => 0 [name] => zero [pass] => zero0000 [phone] => 110 )
        echo "<tr>";
        echo "<td>" . $row3['id'] . "</td>";
        echo "<td>" . $row3["name"] . "</td>";
        echo "<td>" . $row3["pass"] . "</td>";
        echo "<td>" . $row3["phone"] . "</td>";
        echo "</tr>";
    }
      echo "</table>" ;
      mysqli_free_result($result);
      mysqli_close($link);

    echo "<hr>";


    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "3. 使用<h3>mysqli_fetch_assoc</h3>获取字段内容（只能通过字段名称）,相当于mysqli_fetch_array()函数搭配MTSQLI_ASSOC参数值：<br>";
    echo "<table border='1' align='center'><tr align='center'>";
    for ($i = 0; $i < mysqli_num_fields($result); $i++){
        echo "<th>" . mysqli_fetch_field_direct($result, $i)->name. "</th>";
    }
    echo "</tr>";

    while ($row4 = mysqli_fetch_assoc($result))
    //相当于mysqli_fetch_array()函数搭配MTSQLI_ASSOC参数值，所以只能使用字段名
    {
        //print_r($row4);
        //Array ( [id] => 0 [name] => zero [pass] => zero0000 [phone] => 110 )
        echo "<tr>";
        echo "<td>".$row4["id"]."</td>";
        echo "<td>".$row4["name"]."</td>";
        echo "<td>".$row4["pass"]."</td>";
        echo "<td>".$row4["phone"]."</td>";
        echo "</tr>";
    }

    echo "</table>" ;
    mysqli_free_result($result);
    mysqli_close($link);

    echo "<hr>";

    $link = create_connection();
    $sql  = "SELECT * FROM user WHERE name='zero'";
    $result = execute_sql($link,"test",$sql);
    echo "4. 使用<h3>mysqli_fetch_object</h3>获取字段内容（只能通过字段名称），由于返回的是object类型，记录的每个字段都会变成该对象的属性：<br>";
    echo "<table border='1' align='center'><tr align='center'>";
    for ($i = 0; $i < mysqli_num_fields($result); $i++){
        echo "<th>" . mysqli_fetch_field_direct($result, $i)->name. "</th>";
    }
    echo "</tr>";

    while ($row5 = mysqli_fetch_object($result))
    //
    {
        //print_r($row4);
        //Array ( [id] => 0 [name] => zero [pass] => zero0000 [phone] => 110 )
        echo "<tr>";
        echo "<td>$row5->id</td>";
        echo "<td>$row5->name</td>";
        echo "<td>$row5->pass</td>";
        echo "<td>$row5->phone</td>";
        echo "</tr>";
    }

    echo "</table>" ;
    mysqli_free_result($result);
    mysqli_close($link);




 ?>
</body>
</html>