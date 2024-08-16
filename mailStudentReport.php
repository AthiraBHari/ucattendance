<?php
  require 'checkLogin.php';
  require 'config.php';
  require("mailscript.php");

  $records = $conn->prepare('SELECT * FROM student WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $student = $records->fetch(PDO::FETCH_ASSOC);

  $records = $conn->prepare('SELECT name FROM class WHERE id = :id');
  $records->bindParam(':id', $student['class']);
  $records->execute();
  $batch = $records->fetch(PDO::FETCH_ASSOC);

  $records = $conn->prepare('SELECT COUNT(id) FROM attendance WHERE student = :studentId AND absent = 1');
  $records->bindParam(':studentId', $student['id']);
  $records->execute();
  $absent = $records->fetch(PDO::FETCH_ASSOC);
  //echo $absent['COUNT(id)'].'<br>';

  $records = $conn->prepare('SELECT COUNT(id) FROM attendance WHERE student = :studentId');
  $records->bindParam(':studentId', $student['id']);
  $records->execute();
  $totalWorkingDays = $records->fetch(PDO::FETCH_ASSOC);

  $attendacePercentage = (($totalWorkingDays['COUNT(id)']-$absent['COUNT(id)'])*100)/$totalWorkingDays['COUNT(id)'];

  $subject = 'Attendace report for '.$student["name"];
  $email = $student["email"];
  $body = 'Total Working hours : '.$totalWorkingDays['COUNT(id)'].'<br>Total hours attended : '.($totalWorkingDays['COUNT(id)'] - $absent['COUNT(id)']).'<br>Absent hours  : '.$absent['COUNT(id)'].'<br>Attendace Percentage : '.$attendacePercentage;

  $response = sendMail($email, $subject, $body);

  if($response == "success"){
    $mailMessage = "Maill sent successfully ";
  }else{
    $mailMessage = $response;
  }

  header("Location: viewStudent.php?id=".$_GET['id']."&mailMessage=".$mailMessage);

?>