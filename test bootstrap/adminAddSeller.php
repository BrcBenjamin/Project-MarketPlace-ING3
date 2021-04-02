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
			
			
			$sql2 = " INSERT INTO `account`(`email`, `username`, `password`, `firstName`, `lastName`, `adress`) VALUES ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[firstName]','$_POST[lastName]','$_POST[adress]')";
			$mysqli->query($sql2);	

			$sql="INSERT INTO `sellinglicense`( `adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`, `fk_account_email`) VALUES ('$_POST[adress]','$_POST[firstName]','$_POST[lastName]','$_POST[dateofbirth]','$_POST[phoneNumber]','$_POST[email]')";
			$mysqli->query($sql);	

			 $sql3="SELECT `idsellingLicense` FROM `sellinglicense` WHERE fk_account_email='$_POST[email]'";
			$result=$mysqli->query($sql3);

			while ($row= $result->fetch_assoc()) {
				
				$rep=$row['idsellingLicense'];	
			}
			echo "".$rep."";
	
			$sql4="UPDATE `account` SET `fk_idsellingLicense`=$rep WHERE email='$_POST[email]' ";	
			$mysqli->query($sql4);

			header('Location: admin.php');
			 
			?>

</body>
</html>