<?php

session_start();

require 'config.php';


if(!empty($_POST['submit'])):
    $sql = "INSERT INTO class (name) VALUES (:batchName)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':batchName', $_POST['batchName']);
    if( $stmt->execute() ):
        $message = 'Class added successfully';
    else:
        $message = 'Sorry there must have been an issue adding class';
    endif;
endif;

header("Location: addBatch.php?message=$message");
?>
