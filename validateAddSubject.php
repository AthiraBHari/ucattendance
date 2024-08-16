<?php

session_start();

require 'config.php';


if(!empty($_POST['submit'])):
    $sql = "INSERT INTO subject (name,sem,code,class,teacher) VALUES (:name,:sem,:code,:class,:teacher)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':sem', $_POST['sem']);
    $stmt->bindParam(':code', $_POST['code']);
    $stmt->bindParam(':class', $_POST['class']);
    $stmt->bindParam(':teacher', $_POST['teacher']);
    if( $stmt->execute() ):
        $message = 'Subject added successfully';
    else:
        $message = 'Sorry there must have been an issue adding Subject';
    endif;
endif;

header("Location: addSubject.php?message=$message");
?>
