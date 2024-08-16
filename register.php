
<?php
session_start();
require 'config.php';

$message = '';

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    // Hash the password
    $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Enter the new user in the database
    $sql = "INSERT INTO admin (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', $hashedPassword); // Use the variable here

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
    } else {
        $message = 'Sorry, there must have been an issue creating your account';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Add new users</title>

        <!-- CSS  -->
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/my-login.css">
    </head>
    <body>
    <body class="my-login-page bg-color">
            <section class="h-100">
                    <div class="container h-100">
                        <div class="row justify-content-md-center h-100">
                            <div class="card-wrapper">
                                <div class="brand">
                                    <img src="img/logo.jpg" alt="logo">
                                </div>
                                <div class="card fat">
                                    <div class="card-body">
                                        <h4 class="card-title">Add admin</h4>
                                        <form method="POST" class="my-login-validation" novalidate="">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                                                <div class="invalid-feedback">
                                                    Username is invalid
                                                </div>
                                            </div>
            
                                            <div class="form-group">
                                                <label for="password">Password
                                                </label>
                                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                                                <div class="invalid-feedback">
                                                    Password is required
                                                </div>
                                            </div>
                                            <?php if(!empty($message)): ?>
            <p class="alert alert-danger" ><?= $message ?></p>
            <?php endif; ?>
            
                                            <div class="form-group">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                                    <label for="remember" class="custom-control-label">Remember Me</label>
                                                </div>
                                            </div>
            
                                            <div class="form-group m-0">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Add user
                                                </button>
                                            </div>
                                            <div class="mt-4 text-center">
                                              log in to account? <a href="login.php">Login</a>--> 
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="footer">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

        <div class="container">




        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>

    </body>
</html>