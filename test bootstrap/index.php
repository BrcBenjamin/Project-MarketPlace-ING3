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
        <a href="index.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET["id"];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>"role="button" class="btn btn-dark rounded-0 pt-3 fs-4 border-end border-1 text-center">Home</a>
        <a href="category1.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET['id'];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>"role="button" class="btn btn-secondary pt-3 fs-4 border-end border-1 text-center">Components</a>
        <a href="category2.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET["id"];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>"role="button" class="btn btn-secondary pt-3 fs-4 border-end border-1 text-center">Devices</a>
    </div>


    <form method="post" onsubmit="return checkSearch()" action="search.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET["id"];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>" class="d-flex gap-2 align-self-center pe-3">
        <input style="width:240px;height: 30px;" class="align-self-center" id="search" name="searchText" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-dark align-self-center margin-left" type="submit">Search</button>
    </form>
    
</div>

<script type='text/javascript'>

            function checkSearch() {
                if($("#search").val().length == 0) {
                    return false;
                }
                else {
                    return true;
                }
            }
</script>
	

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
        <img src="indeximage/GraphicCard.jpg" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

        <h2>GraphicCard</h2>
        <p>A printed circuit board that controls the output to a display screen.</p>
        <p><a class="btn btn-secondary" href="category1.php<?php 
                    if(isset($_GET["id"])) {
                        echo "?id=" .$_GET["id"];
                    }
                    if(isset($_GET["seller"])) {
                        echo "&seller";
                    }
                      if(isset($_GET["id"])) {
                        echo "&subcategory=GraphicCard";
                      } else {
                        echo "?subcategory=GraphicCard";
                      }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-2">
      <img src="indeximage/MotherBoard.jpg" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

        <h2>MotherBoard</h2>
        <p>A printed circuit board containing the principal components of a computer or other device, with connectors for other circuit boards to be slotted into.</p>
        <p><a class="btn btn-secondary" href="category1.php<?php 
                    if(isset($_GET["id"])) {
                        echo "?id=" .$_GET["id"];
                    }
                    if(isset($_GET["seller"])) {
                        echo "&seller";
                    }
                      if(isset($_GET["id"])) {
                        echo "&subcategory=MotherBoard";
                      } else {
                        echo "?subcategory=MotherBoard";
                      }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-2">
      <img src="indeximage/Processor.jpg" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

        <h2>Processor</h2>
        <p>A central processing unit.</p>
        <p><a class="btn btn-secondary" href="category1.php<?php 
                    if(isset($_GET["id"])) {
                        echo "?id=" .$_GET["id"];
                    }
                    if(isset($_GET["seller"])) {
                        echo "&seller";
                    }
                      if(isset($_GET["id"])) {
                        echo "&subcategory=Processor";
                      } else {
                        echo "?subcategory=Processor";
                      }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-2">
      <img src="indeximage/Keyboard.jpg" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

        <h2>Keyboard</h2>
        <p>A panel of keys that operate a computer or typewriter..</p>
        <p><a class="btn btn-secondary" href="category2.php<?php 
                    if(isset($_GET["id"])) {
                        echo "?id=" .$_GET["id"];
                    }
                    if(isset($_GET["seller"])) {
                        echo "&seller";
                    }
                      if(isset($_GET["id"])) {
                        echo "&subcategory=Keyboard";
                      } else {
                        echo "?subcategory=Keyboard";
                      }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-2">
      <img src="indeximage/Mouse.jpg" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

      <h2>Mouse</h2>
      <p>A small handheld device which is moved across a mat or flat surface to move the cursor on a computer screen.</p>
      <p><a class="btn btn-secondary" href="category2.php<?php 
                  if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                  }
                  if(isset($_GET["seller"])) {
                      echo "&seller";
                  }
                    if(isset($_GET["id"])) {
                      echo "&subcategory=Mouse";
                    } else {
                      echo "?subcategory=Mouse";
                    }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->

      <div class="col-2 margin-end-1">
      <img src="indeximage/Headset.png" class="bd-placeholder-img rounded-circle border border-primary" alt="Image couldn't load" width="140" height="140">

      <h2>Headset</h2>
      <p>A set of headphones, typically with a microphone attached, used especially in telephony and radio communication.</p>
      <p><a class="btn btn-secondary" href="category2.php<?php 
                  if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                  }
                  if(isset($_GET["seller"])) {
                      echo "&seller";
                  }
                    if(isset($_GET["id"])) {
                      echo "&subcategory=Headset";
                    } else {
                      echo "?subcategory=Headset";
                    }?>">View details »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    </div><!-- /.row -->

    


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7">
        <h2 class="featurette-heading" style="font-size:x-large;">Welcome to our website. <span class="text-muted">Purchasing Methods.</span></h2>
        <p class="lead" style="font-size:large;"><br>We offer you three purchasing methods:<br><br>
          The most standard one is Buy it Now, if you are interested in an item and it is available in Buy it Now you can add it to your cart and pay for it instantly.<br><br>

          But we also offer great deals, thanks to negotiations with sellers, you can propose up to five prices for an item and the seller can accept or make a counter offer.<br><br>

          Finally, for those who love to bargain, you can buy great products through our limited time auction system.</p>
      </div>
      <div class="col-md-5">
        <img src="indeximage/Auction.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Image couldn't load" width="500" height="500">      
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading" style="font-size:x-large;">Don't worry! <span class="text-muted">Our website is secure.</span></h2>
        <p class="lead" style="font-size:large;"><br>All transactions are verified by us, whether you are a buyer or a seller, we guarantee you complete security.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="indeximage/secure.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="Image couldn't load" width="500" height="500"> 

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette p-5">
      <div class="col-md-7">
        <h2 class="featurette-heading" style="font-size:x-large;">Our team : <span class="text-muted">Chems,Abbas,Ben.</span></h2>
        <p class="lead" style="font-size:large;"><br>Our team consists of :<br><br>
          Brahim Khlil Chems Eddine, Project Manager<br>
          Jiar Abbas, Administrative Department<br>
          Brice Benjamin, Legal Department.</p>
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


  <?php include "./footer.php" ?>


</body>
</html>