<?php

session_start();

require 'config.php';


if(!empty($_POST['submit'])):
    $sql = "INSERT INTO teacher (name,email,password) VALUES (:name,:email,:password)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $pass);
    if( $stmt->execute() ):
        $message = 'Teacher added successfully';
    else:
        $message = 'Sorry there must have been an issue adding teacher';
    endif;
endif;

header("Location: addTeacher.php?message=$message");
?>
