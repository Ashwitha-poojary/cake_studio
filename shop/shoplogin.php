<?php
 if(isset($_COOKIE['shop'])){
  header('location:shopdashboard.php');
}
  require('../config/shopvalidate.php');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cake Shop | Ultimate Cake Destination</title>
    <link rel="icon" href="../icon/icons.png" type="image/x-icon">
    <link href="style/style.css" ref="stylesheet" />
    <link rel="stylesheet" href="../bootstrap.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
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
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shopregister.php">Register</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign In
              </a>
                <div style="margin:auto; padding:0%; max-width:160px;min-width:0px;">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 0%; max-width: 160px;">
                    <a class="dropdown-item" href="../login.php">Customer</a>
                    <a class="dropdown-item" href="../admin/adminlogin.php">Admin</a>
                    <!--<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>-->
                  </div>
                </div>
            </li>
          </ul>
        </div>
    </nav>
  </header>
<section>
<div class="container-sm" style="width:60%;padding:5%;">
  <form method="POST">
    <div class="form-group">
      <h1 style="font-family: 'Pacifico', cursive; font-size:50px; text-align:center;">Shop</h1>
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
    </div>
    <div class="form-group">
      <label for="Password">Password</label>
      <input type="password" class="form-control" id="Password" name="passwd" required>
    </div>
    <label class="bg-danger text-white"><?php echo $msg ; ?> </label><br>
    <button type="submit" class="btn btn-primary">Login</button>
    <div class="form-group" style="margin: 2% 0%">
      <a style="color: black;" href="sforgotpass.php">Forgot password?</a>
    </div>
  </form>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>