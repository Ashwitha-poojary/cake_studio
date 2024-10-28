<?php
session_start();
session_destroy();
setcookie('admin','admin',time()-36000,"/");
header('location:../admin/adminlogin.php');
?>