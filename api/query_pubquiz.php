<?php
    require 'connection.php';
        $conn = Connect();

        $queryPubquiz = $conn->query("SELECT * FROM pubquiz");

        $resPubquiz = array();
        while($resPubquiz[] = mysqli_fetch_object($queryPubquiz)) {
        }

        if (!$queryPubquiz) {
            die("Error: ".$conn->error);
        }
            echo json_encode($resPubquiz);

    $conn->close();
?>