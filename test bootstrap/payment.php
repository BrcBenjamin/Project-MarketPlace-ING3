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
	<div class="container-fluid bg-light align-items-center py-2 border-bottom border-1">
		<div class="d-flex col-10 mx-auto align-items-center justify-content-between">
			<a class="navbar-brand align-self-center" style="height: 30px;" href="index.html">Yourmarket</a>

			<div class="buttons align-self-center">
				<button type="button" class="btn btn-primary"  >Login</button>
				<button type="button" class="btn btn-primary" onclick="window.location.href = 'sign-inCustomer.html';">Sign In</button>
                <a href="basket.php?id=2" type="button" class="btn btn-dark">Basket</a>
			</div>
		</div>
	 </div>
</header>

		
		<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		
			<div class="d-flex flex-wrap">
				<a href="index.html"role="button" class="btn btn-dark rounded-0 pt-3 fs-4 border-start border-end border-1 text-center">Home</a>
				<a href="category1.php"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Category 1</a>
				<a href="category2.html"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Category 2</a>
			</div>


			<form-inline class="d-flex gap-2 align-self-center pe-3">
				<input style="width:240px;height: 30px;" class="align-self-center" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-dark align-self-center margin-left" type="submit">Search</button>
			</form>
			
			
		</div>
        
	
