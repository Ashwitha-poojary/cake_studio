<?php
session_start();
require('connect.php');
$msg="";
if(isset($_POST['submit'])){
  if(isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $passwd=$_POST['password'];
    $passwd=md5($passwd);
    $pasval="SELECT * FROM USERS WHERE email='$email'";
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
    $log="SELECT * FROM USERS WHERE email='$email' AND passwd='$passwd' AND status!='2'";
    $num=mysqli_query($conn,$log);
    if(mysqli_num_rows($num)==1){
      $name=mysqli_fetch_assoc($num);
      $_SESSION['name']=$name['uname'];
      $newid=$name['id'];
      $new="UPDATE USERS set status='1' where id='$newid'";
      mysqli_query($conn,$new);
      setcookie('user',$name['id'],time()+36000,"/");
      setcookie('userid',$name['id'],time()+36000,"/");
      header('location:../cake_studio/dashboard.php');
    }else{
      header('location:../login.php');  
    }
  }
 }
}
}
if(isset($_POST['fpass'])){
  if(isset($_POST['email'])){
    header('location:uforgotpassconfig.php');
  }
}


?>