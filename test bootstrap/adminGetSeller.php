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
				<a href="admin.php"role="button" class="btn btn-secondary rounded-0 pt-3 fs-4 border-start border-end border-1 text-center">Home</a>
				<a href="adminGetSeller.html"role="button" class="btn btn-dark pt-3 fs-4 border-start border-end border-1 text-center">Seller's Info</a>
				<a href="adminAddSeller.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Add a seller</a>
				<a href="adminDeleteSeller.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Delete a seller</a>
				<a href="adminAddItem.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Add an item</a>
				<a href="adminDeleteItem.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Delete an item</a>
				

			</div>

			
		</div>


<h1 class="d-flex col-3  mx-auto text-center" style="margin-top: 7%">&emsp;&emsp;&emsp;Get a seller account with the id:</h1><br>


<div class="d-flex col-3  mx-auto my-3 justify-content-center border-start border-end border-2"  >

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
			
		
			$sql = "SELECT `idsellingLicense`, `adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`, `fk_account_email` FROM `sellinglicense` WHERE idsellingLicense='$_POST[id]'";
			 $result=$mysqli->query($sql);	
			 while ($row= $result->fetch_assoc()) {
				
				$id=$row['idsellingLicense'];	$adress=$row['adress'];		$firstName=$row['firstName'];	$lastName=$row['lastName'];	$dateofbirth=$row['dateofbirth'];
				$phoneNumber=$row['phoneNumber'];	$fk_account_email=$row['fk_account_email'];					
			}

			$sql1="SELECT `email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense` FROM `account` WHERE fk_idsellingLicense='$_POST[id]'";
			 $result1=$mysqli->query($sql1);
			 while ($row1= $result1->fetch_assoc()) {
				
				$pass=$row1['password'];
				$username=$row1['username'];					
			}

			echo "<h5>Id: &emsp;".$id.
			"<br><br>Email:&emsp; ".$fk_account_email.
			"<br><br>FirstName:&emsp; ".$firstName.
			"<br><br>LastName:&emsp; ".$lastName.
			"<br><br>Username:&emsp; ".$username.
			"<br><br> Password:&emsp; ".$pass.
			"<br><br>Date of birth: &emsp;".$dateofbirth.
			"<br><br>Phone Number: &emsp;".$phoneNumber.
			"<br><br> Adress: &emsp;".$adress."</h5>";
			?>
</div>
</body>
</html>