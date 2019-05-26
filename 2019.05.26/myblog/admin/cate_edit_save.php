<?php
include ('../conn.php');
$cate_name=@$_POST['cate_name'];
$order_no=@$_POST['order_no'];
$id=@$_POST['id'];
$sql="update category set cate_name='$cate_name',order_no='$order_no' where id=$id";
$result=mysqli_query($conn,$sql);
if ($result){
    alert('修改成功','cate_list.php');
}else{
    alert('修改失败','cate_list.php');
}