<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">   
	<meta name="viewport" content="width =device-width , initial-scale = 1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="index.css" type="text/css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  

</head>
<body style="padding:0;margin:0;">
<header>
	<div class="container-fluid bg-light align-items-center py-2 ">
		<div class="d-flex col-10 mx-auto align-items-center justify-content-between">
			<a class="navbar-brand align-self-center" style="height: 30px;" href="index.html">Yourmarket</a>
		</div>
	</div>
</header>

<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		
			<div class="d-flex flex-wrap">
				<a href="admin.php"role="button" class="btn btn-dark rounded-0 pt-3 fs-4 border-start border-end border-1 text-center">Home</a>
				<a href="adminGetSeller.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Seller's Info</a>
				<a href="adminAddSeller.html."role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Add a seller</a>
				<a href="adminDeleteSeller.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Delete a seller</a>
				<a href="adminAddItem.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Add an item</a>
				<a href="adminDeleteItem.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Delete an item</a>
				

			</div>
		</div>

		<div class="col-2 mx-auto justify-content-between mt-5">
			<h1>Welcome Admin !!!</h1>
		</div>
		<div class="col-4 mx-auto justify-content-between mt-5">
			<h3>Here You can manage the website with differents possibilities.</h3>
		</div>

		<div class="col-2 mx-auto justify-content-between mt-5">
			<h2>Here Some info of the site on live:</h2>
		</div>

		

		<?php

			$user = 'root';
			$password = ''; //To be completed if you have set a password to root
			$database = 'yourmarket'; //To be completed to connect to a database. The database must exist.
			$port = NULL; //Default must be NULL to use default port
			$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

			if ($mysqli->connect_error) {
			    die('Connect Error (' . $mysqli->connect_errno . ') '
			            . $mysqli->connect_error);
			}
			
		
			$sql = "SELECT `email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense` FROM `account` ";

			$result= $mysqli->query($sql);	
			$buffer=0;
			 while ($row= $result->fetch_assoc()) {
								$buffer=$buffer+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -There are ".$buffer." account(s) in Yourmarket.</h4></div>";


			$sql1 = "SELECT `idbasket`, `fk_email` FROM `basket`";

			$result1= $mysqli->query($sql1);	
			$buffer1=0;
			 while ($row1= $result1->fetch_assoc()) {
								$buffer1=$buffer1+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -In total, There are ".$buffer1." item(s) in all baskets of Yourmarket.</h4></div>";

			$sql2 = "SELECT `iditem`, `name`, `purchaseCategory`, `category`, `subcategory`, `price`, `description`, `publicationDateTime`, `availability`, `photo`, `account_email` FROM `item`";

			$result2= $mysqli->query($sql2);	
			$buffer2=0;
			 while ($row2= $result2->fetch_assoc()) {
								$buffer2=$buffer2+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -There are ".$buffer2." item(s) in Yourmarket.</h4></div>";


			$sql3 = "SELECT `fk_buyer_email`, `item_iditem`, `fk_seller_email`, `price`, `state` FROM `offer` ";

			$result3= $mysqli->query($sql3);	
			$buffer3=0;
			 while ($row3= $result3->fetch_assoc()) {
								$buffer3=$buffer3+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -There are ".$buffer3." offer(s) in Yourmarket.</h4></div>";


			$sql4 = "SELECT `offer_account_email`, `offer_item_idoffer`, `offer_item_offer_account_email`, `cardNumber`, `expiryDate`, `securityCode`, `cardType` FROM `payment`";

			$result4= $mysqli->query($sql4);	
			$buffer4=0;
			 while ($row4= $result4->fetch_assoc()) {
								$buffer4=$buffer4+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -There are ".$buffer4." payment(s) in Yourmarket.</h4></div>";


			
			$sql5 = "SELECT `idsellingLicense`, `adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`, `fk_account_email` FROM `sellinglicense`";

			$result5= $mysqli->query($sql5);	
			$buffer5=0;
			 while ($row5= $result5->fetch_assoc()) {
								$buffer5=$buffer5+1;
			}
			echo "<div class='col-4 mx-auto justify-content-between mt-5'><h4> -There are ".$buffer5." seller(s) account in Yourmarket.</h4></div>";
			?>


</body>
</html>