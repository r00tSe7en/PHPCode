<?php
include ('../conn.php');
$username=@$_POST['username'];
$password=@$_POST['password'];
$sql="insert into admin (username,password) values('$username','$password')";
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('新增成功','user_list.php');
}else{
    alert('新增失败','user_new.php');
}