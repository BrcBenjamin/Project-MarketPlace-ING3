<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$pass=$_POST["password"];
	$email=$_POST["email"];
  $usern=$_POST["username"];

	include "config.php";

    if (($email== "admin@admin.com")&&($pass== "abbasleboss")) {
       
       header('Location: admin.php');
       
    }

    $sql="SELECT * FROM `account` WHERE email='$_POST[email]' AND  password='$_POST[password]'";
    $result=$mysqli->query($sql);

     $emailAccount="";
     $passwordAccount="";

    while ($row= $result->fetch_assoc()) {
                
                $emailAccount=$row['email'];
                $passwordAccount=$row['password'];
                $idselling=$row["fk_idsellingLicense"];
                $username=$row["username"];
            }

    if (($emailAccount== $_POST['email'])&&($passwordAccount== $_POST['password'])&&($username==$_POST['username'])&&(is_null($idselling)) ) {
        
       header('Location: index.php?email='.$email );
       echo '<script language="Javascript">    alert ("Connexion Success." )      </script>';
    }


    if (($emailAccount== $_POST['email'])&&($passwordAccount== $_POST['password'])&&($username==$_POST['username'])&&(!is_null($idselling)) ) {
        
      header('Location: index.php?email='.$email.'&seller=1');
    }


    if ((($emailAccount!= $_POST['email'])&&($passwordAccount!= $_POST['password'])&&($username!=$_POST['username'])&&(is_null($idselling)))&&(($email!= "admin@admin.com")&&($pass!= "a"))&&!(($emailAccount== $_POST['email'])&&($passwordAccount== $_POST['password'])&&(!is_null($idselling)) ) ){
        echo '<script language="Javascript">    alert ("Email or password wrong, please try again." )      </script>';
       header('Location: login.html');
    }
	
	?>
</body>
</html>