<?php
require 'checkLogin.php';

require 'config.php';
$records = $conn->prepare('SELECT * FROM student WHERE id = :id');
    $records->bindParam(':id', $_GET['id']);
    $records->execute();
    $batcht = $records->fetch(PDO::FETCH_ASSOC);
    $idd = $batcht['batch'];
$sql = "DELETE FROM student WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);

    if( $stmt->execute() ):
        $message = 'Student deleted';
    else:
        $message = 'Sorry there must have been an issue';
    endif;
    header("Location: viewBatch.php?batchId=$idd&message=$message");
echo $message;

?>