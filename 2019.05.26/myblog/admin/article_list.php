<?php
include ('header.php');
include ('../conn.php');
?>
<div class="mainbox">
    <div class="note">
    <h4>文章列表</h4>
    <table class="news_list">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th>摘要</th>
            <th>日期</th>
            <th>点击率</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //步骤一：收集三大条件
        //条件1：设置每页显示多少条数据
        $pagesize=5;
        //条件2：获取得到当前在第几页，如果没有传值默认在第1页
        $page=isset($_GET['page']) ? $_GET['page'] : 1;
        //条件3：计算得出总页数  总页数=向上取整(总条数/每页显示的条数)
        $sql='select * from article';
        $rs=mysqli_query($conn,$sql);
        $rows_count=mysqli_num_rows($rs); //统计结果集有多少行数据
        $pagecount= ceil($rows_count/$pagesize); //获取到总页数
        //步骤二：使用条件1和条件2计算得出当前页应当显示哪些数据

        $start=($page-1)*$pagesize;
        $sql="select article.*,category.cate_name from article,category where article.cate_id=category.id order by article.id desc limit $start,$pagesize";
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            echo '<tr>';
            echo '<td align="center">'.$row['id'].'</td>';
            echo  '<td align="center">'.$row['title'].'</td>';
            echo  '<td align="center">'.$row['author'].'</td>';
            echo  '<td align="center">'.$row['cate_name'].'</td>';
            echo  '<td align="center">'.mb_substr($row['content'],0,40,'utf-8').'</td>';
            echo  '<td align="center">'.$row['intime'].'</td>';
            echo  '<td align="center">'.$row['views'].'</td>';
            echo  '<td align="center">';
            echo  '<a href="article_edit.php?id='.$row['id'].'">修改</a>';
            echo  '&emsp;/&emsp;';
            echo  '<a href="article_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗？\')">删除</a>';
            echo   '</td>';
            echo   '</tr>';
        }
        ?>
        </tbody>
    </table>
        <div class="page">
        <?php
        echo '<div class="page">';
        for($i=1;$i<=$pagecount; $i++){
            if($i==$page){
                echo '<a href="article_list.php?page='.$i.'" class="on">'.$i.'</a> ';
            }else{
                echo '<a href="article_list.php?page='.$i.'">'.$i.'</a> ';
            }
        }
        echo '</div>';
        ?>
        </div>
    </div>
</div>
<?php
include ('footer.php');
?>

