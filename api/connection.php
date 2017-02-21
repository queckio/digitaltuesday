<?php
    function Connect() {
    $dbhost = "52.174.164.23";
    $dbuser = "dt-user";
    $dbpass = "flV9CDSpWusO";
    $dbname = "dt-db";

    // Create connection
    
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
    
    $conn->set_charset('utf8');
    
    return $conn;
    }
?>