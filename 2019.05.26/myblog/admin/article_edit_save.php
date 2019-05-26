<?php
include ('../conn.php');
$author=$_POST['author'];
$cate_id=$_POST['cate_id'];
$title=$_POST['title'];
$content=@strip_tags($_POST['content']);
$id=$_POST['id'];
$img=$_FILES['img'];
if($img['name']){
    //开始上传文件
    date_default_timezone_set('PRC');//设置默认时区时间
    $filename=date('YmdHis').rand(100,999); //生成文件名，格式：年月日时分秒随机数
    $ext=strrchr($img['name'],'.');//通过文件名获取扩展名

    $fn=$filename.$ext; //将文件名和扩展名保存到数据库中

    if($ext!='.jpg' && $ext!='.png' && $ext!='.gif'&&$ext!=null){
        echo '文件类型不允许上传';
        exit;
    }
    move_uploaded_file($img['tmp_name'],'../files/'.$fn);
    @unlink('../files/'.$_POST['old_img']);//删去旧文件
}else{
    $fn=$_POST['old_img'];
}

//构造SQL语句将数据更新到数据表中，实现修改功能
$sql="update article set title='$title',cate_id=$cate_id,author='$author',content='$content',img='$fn' where id=$id";

$r=mysqli_query($conn,$sql);

//输出执行结果
if($r){
    alert('修改成功','article_list.php');
}else{
    echo '修改失败！';
}