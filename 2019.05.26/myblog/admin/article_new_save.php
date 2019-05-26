<?php
include ('../conn.php');
$title=$_POST['title'];
$cate_id=$_POST['cate_id'];
$author=$_POST['author'];
$content=strip_tags($_POST['content']);
$img=$_FILES['img'];

date_default_timezone_set('PRC');
$filename=date('YmdHis').rand(100,999); //生成文件名，格式：年月日时分秒+随机数
$ext=strrchr($img['name'],'.');//通过文件名获取扩展名

$fn=$filename.$ext; //将文件名和扩展名保存到数据库中，用 varchar(30)

if($ext!='.jpg' && $ext!='.png' && $ext!='.gif'&&$ext!=null){
    echo '文件类型不允许上传';
    exit;
}
move_uploaded_file($img['tmp_name'],'../files/'.$fn);
$sql="insert into article (title,cate_id,author,content,img) values ('$title','$cate_id','$author','$content','$fn')";//构建sql语句，在数据库中新增对应的值
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('发表成功','article_list.php');
}else{
    alert('新增失败','article_new.php');
}