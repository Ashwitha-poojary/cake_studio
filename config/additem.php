<?php
require('connect.php');
$msg="";
$bg="";
if(isset($_POST['submit'])){
    $iname= $_POST['iname'];
    $desc= mysqli_real_escape_string($conn,$_POST['desc']);
    $price= $_POST['price'];

    //checking price
    if(!is_numeric($price)){
        $msg="Invalid Price";
        $bg="bg-danger";
    }
    else{
        if($price<0){
            $msg="Invalid Price";
            $bg="bg-danger";
        }
        else{
            if(strlen($desc)>150){
                $msg="Description length is too long";
                $bg="bg-danger";
            }
            else{
                 //image validation
            //Getting image dimension
            $fileinfo = @getimagesize($_FILES["itimg"]["tmp_name"]);
            //validating image
             $allowed_image_extension = array(
                     "png",
                     "jpg",
                     "jpeg"
                     );
                 $itemimg= $_FILES['itimg']['name'];
                 $file_extension = pathinfo("$itemimg", PATHINFO_EXTENSION);
            if($_FILES["itimg"]["size"] > 2000000) {
                 $msg="Image size exceeds 2MB";
                 $bg="bg-danger"; 
             }
         else{
            if (! in_array($file_extension, $allowed_image_extension)) {
                $msg="Upload valid images. Only PNG and JPEG are allowed.";
                $bg="bg-danger";  
                 
            }
        else{

            $target="../uploads/".basename($_FILES['itimg']['name']);
             $itemimg= $_FILES['itimg']['name'];
             $shop_id=$_COOKIE['shop'];
           $add="INSERT INTO items(name,shop_id,item_img,descp,price) values ('$iname','$shop_id','$itemimg','$desc','$price')";    
            mysqli_query($conn,$add) or die("connection failed".mysqli_error($conn));
            move_uploaded_file($_FILES['itimg']['tmp_name'],$target);
            header('location:../shop/s2.php'); 
}
}
}
}
}
}
mysqli_close($conn);
?>