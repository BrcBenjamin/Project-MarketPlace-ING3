<?php
include "config.php";

$itemid = 0;
if(isset($_POST['itemid'])){
   $itemid = mysqli_real_escape_string($mysqli,$_POST['itemid']);
}
$sql = "SELECT * FROM item WHERE iditem=".$itemid;
$result = mysqli_query($mysqli,$sql);

$response = "<div class='container'>
<div class='modal' id='itemModal' role='dialog'>
  <div class='modal-dialog'>

<div class='modal-content'>
    <div class='modal-header'>
      <h4 class='modal-title'>Article information</h4>
      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='getFromfile'><div class='modal-body'> <table border='0' width='100%'> ";

while( $row = $result->fetch_assoc()){
 $id = $row['iditem'];
 $name = $row['name'];
 $description = $row['description'];
 $date = $row['publicationDateTime'];
 $price = $row['price'];
 $availability= $row['availability'];
 $pCty=$row['purchaseCategory'];

 $response .= "<tr>";
 $response .= "<td rowspan='2'><div class='card image justify-content-center align-self-center overflow-hidden pt-3 border border-1' style='width:215px;height:215px;'><img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) ."></div></td><td style='font-weight:1000;font-size:large;'>".$name."</td>";
 $response .= "</tr>";

 ///AUCTIONS
if($pCty==1){
   $response .= "<tr>"; 
   $response .= "<td style='font-weight:400;font-size:medium;'>Auctions</td>"; 
   $response .= "</tr>";
}
///BUT IT NOW
else if($pCty==2){
   $response .= "<tr>"; 
   $response .= "<td style='font-weight:400;font-size:medium;'>Buy It Now</td>"; 
   $response .= "</tr>";
}
///BEST OFFER
else if($pCty==2){
   $response .= "<tr>"; 
   $response .= "<td style='font-weight:400;font-size:medium;'>BestOffer</td>"; 
   $response .= "</tr>";
}

 $response .= "<tr>";
 $response .= "<td colspan='2'>".$description."</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Price : </td><td>".$price."€</td>";
 $response .= "</tr>";

 $response .= "<tr>";
 $response .= "<td>Availability : </td><td>".$availability."</td>";
 $response .= "</tr>";

 $response .= "<tr>"; 
 $response .= "<td>Date of publication : </td><td>".$date."</td>"; 
 $response .= "</tr>";
}
$response .= "</table></div> <div class='modal-footer'>
<button type='button' id='close' class='btn btn-primary ";

$mysqli->close();

if(!isset($_GET['id'])) { 
   echo "disabled' data-dismiss='modal' data-bs-dismiss='modal'>Connect to add to basket</button></div>"; 
}
else {
   include "config.php";

   $sql2 = "SELECT * FROM item,basketitem WHERE iditem=".$itemid ." AND fk_iditem=" .$itemid ." AND fk_email='" .$_GET['id'] ."'";
   $result2 = mysqli_query($mysqli,$sql2);
   
   if ($result2->num_rows > 0) {
      // output data of each row
      $response.= " disabled' data-dismiss='modal' data-bs-dismiss='modal'>Item already in basket</button>
      </div>";
   }
   else {
      $response .= "' data-dismiss='modal' data-bs-dismiss='modal'>Add to Basket</button>
      </div>    

      <div class='container'>
      <div class='modal' id='confirmation' role='dialog'>
      <div class='modal-dialog'>

      <div class='modal-conten'>
      <div class='modal-header'>
         <h4 class='modal-title'>Article information</h4>
         <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
      </div>
      <div class='modal-body' id='confirmationbody'>
         Item added in basket.
      </div>

      </div>
      </div>
      </div>
      </div>

   </div>
   </div>
    </div>
    </div>
    </div>


   <script type='text/javascript'>

      //$(document).ready(function(){
  
        $('#close').click(function(){
                  
          // AJAX request
          $.ajax({
            url: 'addToBasket.php?id=" .$_GET['id'] ."',
            type: 'post',
            data: {itemid:" .$itemid ."},
            success: function(response){ 
               if(response == false) {
                  $('#confirmationbody').html('Problem in adding item to basket.');
               }
               

              // Display Modal
              //$('#confirmation').modal('show'); 
  
            }
          });
        });
      //});
    </script>

      ";
   }

}





echo $response;
exit;

?>