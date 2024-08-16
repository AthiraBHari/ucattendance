<?php

session_start();

require 'config.php';

if(!empty($_POST['submit'])):


//    $sql = "INSERT INTO attendance (rollNo,batch,date,absent) VALUES (:rollNo,:batch,:date,:absent)";
    $sql = "UPDATE attendance SET absent = :absent WHERE roll = :roll AND date = :date";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':roll', $roll);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam('absent', $absent);

    $date = $_POST['date'];
    $batch = $_POST['batch'];
    $roll = $_POST['roll'];
    $absentss = $_POST['absent'];

    for ($i = 0; $i<$_POST['count'];$i++)
    {
        $roll = $roll[$i];
        $absent = $absentss[$i];
        $stmt->execute();
    }
    $message = "Attendance Edited";


endif;

header("Location: viewBatchAttendance.php?message=$message&&batch=$batch&&date=$date");

?>