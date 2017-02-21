<?php
    require 'connection.php';

    $conn = Connect();

    $queryStart = $conn->query("SELECT SUM(posVote), SUM(negVote) FROM startsession");

    if (!$queryStart) {
        die("Error: ".$conn->error);
    }

    $resStart = array();
    while($temp = mysqli_fetch_object($queryStart)) {
        $resStart[] = $temp;
    }

    echo json_encode($resStart);

    $conn->close();
?>