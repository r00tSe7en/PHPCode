<?php
include ('header.php');
include ('../conn.php');
$id=@$_GET['id'];
$sql="select * from admin where id=$id";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rs);
?>
    <div class="mainbox">
        <div class="note">
            <h4>账号修改</h4>
            <form action="user_edit_save.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id?>"/>
                <table class="news_form">
                    <tr>
                        <td>账号：</td>
                        <td><input type="text" name="username" class="inbox" value="<?php echo $row['username']?>"/></td>
                    </tr>
                    <tr>
                        <td>密码：</td>
                        <td><input type="text" name="password" class="inbox" value="<?php echo $row['password']?>"/></td>
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