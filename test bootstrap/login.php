<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$pass=$_POST["password"];
	$email=$_POST["email"];

	$user = 'root';
	$password = ''; //To be completed if you have set a password to root
	$database = 'yourmarket'; //To be completed to connect to a database. The database must exist.
	$port = NULL; //Default must be NULL to use default port
	$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

	if ($mysqli->connect_error) {
		   die('Connect Error (' . $mysqli->connect_errno . ') '
			            . $mysqli->connect_error);
	}

    if (($email== "admin@admin.com")&&($pass== "abbasleboss")) {
       
       header('Location: admin.php');
       
    }

    $sql="SELECT `email`, `password` FROM `account` WHERE email='$_POST[email]' AND  password='$_POST[password]'";
    $result=$mysqli->query($sql);

     $emailAccount="";
     $passwordAccount="";

    while ($row= $result->fetch_assoc()) {
                
                $emailAccount=$row['email'];
                $passwordAccount=$row['password'];
            }

    if (($emailAccount== $_POST['email'])&&($passwordAccount== $_POST['password'])) {
        
       header('Location: index.php?email='.$pass);
       echo '<script language="Javascript">    alert ("Connexion Success." )      </script>';
    }
    if ((($emailAccount!= $_POST['email'])&&($passwordAccount!= $_POST['password']))&&(($email!= "admin@admin.com")&&($pass!= "a")) ){
        echo '<script language="Javascript">    alert ("Email or password wrong, please try again." )      </script>';
       header('Location: login.html');
    }
	
	?>
</body>
</html>