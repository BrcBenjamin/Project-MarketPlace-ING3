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
                            
                            <div class='align-self-start mb-5 pb-5 fs-2'>" .number_format($row["price"]) ."€</div>

                            <div class='align-self-end pe-5 fs-4 mb-4'>
                              <a href='' onclick='javascript:removeFromBasket(" .$row["idbasket"] .")' class=''>Remove from basket</a>
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
          $paymentURL= 'payment.php?id='.$email;
          $i = 1;
          echo "
                          <div class='panel-body'> 
                            <div class='row text-600 text-white bg-primary py-3 fs-3'>
                                <div class='col-9 col-sm-5'>Buyable now</div>
                            </div>
                              
                              <div class='d-flex flex-column justify-content-between col-12 gap-3'>";
          $allAvailable = true;                              
          while($row = $result2->fetch_assoc()) {
            $totalPrice += $row["price"];
            if($row["availability"] == 1) {
              $paymentURL .= '&iditems[]=' .$row["iditem"];
            }
            

          echo "

                      <div class='d-flex my-2 col-12 justify-content-between border border-1'>
                          <!--<div><input type='checkbox' name='buy'>Yes</div>-->
                        <div class='d-flex col-7 pt-4 align-self-start justify-content-center'>
                          <div class='card border-0 image justify-content-center align-self-center overflow-hidden'  style='width:300px;height:215px;'>
                            <img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) .">
                          </div>
                            
                          <div class='col-6 align-self-center ms-5 mb-5'>
                            <a href='category1.php' class='fs-3 text-reset'>" .$row["name"] ."</a>
                            <p class='pt-2 fs-5'>Condition: " .$row["conditionn"] .".<br>" .$row["description"] ."</p>";
                            if($row["availability"] == 0) { 
                              $allAvailable = false;
                              echo "<p class='pt-2 fs-5 text-danger'>This item is unavailable.</p>"; 
                            }

                          echo "</div>
                        </div>

                        <div class='d-flex flex-column align-self-end justify-content-end'>
                          
                          <div class='align-self-start mb-5 pb-5 fs-2'>" .number_format($row["price"]) ."€</div>

                          <div class='align-self-end pe-5 fs-4 mb-4'>
                            <a href='' onclick='javascript:removeFromBasket(" .$row["idbasket"] .")' class=''>Remove from basket</a>
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
              <a href='" .$paymentURL ."' class='btn ";
              if($allAvailable == false) {
                echo " disabled ";
              }
              echo "btn-success fs-3'>Go to checkout</a>
            </div>
          </div>
  
          </div>
  
        </div>
            </div>
          </div>";

      }
        $mysqli->close();
    ?>


<script>
    function removeFromBasket(idbasket) {

      console.log(idbasket);
      $.ajax({
        url:'removeFromBasket.php?idbasket=' +idbasket,
        type:'get',
        success: function(response){
        console.log("Ajax remove from basket get method success.");
        },
        error: function(response){
        //as far as i know, this function will only get triggered if there are some request errors (f.e: 404) or if the response is not in the expected format provided by the dataType parameter
            console.log("something went wrong in remove from basket");
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