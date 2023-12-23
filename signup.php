<?php 
    if(isset($_POST['submit']))
    {
        require_once('db-connect.php');
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $qry="INSERT INTO user (username,email,password) VALUES ('$name','$email','$password')";
        $res=$conn->query($qry);
        if($res)
        {
            header("location:login.php");
        }
    }
    require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body>
<section class="vh-100 d-flex align-items-center justify-content-center" style="background: #31304D">
        <div class="card w-25 p-4">
            <h3 class="my-4 text-center">Sign up</h3>
            <form class="form" action="signup.php" method="post">
                <!-- name -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1">Username</label>
                      <input type="text" id="form3Example1" name="name" class="form-control" /> 
                    </div>
                  

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" id="form3Example3" class="form-control"  name="email"/>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" name="password" class="form-control" />
                </div>         
                <div class="form-outline text-center mb-4">      
                <input type="submit" name="submit"  class="btn btn-primary form-control btn-block mb-4" value="sign up">
                 
                </div> 
              </form>
        </div>
    </section>
</body>
</html>