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
			
		
			$sql = " INSERT INTO `account`(`email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense`) VALUES ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[firstName]','$_POST[lastName]','$_POST[adress]',null)";

			 $mysqli->query($sql);	
			 echo "Welcome $_POST[firstName] $_POST[lastName], You are a new buyer. Enjoy our website";
			?>

</body>
</html>