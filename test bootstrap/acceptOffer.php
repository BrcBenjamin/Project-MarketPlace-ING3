<?php


    /*
    * Change the value of $password if you have set a password on the root userid
    * Change NULL to port number to use DBMS other than the default using port 3306
    *
    */
    $idoffer = $_GET['idoffer'];
    $iditem = $_GET['iditem'];


    include "config.php";
    
    echo '<p>Connection OK '. $mysqli->host_info.'</p>';
    echo '<p>Server '.$mysqli->server_info.'</p>';
    echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';

    $sql = "UPDATE `offer` SET `state`=1 WHERE idoffer=" .$idoffer;
    if ($mysqli->query($sql) === TRUE) {
        echo "Set state to 1 succesfully for offer n°" .$idoffer ."!";
    } 
    else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

    $sql2 = "UPDATE `item` SET `availability`=0 WHERE iditem=" .$iditem;
        if ($mysqli->query($sql2) === TRUE) {
            echo "Set availability 0 succesfully for item n°" .$iditem ."!";
        } else {
            echo "Error: " . $sql2 . "<br>" . $mysqli->error;

        }

    $mysqli->close();


?>