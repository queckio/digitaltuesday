<?php
    require 'connection.php';
        $conn    = Connect();
        $yesNo    = json_decode($_POST['yesNo']);
        $query   = "INSERT into dt_db (yesNo.posVote, yesNo.negVote) VALUES('$posVote','$negVote'')";
        $success = $conn->query($query);

    if (!$success) {
        die("Error".$conn->error);
    }

        echo "Your vote has been counted!";

    $conn->close();
?>