<?php
include "config.php";

$itemid = 0;
if(isset($_POST['itemid'])){
   $itemid = mysqli_real_escape_string($mysqli,$_POST['itemid']);
}
$sql = "SELECT * FROM item WHERE iditem=".$itemid;
$result = mysqli_query($mysqli,$sql);

$response = "<table border='0' width='100%'>";
while( $row = $result->fetch_assoc()){
 $id = $row['iditem'];
 $name = $row['name'];
 $description = $row['description'];
 $date = $row['publicationDateTime'];
 $price = $row['price'];
 $availability= $row['availability'];

 $response .= "<tr>";
 $response .= "<td><div class='card image justify-content-center align-self-center overflow-hidden pt-3 border border-1' style='width:215px;height:215px;'><img src=data:image/jpeg;charset=utf8;base64," .base64_encode($row["photo"]) ."></div></td><td>".$name."</td>";
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
