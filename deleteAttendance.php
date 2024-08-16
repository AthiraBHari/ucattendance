<?php
require 'checkLogin.php';

require 'config.php';


$sql = "DELETE FROM attendance WHERE subject = :subject AND date = :date";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':subject', $_GET['subject']);
    $stmt->bindParam(':date', $_GET['date']);

    if( $stmt->execute() ):
        $message = 'Attendance deleted';
    else:
        $message = 'Sorry there must have been an issue';
    endif;
    $subject = $_GET['subject'];
    header("Location: viewAttendance.php?examID=$message&&subject=$subject");
echo $message;

?>