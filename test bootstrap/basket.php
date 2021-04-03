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
            <div class='container bootstrap snippets bootdey'>
              <div class='col-12 content'>
                  <div class='panel panel-info panel-shadow'>
        

    <?php
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
        $sql = "SELECT * FROM basketitem, item WHERE fk_email='" .$email ."' AND fk_iditem=iditem AND (purchaseCategory=1 OR purchaseCategory=3)";
        $result = $mysqli->query($sql);
        //echo "number of row".$result->num_rows;
        if ($result->num_rows > 0) {
            // output data of each row
            echo "
                            <div class='panel-body'> 
                              <div class='row text-600 text-white bg-primary py-3 fs-3'>
                                  <div class='col-9 col-sm-5'>Bid or offer to be made</div>
                              </div>
                                
                                <div class='d-flex flex-column justify-content-between col-12 gap-3'>";
            while($row = $result->fetch_assoc()) {
            echo "

                        <div class='d-flex my-2 col-12 justify-content-between border border-1'>

                          <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                            <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:300px;height:215px;'>
                              <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) .">
                            </div>
                              
                            <div class='col-6 align-self-center ms-5 mb-5'>
                              <a href='category1.php' class='fs-3 text-reset'>" .$row["name"] ."</a>
                              <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>
                            </div>
                          </div>

                          <div class='d-flex flex-column align-self-end justify-content-end'>
                            
                            <div class='align-self-start mb-5 pb-5 fs-2'>" .$row["price"] ."€</div>

                            <div class='align-self-end pe-5 fs-4 mb-4'>
                              <a href='category1.php' class=''>Remove from basket</a>
                            </div>

                          </div>

                        </div>";
            }
            echo "
            </div>
          </div>";

        }

        $sql = "SELECT * FROM basketitem, item WHERE fk_email='" .$email ."' AND fk_iditem=iditem AND purchaseCategory=2";
        $result2 = $mysqli->query($sql);
        if ($result2->num_rows > 0) {
          // output data of each row
          $totalPrice=0;
          echo "
                          <div class='panel-body'> 
                            <div class='row text-600 text-white bg-primary py-3 fs-3'>
                                <div class='col-9 col-sm-5'>Buyable now</div>
                            </div>
                              
                              <div class='d-flex flex-column justify-content-between col-12 gap-3'>";
          while($row = $result2->fetch_assoc()) {
            $totalPrice+=$row["price"];
          echo "

                      <div class='d-flex my-2 col-12 justify-content-between border border-1'>
                          <!--<div><input type='checkbox' name='buy'>Yes</div>-->
                        <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                          <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:300px;height:215px;'>
                            <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) .">
                          </div>
                            
                          <div class='col-6 align-self-center ms-5 mb-5'>
                            <a href='category1.php' class='fs-3 text-reset'>" .$row["name"] ."</a>
                            <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>
                          </div>
                        </div>

                        <div class='d-flex flex-column align-self-end justify-content-end'>
                          
                          <div class='align-self-start mb-5 pb-5 fs-2'>" .$row["price"] ."€</div>

                          <div class='align-self-end pe-5 fs-4 mb-4'>
                            <a href='category1.php' class=''>Remove from basket</a>
                          </div>

                        </div>

                      </div>";
          }
          echo "  <div class='d-flex align-self-end me-4 mb-3 justify-content-end'>
                          
          <div class='panel-body d-flex flex-column p-3 align-items-center'>
            <div class='fs-1 border-bottom border-1 mb-4'>
              <p><span class='fw-bold'>Total: </span>" .number_format($totalPrice) ." €</p>
            </div>
            <div class=''>
              <a href='payment.php' class='btn btn-success fs-3'>Go to checkout</a>
            </div>
          </div>
  
          </div>
  
        </div>
            </div>
          </div>";

      }
        $mysqli->close();
    ?>

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