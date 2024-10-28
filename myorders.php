<?php 
session_start();
if(!isset($_COOKIE['user'])){
  header('location:login.php');
}
require('config/orderconfig.php');
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
    <a class="nav-link" href="useracc.php">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active" href="myorders.php">Orders</a>
  </li>
</ul>
  </nav>
  <div class="w3-container"  style="margin:0.5em;" >
    <div style="text-align:center;">
    <h1>My Orders</h1>
    </div>
    <?php foreach($list as $item): ?>
       <div id="items" style="float:left;margin-left:4.7em;min-width:40%;border:solid 2px ;border-radius:10px;padding:1.5em;min-height:20em;">
            <div class="float-right">
              <?php echo "<img src='uploads/". $item['item_img']." ' style='display: block;max-width:240px;max-height:240px;width: auto;height: auto;'>"; ?>
              <br>
              <?php if($item['status']=="Order Ready"){?>
                <form method="POST">
                  <small>Click below if order is delivered</small><br>
                  <button class="btn btn-primary " name="recv" value="recv" >Order Delivered</button>
                  <input type="hidden" name="itemid" value="<?php echo $item['id']; ?>">
                </form>
              <?php } ?>
              </div>
            <div class="float-left">
                  <h2><?php echo $item['name']; ?></h2>
                  <small><?php echo $item['sname']; ?></small>
                  <h5>Quantity</h5>
                  <small><?php echo $item['quantity']; ?></small>
                  <h5>Total Price</h5>
                  <small><?php echo $item['price']; ?></small>
                  <h5>Status</h5>
                  <small class="bg-success"><?php echo "Order ".$item['status']; ?></small>
                  <br>
                  <?php if($item['status']=="Recieved"){?>
                     <a class="btn btn-primary" href="invoice.php?iid=<?php echo $item['id']; ?>">View Invoice</a>
                  <?php } ?>
                </div>
       </div>
    <?php endforeach; ?>
  </div>

 
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="bootstrap.js" ></script>
</body>
</html>