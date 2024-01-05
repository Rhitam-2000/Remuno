<?php
session_start();
require_once('db_connect.php'); // Include the database connection script

if (isset($_POST['save'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            echo '<scrip>alert("Username or Password is invalid");</script>';        
        }
     else if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password =trim( $_POST['password']);
        echo $email.$password;
        // Prepare a SQL query to check user credentials
     // SQL query to fetch information of registered users and find user match.
     $qry = "SELECT * FROM user WHERE password='$password' AND email='$email'";
     $result = $conn->query($qry);
        var_dump($result);
     if ($result->num_rows > 0) {
         
         $data=$result->fetch_assoc();
         $_SESSION['login_user'] = $data['username'];
         $_SESSION['id']=$data['userid'];

          // Initializing Session
         header("location: index.php"); // Redirecting To Other Page
         
     } else {
         echo '("Username or Password is invalid")';
         
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
    <link rel="stylesheet" href="css/login.css">
    <title>Login page</title>
</head>
<body>

    <div class="bg-img">
        <div class="content">
            <header>LOGIN  </header>
            <form action="login.php" method="post">
         
        <div class="form-group">
            <i class="bi bi-envelope-fill"></i>
            <input   class="form-control " type="email" placeholder="Enter  your email " name="email" required>
        </div>
        <div class="form-group">
            <i class="bi bi-key-fill"></i>
            <input class="form-control " type="password" placeholder="Enter your password " name="password" required >
        </div>
        
        <input type="submit" class="butt" value="Signin" name="save" >
        <div class="text-center" >
            Don't have an Account?
            <a href="signup.php">Sign Up</a>
        </div>
    </form>
    </div>
    <script src="assets/bootstrap.bundle.min.js"></alert>
    
</body>
</html>