<?php
    require("connect.php");
    $shop_id=$_COOKIE['shop'];
    $del="SELECT i.item_img,i.name,u.*,o.* FROM users as u,items as i,orders as o WHERE o.shop_id={$shop_id} AND o.status='Ready' AND u.id=o.user_id AND i.id=o.item_id ORDER BY o.ordered_on DESC";
    $det=mysqli_query($conn,$del);
    $show=mysqli_fetch_all($det,MYSQLI_ASSOC);

    if(isset($_POST['order'])){
        $id=$_POST['id'];
        $ut="UPDATE orders SET status='Delivered' WHERE id='$id'";
        mysqli_query($conn,$ut);
    }

//delivered items


    $quer="SELECT i.item_img,i.name,u.*,o.* FROM users as u,items as i,orders as o WHERE o.shop_id={$shop_id} AND o.status='Delivered' AND u.id=o.user_id AND i.id=o.item_id ORDER BY o.ordered_on DESC";
    $de=mysqli_query($conn,$quer);
    $final=mysqli_fetch_all($de,MYSQLI_ASSOC);

?>