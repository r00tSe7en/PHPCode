<?php
$id=$_GET['id'];
?>
<div id="rightbar">
    <p class="right1">
        <img src="image/right1.png" alt=""/>
    </p>
    <form action="guest_save.php?id=<?php echo $id;?>" method="post" class="right2">
        <h3>对文章发表留言</h3>
        <p>将您的见解分享出来</p>
        <input type="text" name="username" class="inbox" placeholder="您的昵称"/><p></p>
        <input type="text" name="content" class="inbox" placeholder="输入留言内容"/>
        <input type="submit" value="发表留言" class="inbtn"/>
    </form>
    <h3 class="right3">留言内容</h3>
    <ul class="right4">
        <?php
        $sql="select * from guestbook where art_id=$id and flag=1 order by intime desc";
        $rs=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            echo '<li>';
            echo  $row['username'].'于'.$row['intime'].'发表留言:';
            echo  '<br/>';
            echo  $row['content'];
            echo '</li>';
        }
        ?>
    </ul>
</div>