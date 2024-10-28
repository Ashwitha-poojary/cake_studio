<?php
require('connect.php');
$id=mysqli_real_escape_string($conn,$_GET['id']);
$getlist="SELECT * FROM items where id=".$id;
if($result1=mysqli_query($conn,$getlist)){
$list=mysqli_fetch_assoc($result1);
mysqli_free_result($result1);
}

//comments
$itemid=$id;
$dispcom="SELECT c.*,u.uname FROM comments as c,users as u WHERE u.id=c.user_id AND c.item_id='$itemid' ORDER BY c.date DESC";
if($comview=mysqli_query($conn,$dispcom)){
$comshow=mysqli_fetch_all($comview,MYSQLI_ASSOC);
}



?>