<?php
require('../config/shopdb.php');
if(isset($_COOKIE['shop'])){
  header('location:shopdashboard.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cake Shop | Ultimate Cake Destination</title>
    <link rel="icon" href="../icon/icons.png" type="image/x-icon"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap.css">
</head>
<body>
 <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="navbar-brand " style="font-family: 'Pacifico', cursive; font-size:50px; color:#d2996e;">Cake Studio</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/cake_studio/">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shoplogin.php">Login</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign In
              </a>
                <div style="margin:auto; padding:0%; max-width:160px;min-width:0px;">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 100px; max-width: 160px;">
                    <a class="dropdown-item" href="../login.php">Customer</a>
                    <a class="dropdown-item" href="../admin/adminlogin.php">Admin</a>
                  </div>
                </div>
            </li>
          </ul>
        </div>
    </nav>
  </header>
  <section>
  <div style="margin:auto; margin-top:3%; padding:5% 7%; width: 60%; background-color:#fff5; border-radius:50px;">
  <form method="POST" enctype="multipart/form-data" style="color: black;">
  <h1 style="font-family: 'Pacifico', cursive; font-size:50px; color:#000; text-align:center">Shop Register</h1>
  <br>
  <div class="form-group <?php echo $bg; ?> ">
      <label class="text-white"><?php echo $msg ; ?> </label>
   </div>
  <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name"  required>
  </div>  
  <div class="form-group">
      <label for="oname">Owner name</label>
      <input type="text" class="form-control" name="oname" id="oname"  required>
    </div>
    <div class="form-group">  
      <label for="emailid">Email</label>
      <input type="email" class="form-control" name="email" id="emailid" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="passwd" id="password" required>
    </div>
    <div class="form-group">
      <label for="cpassword" class="col-form-label">Confirm Password </label>
      <input type="password" class="form-control" id="cpassword" name="cpasswd" required>
    </div>
    <div class="form-group ">
      <label for="detail">Details</label>
      <input type="text" class="form-control"  name="detail" required>
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address" id="Address" required></textarea>
  </div>
  <div class="form-row " >
  <label for="image">Shop Image</label>
  </div>
    <div class="form-group col-md-6" style="background-color:white;padding:0%;">      
      <input type="file" id="image" name="img" required>   
  </div>  
  <button type="submit" value="submit" name="submit"  class="btn btn-primary btn-test">Sign Up</button>
 </form>
 </div>
</section>
<div style="padding: 20px;"></div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>