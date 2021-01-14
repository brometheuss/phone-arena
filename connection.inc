<?php 

    $domain = "urosmarkov.byethost5.com";
    $user = "b5_19824787";
    $pass = "carewi9564357";

    $errors = array();

    $connection = mysql_connect($domain, $user, $pass);
    if(!$connection){
        $errors[] = "Error, couldnt connect to the database server.";
    }

    $selectDatabase = mysql_select_db('b5_19824787_phone_arena', $connection);
    if(!$selectDatabase){
        $errors[] = "Error, the database doesn't exist";
    }
    
    mysql_set_charset("utf8", $connection);

?>