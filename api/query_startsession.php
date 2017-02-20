<?php
    require 'connection.php';
        $conn = Connect();

        $queryStart = $conn->query("SELECT SUM(posVote), SUM(negVote) FROM startsession");

        if (!$resStart) {
            die("Error: ".$conn->error);
        }

        $resStart = array();
        while($resStart[] = mysqli_fetch_object($queryStart)) {
        }

        echo json_encode($resStart);

    $conn->close();
?>