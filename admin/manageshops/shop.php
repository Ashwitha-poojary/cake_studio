<?php
session_start();
$_SESSION['viewses']="";
if(!isset($_COOKIE['admin'])){
  header('location:../adminlogin.php');
}
require("../../config/adminconfig.php");
?>
<!DOCTYPE html>
<html>
<title>Cake Shop | Ultimate Cake Destination</title>
<link rel="icon" href="../../icon/icons.png" type="image/x-icon">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../../style/w3.css">
<link rel="stylesheet" href="../../bootstrap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
      <!--<img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">-->
   
    <div class="w3-col s8 w3-bar" style="font-size:20px;">
    <span>Welcome, <strong> <?php echo $apdisp['name'] ?> </strong></span><br>
      <div class="w3-col s8 w3-bar" style="font-size:20px;">
      <a href="../../config/adminlogout.php" class=" btn btn-primary"><i class="fa fa-sign-out">Sign Out</i></a>
    </div>
    </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h4>Admin Dashboard</h4>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="../adashboard.php" class="w3-bar-item w3-button w3-padding "><i class="fa fa-home fa-fw"></i> Home </a>
    <a href="manageshop.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i> Manage Shop </a>
    <h6 class="w3-bar-item w3-padding"><span>Manage Products</span></h6>
    <a href="../usermanage/umanage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i> User Management</a>
    <a href="../adminreg.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Add Admins</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i>Manage Shops</b></h5>
  </header>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#">Shops</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="disabledshops.php">Disabled Shops</a>
  </li>
</ul>
<div class="container-xl">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Email</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php $i=1;?>
      <?php foreach($det as $tab): ?>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $tab['sname']; ?></td>
      <td><?php echo $tab['ownername']; ?></td>
      <td><?php echo $tab['email']; ?></td>
      <td><div><form action=<?php echo $_SERVER['PHP_SELF']; ?> method="POST"> 
      <input type="hidden" name="id" value="<?php echo $tab['id']; ?>">
      <button class="btn btn-primary" name="more" value="more">View More</button>
      <button class="btn btn-danger" name="disable" value="disable">Disable</button></form></div>
      </td>
      <?php  $i++; ?>
    </tr>
      <?php endforeach; ?>
    
  </tbody>
</table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

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
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
