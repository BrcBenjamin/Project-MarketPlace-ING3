
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">  
</head>
<body>
	<?php

			include "config.php";
			
		
			$sql = " DELETE FROM `sellinglicense` WHERE idsellingLicense='$_POST[id]'";

			 $mysqli->query($sql);	
			 
			 header('Location: admin.php');
			?>

</body>
</html>