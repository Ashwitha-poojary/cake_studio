<?php
require('connect.php');
$user_id=$_COOKIE['user'];
$cartlist="SELECT c.*,s.sname,i.name,i.item_img,i.price FROM cart as c,shop as s,items as i WHERE c.user_id={$user_id} AND s.id=c.shop_id AND i.id=c.item_id";
if($result=mysqli_query($conn,$cartlist)){
    $list=mysqli_fetch_all($result,MYSQLI_ASSOC);
    $no=mysqli_num_rows($result);
    mysqli_free_result($result);
}

if(isset($_POST['delete'])){
    $delete_id=$_POST['cartid'];
    $query="DELETE from cart where id={$delete_id}";
    if(mysqli_query($conn,$query)){
        header('location:/cake_studio/cart.php');
    }    
}

if(isset($_POST['submit'])){
    foreach($list as $item):
        $uid=$item['user_id'];
        $get="SELECT * FROM users where id=".$uid; 
        if($result1=mysqli_query($conn,$get)){
            $data=mysqli_fetch_assoc($result1);
            mysqli_free_result($result1);
            $iname=$item['name'];
            $iid=$item['item_id'];
            $sid=$item['shop_id'];
            $pno=$data['phno'];
            $addr=$data['addr'];
            $tprice=2 * $item['quantity'] * $item['price'];
            $req=$item['srequest'];
            $img=$item['cust_img'];
            $qnyt=$item['quantity'];
            
            $toadd="INSERT INTO bills(name,userid,itemid,shopid,number,addr,totalprice) values ('$iname','$uid','$iid','$sid','$pno','$addr','$tprice')";
            mysqli_query($conn,$toadd) or die("conection failed".mysqli_error($conn));
            
            $order="SELECT * FROM bills where userid={$uid}";
            if($result2=mysqli_query($conn,$order)){
                $info=mysqli_fetch_all($result2,MYSQLI_ASSOC);
                mysqli_free_result($result2);
                foreach($info as $inf):
                    $bid=$inf['id'];
                    $qnty=$item['quantity'];
                    $vldt="SELECT * FROM orders WHERE bill_id={$bid}";
                    $num=mysqli_query($conn,$vldt);
                    if(mysqli_num_rows($num)!=1){
                        $addbid="INSERT INTO orders(user_id,shop_id,item_id,bill_id,quantity,srequest,cust_img,price) VALUES ('$uid','$sid','$iid','$bid','$qnyt','$req','$img','$tprice')";
                        mysqli_query($conn,$addbid);
                    }
                 endforeach;    
            }
            
            $cid=$item['id'];
            $del="DELETE from cart where id={$cid}";
            if(mysqli_query($conn,$del)){
                header('location:/cake_studio/cart.php');  
            }
        }       
    endforeach;    


}



?>