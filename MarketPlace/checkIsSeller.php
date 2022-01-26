<?php

    include "config.php";

    $sql="SELECT * FROM `account` WHERE email='$_GET[id]'";
    $result=$mysqli->query($sql);
    $isSeller = true;
    while ($row= $result->fetch_assoc()) {
        
        if($row["fk_idsellingLicense"] == NULL) {
            $isSeller = false;
        }	
    }




?>