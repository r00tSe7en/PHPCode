<?php
include ('../conn.php');
$username=@$_POST['username'];
$password=@$_POST['password'];
$id=@$_POST['id'];
$sql="update admin set username='$username',password='$password' where id=$id";
$result=mysqli_query($conn,$sql);
if ($result){
    alert('修改成功','user_list.php');
}else{
    alert('修改失败','user_list.php');
}