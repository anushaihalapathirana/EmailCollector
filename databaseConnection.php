<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "emailcollector";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed. Please Try again later ");

        return $conn;
    }
    
    function CloseCon($conn)
    {
        $conn -> close();
    }
    
?>
