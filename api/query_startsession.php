<?php
    require 'connection.php';
        $conn = Connect();

        $queryStart = $conn->query("SELECT SUM(posVote), SUM(negVote) FROM startsession");

        $resStart = array();
        while($resStart[] = mysqli_fetch_object($queryStart)) {
        }

        if (!$resStart) {
            die("Error: ".$conn->error);
        }
            echo json_encode($resStart);

    $conn->close();
?>