
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
</head>
<body>
	<?php
	include "config.php";


			$sql = " INSERT INTO `account`(`email`, `username`, `password`, `firstName`, `lastName`, `adress`, `fk_idsellingLicense`) VALUES ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[firstName]','$_POST[lastName]','$_POST[adress]',null)";

			 $mysqli->query($sql);	
			 echo "Welcome $_POST[firstName] $_POST[lastName], You are a new buyer. Enjoy our website";

			 header('Location: index.php');
			?>

</body>
</html>