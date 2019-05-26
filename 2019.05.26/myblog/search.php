<?php
include ('./conn.php');
include ('./header.php');
$keywords=$_GET['keywords'];
?>
<div id="main">
    <h4>当前<?php echo '关键词：“'.$keywords?>”的搜索结果为：</h4>
    <ul>
        <?php
        $sql="select * from article where title or content like '%$keywords%' order by intime desc";
        $rs=mysqli_query($conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)){
            echo '<li>';
            echo '<img src="./files/'.$row['img'].'"/>';
            echo '<h4><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
            echo '<p>'.mb_substr($row['content'],0,40,'utf-8').'...</p>';
            echo '</li>';
        }
        ?>
    </ul>
</div>
<?php
include('./right.php');
include('./footer.php');
?>
