<?php
include ('./conn.php');
include ('./header.php');
$cate_id=$_GET['cate_id'];//header页面传值过来
$sql2="select * from category where id=$cate_id";//根据id获取内容
$rs2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($rs2);
?>
<div id="main">
    <h4>你现在所处位置为：<a href="index.php">首页</a>&gt;<?php echo $row2['cate_name']?></h4>
    <ul>
        <?php
        //设置每页显示最多的的文章数
        $pagesize=3;
        //获取得到当前在第几页，如果没有传值默认在第1页
        $page=isset($_GET['page']) ? $_GET['page'] : 1;

        $sql="select * from article where cate_id=$cate_id";
        $rs=mysqli_query($conn,$sql);
        //计算得出总页数  总页数=向上取整(总条数/每页显示的条数)
        $records=mysqli_num_rows($rs);//统计结果集有多少行数据
        $pagecount= ceil($records/$pagesize);//获取到总页数
        //算得出当前页应当显示哪些数据
        $start=($page-1)*$pagesize;//获取开始位置

        $sql="select * from article where cate_id=$cate_id order by intime desc limit $start,$pagesize";
        $rs=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)){
            echo '<li>';
            echo '<img src="./files/'.$row['img'].'"/>';
            echo '<h4><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
            echo '<p><a href="content.php?id='.$row['id'].'">'.mb_substr($row['content'],0,40,'utf-8').'....查看全文</a></p>';
            echo '</li>';
        }
        echo '<div class="page">';
        $o=@$_GET['page'];
        $s=$o-1;
        $n=$o+1;
        if ($o>1){
            echo '<a href="list.php?cate_id='.$cate_id.'&page='.$s.'"> 上一页</a>';
        }
        for($i=1; $i<=$pagecount; $i++){
            if($i==$page){
                echo '<a href="list.php?cate_id='.$cate_id.'&page='.$i.'" class="on">' .$i.'</a>  ';
            }else{
                echo '<a href="list.php?cate_id='.$cate_id.'&page='.$i.'">' .$i.'</a>  ';
            }
        }
        if ($o<$pagecount && $pagecount>1){
            echo '<a href="list.php?cate_id='.$cate_id.'&page='.$n.'"> 下一页 </a>';
        }
        echo '</div>';
        ?>
    </ul>
</div>
<?php
include('./right.php');
include('./footer.php');
?>
