<?php
require('connect.php');
$sid=$_COOKIE['shop'];
$msg="";
$error="";
$bg="";
$shopimg="";
$quer="SELECT * FROM shop WHERE id='$sid' ";
if($res=mysqli_query($conn,$quer)){
   $data=mysqli_fetch_assoc($res);
   $id=$data['id'];
}

if(isset($_POST['submit'])){
      $name= $_POST['name'];
      $oname= $_POST['oname'];
      $email= $_POST['email'];
      $detail=$_POST['detail'];
      $address= $_POST['address'];
      $shopimg= $_FILES['img']['name'];
      $num=0;
      if($data['email']!=$email){
       $cndtn= "SELECT * from shop WHERE email = '$email' ";
       $res1=mysqli_query($conn,$cndtn);
       $num=mysqli_num_rows($res1);
      }

      if($num>0){
      
            $msg="Email already taken";    
            $bg="bg-danger";
           
      }
      else{
        //image validation
        //Getting image dimension
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    //validating image
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    $file_extension = pathinfo("$shopimg", PATHINFO_EXTENSION);
    if  ($_FILES["img"]["size"] > 2000000) {
        $msg="Image size exceeds 2MB";
        $bg="bg-danger"; 
    }
    else{
        if (!(in_array($file_extension, $allowed_image_extension))&&$shopimg!="") {
                $msg="Upload valid images. Only PNG and JPEG are allowed.";
                $bg="bg-danger";     
         }
    else{
      //character checking
      if(!preg_match("/^[a-zA-Z-']*$/",$oname)){
        $msg="Owner Name Contains Illegal Characters";
        $bg="bg-danger";
    }
    else{
      if($shopimg!=""){
            $target="../uploads/".basename($_FILES['img']['name']);
            $mainq="UPDATE shop SET sname='$name' ,ownername='$oname',email='$email',details='$detail',addrs='$address',shop_img='$shopimg' WHERE id='$id'";
      }else{
            $mainq="UPDATE shop SET sname='$name' ,ownername='$oname',email='$email',details='$detail',addrs='$address' WHERE id='$id'";
      } 
      mysqli_query($conn,$mainq) or die("connection failed".mysqli_error($conn));
      move_uploaded_file($_FILES['img']['tmp_name'],$target);
      header('location:../shop/s1.php');       
}  
  
}
}
}
}

?>