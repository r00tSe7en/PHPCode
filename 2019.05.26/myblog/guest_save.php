<?php
include ('./conn.php');
$art_id=$_GET['id'];
$username=$_POST['username'];
$content=$_POST['content'];
$sql="insert into guestbook (username,art_id,content) values ('$username','$art_id','$content')";//构建sql语句，在数据库中新增对应的值
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('回复成功',"content.php?id=$art_id");
}else{
    alert('回复成功',"content.php?id=$art_id");
}