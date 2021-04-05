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
		
	<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		<div class="d-flex flex-wrap">
			<a href="index.php<?php if(isset($_GET['id'])) { echo"?id=".$_GET['id']; } ?>"role="button" class="btn btn-secondary rounded-0 pt-3 fs-4 border-end border-1 text-center">Home</a>
			<a href="category1.php<?php if(isset($_GET['id'])) { echo"?id=".$_GET['id']; } ?>"role="button" class="btn btn-dark pt-3 fs-4 border-end border-1 text-center">Category 1</a>
			<a href="category2.php<?php if(isset($_GET['id'])) { echo"?id=".$_GET['id']; } ?>"role="button" class="btn btn-secondary pt-3 fs-4 border-end border-1 text-center">Category 2</a>
		</div>
		<form-inline class="d-flex gap-2 align-self-center pe-3">
			<input style="width:240px;height: 30px;" class="align-self-center" type="text" placeholder="Search" aria-label="Search">
			<button class="btn btn-dark align-self-center margin-left" type="submit">Search</button>
		</form>		
	</div>

<?php
    $itemid= $_GET['iditem'];
    $sql = "SELECT * FROM item WHERE iditem=".$itemid;
    $result = mysqli_query($mysqli,$sql);
    //echo "number of row".$result->num_rows;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo"<div class='card image justify-content-center align-self-center overflow-hidden pt-3 border border-1' style='width:400px;height:400px;position:relative;left:50px;'>
                <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) .">
            </div>
            <div class='col-md-7' style='position:relative;left:500px;top:-300px;'>
					<div class='product-title' style='font-weight:1000;font-size:xx-large;'>".$row['name']."</div>
					<div class='product-desc'style='font-weight:400;font-size:large;'>".$row['description']."</div>
					<div class='product-price'style='font-weight:1000;font-size:xx-large;color:green;'>".$row['price']."$</div>
					<div class='product-stock'>Number in stock: ".$row['availability']."</div>
					<hr>";
					///IF AUCTIONS
					if($row['purchaseCategory']==1){
					echo"<div class='btn-group cart'>
                        <button type='button' class='btn btn-success'>
                            Bid 
                        </button>
					</div>";
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
    else {
        echo "0 results";
    }
    $mysqli->close();
?>

<?php include "./footer.php" ?>
</body>
</html>