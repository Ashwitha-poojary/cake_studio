<?php
session_start();
require('connect.php');
$warnmsg="";
$mailmsg="";
$passmsg="";
$disp="";
if(isset($_POST['submit'])){
    $usermail=$_POST['email'];
    $_SESSION['femail']=$usermail;
    $subquer="SELECT email FROM users WHERE email='$usermail'";
    $nume=mysqli_query($conn,$subquer);
    if(mysqli_num_rows($nume)==1){
        $numcode=rand(1000,9999);
        $_SESSION['passcode']=$numcode;        
        $to = "$usermail";
        $subject = "Password Code";
        $txt = "Your password reset code is : '$numcode'";
        $headers = "From: iamvarunpujari@gmail.com";
        mail($to,$subject,$txt,$headers);
        $warnmsg="";
        $disp="code";
    }
    else{
        $mailmsg="Invalid email address";
    }

}
if(isset($_POST['code'])){
    $fcode=$_POST['fcode'];
    $passcode=$_SESSION['passcode'];
    if($passcode==$fcode){
       header('location:../cake_studio/uforgotpass2.php');
    }  
    else{
        $warnmsg="Invalid recovery code";
        $disp="code";
    }   
}
if(isset($_POST['confirm'])){
    $newpass=$_POST['newpass'];
    $cnfrmpass=$_POST['cnfrmpass'];
   if(strlen($newpass)<6){
       $passmsg="Password must be atleast 6 characters long";
   }else{
       $passmsg="";
       if($newpass==$cnfrmpass){
            $femail=$_SESSION['femail'];
            $safenewpass=md5($newpass);
            $passquer="UPDATE users SET passwd='$safenewpass' WHERE email='$femail'";
            mysqli_query($conn,$passquer);
            header('location:../cake_studio/login.php');
       }else{
           $passmsg="The password confirmation doesn’t match";
       }
   }
}

?>