<?php 
session_start();
if(!isset($_COOKIE['user'])){
  header('location:login.php');
}
require('config/useraccount.php');
require("config/notifyconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cake Shop | Ultimate Cake Destination</title>
    <link rel="icon" href="icon/icons.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" >
 </head>
<body>
   <header>
   <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="navbar-brand " style="font-family: 'Pacifico', cursive; font-size:50px; color:#d2996e;">Cake Studio</div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item btn-primary ">
              <a class="nav-link" href="config/logout.php">Sign Out</a>
            </li>
          </ul>
        </div>
        </div>
        </nav>
  </header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
<ul class="nav justify-content-center" style="margin: auto;">
  <li class="nav-item">
    <a class="nav-link " href="dashboard.php">Home</a>
  </li>
  <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Notification
        <?php
          if(count($res1)>0){
        ?>
        <span class="badge badge-light"><?php echo count($res1);?></span>
        <?php } ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
        <?php
        if(count($res2)>0){
          foreach($res2 as $i){
        ?>
        <a class="dropdown-item" href="#">
        <small><i><?php echo date('F j,Y,g:i a',strtotime($i['date']));?></i></small><br>
        <?php 
          $msg=mysqli_query($conn,"SELECT name FROM items where id={$i['item_id']}");
          $disp=mysqli_fetch_assoc($msg);
          echo "Your order for {$disp['name']} was {$i['status']}";
          ?>
        </a>
        <div class="dropdown-divider"></div>
        <?php
          } 
          ?>
        <form method="POST">
          <button type="submit"  class="container-md btn btn-outline-primary" name="read" value="read">Mark all as read</button>
        </form>
        <?php 
        }
        else{
           echo "No Notfications Yet";
        }
        ?>
        </div>
    </li>
  <li class="nav-item">
    <a class="nav-link" href="shops.php">Shops</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="cart.php">Cart</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active" href="useracc.php">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="myorders.php">Orders</a>
  </li>
</ul>
  </nav>

  <div style="margin:auto; margin-top:3%; padding:5% 7%; width: 60%; background-color:grey; border-radius:50px;">
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" style="color: black;box-sizing: border-box;">
  <h2 style=" font-size:50px; color:#000; text-align:center">My Account</h2>
  <div class="form-group">
      <span id="hide" style="color: red;"></span>
   </div>
  <div class="form-group">
      <label for="firstname">Name</label>
      <input type="text" class="form-control" name="fname"  value="<?php echo $data['uname']; ?>"  >
  </div>  
    <div class="form-group ">
      <label for="phone">Phone Number</label>
      <input type="text" class="form-control"  name="phno" value="<?php echo $data['phno']; ?>">
    </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="address"><?php echo $data['addr']; ?></textarea>
  </div>    
  <button type="submit" value="submit" name="submit" class="btn btn-success ">Save</button>
  <div class="float-right">
  <button type="submit" value="passwd" name="passwd" class="btn btn-primary">Change Password</button>
  </div>
 </form>
 </div>

<footer>
<p class="text-center">Cake Studio &copy;2023</p>
</footer>  
   
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="bootstrap.js" ></script>
</body>
</html>