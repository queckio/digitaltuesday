<?php
    require 'connection.php';
        $conn = Connect();

        $queryPubquiz = $conn->query("SELECT * FROM pubquiz");
        
        if (!$queryPubquiz) {
            die("Error: ".$conn->error);
        }

        $resPubquiz = array();
        while($temp = mysqli_fetch_object($queryPubquiz)) {
            $resPubquiz[] = $temp;
        }

        echo json_encode($resPubquiz);

    $conn->close();
?>