<?php
include ('./conn.php');
include ('./header.php');
?>
<div class="container-fluid text-center">
    <div class="header">
        <img class="headerImg"
             src="images/header.jpg"
             data-slideshow='images/img1.jpg|images/img2.jpg|images/img3.jpg'>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.hammer-full.min.js"></script>
<script src="js/plugin.js"> </script>
<script src="js/lrtk.js"></script>
<!--轮播图超链接-->
<script>
    var links = ["list.php?cate_id=2", "list.php?cate_id=6", "list.php?cate_id=3", "list.php?cate_id=5"];
    $(".slide").click(function(){
        var index = $(this).attr('index');
        if(index === undefined) {
            window.open(links[0]);
        } else {
            window.open(links[(parseInt(index)+1)]);
        }
    });
</script>
<div id="main">
    <ul><h3>最新文章：</h3>
        <?php
            $sql="select * from article order by intime desc limit 6";
            $rs=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_assoc($rs)){
                echo '<li>';
                echo '<a href="content.php?id='.$row['id'].'"><img src="./files/'.$row['img'].'"/></a>';
                echo '<h4><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></h4>';
                echo '<p><a href="content.php?id='.$row['id'].'">'.mb_substr($row['content'],0,90,'utf-8').'....查看全文</a></p>';
                echo '</li>';
            }
        ?>
    </ul>
</div>
<?php
include('./right.php');
include('./footer.php');
?>
