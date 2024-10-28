<?php
require('connect.php');
$shop_id=$_GET['id'];

$checkst="SELECT * FROM shop WHERE id='$shop_id'";
$checkstres=mysqli_query($conn,$checkst);
$checkstdet=mysqli_fetch_assoc($checkstres);
$checkclass="";
if($checkstdet['status']=="0"){
    $checkclass="disabled";
}



$getlist="SELECT * FROM items WHERE shop_id={$shop_id}";
if($result=mysqli_query($conn,$getlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}



?>