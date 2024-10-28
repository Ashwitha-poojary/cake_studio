<?php
require('connect.php');
session_start();
$id=mysqli_real_escape_string($conn,$_GET['id']);
if(!$id==""){
      $_SESSION['editid']=$id;
}
$iid=$_SESSION['editid'];
$msg="";
$bg="";
$getlist="SELECT * FROM items where id=".$iid;
if($result1=mysqli_query($conn,$getlist)){
$list=mysqli_fetch_assoc($result1);
mysqli_free_result($result1);
}

if(isset($_POST['submit'])){
      $itid=$_POST['itid'];
      $name= $_POST['iname'];
      $desc= $_POST['desc'];
      $price=$_POST['price'];

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
               $itimg= $_FILES['itimg']['name'];
               $file_extension = pathinfo("$itimg", PATHINFO_EXTENSION);
          if($_FILES["itimg"]["size"] > 2000000) {
               $msg="Image size exceeds 2MB";
               $bg="bg-danger"; 
           }
       else{
             if(!$itimg==""){
          if (! in_array($file_extension, $allowed_image_extension)) {
              $msg="Upload valid images. Only PNG and JPEG are allowed.";
              $bg="bg-danger";  
               
          }
      }
      else{

      //submitting data
      $target="../uploads/".basename($_FILES['itimg']['name']);
      $itimg= $_FILES['itimg']['name'];
      if($itimg==""){
            $query="UPDATE items SET name='$name' ,descp='$desc',price='$price' WHERE id={$itid}";
      }
      else{
            $query="UPDATE items SET name='$name' ,item_img='$itimg',descp='$desc',price='$price' WHERE id={$itid}";
      }
      mysqli_query($conn,$query) or die("connection failed".mysqli_error($conn));
      move_uploaded_file($_FILES['itimg']['tmp_name'],$target);
      header('location:../shop/s2.php');  
}  
}
}
}
}
}
          

?>