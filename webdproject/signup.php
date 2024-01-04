<?php
session_start();

if(isset($_POST['save'])) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $checkbox = isset($_POST['check_1']) ? $_POST['check_1'] : false;
    
    
    // if(empty($name) || empty($email) || empty($password) || !$checkbox) {
    //     $error_message = "Please fill all the required fields and agree to terms.";
    // } else {
        // Store user input in session variables
        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        // header("Location: login.php");
        require_once "connect.php";
        $check_email_query = "SELECT * FROM user WHERE Email  = '$email'";
        $result = $conn->query($check_email_query);
        if ($result->num_rows > 0) {
            echo '<script>alert("Email already exists, please use another email.");</script>';
        } else {
            // Perform registration - Insert user data into the database
            $insert_query = "INSERT INTO user (UserName, Email, Password) VALUES ('$name', '$email', '$password')";
            if ($conn->query($insert_query) === TRUE) {
                $_SESSION["registration_success"] = true;
                 // Set registration success flag in session
                header("Location: login.php"); // Redirect to login page
                
            } else {
                // Registration failed, set error message...
                $_SESSION["registration_success"] = false;
                echo '<script>alert(" Login fail try again");</script>';



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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Registation Form</header>
            <form action="index.php" method="post">
          <div class="form-group">
            <i class="bi bi-person-fill"></i>
            <input  class="form-control " type="text" placeholder="Enter your name " name="name" required >
        </div>
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
        <input type="submit" class="butt" value="Signup" name="save" >
        <div class="signin"> have  a account?
            <a href="#">Signin Now</a>
        </div>
    </form>
    </div>
        
 

<script>
function validate(e){ 
    try{
    const nameInput = document.querySelector('input[name="name"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const agreementCheckbox = document.getElementById('check_1');
    let error = false;

    if (!nameInput.value.trim()) {
        alert('Please enter your name.');
        error = true;
      
    }
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailInput.value.trim() || !emailRegex.test(emailInput.value.trim())) {
           alert('Please enter a valid email address.');
           error = true;
      }
      //password check
      let passPat = /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,16}$/;

      if(password === "" || password === null){
        alert('password is Required');
        error = true;
      }
    else if(!password .match(passPat)){
            alert('Please enter a strong password(8-16) with uppercase lowercase numbers and special chars.');
            error = true;
    }

   //checkbox agree
    if (!agreementCheckbox.checked) {
        alert('Please agree to the terms and conditions.');
        error = true;
      }
      if(error){
            e.preventDefault()
        }
    } catch(error){
        console.log(error);
        e.preventDefault()
    }
}
</script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></scrip>
</body>
</html>