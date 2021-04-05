<?php include "config.php"; ?>


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

    

</head>

<body style="padding:0;margin:0;">
	
<header>
  <?php include "./header.php" ?>
</header>

<?php 
  if(isset($_GET['id'])) { 
    $email = $_GET['id']; 
  }
?>
		
		<?php include "./navbar.php" ?>

	<div class="col-10 mx-auto px-0 m-0 pt-5 border-start border-end border-bottom border-1">

<?php
    $itemid= $_GET['iditem'];
    $sql = "SELECT * FROM item WHERE iditem=".$itemid;
    $result = mysqli_query($mysqli,$sql);
    //echo "number of row".$result->num_rows;
	$sql1="SELECT offer.*, MAX(price) FROM offer WHERE item_iditem =$itemid";
    $result1=$mysqli->query($sql1);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        	if ($result1->num_rows ==0) {
        		echo("There is no bid for this item");
        	}else{
        		while($row1 = $result1->fetch_assoc())
        		{

        echo"<div class='card image justify-content-center align-self-center overflow-hidden border border-1' style='width:400px;height:400px;position:relative;left:50px;'>
                <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) .">
            </div>
            <div class='col-7' style='position:relative;left:500px;top:-300px;'>
					<div class='product-title' style='font-weight:1000;font-size:xx-large;'>".$row['name']."</div>
					<div class='product-desc'style='font-weight:400;font-size:large;'>".$row['description']."</div>
					<div class='product-price'style='font-weight:1000;font-size:xx-large;color:green;'>".number_format($row['price']) ."$</div>
					<div class='product-price-bid'style='font-weight:500;font-size:large;color:red;'> Actual bid: ".number_format($row1['MAX(price)']) ."$</div>
					<div class='product-stock'>Number in stock: ".$row['availability']."</div>
					<hr>";
					///IF AUCTIONS
					if($row['purchaseCategory']==1){
					echo "<form action='bid.php?id=".$email ."&iditems[]=" .$itemid ."' method='post'>
					Enter the amount of your Bid:&emsp;<input type='text' name='bid'>&emsp;&emsp;
					<input type='checkbox' name='verify' onclick='Verify()'>&emsp;Automatic Bid<br>
					Enter the max of your bid:&emsp; <input type='text' name='maxbid' id='maxbid' disabled ='disabled'>
					<div class='btn-group cart'>
					&emsp;&emsp;<input class='btn btn-success' type='submit' name='submit' value='Bid'> 
					</div>
				</form>
				<script type='text/javascript'>
					function Verify(){
						if (!document.getElementsByName('verify').checked) {
							document.getElementById('maxbid').disabled=false;
						}else{
							document.getElementById('maxbid').disabled=true;
						}
					}
				</script>";
					}
					///IF Buy It Now
					else if($row['purchaseCategory']==2){
						echo"<div class='btn-group cart'>
							<button type='button' class='btn btn-success'>
								AddToCart
							</button>
						</div>";
					}
					///IF Best Offer
					else if($row['purchaseCategory']==3){
						echo"<div class='btn-group cart'>
							<button type='button' class='btn btn-success'>
								MakeAnOffer 
							</button>
						</div>";
					}
					echo"<div class='btn-group wishlist'>
						<button type='button' class='btn btn-danger'>
							Add to wishlist 
						</button>
					</div>
				</div>
            </div>
            ";
				}
			}
        }
    }
    else {
        echo "0 results";
    }
    $mysqli->close();
?>

<footer class="container-fluid pt-3 bg-dark text-white" style="position:absolute; bottom:0;">
    <div class="container">
      <p class="float-end"><a class="text-white" href="#">Back to top</a></p>
      <p>© 2017–2021 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </div>
    
  </footer>
</body>
</html>