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
        <a href="index.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET["id"];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>"role="button" class="btn btn-secondary rounded-0 pt-3 fs-4 border-end border-1 text-center">Home</a>
        <a href="category1.php<?php 
            if(isset($_GET["id"])) {
                echo "?id=" .$_GET["id"];
            }
            if(isset($_GET["seller"])) {
                echo "&seller";
            }
            ?>"role="button" class="btn btn-dark pt-3 fs-4 border-end border-1 text-center">Components</a>
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

	

<div id="myCarousel" class="carousel slide col-10 mx-auto pt-3 border-start border-end border-1" data-bs-ride="carousel">
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

<div class="d-flex flex-row col-10 mx-auto px-0 m-0 border-start border-end border-bottom border-1">

  <div class="d-flex flex-column col-2 px-0 py-4 m-0 text-dark">

            <div class="d-flex align-items-center pt-3 ps-4 pb-2 text-dark border-top border-end border-1">
              <span class="fs-3">Subcategories</span>
            </div>
            
            <div class="container pt-3 border-end border-bottom border-1">
              <ul class="list-unstyled d-flex flex-column fs-4 pb-3 ms-5">

                <?php

                  include "config.php";

                  $sql="SELECT DISTINCT subcategory FROM `item` WHERE category=1";
                  $result=$mysqli->query($sql);
                  
                  while ($row= $result->fetch_assoc()) {
                      
                      echo "<li>
                      <a href='category1.php"; 
                            if(isset($_GET["id"])) {
                                echo "?id=" .$_GET["id"];
                            }
                            if(isset($_GET["seller"])) {
                                echo "&seller";
                            }
                            if(isset($_GET["category"])) {
                              if(isset($_GET["id"])) {
                                echo "&category=" .$_GET["category"];
                              } else {
                                echo "?category=" .$_GET["category"];
                              }
                          }
                          if(!isset($_GET["id"]) && !isset($_GET["category"])) {
                            echo"?subcategory=" .$row["subcategory"] ."' class='text-dark'>
                              " .$row["subcategory"];
                          }
                          else {
                            echo"&subcategory=" .$row["subcategory"] ."' class='text-dark'>
                              " .$row["subcategory"] ;
                          }
                            
                          echo "</a>
                          </li>";
                  }

                ?>
              </ul>
            </div>

            <div class="d-flex align-items-center pt-3 ps-4 pb-2 text-dark border-end border-1">
              <span class="fs-3">Buying category</span>
            </div>
            
            <div class="container pt-3 border-end border-bottom border-1">
              <ul class="list-unstyled d-flex flex-column fs-4 pb-3 ms-3">
              <li>
                  <a href="category1.php<?php
                    if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                    }
                      if(isset($_GET["seller"])) {
                          echo "&seller";
                      }
                      if(isset($_GET["subcategory"])) {
                        if(isset($_GET["id"])) {
                          echo "&subcategory=" .$_GET["subcategory"];
                        } else {
                          echo "?subcategory=" .$_GET["subcategory"];
                        }
                    }

                      ?>" class='text-dark'>All
                  </a>
                </li>

              <li>
                  <a href='category1.php<?php
                    if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                    }
                      if(isset($_GET["seller"])) {
                          echo "&seller";
                      }
                        if(isset($_GET["id"])) {
                          echo "&category=1";
                        } else {
                          echo "?category=1";
                        }
                      if(isset($_GET["subcategory"])) {
                        echo "&subcategory=" .$_GET["subcategory"];
                    }
                    
                      ?>' class='text-dark'>Auction
                  </a>
                </li>
                <li>
                  <a href='category1.php<?php
                    if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                    }
                      if(isset($_GET["seller"])) {
                          echo "&seller";
                      }
                        if(isset($_GET["id"])) {
                          echo "&category=2";
                        } else {
                          echo "?category=2";
                        }
                      if(isset($_GET["subcategory"])) {
                        echo "&subcategory=" .$_GET["subcategory"];
                    }
                      ?>' class='text-dark'>Buy it now
                  </a>
                </li>
                <li>
                  <a href='category1.php<?php
                    if(isset($_GET["id"])) {
                      echo "?id=" .$_GET["id"];
                    }
                      if(isset($_GET["seller"])) {
                          echo "&seller";
                      }
                        if(isset($_GET["id"])) {
                          echo "&category=3";
                        } else {
                          echo "?category=3";
                        }
                      if(isset($_GET["subcategory"])) {
                        echo "&subcategory=" .$_GET["subcategory"];
                    }
                      ?>' class='text-dark'>Best Offer
                  </a>
                </li>
              </ul>
            </div>
            
  </div>


    <div class="d-flex flex-wrap col-10 px-3 py-4">

    <?php

      

      $sql = "SELECT * FROM item WHERE availability=1 AND category=1";
      if(isset($_GET["subcategory"])) {
        $sql .= " AND subcategory='" .$_GET["subcategory"] ."'"; 
      }
      if(isset($_GET["category"])) {
        $sql .= " AND purchaseCategory=" .$_GET["category"]; 
      }
      $result = $mysqli->query($sql);
      //echo "number of row".$result->num_rows;
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $id=$row["iditem"];
          echo "<div class='card shadow-sm col-3'>
          <div class='card image border-0 justify-content-center align-self-center overflow-hidden pt-3 border border-1' style='width:215px;height:215px;'>
            <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) ." class='img-fluid'>
          </div>
            
          <div class='card-body'>
            <div class='card-text fs-4' style='height:59px;'><a href='itemInterface.php?"; 
            if(isset($_GET["id"])) {
                echo "id=" .$_GET["id"] ."&";
            }
            if(isset($_GET["seller"])) {
                echo "seller&";
            }
            echo"iditem=".$id."'>" .$row["name"] ."</a></div>
            <div class='d-flex justify-content-between align-items-center'>
              <span class='price'>";
              ///IF AUCTIONS
              if($row['purchaseCategory']==1){
              echo"Auction";
              } elseif($row['purchaseCategory']==2) {
                echo"Buy it now";
              }
              elseif($row['purchaseCategory']==3) {
                echo"Best offer";
              }
              echo"</span>
              <div class='btn-group'>
                <button data-id='".$id."' name='iteminfo' class='btn btn-sm btn-outline-secondary'>View</button>
                <button type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>
              </div>
            </div>
          </div>
          </div>
          ";
        }
      } else {
        //echo $sql;
        echo "<div class='justify-content-center mx-auto fs-1 align-self-center'><div class='mx-auto' style='height:200px;width:200px;'><img src='sorry-images-hd.jpg' class='img-fluid'></div> <br> Sorry, there are 0 results for you research.
        </div>";
      }
      $mysqli->close();
    ?>

      
  </div>

</div>

<!--Modal Interactif-->
<div class="modal1"></div>

  <script type='text/javascript'>

    $(document).ready(function(){

      $('button[name="iteminfo"]').click(function(){
        

        var itemid = $(this).data('id');
        
        // AJAX request
        $.ajax({
          url: 'viewOfferModal.php<?php if(isset($_GET['id'])) { echo"?id=".$_GET['id']; } ?>',
          type: 'post',
          data: {itemid: itemid},
          success: function(response){ 
            // Add response in Modal body
            $('.modal1').html(response);

            // Display Modal
            $('#itemModal').modal('toggle'); 
          }
        });
      });
    });
  </script>



<?php include "./footer.php" ?>

	

</body>
</html>