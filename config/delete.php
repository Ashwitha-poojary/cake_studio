<?php
 require('connect.php');
if(isset($_POST['delete'])){
     $delete_id=mysqli_real_escape_string($conn,$_POST['delete_id']);
    $query="DELETE from items where id={$delete_id}";
    if(mysqli_query($conn,$query)){
         header('location:../shop/s2.php');
    }else{
        echo 'ERROR'. mysqli_error($conn);
    }
 }
 ?>