<?php
require('connect.php');
$shop_id=$_COOKIE['shop'];
//new order
$orderlist="SELECT i.item_img,i.name,u.uname,o.* FROM users as u,items as i,orders as o WHERE o.shop_id={$shop_id} AND o.status='Order Placed' AND u.id=o.user_id AND i.id=o.item_id ORDER BY o.ordered_on DESC";
if($result=mysqli_query($conn,$orderlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}


if(isset($_POST['accept'])){
    $updateid=$_POST['updateid'];
    
    $upquery="UPDATE orders SET status='Recieved' WHERE id={$updateid}";
    mysqli_query($conn,$upquery);
    $notquer="INSERT INTO notification (user_id,shop_id,order_id) VALUES('7','$shop_id','$updateid')";
    mysqli_query($conn,$notquer);
    header("location:../shop/s4.php");
}


if(isset($_POST['delete'])){
    $updateid=$_POST['updateid'];
    $delquery="UPDATE orders SET status='Cancelled' WHERE id={$updateid}";
    mysqli_query($conn,$delquery);
    header("location:../shop/s4.php");
}


//accepted order

$acptlist="SELECT i.item_img,i.name,u.uname,u.addr,u.phno,o.* FROM users as u,items as i,orders as o WHERE o.shop_id={$shop_id} AND o.status='Order Recieved' AND u.id=o.user_id AND i.id=o.item_id ORDER BY o.ordered_on DESC";
if($result1=mysqli_query($conn,$acptlist)){
    $accept=mysqli_fetch_all($result1,MYSQLI_ASSOC);
    mysqli_free_result($result1);
}

if(isset($_POST['order'])){
    $id=$_POST['id'];
    $query="UPDATE orders SET status='Ready' WHERE id={$id}";
    mysqli_query($conn,$query);
    header("location:../shop/s5.php");
}

?>