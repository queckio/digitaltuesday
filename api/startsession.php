<?php
    require 'connection.php';
        $conn = Connect();
        $posVote = intval($_POST['posVote']);
        $negVote = intval($_POST['negVote']);

        $query   = "INSERT INTO startsession (posVote, negVote) VALUES ($posVote, $negVote)";

        $success = $conn->query($query);

        if (!$success) {
            die("Error".$conn->error);
        }
            echo "Your vote has been counted!";

    $conn->close();
?>