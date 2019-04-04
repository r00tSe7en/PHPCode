<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>form表单1</title>
</head>
<body>

<?php if (!isset($_POST["Send"])) { ?>
<!--if 放在这，输出内容覆盖表单-->
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    姓名：
    <input type="text" name="UserName" size="40"><br>
    邮箱：
    <input type="text" name="UserMail" size="40" value="username@mailserver"><br>
    年龄：
    <input type="radio" name="UserAge" value="Age1" checked>未满20岁
    <input type="radio" name="UserAge" value="Age2">20~29
    <input type="radio" name="UserAge" value="Age3">30~39
    <input type="radio" name="UserAge" value="Age4">40~49
    <input type="radio" name="UserAge" value="Age5">50以上
    <br>
    您使用过那些品牌的手机？
    <input type="checkbox" name="UserPhone[]" value="HTC" checked>HTC
    <input type="checkbox" name="UserPhone[]" value="Apple" >Apple
    <input type="checkbox" name="UserPhone[]" value="HuaWei" >HuaWei
    <input type="checkbox" name="UserPhone[]" value="Lenovo" >Lenovo
    <input type="checkbox" name="UserPhone[]" value="XiaoMi" >XiaoMi
    <br>
    您在使用手机时遇到过那些问题？
    <br>
    <textarea name="UserTrouble" cols="45" rows="4" >信号不好</textarea>
    <br>
    您使用过那些电信服务商？（可复选）
    <select name="UserServer[]" size="3" multiple>
        <option value="移动" selected>移动</option>
        <option value="电信">电信</option>
        <option value="联通">联通</option>
    </select>
    <br>
    <input type="hidden" name="Send" value="TRUE">
    <input type="submit" name="提交" value="提交">
    <input type="reset" name="重置" value="重置">
</form>
<!--if 放在这不覆盖，输出内容显示在表单下面-->

<?php
echo "<hr>";
echo $_POST["Send"];
echo "当前状态为没有提交";
}else {
    $name = $_POST["UserName"];
    $mail = $_POST["UserMail"];
    switch ($_POST["UserAge"]) {
        case 'Age1':
            $Age = "未满20岁";
            break;
        case 'Age2':
            $Age = "20~29";
            break;
        case 'Age3':
            $Age = "30~39";
            break;
        case 'Age4':
            $Age = "40~49";
            break;
        case 'Age5':
            $Age = "50以上";
            break;
    }
    $phone = $_POST["UserPhone"];
    $trouble = $_POST["UserTrouble"];
    $server = $_POST["UserServer"];
?>
<p><i><?php echo "$name"; ?></i>&nbsp;您好，您输入的数据如下：</p>
<p>电子邮件地址：<?php echo "$mail"; ?></p>
<p>年龄：<?php echo "$Age"; ?></p>
<p>手机品牌：<?php foreach ($phone as $value) {echo "$value";} ?></p>
<p>问题：<?php echo "$trouble"; ?></p>
<p>服务商：<?php foreach ($server as $value) {echo "$value";}?></p>
<?php } ?>
</body>
</html>