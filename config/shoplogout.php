<?php
session_start();
session_destroy();
setcookie('shop','shop',time()-36000,"/");
header('location:../shop/shoplogin.php');
?>