<div class='container col-10 mx-auto pt-3 px-0'>

    <div class='panel panel-default panel-shadow'>
            <div class='panel-body pb-0 mb-0 mx-0'> 
                <div class='row text-600 text-white bg-primary py-3 fs-3 rounded rounded-3'>
                    <div class='col-9 col-sm-5'>Checkout recap</div>
                </div>

            <?php     
            $totalPrice=0;  
                $email = $_GET['id'];
                $iditems = $_GET['iditems'];
                $totalPrice=0;

                for($i=0 ; $i < count($iditems) ; ++$i) {

                    /*
                    * Change the value of $password if you have set a password on the root userid
                    * Change NULL to port number to use DBMS other than the default using port 3306
                    *
                    */
                    $email = $_GET['id'];
                    $user = 'root';
                    $password = ''; //To be completed if you have set a password to root
                    $database = 'yourmarket'; //To be completed to connect to a database. The database must exist.
                    $port = 3308; //Default must be NULL to use default port
                    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

                    if ($mysqli->connect_error) {
                        die('Connect Error adzDZADAZDAZ (' . $mysqli->connect_errno . ') '
                                . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM item WHERE iditem=" .$iditems[$i];
                    $result2 = $mysqli->query($sql);
                    if ($result2->num_rows > 0) {
                        // output data of each row
                        while($row = $result2->fetch_assoc()) {
                            $totalPrice += $row["price"];
                            $itemsNames[] = $row["name"];
                                echo "<div class='d-flex flex-column justify-content-between col-12 gap-3'>

                                <div class='d-flex my-2 col-12 justify-content-between border border-1'>
                                                <!--<div><input type='checkbox' name='buy'>Yes</div>-->
                                        <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                                            <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:150px;height:100px;'>
                                                <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) ." class='img-fluid'>
                                            </div>
                                                    
                                            <div class='col-6 align-self-center ms-5 mb-5'>
                                                <a href='category1.php' class='fs-4 text-reset' style='font-weight:500;'>" .$row["name"] ."</a>
                                                <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>
                                            </div>
                                        </div>
            
                                        <div class='d-flex flex-column pe-5 align-self-center justify-content-end'>
                                                
                                            <div class='pb-5 fs-3'>" .number_format($row["price"]) ."€</div>
            
                                        </div>
                                </div>
                            </div>
                        ";
                        }
                    }
                    $mysqli->close();
                }

                echo "  <div class='d-flex align-self-end me-4 mb-1 justify-content-end'>
                          
                        <div class='panel-body d-flex flex-column px-3 pt-3 align-items-center'>
                            <div class='fs-3 border-bottom border-1'>
                            <p><span class='fw-bold'>Total: </span>" .number_format($totalPrice) ." €</p>
                            </div>
                        </div>
                
                        </div>
                        ";
            ?>
            </div>


                <script>
                    function checkform() {

                        
                        $(document).on('hidden.bs.modal','#myModal2', function () {
                            window.location = $("#goToHome").attr("href");
                        });
                        
                        if( ($('#nameAddress').val().length == 0 || $('#address1').val().length == 0 || $('#city').val().length == 0 || $('#postalCode').val().length == 0 || 
                        $('#Country').val().length == 0 || $('#phone').val().length == 0 || $('#cardNumber').val().length == 0 || $('#name').val().length == 0 
                        || $('#expirationDate').val().length == 0 || $('#securityCode').val().length == 0 ) ) {
                            console.log("0000000000");
                            $("#myModal").modal("toggle"); 
                            console.log( $("#expirationDate").val() );
                            console.log("oeoeoeoeoeoe");
                            return false;
                        } else {
                            $("#myModal2").modal("toggle"); 
                            $.ajax({
                                url:'doPayment.php?id=<?php echo $email; ?><?php for($i=0;$i<count($iditems);++$i) {  echo '&iditems[]='.$iditems[$i];  } ?>',
                                type:'post',
                                data: $("#myForm").serialize(),
                                success: function(response){
                                    console.log("Ajax post purchase method success.");
                                },
                                error: function(response){
                                    //as far as i know, this function will only get triggered if there are some request errors (f.e: 404) or if the response is not in the expected format provided by the dataType parameter
                                    console.log("something went wrong");
                                }
                            });
                            return false;
                            console.log("PAS 0");
                        }
                    }
                </script>

<div class="modal" tabindex="-1" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Problem</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-3">
        <p>One or more fields are empty.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fs-4" data-bs-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Thank you for your purchase!</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fs-3">
        <p>The purchase of 
            <?php 
            for($i=0 ; $i<count($itemsNames) ; ++$i) { 
                echo $itemsNames[$i]; 
                if($i<count($itemsNames)-1) { 
                    echo " and "; 
                } 
            } 
        ?> is a success.</p>

      </div>
      <div class="modal-footer">
        <a href="index.php?id=<?php echo $email; ?>&seller" type="button" class="btn btn-success fs-4" data-bs-dismiss="modal" id="goToHome">Go back to Home</a>
      </div>
    </div>
  </div>
</div>


            
<form id="myForm" onsubmit="return checkform()">

    <div class="card bg-default my-3 mx-3">
        <div class="card-header thin-card-header">
            <div class="card-title mt-2 fs-2">
                <h4 style="font-family:Poppins, sans-serif"><i class="fa fa-map-marker"></i> Delivery address</h4>
            </div>
        </div>
        <div class="card-body mt-3">

                    <div class="d-flex flex-column col-7 mx-auto justify-content-center">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Name and Surname</label>
                            <input type="text" placeholder="Name and Surname" class="form-control" id="nameAddress">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Address Line 1</label>
                            <input type="text" placeholder="Address Line 1" class="form-control" id="address1">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Address Line 2</label>
                            <input type="text" placeholder="Address Line 2" class="form-control" id="address2">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">City</label>
                            <input type="text" placeholder="City" class="form-control" id="city">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Postal Code</label>
                            <input type="text" placeholder="Post Code" class="form-control" id="postalCode">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textinput">Country</label>
                            <input type="text" placeholder="Country" class="form-control" id="Country">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textinput">Telephone number</label>
                            <input type="text" placeholder="Telephone number" class="form-control" id="phone">
                        </div>
                    </div>
                    
        </div>

    </div>


    <div class="card bg-default my-3 mx-3">
        <div class="card-header thin-card-header">
            <div class="card-title mt-2">
                <h4 style="font-family:Poppins, sans-serif"><i class="fa fa-map-marker"></i> Payment information</h4>
            </div>
        </div>
        <div class="card-body mt-3">
                <div class='pb-5 fs-3'><span class='fw-bold'>Total Price: </span><?php echo number_format($totalPrice); ?> €</div>

                    <div class="d-flex flex-column gap-3 col-7 mb-5 mx-auto justify-content-center">                        
                        
                        <div class="form-check ps-0">
                            <label class="control-label" for="textinput">Card Type</label><br>

                            <input type="radio" class="btn-check" name="cardType" value="Visa" id="option1" autocomplete="off" checked>
                            <label class="btn btn-light" for="option1"><img src="Marketing-Strategy-of-Visa.jpg" style="height:35px;width:50px; btn:active{background:black;}"></label>
                            
                            <input type="radio" class="btn-check" name="cardType" value="MasterCard" id="option2" autocomplete="off" checked>
                            <label class="btn btn-light" for="option2"><img src="Mastercard-new-logo.jpg" style="height:35px;width:50px;"></label>

                            <input type="radio" class="btn-check" name="cardType" value="American Express" id="option3" autocomplete="off" checked >
                            <label class="btn btn-light" for="option3"><img src="facts-about-american-express.jpg" style="height:35px;width:50px; btn:active{background:black;}"></label>
                            
                            <input type="radio" class="btn-check" name="cardType" value="PayPal" id="option4" autocomplete="off" checked>
                            <label class="btn btn-light" for="option4"><img src="paypal-logo-e1492096727260.png" style="height:35px;width:50px;"></label>

                            <!--<input type="text" placeholder="Post Code" class="form-control">-->
                        </div>

                        <div class="">
                            <label class="control-label" for="textinput">Card Number</label>
                            <input type="text" placeholder="Card Number" class="form-control" name="cardNumber" id="cardNumber">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">Name</label>
                            <input type="text" placeholder="Fronçois Dupont" class="form-control" name="name" id="name">
                        </div>

                        <div class="d-flex gap-2">
                            <div class="">
                                <label class="control-label" for="textinput">Expiration Date</label>
                                <input type="month" class="form-control" class="form-control" name="expirationDate" id="expirationDate">
                            </div>
                            <div class="me-auto">
                                <label class="control-label" for="textinput">Security Code</label>
                                <input type="text" placeholder="CVV" class="form-control" name="securityCode" id="securityCode">
                            </div>
                            
                        </div>

                    </div>

        </div>

</form>

        <div class="card-footer">
            <div class="d-flex flex-column col-lg-12 my-3 mx-auto justify-content-end align-content-center">
            <input type="submit" class="btn btn-success align-self-end fs-3 text-center" value="Confirm Payment" name="submit">
            </div>
        </div>

    </div>


</div>

</div>
    
    



  <footer class="container-fluid pt-3 bg-dark text-white">
    <div class="container">
      <p class="float-end"><a class="text-white" href="#">Back to top</a></p>
      <p>© 2017–2021 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </div>
    
  </footer>
	

</body>
</html>