<?php

include_once("constants.php");

// database connection functions
    function OpenDBConnection()
    {
        $dbhost = DATABASE_HOST;
        $dbuser = DATABASE_USER;
        $dbpass = DATABASE_PASSWORD;
        $db = DATABASE_NAME;

        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed. Please Try again later ");

        return $conn;
    }
    
    function CloseDBConnection($conn)
    {
        $conn -> close();
    } 
?>
