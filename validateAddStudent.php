<?php

session_start();

require 'config.php';


if(!empty($_POST['submit'])):
    $sql = "INSERT INTO student (name,class,roll,email,phone,yearOfAdmission) VALUES (:name,:class,:roll,:email,:phone,:yearOfAdmission)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':roll', $_POST['roll']);
    $stmt->bindParam(':class', $_POST['class']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':yearOfAdmission', $_POST['date']);
    
    if( $stmt->execute() ):
        $message = 'Student added successfully';
    else:
        $message = 'Sorry there must have been an issue adding Student';
    endif;
endif;

header("Location: addStudent.php?message=$message");
?>
