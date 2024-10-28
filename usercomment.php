<?php 
session_start();
if(!isset($_COOKIE['user'])){
  header('location:login.php');
}
require("config/indivproductconfig.php");
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
    <style type="text/css">
      .user{
        font-weight:bold;
        color:black;
      }
      .time{
        color:gray;
      }
      .usercomments{
        color:black;
      }
    </style>
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
    <a class="nav-link active" href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a>
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
    <a class="nav-link" href="useracc.php?">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="myorders.php">Orders</a>
  </li>
</ul>
  </nav>
<div class="container-md">
      <h2 style="text-align:left;"><?php echo $list['name'] ;?></h2>
      <div>
        <?php echo "<img src='uploads/". $list['item_img']." ' style='display: block;max-width:480px;max-height:480px;width: auto;height: auto;'>"; ?>
      </div><br>
      <h3>Price</h3>
      <h5><?php echo $list['price'];?></h5>
      <br>
      <h3>About</h3>
      <h5><?php echo $list['descp'];?></h5><br><br>
      <br><br>

      <h3>Comments</h3>
      <div style="border:solid black 1px;padding:1em;">
      <form class="form-group" method="POST">
      <div class="row">
        <div class="col-md-12">
          <textarea name="usercomment" placeholder="Add Your Comment" class="form-control" cols="30" rows="2"></textarea><br>
          <button type="submit" name="comment" style="float:right" class="btn btn-primary">Add Comment</button>
        </div>
      </div>
      </form>
      <div class="row " style="overflow:scroll;max-height:15em;">
        <div class="col-md-12">
          <div class="usercomments">
      <?php foreach($comshow as $com){ ?>
            <div class="comment">
              <div class="user"><?php echo $com['uname'];?> <span class="time"><?php echo $com['date'];?></span></div>
              <div class="usercomment"><?php echo $com['msg'];?></div>
              <?php if($com['user_id']==$userid){ ?>
              <form method="POST">
              <input type="hidden" name="comid" value="<?php echo $com['id'];?>">
              <button name="comdel" class="btn btn-danger">Delete</button>
              </form>
              <?php } ?>
            </div>
       
      <?php } ?>
      </div>
      </div>
    </div>
      <br>
      <br>
      <div></div>
</div>   
</div>

<footer>
<p class="text-center">Cake Studio &copy;2023</p>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="bootstrap.js" ></script>
</body>
</html>