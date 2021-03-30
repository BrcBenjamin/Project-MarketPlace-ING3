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
	

<div class="container col-10 mx-auto pt-3 px-0 border-start border-end border-1">
    
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
        $sql = "SELECT * FROM basketitem, item WHERE fk_email='" .$email ."' AND fk_iditem=iditem";
        $result = $mysqli->query($sql);
        //echo "number of row".$result->num_rows;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo " Item n°" .$row["iditem"]
            
            ."";
            }
        } else {
            echo "0 results";
        }
        $mysqli->close();
    ?>

</div>


  <footer class="container-fluid pt-3 bg-dark text-white">
    <div class="container">
      <p class="float-end"><a class="text-white" href="#">Back to top</a></p>
      <p>© 2017–2021 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </div>
    
  </footer>
	

</body>
</html>