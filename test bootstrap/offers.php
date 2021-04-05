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

		
<?php include "./navbar.php" ?>

	
    <div class='container col-10 mx-auto pt-3 px-0'>
            <div class='container bootstrap snippets bootdey'>
              <div class='col-12 content'>
                  <div class='panel panel-info panel-shadow'>
        

    <?php
        
        $email = $_GET['id'];

        include "config.php";

        $sql = "SELECT * FROM offer, item WHERE fk_seller_email='" .$email ."' AND item_iditem=iditem AND purchaseCategory=3 AND state=2";
        $result = $mysqli->query($sql);
        
        
        //echo "number of row".$result->num_rows;
        if ($result->num_rows > 0) {
            

            // output data of each row
            echo "
                            <div class='panel-body'> 
                              <div class='row text-600 text-white bg-primary py-3 fs-3'>
                                  <div class='col-9 col-sm-5'>Received offers on Best Offer items</div>
                              </div>
                                
                                <div class='d-flex flex-column justify-content-between col-12 gap-3'>";
            while($row = $result->fetch_assoc()) {
                $sql2 = "SELECT * FROM offer WHERE idoffer=" .$row["idoffer"];
                $result2 = $mysqli->query($sql2);
                while($row2 = $result2->fetch_assoc()) { $priceoffer = $row2["price"]; }

            echo "

                        <div class='d-flex my-2 col-12 justify-content-between border border-1'>

                          <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                            <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:300px;height:215px;'>
                              <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) ." class='img-fluid'>
                            </div>
                              
                            <div class='col-6 align-self-center ms-5 mb-5'>
                              <a href='category1.php' class='fs-3 text-reset'>" .$row["name"] ."</a>
                              <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>";
                              if($row["availability"] == 0) { 
                                echo "<p class='pt-2 fs-5 text-danger'>This item is unavailable.</p>"; 
                              }
  
                            echo "
                            </div>
                          </div>

                          <div class='d-flex flex-column align-self-end justify-content-end'>
                            
                            <div class='align-self-center border-bottom border-1 mb-5 rounded-3 fs-2'>" .number_format($priceoffer) ."€</div>

                            <div class='align-self-end pe-5 mt-5 fs-4 mb-4'>
                                <a href='' onclick='declineOffer(" .$row["idoffer"] .");' class='btn btn-danger'>Decline offer</a>
                                </form>
                                <a href='' onclick='acceptOffer(" .$row["idoffer"] .", " .$row["iditem"] .");' class='btn btn-success'>Accept offer</a>
                                <a href='' onclick='' class='btn btn-primary'>Counter-offer</a>
                            </div>

                          </div>

                        </div>";
                        
            }
            echo "
            </div>
          </div>";

          echo " 
  
        </div>
            </div>
          </div>";

      } else {
          echo "<div class='justify-content-center mx-auto my-5 fs-1 align-self-center text-center'><div class='mx-auto' style='height:200px;width:200px;'><img src='images/768px-Sad_smiley_yellow_simple.svg.png' class='img-fluid'></div> <br> No offers to respond to for now.
          </div>";
      }
        $mysqli->close();
    ?>


<script>


    function acceptOffer(idoffer, iditem) {

        console.log(idoffer);
        $.ajax({
        url:'acceptOffer.php?idoffer=' +idoffer +'&iditem=' +iditem,
        type:'get',
        success: function(response){
        console.log("Ajax accept offer get method success.");
        },
        error: function(response){
        //as far as i know, this function will only get triggered if there are some request errors (f.e: 404) or if the response is not in the expected format provided by the dataType parameter
            console.log("something went wrong in accept offer");
        }
        });
            console.log("PAS 0");
    }


    function declineOffer(idoffer) {

      console.log(idoffer);
      $.ajax({
        url:'declineOffer.php?idoffer=' +idoffer,
        type:'get',
        success: function(response){
        console.log("Ajax decline offer get method success.");
        },
        error: function(response){
        //as far as i know, this function will only get triggered if there are some request errors (f.e: 404) or if the response is not in the expected format provided by the dataType parameter
            console.log("something went wrong in decline offer");
        }
        });
          console.log("PAS 0");
    }
</script>

    </div>
  </div>
</div>

</div>


<?php include "./footer.php" ?>
	

</body>
</html>