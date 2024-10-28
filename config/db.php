<?php
session_start();
require('connect.php');
$msg="";
$bg="";

//submitting
if(isset($_POST['submit'])){
  if (isset($_POST['email']) && isset($_POST['passwd'])){
    $passwd= $_POST['passwd'];
    $cpasswd=$_POST['cpasswd'];
    $email= $_POST['email'];
    $phno=$_POST['phno'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $name=$fname." ".$lname;
   //length of password
    if(((strlen($passwd))<6)){
      $msg="Password Length is too short";
      $bg="bg-danger";
    }else{
      //confirming password
    if($passwd!=$cpasswd){
      $msg="Passwords do not match";
      $bg="bg-danger";
    }
    else{
      //checking if email exists
      $cndtn= "SELECT * from users WHERE email = '$email' ";
      $res=mysqli_query($conn,$cndtn);
      $num=mysqli_num_rows($res);
      if($num>0){
          $msg="Email already taken";    
          $bg="bg-danger";
      }else{
        //checking phone number
        if(!is_numeric($phno)){
          $msg="Invalid phone number";
          $bg="bg-danger";
        }
        else{
     //character checking
    if(!preg_match("/^[a-zA-Z-']*$/",$name)){
        $msg="Contains Illegal Characters";
        $bg="bg-danger";
    }
    else{
      //final submission
      $fname= $_POST['fname'];
      $lname= $_POST['lname'];
      $name=$fname." ".$lname;
      $email= $_POST['email'];
      $passwd=md5($passwd);
      $phno=$_POST['phno'];
      $address= $_POST['address'];
      $sql= "INSERT INTO users(name,email,passwd,phno,addr) VALUES ('$name','$email','$passwd','$phno','$address')";
        mysqli_query($conn,$sql);
        $cndtn1= "SELECT * from users WHERE email = '$email' ";
        $res1=mysqli_query($conn,$cndtn1);
        $det1=mysqli_fetch_assoc($res1);
        $_SESSION['name']=$name;
        setcookie('user',$det1['id'],time()+36000,"/");
        header('location:../dashboard.php');
      mysqli_free_result($res);
    }
  }
}
}
}
}
}

?>