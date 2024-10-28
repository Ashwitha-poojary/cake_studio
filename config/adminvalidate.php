<?php
session_start();
require('connect.php');
$msg="";
if(isset($_POST['email']) && isset($_POST['password'])){
$email=$_POST['email'];
$passwd=$_POST['password'];
$passwd=md5($passwd);

$pasval="SELECT * FROM admin WHERE email='$email'";
    $passans=mysqli_query($conn,$pasval);
    $passreal=mysqli_fetch_assoc($passans);
    //checking email and password
    if($email!=$passreal['email']){
      $msg="Incorrect Email Address";
    }
    else{
      if($passwd!=$passreal['passwd']){
          $msg="Password is incorrect. Please enter correct password";
      }
      else{
        //submitting
$log="SELECT * FROM ADMIN WHERE email='$email' AND passwd='$passwd' AND status!='2'";
$num=mysqli_query($conn,$log);
if(mysqli_num_rows($num)==1){
  $name=mysqli_fetch_assoc($num);
  setcookie('admin',$name['id'],time()+36000,"/");
  $_SESSION['viewses']="";
  header('location:../admin/adashboard.php');
}else{
    
    header('location:../admin/adminlogin.php');  
}
}
    }
  }

?>