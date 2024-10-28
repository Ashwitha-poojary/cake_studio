<?php
require('connect.php');
$id=$_COOKIE['user'];
$quer="SELECT * FROM USERS WHERE id= '$id' ";
$res=mysqli_query($conn,$quer);
$data=mysqli_fetch_assoc($res);

if(isset($_POST['submit'])){
    $name=$_POST['fname'];
    $pno=$_POST['phno'];
    $adr=$_POST['address'];
    $updt="UPDATE USERS set uname='$name',phno='$pno',addr='$adr' WHERE id ='$id'";
    mysqli_query($conn,$updt);

}
if(isset($_POST['passwd'])){
    header('location:../cake_studio/uchangepass.php');
}
$hey="";
if(isset($_POST['changepass'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $cnfrmpass=$_POST['cnfrmpass'];
    if(strlen($newpass)<8){
        $hey="Minimum password length should be 8 characters";
    }
    else{
    $cnfrmquer="SELECT passwd from USERS WHERE id='$id' ";
    $check=mysqli_query($conn,$cnfrmquer);
    $oldpass=md5($oldpass);
    $pass=mysqli_fetch_assoc($check);
    $newpass=md5($newpass);
    $cnfrmpass=md5($cnfrmpass);
    if($oldpass==$pass['passwd']&&$newpass==$cnfrmpass){
        $updtpass="UPDATE USERS set passwd='$cnfrmpass' WHERE id ='$id'";
        mysqli_query($conn,$updtpass);
        header('location:../cake_studio/dashboard.php');
    }
    elseif($oldpass!=$pass['passwd']){
        $hey="Please Confirm Your Old Password";
    }
    elseif($newpass!=$cnfrmpass){
        $hey="Please Confirm Your New Password";
    }
}
}


    
?>