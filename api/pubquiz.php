<?php
    require 'connection.php';

    $conn = Connect();
    
    $namePQ = mysqli_real_escape_string($conn, $_POST['namePQ']);
    $timePQ = floatval($_POST['timePQ']);
    $scorePQ = intval($_POST['scorePQ']);

    $query   = "INSERT INTO pubquiz (namePQ, timePQ, scorePQ) VALUES ('$namePQ', $timePQ, $scorePQ)";

    $success = $conn->query($query);

    if (!$success) {
        die("Error".$conn->error);
    }
        
    echo "Your result has been saved!";

    $conn->close();
?>