<?php

require('connect.php');
$id=$_COOKIE['user'];
$oid=$_GET['iid'];
$userquer="SELECT * FROM users WHERE id='$id'";
$userres=mysqli_query($conn,$userquer);
$userdet=mysqli_fetch_assoc($userres);


//orderdet
$orderquer="SELECT * FROM orders WHERE id='$oid'";
$orderres=mysqli_query($conn,$orderquer);
$orderdet=mysqli_fetch_assoc($orderres);

//shopdet
$sid=$orderdet['shop_id'];
$shopquer="SELECT * FROM shop WHERE id='$sid'";
$shopres=mysqli_query($conn,$shopquer);
$shopdet=mysqli_fetch_assoc($shopres);

//itemdet
$iid=$orderdet['item_id'];
$itemquer="SELECT * FROM items WHERE id='$iid'";
$itemres=mysqli_query($conn,$itemquer);
$itemdet=mysqli_fetch_assoc($itemres);

//billdet
$bid=$orderdet['bill_id'];
$billquer="SELECT * FROM bills WHERE id='$bid'";
$billres=mysqli_query($conn,$billquer);
$billdet=mysqli_fetch_assoc($billres);

//quantity


?>
