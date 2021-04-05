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
	<?php include "./header.php" ?>
</header>

<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		
			<div class="d-flex flex-wrap">
				

				<?php 
	          if(isset($_GET["id"])) {
	          	echo "<a href='seller.php?id=".$_GET['id']."&seller' role='button' class='btn btn-dark pt-3 fs-4 border-start border-end border-1 text-center'>Home</a>";
	            echo "<a href='sellerAddItem.php?id=".$_GET['id']."&seller' role='button' class='btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center'>Add an item</a>";
	            echo "<a href='sellerDeleteItem.php?id=".$_GET['id']."&seller' role='button' class='btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center'>Delete an item</a>";
	          }

	        ?>
			
			</div>
		</div>

		<?php
				include "config.php";

				$sql="SELECT * FROM `sellinglicense` WHERE fk_account_email ='$_GET[id]'";
				$result1=$mysqli->query($sql);
				while ($row1= $result1->fetch_assoc()) {
				
				$adress=$row1['adress'];
				$firstName=$row1['firstName'];
				$lastName=$row1['lastName'];	
				$dateofbirth=$row1['dateofbirth'];
				$phoneNumber=$row1['phoneNumber'];		
				$photo=$row1['photo'];		
				$background=$row1['background'];	
				$email=$row1['fk_account_email'];	
				}
		?>


		<div class="d-flex col-10  mx-auto my-3 ">
			<?php
					
						echo "<div class='card image justify-content-center align-self-center overflow-hidden pt-3 ' style='width:1800px;height:215px;'><img alt='star' src=data:image/jpeg;charset=utf8;base64," .base64_encode($background) ."></div>";
						
					 ?>
		</div>

		<div class="d-flex col-10  mx-auto my-3 ">
			
	
		<div class="d-flex col-7  mx-auto my-3" style="margin-top: 7%">
			<div class="col-10 mx-auto text-center mt-5">


				<?php 
					echo ("<h1>Welcome ".$_GET['id']. "!!!</h1>");
					echo "<br><h3> Here You can manage offers with differents possibilities.</h3>";
					echo "<br><h2> Your account's information:.</h2><br>";
					echo "<br><div><h5>First Name: &emsp;".$firstName."</h5></div>";
					echo "<br><div><h5>Last Name: &emsp;".$lastName."</h5></div>";
					echo "<br><div><h5>Email: &emsp;".$email."</h5></div>";
					echo "<br><div><h5>Birthdate: &emsp;".$dateofbirth."</h5></div>";
					echo "<br><div><h5>Phone Number: &emsp;".$phoneNumber."</h5></div>";
					echo "<br><div><h5>Adress: &emsp;".$adress."</h5></div>";

				 ?>
				
				
			</div>

			<div class="col-2 mx-auto justify-content-between mt-1">

				<?php
				
					echo "<div class='card image justify-content-center align-self-center overflow-hidden pt-3 border border-1' style='width:215px;height:215px;'><img src=data:image/jpeg;charset=utf8;base64," .base64_encode($photo) ."></div>";
					
				 ?>
				
			</div>
		</div>
		
			
		
			
		</div>

		

		

		


</body>
</html>