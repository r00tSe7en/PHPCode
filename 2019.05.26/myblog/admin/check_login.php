<?php
include('../conn.php');
$username=@$_POST['username'];
$password=@$_POST['password'];

if(strlen($username)<5){
    echo '用户名不能小于5个字';
}

$sql="select * from admin where username='$username' and password='$password'";
$rs=mysqli_query($conn,$sql);

if ($row=mysqli_fetch_assoc($rs)){
    session_start();
    $_SESSION['userid']=$row['id'];
    $_SESSION['username']=$row['username'];
    alert('恭喜你，登陆成功！','index.php');
}else{
    //登陆失败
    alert('登陆失败，请检查用户名或密码是否正确','login.php');
}
?>