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
                <th>回复文章ID</th>
                <th>昵称</th>
                <th>回复内容</th>
                <th>操作</th>
                <th>状态</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql="select * from guestbook order by id desc";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($rs)){
                echo '<tr>';
                echo   '<td align="center">'.$row['art_id'].'</td>';
                echo   '<td align="center">'.$row['username'].'</td>';
                echo   '<td align="center">'.$row['content'].'</td>';
                echo   '<td align="center">';
                echo   '<a href="guest_check.php?act=ok&id='.$row['id'].'">审批通过</a>';
                echo   '&emsp;/&emsp;';
                echo   '<a href="guest_check.php?act=no&id='.$row['id'].'">审批不通过</a>';
                echo   '</td>';
                if ($row['flag']==0){
                    echo   '<td align="center" bgcolor="red">未审核通过</td>';
                }else{
                    echo   '<td align="center" bgcolor="#adff2f">审核通过</td>';
                }

            }
            ?>
            </tbody>
        </table>
    </div>
<?php
include ('footer.php');
?>