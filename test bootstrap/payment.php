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

    <div class="container">
        <div class='panel panel-default panel-shadow'>
            <div class='panel-body'> 
                <div class='row text-600 text-white bg-primary py-3 fs-3 rounded rounded-3'>
                    <div class='col-9 col-sm-5'>Buyable now</div>
                </div>
                                
                <div class='d-flex flex-column justify-content-between col-12 gap-3'>

                    <div class='d-flex my-2 col-12 justify-content-between border border-1'>
                                    <!--<div><input type='checkbox' name='buy'>Yes</div>-->
                            <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                                <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:150px;height:100px;'>
                                    <img src='s-l1600.png' style='width:150px;height:130px;'>
                                </div>
                                        
                                <div class='col-6 align-self-center ms-5 mb-5'>
                                    <a href='category1.php' class='fs-3 text-reset'>" .$row["name"] ."</a>
                                    <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>
                                </div>
                            </div>

                            <div class='d-flex flex-column pe-5 align-self-center justify-content-end'>
                                    
                                <div class='pb-5 fs-3'>" .$row["price"] ."€</div>

                            </div>
                </div>
            </div>
        </div>
        
    <div class="card bg-default my-3 mx-3">
        <div class="card-header thin-card-header">
            <div class="card-title mt-2">
                <h4 style="font-family:Poppins, sans-serif"><i class="fa fa-map-marker"></i> Address</h4>
            </div>
        </div>
        <div class="card-body">

            <form class="form-horizontal" role="form">
                <div class="row">
                    <div class="d-flex flex-column col-lg-7 mx-auto justify-content-center">
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Line 1</label>
                            <input type="text" placeholder="Address Line 1" class="form-control">
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">Line 2</label>
                            <input type="text" placeholder="Address Line 2" class="form-control">
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="textinput">City</label>
                            <input type="text" placeholder="City" class="form-control">
                        </div>
                        <!-- Text input-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="textinput">State</label>
                                    <input type="text" placeholder="State" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label" for="textinput">Postcode</label>
                                    <input type="text" placeholder="Post Code" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="textinput">Country</label>
                            <input type="text" placeholder="Country" class="form-control">
                        </div>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-default"><i class="fa fa-remove"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </form>

        </div>


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