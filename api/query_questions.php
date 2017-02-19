<?php
    require 'connection.php';
        $conn = Connect();

        $queryQuestions = $conn->query("SELECT * FROM questions");

        $resQuestions = array();
        while($resQuestions[] = mysqli_fetch_object($queryQuestions)) {
        }

        if (!$queryQuestions) {
            die("Error: ".$conn->error);
        }
            echo json_encode($resQuestions);

    $conn->close();
?>