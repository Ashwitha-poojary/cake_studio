

<?php
$servername="localhost";
$username="root1";
$password="123456";
$dbname="cstudio";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
  die("Connection failed".mysqli_connect_error());
}
?>