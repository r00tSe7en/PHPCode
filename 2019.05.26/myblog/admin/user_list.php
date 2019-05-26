<?php
include ('header.php');
include ('../conn.php');
?>
<div class="mainbox">
    <div class="note">
    <h4>用户列表</h4>
    <table class="news_list">
        <thead>
        <tr>
            <th>ID</th>
            <th>账号</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql="select id,username,password from admin order by id";
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            echo '<tr>';
            echo '<td align="center">'.$row['id'].'</td>';
            echo  '<td align="center">'.$row['username'].'</td>';
            echo  '<td align="center">'.$row['password'].'</td>';
            echo  '<td align="center">';
            echo  '<a href="user_edit.php?id='.$row['id'].'">修改</a>';
            echo  '&emsp;/&emsp;';
            echo  '<a href="user_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
            echo   '</td>';
            echo   '</tr>';
        }
        ?>
        </tbody>
    </table>
    </div>
</div>
<?php
include ('footer.php');
?>

