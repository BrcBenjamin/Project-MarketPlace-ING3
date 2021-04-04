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
			
			

			$sql1="INSERT INTO `sellinglicense`(`adress`, `firstName`, `lastName`, `dateofbirth`, `phoneNumber`) 
			VALUES
			 ('$_POST[adress]','$_POST[firstName]','$_POST[lastName]','$_POST[dateofbirth]','$_POST[phoneNumber]') ";
			$mysqli->query($sql1);	
			



			$sql2 = " INSERT INTO `account`(`email`, `username`, `password`, `firstName`, `lastName`, `adress`) VALUES ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[firstName]','$_POST[lastName]','$_POST[adress]')";

			 $mysqli->query($sql2);	
			 echo "Welcome $_POST[firstName] $_POST[lastName]. Enjoy our website";
			?>

</body>
</html>