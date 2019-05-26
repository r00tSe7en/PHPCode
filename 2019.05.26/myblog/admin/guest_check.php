<?php
include ('../conn.php');
$act=$_GET['act'];
$id=$_GET['id'];
if ($act=='ok'){
    $id=$_GET['id'];
    $sql="update guestbook set flag=1 where id=$id";
    $r=mysqli_query($conn,$sql);
    if($r){
        echo '<script>alert("操作成功");location.href="./guest_list.php";</script>';
    }else{
        echo '<script>alert("操作失败");location.href="./guest_list.php";</script>';
    }
}
if ($act=='no'){
    $id=$_GET['id'];
    $sql="update guestbook set flag=0 where id=$id";
    $r=mysqli_query($conn,$sql);
    if($r){
        echo '<script>alert("操作成功");location.href="./guest_list.php";</script>';
    }else{
        echo '<script>alert("操作失败");location.href="./guest_list.php";</script>';
    }
}