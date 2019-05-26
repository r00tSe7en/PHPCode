<?php
include ('../conn.php');
$cate_name=@$_POST['cate_name'];
$order_no=@$_POST['order_no'];
$sql="insert into category (cate_name,order_no) values('$cate_name','$order_no')";
$rs=mysqli_query($conn,$sql);
if ($rs){
    alert('新增成功','cate_list.php');
}else{
    alert('新增失败','cate_new');
}