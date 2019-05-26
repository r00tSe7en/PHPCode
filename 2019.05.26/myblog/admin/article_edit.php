<?php
include ('header.php');
include ('../conn.php');
$id=@$_GET['id'];
$sql="select * from article where id=$id";
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs) > 0) {
    $row = mysqli_fetch_assoc($rs);
}else{
    echo '数据不存在！';exit;
}
?>
<div class="mainbox">
    <div class="note">
        <h4>修改文章</h4>
        <form action="article_edit_save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id?>"/>
            <table class="news_form">
                <tr>
                    <td>文章标题：</td>
                    <td><input type="text" name="title" class="inbox" value="<?php echo $row['title']?>"/></td>
                </tr>
                <tr>
                    <td>作    者：</td>
                    <td><input type="text" name="author" class="inbox" value="<?php echo $row['author']?>"/></td>
                </tr>
                <tr>
                    <td>文章分类：</td>
                    <td>
                        <select  name='cate_id' class="inbox" >
                            <?php
                            $sql='select * from category order by order_no asc,id desc';
                            $rs=mysqli_query($conn,$sql);
                            while ($row2=mysqli_fetch_assoc($rs)){
                                if($row['cate_id']===$row2['id']){
                                    echo '<option value="'.$row2['id'].'" selected="selected">'.$row2['cate_name'].'</option>';
                                }else{
                                    echo '<option value="'.$row2['id'].'">'.$row2['cate_name'].'</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>文章内容：</td>
                    <td><textarea cols="70" rows="10" name="content"><?php echo $row['content']?></textarea></td>
                </tr>
                <tr>
                    <td>上传图片：</td>
                    <td>
                        <img src="../files/<?php echo $row['img'];?>" width="200"/><br/>
                        <input type="file" name="img" class="inbox"/>
                        <input type="hidden" name="old_img" value="<?php echo $row['img'];?>"/>
                    </td>
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
