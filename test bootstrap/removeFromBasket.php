<?php


    
    $idbasket = $_GET['idbasket'];

    include "config.php";

    echo '<p>Connection OK '. $mysqli->host_info.'</p>';
    echo '<p>Server '.$mysqli->server_info.'</p>';
    echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';

    $sql = "DELETE FROM `basketitem` WHERE idbasket=" .$idbasket;

    if ($mysqli->query($sql) === TRUE) {
        echo "Basket item deleted successfully!";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }


    $mysqli->close();


?>