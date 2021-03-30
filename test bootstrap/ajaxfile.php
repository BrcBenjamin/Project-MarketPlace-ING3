<?php
include "config.php";

$itemid = 0;
if(isset($_POST['itemid'])){
   $itemid = mysqli_real_escape_string($con,$_POST['itemid']);
}
$sql = "SELECT * FROM item WHERE iditem=".$itemid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch($result) ){
 $id = $row['iditem'];
 $name = $row['name'];
 $description = $row['description'];
 $date = $row['publicationDateTime'];
 $price = $row['price'];
 $availability= $row['availability'];
 $photo=.base64_encode($row['photo']);

 $response .= "<tr>";
 $response .= "<td>photo</td><td>".$name."</td>";
 $response .= "</tr>";

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
$response .= "</table>";

echo $response;
exit;
