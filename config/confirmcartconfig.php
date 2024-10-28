<?php
require('connect.php');
//item info
$item_id=mysqli_real_escape_string($conn,$_GET['id']);
$getlist="SELECT * FROM items WHERE id={$item_id}";
$result=mysqli_query($conn,$getlist);
$details=mysqli_fetch_assoc($result);
mysqli_free_result($result);

$msgdisp="";
$errordisp="";
$bg="";
//submitting to cart
if (isset($_POST['submit'])){
    
    //Getting image dimension
    $fileinfo = @getimagesize($_FILES["img"]["tmp_name"]);
    //validating image
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    $custimg= $_FILES['img']['name'];
    $file_extension = pathinfo("$custimg", PATHINFO_EXTENSION);
    if  ($_FILES["img"]["size"] > 2000000) {
        $errordisp="Image size exceeds 2MB";
        $bg="bg-danger"; 
    }
    else{
        if (! (in_array($file_extension, $allowed_image_extension))&&$custimg!="") {
                $msgdisp="Upload valid images. Only PNG and JPEG are allowed.";
                $bg="bg-danger";  
                 
         }
    else{

         $user_id= $_COOKIE['user'];
         $item_id=$_POST['itemid'];
         $shop_id=$_POST['shopid'];
         $quantity=$_POST['quantity'];
         $srequest=$_POST['srequest'];
         $target="../uploads/".basename($_FILES['img']['name']);
         
         $add="INSERT INTO cart(user_id,shop_id,item_id,quantity,srequest,cust_img) values ('$user_id','$shop_id','$item_id','$quantity','$srequest','$custimg')";
        mysqli_query($conn,$add) or die("connection failed".mysqli_error($conn));
        move_uploaded_file($_FILES['img']['tmp_name'],$target);
        header("location:../cake_studio/viewshop.php?id=$shop_id"); 
    }
}
}


?>