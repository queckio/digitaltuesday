<?php
    require 'connection.php';
        $conn = Connect();

        $queryQuestions = $conn->query("SELECT * FROM questions");
        
        if (!$queryQuestions) {
            die("Error: ".$conn->error);
        }

        $resQuestions = array();
        while($temp = mysqli_fetch_object($queryQuestions)) {
            $resQuestions[] = $temp;
        }

        echo json_encode($resQuestions);
    $conn->close();
?>