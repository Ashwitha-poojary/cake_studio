<?php
require('connect.php');
$user_id=$_COOKIE['userid'];
echo $user_id;
$quer="UPDATE USERS set status='0' where id=$user_id";
$num=mysqli_query($conn,$quer);
setcookie('user',$user_id,time()-36000,"/");
setcookie('userid',$user_id,time()-36000,"/");
header('location:../login.php');
?>