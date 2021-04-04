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
       <?php 
          if(isset($_GET["seller"])) {
            echo "<a href='seller.php?id=".$_GET['email']."?seller' type='button' class='btn btn-success'>Sell</a>";
          }

        ?>
				<button type="button" class="btn btn-primary"  onclick="window.location.href = 'login.html';">Login</button>
				<button type="button" class="btn btn-primary" onclick="window.location.href = 'sign-inCustomer.html';">Sign In</button>
			</div>
		</div>
	 </div>
</header>

		
		<div class="d-flex justify-content-between bg-secondary col-10 mx-auto p-0 m-0" style="height:45px;">
		
			<div class="d-flex flex-wrap">
				<a href="index.php"role="button" class="btn btn-dark rounded-0 pt-3 fs-4 border-start border-end border-1 text-center">Home</a>
				<a href="category1.php"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Components</a>
				<a href="category2.php"role="button" class="btn btn-secondary pt-3 fs-4 border-start border-end border-1 text-center">Devices</a>
			</div>


			<form-inline class="d-flex gap-2 align-self-center pe-3">
				<input style="width:240px;height: 30px;" class="align-self-center" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-dark align-self-center margin-left" type="submit">Search</button>
			</form>
			
			
		</div>
	

<div id="myCarousel" class="carousel slide col-10 mx-auto pt-3 px-0 border-start border-end border-1" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="carousel/1920x360.jpg" class="d-block w-100" alt="Image couldn't load">
    </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="carousel/1920x360 (1).jpg" class="d-block w-100" alt="Image couldn't load">
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="carousel/1920x360 (2).jpg" class="d-block w-100" alt="Image couldn't load">
      </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Previous</span>
  	</button>
  	<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="visually-hidden">Next</span>
  	</button>

    </div>
  </div>

  <div class="d-flex flex-column col-10 mx-auto px-0 py-5 m-0 border-start border-end border-1">

<div class="container marketing p-5">

    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-between">
      <div class="col-2 margin-start-1">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-2 margin-end-1">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    </div><!-- /.row -->

    


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>

      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div>



    <div class="d-flex justify-content-between col-10 mx-auto px-0 py-4 m-0 border-start border-end border-bottom border-1">

    <div class="col-2 text-center">
      <h3>Column 1555555</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-2 text-center">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-2 text-center">
      <h3>Column 3</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-2 text-center">
      <h3>Column 4</h3>
      <p>Lorem ipsum dolor..</p>
    </div>
    <div class="col-2 text-center">
      <h3>Column 5555555</h3>
      <p>Lorem ipsum dolor..</p>
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