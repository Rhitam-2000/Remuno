<?php
session_start();
require_once('connect.php'); // Include the database connection script

if (isset($_POST['save'])) {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            echo '<script>alert("Username or Password is invalid");</script>';        
        }
     else if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password =trim( $_POST['password']);

        // Prepare a SQL query to check user credentials
     // SQL query to fetch information of registered users and find user match.
     $query = "SELECT * FROM user WHERE password='$password' AND Email='$email'";
     $result = $conn->query($query);
 
     if ($result->num_rows == 1) {
         $_SESSION['login_user'] = $username; // Initializing Session
         header("location: profile.php"); // Redirecting To Other Page
         
     } else {
         echo '<script>alert("Username or Password is invalid");</script>';
         
     }
 }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>

    <div class="bg-img">
        <div class="content">
            <header>LOGIN  </header>
            <form action="login1.php" method="post">
         
        <div class="form-group">
            <i class="bi bi-envelope-fill"></i>
            <input   class="form-control " type="email" placeholder="Enter  your email " name="email" required>
        </div>
        <div class="form-group">
            <i class="bi bi-key-fill"></i>
            <input class="form-control " type="password" placeholder="Enter your password " name="password" required >
        </div>
        <div class="form-checkcheck">
            <input type="checkbox"  id="check_1"> <small>I read and agree to Term and condition</small> 
        </div>
        <input type="submit" class="butt" value="Signin" name="save" >
        <div class="text-center" >
            <a href="index.php">Don't have an Account?</a>
            <a href="index.php">Sign Up</a>
        </div>
    </form>
    </div>
    <script src="Assets/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>