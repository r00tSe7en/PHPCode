<?php
include ('header.php');
?>
<div class="mainbox">
    <div class="note">
        <h4>新增分类</h4>
        <form action="cate_new_save.php" method="post">
            <table class="news_form">
                <tr>
                    <td>分类名：</td>
                    <td><input type="text" name="cate_name" class="inbox"/></td>
                </tr>
                <tr>
                    <td>排序号：</td>
                    <td><input type="text" name="order_no" class="inbox"/></td>
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