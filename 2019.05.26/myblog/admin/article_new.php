<?php
include ('header.php');
include ('../conn.php');
?>
<div class="mainbox">
    <div class="note">
    <h4>发表文章</h4>
    <form action="article_new_save.php" method="post" enctype="multipart/form-data">
        <table class="news_form">
            <tr>
                <td>文章标题：</td>
                <td><input type="text" name="title" class="inbox"/></td>
            </tr>
            <tr>
                <td>文章分类：</td>
                <td>
                    <select class="inbox" name="cate_id">
                        <option value="0">请选择分类</option>
                        <?php
                            $sql='select * from category order by order_no';
                            $rs=mysqli_query($conn,$sql);
                            while ($row=mysqli_fetch_assoc($rs)){
                                echo '<option value="'.$row['id'].'">'.$row['cate_name'].'</option>';
                            }
                        mysqli_free_result($rs);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>作　　者：</td>
                <td><input type="text" name="author" class="inbox"/></td>
            </tr>
            <tr>
                <td>文章内容：</td>
                <td><textarea name="content" cols="80" rows="20"></textarea></td>
            </tr>
            <tr>
                <td>图片：</td>
                <td><input type="file" name="img" class="inbox"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="提交"/></td>
            </tr>
        </table>
    </form>
</div>
</div>
<?php
include ('footer.php');
?>