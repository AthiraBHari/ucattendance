<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if( isset($_SESSION['username']) ){
    header("Location: index.php");
}

require 'config.php';

if(!empty($_POST['username']) && !empty($_POST['password'])):

$records = $conn->prepare('SELECT username,password FROM admin WHERE username = :username');
$records->bindParam(':username', $_POST['username']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$message = '';


if($results && count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

    $_SESSION['username'] = $results['username'];
    $_SESSION['access'] = "admin";
    header("Location: index.php");

} else {

    $records = $conn->prepare('SELECT email,password FROM teacher WHERE email = :email');
    $records->bindParam(':email', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);   

    if($results && count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

        $_SESSION['username'] = $results['email'];
        $_SESSION['access'] = "teacher";
        header("Location: index.php"); } else {

            $message = 'Sorry, those credentials do not match';
        }
}

endif;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>MCA UCC Admin Login</title>

        <!-- CSS  -->
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/my-login.css">
    </head>
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
                                        <h4 class="card-title">Login</h4>
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
                                                <!--    <a href="forgot.html" class="float-right">
                                                        Forgot Password?
                                                    </a> -->
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

                                            <div class="form-group">
                                                <div class="custom-checkbox custom-control">
                                                <a href="register.php">Register Admin</a>

                                                </div>
                                            </div>
            
                                            <div class="form-group m-0">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    Login
                                                </button>
                                            </div>
                                            <div class="mt-4 text-center">
                                              <!-- Don't have an account? <a href="register.html">Create One</a>--> 
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
            
            
        </div>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>