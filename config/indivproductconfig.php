<?php
require('connect.php');
$item_id=$_GET['id'];
$getlist="SELECT * FROM items WHERE id={$item_id}";
if($result=mysqli_query($conn,$getlist)){
    $list=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}


$userid=$_COOKIE['user'];
$itemid=$list['id'];

if(isset($_POST['comment'])){
    $msg=$_POST['usercomment'];
    $comquer="INSERT INTO comments (user_id,item_id,msg) VALUES ('$userid','$itemid','$msg')";
    mysqli_query($conn,$comquer);
    header("location:../cake_studio/usercomment.php?id='$itemid'");
}

$dispcom="SELECT c.*,u.uname FROM comments as c,users as u WHERE u.id=c.user_id AND c.item_id='$itemid' ORDER BY c.date DESC";
if($comview=mysqli_query($conn,$dispcom)){
$comshow=mysqli_fetch_all($comview,MYSQLI_ASSOC);
}

if(isset($_POST['comdel'])){
    $comid=$_POST['comid'];
    $comdelq="DELETE FROM comments WHERE id='$comid'";
    mysqli_query($conn,$comdelq);
    header("location:../cake_studio/usercomment.php?id='$itemid'");
}
?>