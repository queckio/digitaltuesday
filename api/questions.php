<?php
    require 'connection.php';
        $conn = Connect();
        $nameQA = ($_POST['nameQA']);
        $questionQA = ($_POST['questionQA']);

        $query   = "INSERT INTO questions (nameQA, questionQA) VALUES ($nameQA, $questionQA)";

        $success = $conn->query($query);

        if (!$success) {
            die("Error".$conn->error);
        }
            echo "Your question has been submitted!";

    $conn->close();
?>