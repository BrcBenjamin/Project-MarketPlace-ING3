<?php

include "config.php";
    


    echo '<p>Connection OK '. $mysqli->host_info.'</p>';
    echo '<p>Server '.$mysqli->server_info.'</p>';
    echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';

    $sql = "INSERT INTO `basketitem` (`fk_email`, `fk_iditem`) VALUES ('" .$_GET["id"] ."', '" .$_POST["itemid"] ."') ";

    if ($mysqli->query($sql) === TRUE) {
        echo "New basketitem added successfully!";
        $response = true;
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        $response = false;
      }


?>