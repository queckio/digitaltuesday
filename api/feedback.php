<?php
    require 'connection.php';
    
    $conn = Connect();

    $goodVote = intval($_POST['goodVote']);
    $badVote = intval($_POST['badVote']);

    $query   = "INSERT INTO feedback (goodVote, badVote) VALUES ($goodVote, $badVote)";

    $success = $conn->query($query);

    if (!$success) {
        die("Error".$conn->error);
    }
    
    echo "Your feedback has been counted!";

    $conn->close();
?>