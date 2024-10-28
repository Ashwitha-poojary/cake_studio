<?php
require("connect.php");
session_start();
$quer="SELECT status FROM users WHERE status=1";
$no=mysqli_query($conn,$quer);
$unum=mysqli_num_rows($no);

//registered shops
$quer2="SELECT status FROM shop";
$no2=mysqli_query($conn,$quer2);
$snum=mysqli_num_rows($no2);



//manageshop
//display shop
$quer3="SELECT * FROM shop WHERE status!=2";
$no3=mysqli_query($conn,$quer3);
$det= mysqli_fetch_all($no3,MYSQLI_ASSOC);
mysqli_free_result($no3);
// $shopid="";
//view details
if(isset($_POST['more'])){
  $_SESSION['viewses']=$_POST['id'];
  header('location:../manageshops/shopmore.php');
}
 if(isset($_POST['disable'])){
     $id=$_POST['id'];
    $quer4="UPDATE shop SET status='2' where id='$id'";
    mysqli_query($conn,$quer4);
    header('location:../manageshops/shop.php');
   
 }

 //viewshop
  $shopid=$_SESSION['viewses'];
  $quer9="SELECT * FROM shop where id='$shopid'";
  $shopres=mysqli_query($conn,$quer9);
  $shopdet=mysqli_fetch_assoc($shopres);

//view items
$getlist="SELECT * FROM items WHERE shop_id='$shopid'";
if($result=mysqli_query($conn,$getlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
}


 //disabled view
 $quer5="SELECT * FROM shop WHERE status=2";
$no4=mysqli_query($conn,$quer5);
$det2=mysqli_fetch_all($no4,MYSQLI_ASSOC);
mysqli_free_result($no4);

//enable
if(isset($_POST['enable'])){
    $eid=$_POST['eid'];
   $quer6="UPDATE shop SET status='1' where id='$eid'";
   mysqli_query($conn,$quer6);
   header('location:../manageshops/disabledshops.php');
}

//userdisplay
$userquer="SELECT * FROM users";
$ures=mysqli_query($conn,$userquer);
$udisp=mysqli_fetch_all($ures,MYSQLI_ASSOC);
mysqli_free_result($ures);

//userdisable
if(isset($_POST['udisable'])){
  $uid=$_POST['uid'];
  $userdisquer="UPDATE users SET status='2' where id='$uid'";
  mysqli_query($conn,$userdisquer);
  header('location:../usermanage/umanage.php');
}

//user enable
if(isset($_POST['uenable'])){
  $uid=$_POST['uid'];
  $userdisquer1="UPDATE users SET status='1' where id='$uid'";
  mysqli_query($conn,$userdisquer1);
  header('location:../usermanage/umanage.php');
}

//user delete
if(isset($_POST['udelete'])){
  $uid=$_POST['uid'];
  $userdisquer2="DELETE FROM users where id='$uid'";
  mysqli_query($conn,$userdisquer2);
  header('location:../usermanage/umanage.php');
}


//admin display
$adminquer="SELECT * FROM admin";
$ares=mysqli_query($conn,$adminquer);
$adisp=mysqli_fetch_all($ares,MYSQLI_ASSOC);
mysqli_free_result($ares);

//adminpersonal
$apquer="SELECT * FROM admin WHERE id={$_COOKIE['admin']}";
$apres=mysqli_query($conn,$apquer);
$apdisp=mysqli_fetch_assoc($apres);

//admindisable
if(isset($_POST['adisable'])){
  $aid=$_POST['aid'];
  $admindisquer="UPDATE admin SET status='2' where id='$aid'";
  mysqli_query($conn,$admindisquer);
  header('location:../usermanage/amanage.php');
}
//adminenable
if(isset($_POST['aenable'])){
  $aid=$_POST['aid'];
  $admindisquer1="UPDATE admin SET status='1' where id='$aid'";
  mysqli_query($conn,$admindisquer1);
  header('location:../usermanage/amanage.php');
}

//add admin
$amsg="";
$bg="";
if(isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $convp=$_POST['passwd'];
    $cpasswd=$_POST['cpasswd'];
    //length  of password
    if(((strlen($convp))<6)){
        $amsg="Password Length is too short";
        $bg="bg-danger";
      }else{
        //confirming password
        if($convp!=$cpasswd){
          $amsg="Passwords do not match";
          $bg="bg-danger";
        }
        else{
          //checking if email exists
        $cndtn= "SELECT * from admin WHERE email = '$email' ";
        $res=mysqli_query($conn,$cndtn);
        $num=mysqli_num_rows($res);
        if($num>0){
            $amsg="Email already taken";    
            $bg="bg-danger";
        }else{
            //validating name
            if(!preg_match("/^[a-zA-Z-']*$/",$name)){
                $amsg="Name Contains Illegal Characters";
                $bg="bg-danger";
            }
            else{
    $passwd=md5($convp);
    $addquer="INSERT INTO admin (name,email,passwd) VALUES('$name','$email','$passwd')";
    mysqli_query($conn,$addquer);
    header('location:../admin/adashboard.php');
}
}
}
}
}

?>