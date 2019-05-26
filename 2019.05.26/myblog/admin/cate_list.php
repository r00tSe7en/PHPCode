<?php
include ('../conn.php');
include ('header.php');
?>
    <div class="mainbox">
        <div class="note">
            <h4>分类列表</h4>
            <table class="news_list">
                <thead>
                <tr>
                    <th>排序号</th>
                    <th>分类名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $sql="select * from category order by order_no asc";
                        $rs=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($rs)){
                                echo '<tr>';
                                echo   '<td align="center">'.$row['order_no'].'</td>';
                                echo   '<td align="center">'.$row['cate_name'].'</td>';
                                echo   '<td align="center">';
                                echo   '<a href="cate_edit.php?id='.$row['id'].'">修改</a>';
                                echo   '&emsp;/&emsp;';
                                echo   '<a href="cate_delete.php?id='.$row['id'].'"onclick="return confirm(\'你确定要删除此分类吗？\')">删除</a>';
                                echo   '</td>';
                        }
                    ?>
                </tbody>
            </table>
    </div>
<?php
include ('footer.php');
?>