<?php
include ('./conn.php');
include ('./header.php');
$id=@$_GET['id'];
$sql3="select article.*,category.cate_name from article,category where article.cate_id=category.id and article.id=$id";
$r=mysqli_query($conn,$sql3);
$row2=mysqli_fetch_assoc($r);


$sql="select * from article where id=$id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
$sql2="update article set views=views+1 where id=$id";
mysqli_query($conn,$sql2);
?>
    <div id="main">
        <h4>你现在所处位置为：<a href="index.php">首页</a>&gt;<a href="list.php?cate_id=<?php echo $row['cate_id']?>"><?php echo $row2['cate_name']?></a>&gt;<?php echo $row['title']?></h4>
        <ul>
            <?php
                echo '<li>';
                echo '<img src="./files/'.$row['img'].'"/>';
                echo '<h4>'.$row['title'].'</h4>';
                echo '<p>来源：'.$row['author'].'&emsp;&emsp;&emsp;发布时间：'.$row['intime'].'&emsp;&emsp;&emsp;浏览数：'.$row['views'].'</p>';
                echo '<p>'.nl2br($row['content']).'</p>';
                echo '</li>';
            ?>
        </ul>
    </div>
<?php
include('./guestbook.php');
include('./footer.php');
?>