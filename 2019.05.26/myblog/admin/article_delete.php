<?php
include ('../conn.php');
$id=@$_GET['id'];

$sql="delete from article where id='$id'";
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('删除成功','./article_list.php');
}else{
    alert('删除失败','./article_list.php');
}