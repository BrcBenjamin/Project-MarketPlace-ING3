<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
</head>
<body>
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

			
			$sql1="SELECT `email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense` FROM `account` WHERE email='$_POST[email]'";
			$mysqli->query($sql1);


			$sql="INSERT INTO `sellinglicense`(`adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`, `fk_account_email`) VALUES ('adress','firstName','lastName','$_POST[dateofbirth]','$_POST[phoneNumber]','$_POST[email]')";
			$mysqli->query($sql);	


			$sql2="SELECT `idsellingLicense` FROM `sellinglicense` WHERE fk_account_email='$_POST[email]'";
			$result=$mysqli->query($sql2);

			$rep;
			while ($row= $result->fetch_assoc()) {
				
				$rep=$row['idsellingLicense'];	
			}
	
			$sql3="UPDATE `account` SET `fk_idsellingLicense`=$rep WHERE email='$_POST[email]' ";	
			$mysqli->query($sql3);

			 ?>
		

</body>
</html>