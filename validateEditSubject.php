<?php

session_start();

require 'config.php';

if(!empty($_POST['submit'])):
    $sql = "UPDATE subject SET name = :name WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':id', $_POST['id']);
    if( $stmt->execute() ):
        $message = 'subject Sucessfully edited';
    else:
        $message = 'Sorry there must have been an issue registering';
    endif;
endif;
header("Location: viewSubjects.php?message=$message");
?>