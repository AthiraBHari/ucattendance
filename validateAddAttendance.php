<?php

session_start();

require 'config.php';

if(!empty($_POST['submit'])):

    $sql = "SELECT id FROM attendance WHERE subject = :s AND date = :d";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':s', $_POST['subject']);
    $stmt->bindParam(':d', $_POST['date']);
    echo $sql.'<br>';
    $stmt->execute();
    $flag = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($flag);
    if(!empty($flag)){
        $message = "Attendance Already Added For that date";
    }
    else{

    $sql = "INSERT INTO attendance (student,subject,date,absent) VALUES (:student,:subject,:date,:absent)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':student', $student);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam('absent', $absent);

    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $students = $_POST['student'];
    $absentss = $_POST['absent'];

    var_dump($_POST['count']);

    for ($i = 0; $i<$_POST['count'];$i++)
    {
        echo $i;
        $student = $students[$i];
        $absent = $absentss[$i];
        $stmt->execute();
    }
    $message = "Attendance Added";
}


endif;

header("Location: addAttendanceBatches.php?message=$message");

?>