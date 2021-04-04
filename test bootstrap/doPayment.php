<?php


    /*
    * Change the value of $password if you have set a password on the root userid
    * Change NULL to port number to use DBMS other than the default using port 3306
    *
    */
    $email = $_GET['id'];
    $iditems = $_GET['iditems'];

    if(isset($_POST["cardType"])) { $cardType =  $_POST["cardType"]; } else { $cardType = "Visa"; }
    $cardNumber =  $_POST["cardNumber"];
    $name =  $_POST["name"];
    $expirationDate =  $_POST["expirationDate"];
    $securityCode =  $_POST["securityCode"];

    echo "AAAAAAAAAAAAAA" .$cardType.$cardNumber.$name.$expirationDate.$securityCode;

    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'yourmarket'; //To be completed to connect to a database. The database must exist.
    $port = 3308; //Default must be NULL to use default port
    $mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }
    echo '<p>Connection OK '. $mysqli->host_info.'</p>';
    echo '<p>Server '.$mysqli->server_info.'</p>';
    echo '<p>Initial charset: '.$mysqli->character_set_name().'</p>';

    $sql = "SELECT MAX(idpayment) FROM payment;";
    $result = $mysqli->query($sql);
    $idPayment = NULL;
    while ($row = $result->fetch_assoc()) {
        echo $row["MAX(idpayment)"];
        $idPayment = $row["MAX(idpayment)"] + 1 ;
    }

    // output data of each row
    $sql = "INSERT INTO `payment` (`cardNumber`, `expiryDate`, `securityCode`, `cardType`) VALUES ('"  .$cardNumber ."', '"  .$expirationDate ."-00', '"  .$securityCode ."', '"  .$cardType ."') ";

    if ($mysqli->query($sql) === TRUE) {
        echo "New book added successfully!";
      } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
      }

    for($i=0 ; $i < count($iditems) ; ++$i) {

        $sql = "SELECT * FROM item WHERE iditem=" .$iditems[$i];
        $result = $mysqli->query($sql);
        while ($row2 = $result->fetch_assoc()) {
            $sql = "INSERT INTO `offer`(`fk_buyer_email`, `item_iditem`, `fk_seller_email`, `fk_idcreditcard`, `price`, `type`, `state`) 
            VALUES ('" .$email ."', " .$iditems[$i] ." ,'"  .$row2["account_email"] ."'," .$idPayment ."," .$row2["price"] .", 2, 1)";

             echo $row2["account_email"];

            if ($mysqli->query($sql) === TRUE) {
                echo "New book added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            }

            $sql2 = "UPDATE `item` SET `availability`=0 WHERE iditem=" .$iditems[$i];
            if ($mysqli->query($sql2) === TRUE) {
                echo "Set availability 0 succesfully for item n°" .$iditems[$i] ."!";
            } else {
                echo "Error: " . $sql2 . "<br>" . $mysqli->error;

            }
        }


    }


    $mysqli->close();


?>