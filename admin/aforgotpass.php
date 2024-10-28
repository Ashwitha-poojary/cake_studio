<?php
require('../config/aforgotpassconfig.php');
if(isset($_COOKIE['admin'])){
  header('location:adashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cake Shop | Ultimate Cake Destination</title>
    <link rel="icon" href="../icon/icons.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap.css" >
    <link rel="stylesheet" href="../style/style.css">
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
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Sign In
              </a>
                <div style="margin:auto; padding:0%; max-width:160px;min-width:0px;">
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width: 0%; max-width: 160px;">
                    <a class="dropdown-item" href="shop/shoplogin.php">Shop</a>
                    <a class="dropdown-item" href="#">Admin</a>
                  </div>
                </div>
            </li>
          </ul>
        </div>
    </nav>
  </header>
<section>
<div class="container-sm " style="width:60%;padding:5%;">
<?php if($disp!="code"){ ?>
<form method="POST">
    <div class="form-group">
      <div>
      <h1 style=" font-size:50px;">Forgot Password</h1>
      </div>
      <label >Please Enter Your Email address</label>
      <input type="email" class="form-control" name="email" id="InputEmail" aria-describedby="emailHelp" required>
      <br>
      <label class="bg-danger text-white"><?php echo $mailmsg; ?></label><br>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form><br>
  <?php } ?>

  <?php if($disp=="code"){ ?>
  <form method="POST">
    <div class="form-group">
      <label>Please Enter the Reset Code</label>
      <div style="width:10em">
        <input type="number" class="form-control" name="fcode" required>
      </div>
      <br>
      <label class="bg-danger text-white"><?php echo $warnmsg ; ?></label><br>
    <button type="submit" name="code" class="btn btn-success">Submit</button>
    </div>
  </form><br>
  <?php } ?>


</div>  



</section>

<footer>
<p class="text-center">Cake Studio &copy;2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="bootstrap.js" ></script>
</body>
</html>