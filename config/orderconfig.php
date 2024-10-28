<?php
require('connect.php');
$user_id=$_COOKIE['user'];
$orderlist="SELECT i.item_img,i.name,s.sname,o.* FROM shop as s,items as i,orders as o WHERE o.user_id={$user_id} AND s.id=o.shop_id AND i.id=o.item_id ORDER BY o.ordered_on DESC";
if($result=mysqli_query($conn,$orderlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}

if(isset($_POST['recv'])){
    $update_id=$_POST['itemid'];
    $query="UPDATE orders SET status='Delivered' WHERE id={$update_id}";
    if(mysqli_query($conn,$query)){
        header('location:/cake_studio/myorders.php');
    }    
}

?>