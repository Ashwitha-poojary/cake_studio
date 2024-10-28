<?php 
session_start();
if(!isset($_COOKIE['shop'])){
  header('location:shoplogin.php');
}
require('../config/shopaccount.php');

?>
<!DOCTYPE html>
<html>
<title>Cake Shop | Ultimate Cake Destination</title>
<link rel="icon" href="../icon/icons.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../style/w3.css">
<link rel="stylesheet" href="../bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right" style="font-family: 'Pacifico', cursive; font-size:30px; color:#d2996e;">Cake Studio</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-bar s12">
      <h4><span><?php echo $_SESSION['shopname']; ?></span></h4>
    <div class="w3-col s8 w3-bar" style="font-size:20px;">
      <a href="../config/shoplogout.php" class="w3-bar-item w3-button btn btn-outline-primary"><i class="fa fa-sign-out">Sign Out</i></a>
    </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h4>Dashboard</h4>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="shopdashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i> Home</a>
    <a href="s1.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Shop Profile</a>
    <h6 class="w3-bar-item w3-padding"><span>Manage Products</span></h6>
    <a href="s2.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Product List</a>
    <a href="s3.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Add Products</a>
    <h6 class="w3-bar-item w3-padding"><span>Manage Orders</span></h6>
    <a href="s4.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i> New Orders</a>
    <a href="s5.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  Accepted Orders</a>
    <h6 class="w3-bar-item w3-padding"><span>Product Delivery</span></h6>
    <a href="s6.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  Deliver Items</a>
    <a href="s7.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Delivered Items</a><br><br>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- Header -->
  <header class="w3-container" style="margin:auto; padding-top:22px">
    <h2><b><i class="fa fa-user"></i> Edit Profile</b></h2>
  </header>
  <div class="w3-container"  style="margin-left:35px" >
  <div class="col-md-9" style="margin:auto; font-weight:bold; font-size:18px; float:left;">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" style="color: black;">
  <div class="form-group <?php echo $bg; ?> ">
      <label class="text-white"><?php echo $msg ; ?> </label>
   </div>
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  value="<?php echo $data['sname']; ?>">
  </div>  
  <div class="form-group">
      <label for="oname">Owner name</label>
      <input type="text" class="form-control" name="oname" id="oname"  value="<?php echo $data['ownername']; ?>">
    </div>
    <div class="form-group">  
      <label for="emailid">Email</label>
      <input type="email" class="form-control" name="email" id="emailid" value="<?php echo $data['email']; ?>">
    </div>
    <div class="form-group ">
      <label for="detail">Details</label>
      <input type="text" class="form-control"  name="detail" value="<?php echo $data['details']; ?>">
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address" id="Address" ><?php echo $data['addrs']; ?></textarea>
  </div>
  <div class="form-group">
  <?php echo "<img src='../uploads/". $data['shop_img']." ' style='display: block;max-width:180px;max-height:180px;width: auto;height: auto;'>"; ?>
</div>  
  <div class="form-row " >
  <label for="image">Shop Image</label>
  </div>
    <div class="form-group col-md-6" style="background-color:white;padding:0%;">      
      <input type="file" id="image" name="img" >   
  </div>  
  <button type="submit" value="submit" name="submit"  class="btn btn-primary btn-test">Update</button>
 </form>
 </div>
 </div>

  

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey text-center">
    <h4>Cake Studio</h4>
    <p> Cake Studio &copy;2020</p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

var itemdisp = document.getElementById("form");



// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
  
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
  if (true){
    itemdisp.style.float='left';
  }
}

</script>

</body>
</html>
