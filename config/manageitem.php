<?php
require('connect.php');
$shop_id=$_COOKIE['shop'];
$getlist="SELECT * FROM items WHERE shop_id={$shop_id}";
$result=mysqli_query($conn,$getlist);
$list=mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

?>