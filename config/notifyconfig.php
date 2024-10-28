<?php
require('connect.php');
$id=$_COOKIE['user'];
$notquer="SELECT id FROM NOTIFICATION WHERE status='unread' AND user_id='$id'";
$notfres=mysqli_query($conn,$notquer);
$res1=mysqli_fetch_all($notfres,MYSQLI_ASSOC);

$display="SELECT n.*,o.status,o.item_id FROM NOTIFICATION as n,ORDERS as o WHERE n.user_id='$id' AND o.user_id='$id' ORDER BY n.date DESC";
$result2=mysqli_query($conn,$display);
$res2=mysqli_fetch_all($result2,MYSQLI_ASSOC);

if(isset($_POST['read'])){
    $updt="UPDATE NOTIFICATION SET status='read' WHERE user_id={$id}";
    mysqli_query($conn,$updt);
}
?>