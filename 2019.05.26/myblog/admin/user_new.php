<?php
include ('header.php');
?>
<div class="mainbox">
    <div class="note">
        <h4>新增用户</h4>
        <form action="user_new_save.php" method="post">
            <table class="news_form">
                <tr>
                    <td>账号：</td>
                    <td><input type="text" name="username" class="inbox"/></td>
                </tr>
                <tr>
                    <td>密码：</td>
                    <td><input type="text" name="password" class="inbox"/></td>
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