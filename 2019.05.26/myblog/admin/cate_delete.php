<?php
include ('../conn.php');
$id=@$_GET['id'];
$sql="delete from category where id='$id'";
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('删除成功','./cate_list.php');
}else{
    alert('删除失败','./cate_list.php');
}