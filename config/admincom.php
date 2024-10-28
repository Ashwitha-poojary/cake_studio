<?php
require('connect.php');
session_start();
//adminpersonal
$apquer="SELECT * FROM admin WHERE id={$_COOKIE['admin']}";
$apres=mysqli_query($conn,$apquer);
$apdisp=mysqli_fetch_assoc($apres);

//indiv items
$itid=mysqli_real_escape_string($conn,$_GET['indiv']);
if(!$itid==""){
    $_SESSION['citem']=$itid;
}
$itemid=$_SESSION['citem'];
$gtlist="SELECT * FROM items WHERE id='$itemid'";
if($resul=mysqli_query($conn,$gtlist)){
    $lt=mysqli_fetch_assoc($resul);
    mysqli_free_result($resul);
}

//view comments
$dispcom="SELECT c.*,u.uname FROM comments as c,users as u WHERE c.item_id={$itemid} AND u.id=c.user_id  ORDER BY c.date DESC";
if($comview=mysqli_query($conn,$dispcom)){
$comshow=mysqli_fetch_all($comview,MYSQLI_ASSOC);
// var_dump($comshow);
}

if(isset($_POST['comdel'])){
    $comid=$_POST['comid'];
    $comdelq="DELETE FROM comments WHERE id='$comid'";
    mysqli_query($conn,$comdelq);
    header("location:{$_SERVER['PHP_SELF']}");
}

?>