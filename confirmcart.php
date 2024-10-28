<?php 
session_start();
if(!isset($_COOKIE['user'])){
  header('location:login.php');
}
require('config/confirmcartconfig.php');
require("config/notifyconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cake Shop | Ultimate Cake Destination</title>
    <link rel="icon" href="icon/icons.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" >
    
 </head>
<body style="background-color:lightgray">
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
    <a class="nav-link  active" href="cart">Cart</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="useracc.php">My Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="myorders.php">Orders</a>
  </li>
</ul>
  </nav>
  <div class="w3-container"  style="margin:auto; " >
  <div id="items" style="margin:3%;min-width:70%;border:solid 2px ;border-radius:10px;padding:20px; ">
        <h1><?php echo $details['name'] ; ?></h1>
        <h2></h2>
        <div>
        <?php echo "<img src='uploads/". $details['item_img']." ' style='display: block;max-width:240px;max-height:240px;width: auto;height: auto;'>"; ?>
        </div>
        
        <h3>Details</h3>
        <small><?php echo $details['descp']; ?></small>
        <h3>Price</h3>
        <small><?php echo $details['price']; ?></small>

        <!-- error -->
        <div class="container-fluid <?php echo $bg ; ?>">
          <label class="text-white"><?php echo $msgdisp ; ?></label>
          <label class="text-white"><?php echo $errordisp ; ?></label>
        </div>

      <!-- form submission -->
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group" style="width:10%;">
        <h3>Quantity</h3><small>(in kg)<sup>*</sup></small>
        <select class="form-control" id="quantityFormControlSelect1" name="quantity">
        <option value="0.5">0.5</option>
        <option value="1">1</option>
        <option value="1.5">1.5</option>
        <option value="2">2</option>
        <option value="2.5">2.5</option>
        </select>
        </div>
        <div class="form-group">
        <h3>Special Requests</h3>
        <textarea class="form-control col-8" name="srequest" rows="3"></textarea>
        </div>
        <h3>Image to be printed</h3><small>(only to be uploaded in case of a photo cake)<sup>*</sup></small>
        <div class="form-group col-md-2" style="background-color:white;padding:0%;">      
        <input type="file" id="image" name="img" >   
        </div>  
        <input type="hidden" name="itemid" value="<?php echo $details['id']; ?>">
        <input type="hidden" name="shopid" value="<?php echo $details['shop_id']; ?>">
        <br>
        <button class="btn btn-primary" type="submit" value="submit" name="submit" >Add</button>
        </form>
       
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