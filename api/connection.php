<?php
    function Connect() {
        $dbhost = "eu-cdbr-azure-west-d.cloudapp.net";
        $dbuser = "bebfaea5954bf9";
        $dbpass = "dd22593f";
        $dbname = "dt_db";

        // Create connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
        return $conn;
    }
?>