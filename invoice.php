<?php
require("config/invoiceconfig.php");
if(!isset($_COOKIE['user'])){
	header('location:login.php');
  }
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
		body {		
			font-family: Verdana;
		}
		
		div.invoice {
		border:1px solid #ccc;
		padding:10px;
		height:740pt;
		width:570pt;
		}

		div.company-address {
			
			float:left;
			width:250pt;
		}
		
		div.invoice-details {
			border:1px solid #ccc;
			float:right;
			width:250pt;
		}
		
		div.customer-address {
			border:1px solid #ccc;
			float:left;
			margin-bottom:50px;
			margin-top:100px;
			width:250pt;
		}
		
		div.clear-fix {
			clear:both;
			float:none;
		}
		
		table {
			width:100%;
		}
		
		th {
			text-align: left;
		}
		
		td {
		}
		
		.text-left {
			text-align:left;
		}
		
		.text-center {
			text-align:center;
		}
		
		.text-right {
			text-align:right;
		}
		
		</style>
	</head>
	<body>
  <div class="container float-right">
	<div class="invoice">
		<div class="company-address">
			<h1> Cake Studio </h1>
		</div>
	
		<div class="invoice-details">
			<?php echo $shopdet['sname']; ?>
			<br />
			<?php echo $shopdet['email']; ?>
			<br />
      <?php echo $shopdet['addrs']; ?>
		</div>
		
		<div class="customer-address">
			To:
			<br />
			<?php echo $userdet['uname']; ?>
			<br />
			<?php echo $userdet['email']; ?>
			<br />
			<?php echo $userdet['addr']; ?>
			<br />
      <?php echo $userdet['phno']; ?>
      <br />
		</div>
		
		<div class="clear-fix"></div>
			<table border='1' cellspacing='0'>
				<tr>
					<th width=250>Item Name</th>
					<th width=80>Quantity<small>(in KG)</small></th>
					<th width=100>Unit price</th>
					<th width=100>Total price</th>
				</tr>

			<?php
			
					echo("<tr>");
					echo("<td>{$itemdet['name']}</td>");
					echo("<td class='text-center'>{$orderdet['quantity']}</td>");
					echo("<td class='text-right'>Rs.{$itemdet['price']}</td>");
					echo("<td class='text-right'>Rs.{$billdet['totalprice']}</td>");
					echo("</tr>");
			
			
			echo("<tr>");
			echo("<td colspan='3' class='text-right'>Sub total</td>");
			echo("<td class='text-right'>Rs." . number_format($billdet['totalprice'],2) . "</td>");
			echo("</tr>");
			echo("<tr>");
			echo("<td colspan='3' class='text-right'>Delivery Charge</td>");
			echo("<td class='text-right'>Rs.25</td>");
			echo("</tr>");
			echo("<tr>");
			echo("<td colspan='3' class='text-right'><b>TOTAL</b></td>");
			echo("<td class='text-right'><b>Rs." . number_format(($billdet['totalprice']+25),2) . "</b></td>");
      echo("</tr>"); 
      
			?>
			</table>
      <br>
      <a class="btn btn-outline-primary" href="javascript:window.print()">Print</a>
		</div>
    </div>
	</body>

</html>