<?php

include "function.php";

// Create an instance of the EasyShare class
$easyShare = new EasyShare();

// Variable to track login status
$check = -1;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn'])) {
    $email = trim($_POST['user_name']);
    $pass = trim($_POST['pass']);
    $password = md5($pass);

    // Fetch all users
    $result = $easyShare->find_all_user();

    // print_r($result);

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['email'] === $email && $row['pass'] === $password) {
            $check = 1;

            // Start the session if not already started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Store user information in session
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            // Redirect to the dashboard or home page
            header("Location: all_share.php");
            exit();
        }
    }

    // If login fails, set $check to 0
    if ($check == -1) {
        $check = 0;
    }
}
?>











<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Easy Share - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-11 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-7 d-none d-lg-block ">
                                <img style="width: 100%; height: 100%;" src="./img/login-background.jpg" alt="">
                            </div>
                            <div class="col-lg-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input name="user_name" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Email..">
                                        </div>
                                        <div class="form-group">
                                            <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group d-none">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <button type="submit" name="btn" class="btn btn-primary btn-user btn-block"> Login</button>
                                        <a href="index.html" class="btn btn-primary btn-user btn-block d-none">
                                            Login
                                        </a>
                                        <h4 class="py-3" style="color:red; font-size:17px;"><?php if ($check == 0) echo "Incorrect Username Or Password" ?></h4>
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>

                                        <div class="text-center mt-5">
                                            <a class="small" href="register.php">Don’t have an account? Sign up!</a>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                                    </div>
                                    <div class="text-center">
                                        <!-- <a class="small" href="register.html">Create an Account!</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>