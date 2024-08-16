<?php
 require 'checkLogin.php';
 require 'config.php';
require("mailscript.php");



$query = "SELECT student.email, student.name, COUNT(attendance.id) as leave_days
          FROM student
          JOIN attendance ON student.id = attendance.id
          WHERE attendance.absent = '1'
          GROUP BY student.id
          HAVING absent > 3";

$result = $conn->query($query);

if ($result) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $email = $row['email'];
        $name = $row['name'];
        $leaveDays = $row['leave_days'];

        // Check if the student has taken leave for more than 3 days
        if ($leaveDays > 3) {
            $subject = "Leave Reminder";
            $message = "Dear $name,\n\nThis is a reminder that you have taken leave for more than 3 days. Please contact the administration for further information.";

            // Send the email
            $response = sendMail($email, $subject, $message);

            // You can handle success or error here based on $response
        }
    }
}

if (isset($_POST['submit'])) {
    // Your existing email sending code goes here
    // You can use $response variable to handle success or error
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Include your head content here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
       
       body {
            font-family: sans-serif;
            min-height: 100%;
            color: #555;
        }

        form {
            max-width: 400px;
            margin: 50px auto 0 auto;
            border: thin solid #e4e4e4;
            padding: 20px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }

        form .info {
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            font-size: 24px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            padding-left: 5px;
        }

        form input,
        form textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            border: thin solid #e4e4e4;
            margin-bottom: 30px;
        }

        form input:focus,
        form select:focus,
        form textarea {
            outline: none;
        }

        form textarea {
            min-height: 80px;
        }

        form input::placeholder {
            font-size: 16px;
        }

        form button {
            background: #32749a;
            color: white;
            border: none;
            padding: 15px;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        form button:active {
            background-color: green;
        }

        .error {
            margin-top: 30px;
            color: #af0c0c;
        }

        .success {
            margin-top: 30px;
            color: green;
        }
    </style>
    <title>Send Email in PHP using PHPMailer and Gmail</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
    <div class="info">
            Send an email to yourself
        </div>


        <label>Enter a subject</label>
        <input type="text" name="subject" value="">

        <label>Enter your message</label>
        <textarea name="message"></textarea>

        <button type="submit" name="submit">Submit</button>

        <?php
        if (@$response == "success") {
        ?>
            <p class="success">Emails sent Successfully</p>
        <?php
        } else {
        ?>
            <p class="error"><?php echo @$response; ?></p>
        <?php
        }
        ?>
    </form>

    <!-- Include your existing scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
