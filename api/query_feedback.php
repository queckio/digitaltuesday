<?php
    require 'connection.php';

    $conn = Connect();

    $queryFeedback = $conn->query("SELECT SUM(goodVote), SUM(badVote) FROM feedback");

    if (!$queryFeedback) {
        die("Error: ".$conn->error);
    }

    $resFeedback = array();
    while($temp = mysqli_fetch_object($queryFeedback)) {
        $resFeedback[] = $temp;
    }

    echo json_encode($resFeedback);

    $conn->close();
?>